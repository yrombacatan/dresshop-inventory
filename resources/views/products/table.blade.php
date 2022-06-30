<div class="table-responsive">
    <table class="table main-table" id="products-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Supplier</th>
                <th>Category</th>
                <th>Warehouse</th>
                <th>Image</th>   
                <th class="noExcel">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->balanced_stocks }}</td>
                <td>{{ $product->sell_price }}</td>
                <td>{{ $product->supplier }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->warehouse }}</td>
                <td> 
                    @isset($product->img)
                        <img src="{{ asset('image/product/'. $product->img) }}" alt="{{ $product->name }}">
                    @endisset 
                </td>
                <td width="120" class="noExcel">
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.show', [$product->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('products.edit', [$product->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
