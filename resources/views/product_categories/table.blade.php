<div class="table-responsive mt-2">
    <table class="table main-table" id="productCategories-table">
        <thead>
            <tr>
                <th>Name</th>
                <th class="noExcel">Slug</th>
                <th class="noExcel">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productCategories as $productCategory)
            <tr>
                <td>{{ $productCategory->name }}</td>
                <td class="noExcel">{{ $productCategory->slug }}</td>
                <td width="200" class="noExcel">
                    {!! Form::open(['route' => ['productCategories.destroy', $productCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productCategories.show', [$productCategory->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('productCategories.edit', [$productCategory->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
