<div class="row">
    <!-- Grand Total Field -->
    <div class="form-group col-sm-6">
    {!! Form::label('expense_type', 'Expense Type:') !!} <b class="text-danger pl-1 h4 position-absolute">*</b>
    {!! Form::select('expense_type_id', $expenseType, isset($expense) ? $expense->expense_type_id : [], ['class' => 'form-control expenseType']) !!}
    </div>
</div>
<div class="row">
    <!-- Transac Date Field -->
    <div class="form-group col-sm-6">
    {!! Form::label('transac_date', 'Transac Date:') !!} <b class="text-danger pl-1 h4 position-absolute">*</b>
    {!! Form::text('transac_date', null, ['id' => 'datepicker', 'class' => 'form-control transacDate','maxlength' => 255,'maxlength' => 255]) !!}
    </div>
    
    @push('js')
        <script>
            $(function() {
                $( "#datepicker" ).datepicker();
                $( "#datepicker" ).datepicker( "option", "showAnim", "slideDown" );
            });
        </script>
    @endpush
</div>
<div class="row">
    <div class="table-responsive">
        <table  class="table table-bordered" id="tableExpenses">
            <thead>
                <tr class="table-info">
                    <th scope="col" class="w-50">Item Information <b class="text-danger pl-1 h4 position-absolute">*</b></th>
                    <th scope="col">Quantity <b class="text-danger pl-1 h4 position-absolute">*</b></th>
                    <th scope="col">Rate <b class="text-danger pl-1 h4 position-absolute">*</b></th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @if (isset($expenseDetails))
                @foreach ($expenseDetails as $expenseDetail)
                <tr>
                    <td>
                        <div class="form-group mb-0">
                            <input name="item[]" type="text" class="form-control itemName" value="{{ $expenseDetail->item }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="quantity[]" type="number" min="0" class="form-control itemQuantity" oninput="multiplyQuantityToRate(this)" value="{{ $expenseDetail->quantity }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="rate[]" type="number" min="0" class="form-control itemRate" oninput="multiplyRateToQuantity(this)" value="{{ $expenseDetail->rate }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="total[]" type="text" readonly class="form-control itemTotal" value="{{ $expenseDetail->total }}">
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm btnRemove" onclick="removeItem(this)"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td>
                        <div class="form-group mb-0">
                            <input name="item[]" type="text" class="form-control itemName">
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="quantity[]" type="number" min="0" class="form-control itemQuantity" oninput="multiplyQuantityToRate(this)">
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="rate[]" type="number" min="0" class="form-control itemRate" oninput="multiplyRateToQuantity(this)">
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="total[]" type="text" readonly class="form-control itemTotal">
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm btnRemove" onclick="removeItem(this)"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @endif
                
                <!-- New rows goes here -->
                <tr class="insertBefore"> 
                    <td colspan="3" class="text-right pr-2" style="vertical-align:middle">
                        <b>Grand Total:</b>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="grand_total" type="text" readonly class="form-control grandTotal">
                        </div>
                    </td>
                    <td class="border-bottom-0"></td>
                </tr>
                <tr>
                    <td class="d-flex align-items-center justify-content-center">
                        <button class="btn btn-info btnAdd">Add item</button>
                    </td>
                    <td colspan="2" class="text-right pr-2" style="vertical-align:middle">
                        <b>Paid Amount:</b>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="paid_amount" type="number" class="form-control amountPaid" value="{{ isset($expense) ? $expense->paid_amount : '' }}">
                        </div>
                    </td>
                    <td class="border-top-0 border-bottom-0"></td>
                </tr>
                <tr>
                    <td class="d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-primary mr-2 btnSubmit">Submit</button>
                        <button class="btn btn-success btnFullPaid">Full Paid</button>
                    </td>
                    <td colspan="2" class="text-right pr-2" style="vertical-align:middle">
                        <b>Due:</b>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="due" type="text" readonly class="form-control due">
                        </div>
                    </td>
                    <td class="border-top-0"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>