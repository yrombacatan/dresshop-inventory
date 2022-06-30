<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Product;
use Flash;
use Response;
use DB;
use File;
use Image;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
        //$products = $this->productRepository->all();

        $products =  DB::table('product')
            ->leftjoin('product_category', 'product_category.id', '=', 'product.product_category_id')
            ->leftjoin('vw_balanced_stocks', 'vw_balanced_stocks.id', '=', 'product.id')
            ->leftjoin('supplier', 'supplier.id', '=', 'product.supplier_id')
            ->leftjoin('warehouse', 'warehouse.id', '=', 'product.warehouse_id')
            ->select('product.*', 'vw_balanced_stocks.balanced_stocks as balanced_stocks', 'product_category.name as category', 'supplier.name as supplier', 'warehouse.name as warehouse')
            ->whereNull('product.deleted_at')
            ->get();

        return view('products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {   
        $productCategory = DB::table('product_category')->pluck('name','id')->all();
        $warehouse = DB::table('warehouse')->pluck('name','id')->all();
        $suppliers = DB::table('supplier')->pluck('name','id')->all();
        return view('products.create', compact('productCategory', 'warehouse', 'suppliers'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $input['img'] = $this->saveImage($request, false);

        $product = $this->productRepository->create($input);

        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);
        $category = $product->productCategory()->select('name')->first();
        $supplier = $product->supplier()->select('name')->first();
        $warehouse = $product->warehouse()->select('name')->first();
        $vw_balanced_stocks = DB::table('vw_balanced_stocks')->where('id', $id)->value('balanced_stocks');
        $product->quantity = $vw_balanced_stocks;

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show', compact('category', 'supplier', 'warehouse', 'vw_balanced_stocks'))
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        $productCategory = DB::table('product_category')->pluck('name','id')->all();
        $warehouse = DB::table('warehouse')->pluck('name','id')->all();
        $suppliers = DB::table('supplier')->pluck('name','id')->all();
        $vw_balanced_stocks = DB::table('vw_balanced_stocks')->where('id', $id)->value('balanced_stocks');
        $product->quantity = $vw_balanced_stocks;

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.edit', compact('productCategory', 'warehouse', 'suppliers', 'vw_balanced_stocks'))
            ->with('product', $product);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {   
        $input = $request->all();
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $input['img'] = $this->saveImage($request, $product);

        $product = $this->productRepository->update($input, $id);

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }

    public function saveImage($request, $product = true) {
        if($request->hasFile('img')) {
            $path_to_save = public_path('image/product/');
            
            // check directory
            if(!File::isDirectory($path_to_save)){
                File::makeDirectory($path_to_save, 0777, true, true);
            }

            if($product) {
                // check if file exist
                // then delete 
                $path = $path_to_save . $product->img;
                if($product->img) {
                    if(is_file($path)) {
                        File::delete($path);
                    }
                } 
            }

            $file = $request->file('img');
            $fileName = time().'_'.$file->getClientOriginalName();
            $image = Image::make($file)->resize(80,80)->save($path_to_save . $fileName);
            
            return $fileName;
        }
        if ($product) return $product->img;
    }
}
