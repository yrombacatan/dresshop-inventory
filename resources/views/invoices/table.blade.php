<div class="table-responsive">
    <table class="table main-table" id="invoices-table">
        <thead>
            <tr>
                <th>Invoice Number</th>
                <th>Customer Name</th>
                <th>Transac Date</th>
                <th>Total Discount</th>
                <th>Grand Total</th>
                <th>Amount Paid</th>
                <th class="noExcel">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->invoice_number }}</td>
            <td>{{ $invoice->customer_name }}</td>
            <td>{{ $invoice->transac_date }}</td>
            <td>{{ $invoice->total_discount }}</td>
            <td>{{ $invoice->grand_total }}</td>
            <td>{{ $invoice->amount_paid }}</td>
                <td width="120" class="noExcel">
                    {!! Form::open(['route' => ['invoices.destroy', $invoice->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('invoices.show', [$invoice->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('invoices.edit', [$invoice->id]) }}" class='btn btn-default btn-sm'>
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
