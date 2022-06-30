<div class="table-responsive">
    <table class="table main-table" id="warehouses-table">
        <thead>
            <tr>
                <th>Name</th>
                <th class="noExcel">Slug</th>
                <th class="noExcel">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($warehouses as $warehouse)
            <tr>
                <td>{{ $warehouse->name }}</td>
                <td class="noExcel">{{ $warehouse->slug }}</td>
                <td width="120" class="noExcel">
                    {!! Form::open(['route' => ['warehouses.destroy', $warehouse->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('warehouses.show', [$warehouse->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('warehouses.edit', [$warehouse->id]) }}" class='btn btn-default btn-sm'>
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
