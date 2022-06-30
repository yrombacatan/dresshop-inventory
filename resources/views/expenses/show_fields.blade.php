<!-- Expense Type Id Field -->
<div class="col-sm-12">
    {!! Form::label('expense_type', 'Expense Type:') !!}
    <p>{{ $type->name }}</p>
</div>

<!-- Transac Date Field -->
<div class="col-sm-12">
    {!! Form::label('transac_date', 'Transac Date:') !!}
    <p>{{ $expense->transac_date }}</p>
</div>

<div class="col-sm-12">
    <div class="table-responsive">
        <table class="table table-stripped table-bordered" id="expenseType-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($expenseDetails as $expenseDetail)
                    <tr>
                        <td> {{ $expenseDetail->item }} </td>
                        <td> {{ $expenseDetail->quantity }} </td>
                        <td> {{ $expenseDetail->rate }} </td>
                        <td> {{ $expenseDetail->total }} </td>
                    </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>

<!-- Grand Total Field -->
<div class="col-sm-12">
    {!! Form::label('grand_total', 'Grand Total:') !!}
    <p>{{ $expense->grand_total }}</p>
</div>

<!-- Paid Amount Field -->
<div class="col-sm-12">
    {!! Form::label('paid_amount', 'Paid Amount:') !!}
    <p>{{ $expense->paid_amount ?? 0 }}</p>
</div>

<!-- Paid Amount Field -->
<div class="col-sm-12">
    {!! Form::label('due', 'Due:') !!}
    <p>{{ ($expense->grand_total - ( $expense->paid_amount ?? 0)) }}</p>
</div>




