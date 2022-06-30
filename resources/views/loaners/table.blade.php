<div class="table-responsive">
    <table class="table" id="loaners-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($loaners as $loaner)
            <tr>
                <td>{{ $loaner->name }}</td>
            <td>{{ $loaner->phone }}</td>
            <td>{{ $loaner->address }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['loaners.destroy', $loaner->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('loaners.show', [$loaner->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('loaners.edit', [$loaner->id]) }}" class='btn btn-default btn-sm'>
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
