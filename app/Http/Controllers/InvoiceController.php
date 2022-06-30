<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Repositories\InvoiceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Customer;
use Flash;
use Response;
use DB;

class InvoiceController extends AppBaseController
{
    /** @var  InvoiceRepository */
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepo)
    {
        $this->invoiceRepository = $invoiceRepo;
    }

    /**
     * Display a listing of the Invoice.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$invoices = $this->invoiceRepository->all();
        $invoices = DB::table('invoice')
                    ->join('customer', 'customer.id', '=', 'invoice.customer_id')
                    ->selectRaw('concat(fname, " ", mname, " ", lname) as customer_name, invoice.*')
                    ->get();

        return view('invoices.index')
            ->with('invoices', $invoices);
    }

    /**
     * Show the form for creating a new Invoice.
     *
     * @return Response
     */
    public function create()
    {   
        $invoice_id = DB::table('invoice')->select('invoice_number')->latest()->first();

        if ($invoice_id) { $invoice_id = $invoice_id->invoice_number + 1; }

        $products = DB::table('vw_balanced_stocks')
            ->select('id', 'name', 'balanced_stocks', 'sell_price')
            ->get();

        $productOption = $products->pluck('name','id')->all();
        $productAttributes = collect($products)
        ->mapWithKeys(function ($item) {
                        return [
                            $item->id => [
                                'data-name' => $item->name, 
                                'data-quantity' => $item->balanced_stocks > 0 ? $item->balanced_stocks : 0, 
                                'data-rate' => $item->sell_price 
                            ]
                        ];
                    })->all();

        $customers = Customer::whereNull('deleted_at')->get()->pluck('full_name', 'id')->all();

        return view('invoices.create', compact('productOption', 'productAttributes', 'customers', 'invoice_id'));
    }

    /**
     * Store a newly created Invoice in storage.
     *
     * @param CreateInvoiceRequest $request
     *
     * @return Response
     */
    public function store(CreateInvoiceRequest $request)
    {
        $input = $request->all();

        $invoice = $this->invoiceRepository->create($input);

        foreach($request->item as $key => $v) {
            $item = [
                'item' => $request->item[$key],
                'available_qty' => $request->available_qty[$key],
                'entered_qty' => $request->entered_qty[$key],
                'rate' => $request->rate[$key],
                'discount' => $request->discount[$key],
                'total' => $request->total[$key],
                'product_id' => $request->product_id[$key],
                'invoice_id' => $invoice->id,
            ];
            DB::table('invoice_details')->insert($item);
        }

        Flash::success('Invoice saved successfully.');

        return redirect(route('invoices.index'));
    }

    /**
     * Display the specified Invoice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invoice = $this->invoiceRepository->find($id);
        $customer = $invoice->customer()
                    ->selectRaw('concat(fname, " ", mname, " ", lname) as name, mobile, email, billing_address')
                    ->first();
        $invoiceDetails = $invoice->invoiceDetails()->get();
        $company = DB::table('company')->first();

        if (empty($invoice)) {
            Flash::error('Invoice not found');

            return redirect(route('invoices.index'));
        }

        return view('invoices.show', compact('company', 'invoiceDetails', 'customer'))->with('invoice', $invoice);
    }

    /**
     * Show the form for editing the specified Invoice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $invoice = $this->invoiceRepository->find($id);
        // $invoiceDetails = $invoice->invoiceDetails()->get();
        $invoiceDetails = DB::table('invoice_details')
            ->join('vw_balanced_stocks', 'vw_balanced_stocks.id', '=', 'invoice_details.product_id')
            ->select('vw_balanced_stocks.balanced_stocks as balanced_stocks', 'invoice_details.*')
            ->where('invoice_details.invoice_id', $id)
            ->get();

        //return $invoiceDetails;
        $products = DB::table('vw_balanced_stocks')
            ->select('id', 'name', 'balanced_stocks', 'sell_price')
            ->get();

        $productOption = $products->pluck('name','id')->all();
        $productAttributes = collect($products)
        ->mapWithKeys(function ($item) {
                        return [
                            $item->id => [
                                'data-name' => $item->name, 
                                'data-quantity' => $item->balanced_stocks > 0 ? $item->balanced_stocks : 0, 
                                'data-rate' => $item->sell_price 
                            ]
                        ];
                    })->all();

        $customers = Customer::whereNull('deleted_at')->get()->pluck('full_name', 'id')->all();
        
        if (empty($invoice)) {
            Flash::error('Invoice not found');

            return redirect(route('invoices.index'));
        }

        return view('invoices.edit', compact('productOption', 'productAttributes', 'customers', 'invoiceDetails'))
            ->with('invoice', $invoice);
    }

    /**
     * Update the specified Invoice in storage.
     *
     * @param int $id
     * @param UpdateInvoiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvoiceRequest $request)
    {
        $invoice = $this->invoiceRepository->find($id);

        if (empty($invoice)) {
            Flash::error('Invoice not found');

            return redirect(route('invoices.index'));
        }

        DB::table('invoice_details')->where('invoice_id', $id)->delete();
        
        foreach($request->item as $key => $v) {
            $item = [
                'item' => $request->item[$key],
                'available_qty' => $request->available_qty[$key],
                'entered_qty' => $request->entered_qty[$key],
                'rate' => $request->rate[$key],
                'discount' => $request->discount[$key],
                'total' => $request->total[$key],
                'product_id' => $request->product_id[$key],
                'invoice_id' => $invoice->id,
            ];
            DB::table('invoice_details')->insert($item);
        }

        $invoice = $this->invoiceRepository->update($request->all(), $id);

        Flash::success('Invoice updated successfully.');

        return redirect(route('invoices.index'));
    }

    /**
     * Remove the specified Invoice from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invoice = $this->invoiceRepository->find($id);

        if (empty($invoice)) {
            Flash::error('Invoice not found');

            return redirect(route('invoices.index'));
        }

        $this->invoiceRepository->delete($id);

        Flash::success('Invoice deleted successfully.');

        return redirect(route('invoices.index'));
    }
}
