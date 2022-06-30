<div class="table-responsive">
    <table class="table" id="customers-table">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Middlename</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Billing Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->fname }}</td>
                <td>{{ $customer->lname }}</td>
                <td>{{ $customer->mname }}</td>
                <td>{{ $customer->mobile }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->billing_address }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('customers.show', [$customer->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('customers.edit', [$customer->id]) }}" class='btn btn-default btn-sm'>
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
