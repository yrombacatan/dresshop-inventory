<div class="row">
    <!-- Invoice Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('invoice_number', 'Invoice Number:') !!}
        {!! Form::number('invoice_number', $invoice_id ?? 10000, ['class' => 'form-control', 'readonly']) !!}
    </div>
</div>
<div class="row">
    
    <!-- Customer Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('customer_name', 'Customer Name:') !!}
        {!! Form::select('customer_id', ['' => 'Select Customer'] + $customers , null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    
    <!-- Transac Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('transac_date', 'Transaction Date:') !!}
        {!! Form::text('transac_date', null, ['class' => 'form-control', 'id' => 'datepicker', 'maxlength' => 100,'maxlength' => 100]) !!}
        {!! Form::text('total_discount', null, ['class' => 'form-control totalDiscount', 'readonly', 'hidden']) !!}
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
                    <th scope="col">Item Information <b class="text-danger pl-1 h4 position-absolute">*</b></th>
                    <th scope="col">Available Qty <b class="text-danger pl-1 h4 position-absolute">*</b></th>
                    <th scope="col">Quantity <b class="text-danger pl-1 h4 position-absolute">*</b></th>
                    <th scope="col">Rate <b class="text-danger pl-1 h4 position-absolute">*</b></th>
                    <th scope="col">Discount/item<b class="text-danger pl-1 h4 position-absolute">*</b></th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @if (isset($invoiceDetails))
                @foreach ($invoiceDetails as $invoiceDetail)
                <tr>
                    <td>
                        <div class="form-group mb-0">

                            {!! Form::select('product_id[]', ['' => 'Select Item'] + $productOption, $invoiceDetail->product_id, ['class' => 'form-control itemName', 'onchange' => 'selectItem(this)'], $productAttributes) !!}
                            
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="available_qty[]" type="number" value="{{ $invoiceDetail->balanced_stocks }}" min="0" class="form-control itemStock" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="entered_qty[]" type="number" min="0" value="{{ $invoiceDetail->entered_qty }}" data-qty="{{ $invoiceDetail->entered_qty }}" class="form-control itemQuantity" onchange="calcTotal(this)" onkeyup="calcTotal(this)">
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="rate[]" type="number" value="{{ $invoiceDetail->rate }}" min="0" class="form-control itemRate" oninput="" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="discount[]" type="number" value="{{ $invoiceDetail->discount }}" min="0" class="form-control itemDiscount" onchange="calcTotal(this)" onkeyup="calcTotal(this)">
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="total[]" type="text" value="{{ $invoiceDetail->total }}" readonly class="form-control itemTotal">
                            <input type="text" hidden name="item[]" value="{{ $invoiceDetail->item }}" class="productName">
                            <input type="text" hidden value="{{ $invoiceDetail->discount }}" class="rowDiscount">
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

                            {!! Form::select('product_id[]', ['' => 'Select Item'] + $productOption, null, ['class' => 'form-control itemName', 'onchange' => 'selectItem(this)'], $productAttributes) !!}
                            
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="available_qty[]" type="number" min="0" class="form-control itemStock" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="entered_qty[]" type="number" min="0" class="form-control itemQuantity" onchange="calcTotal(this)" onkeyup="calcTotal(this)">
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="rate[]" type="number" min="0" class="form-control itemRate" oninput="" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="discount[]" type="number" min="0" class="form-control itemDiscount" onchange="calcTotal(this)" onkeyup="calcTotal(this)">
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="total[]" type="text" readonly class="form-control itemTotal">
                            <input type="text" hidden name="item[]" class="productName">
                            <input type="text" hidden class="rowDiscount">
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm btnRemove" onclick="removeItem(this)"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @endif
                
                <!-- New rows goes here -->
                <tr class="insertBefore"> 
                    <td colspan="5" class="text-right pr-2" style="vertical-align:middle">
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
                    <td colspan="4" class="text-right pr-2" style="vertical-align:middle">
                        <b>Paid Amount:</b>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input name="amount_paid" type="number" class="form-control amountPaid" value="{{ isset($invoice) ? $invoice->amount_paid : '' }}">
                        </div>
                    </td>
                    <td class="border-top-0 border-bottom-0"></td>
                </tr>
                <tr>
                    <td class="d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-primary mr-2 btnSubmit">Submit</button>
                        <button class="btn btn-success btnFullPaid">Full Paid</button>
                    </td>
                    <td colspan="4" class="text-right pr-2" style="vertical-align:middle">
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