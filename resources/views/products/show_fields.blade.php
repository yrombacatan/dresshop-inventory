<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="card">
            <div class="card-body d-flex justify-content-center align-items-center">
                <!-- Img Field -->
                @isset($product->img)
                    <img src="{{ asset('image/product/'. $product->img) }}" alt="{{ $product->name }}">
                @endisset
            </div>
        </div>
        
    </div>
    <div class="col-md-8 col-sm-6">
        <div  class="px-3">
            {!! Form::label('name', 'Name:') !!}
            <p>{{ $product->name }}</p> 

            <div class="row">
            <div class="col-3">
                {!! Form::label('mfg_date', 'Mfg Date:') !!}
                <p>{{ $product->mfg_date }}</p>
            </div>

            <div class="col-3">
                {!! Form::label('exp_date', 'Exp Date:') !!}
                <p>{{ $product->exp_date }}</p>
            </div>
            </div>

            <p>{{ $product->description ?? 'No description'  }}</p>
        </div>
    </div>
</div>
<div class="w-100 row pt-3">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Quantity</th>
                    <th>Sellig Price</th>
                    <th>Supplier Price</th>
                    <th>Model</th>
                    <th>Sku</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->sell_price }}</td>
                    <td>{{ $product->supplier_price }}</td>
                    <td>{{ $product->model }}</td>
                    <td>{{ $product->sku }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row pt-3">
    <div class="col-sm-12">
        {!! Form::label('product_category_id', 'Product Category:') !!}
        <p>{{ $category->name ?? '' }}</p>
    </div>

    <!-- Supplier Id Field -->
    <div class="col-sm-12">
        {!! Form::label('supplier_id', 'Supplier:') !!}
        <p>{{ $supplier->name }}</p>
    </div>

    <!-- Warehouse Id Field -->
    <div class="col-sm-12">
        {!! Form::label('warehouse_id', 'Warehouse:') !!}
        <p>{{ $warehouse->name ?? '' }}</p>
    </div>
</div>