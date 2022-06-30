@extends('adminlte::page')

@section('title', 'Add Invoice')

@section('plugins.JqueryUi', true)

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="mb-1">Create Invoice</h1>
            {{ Breadcrumbs::render('invoices.create') }}
        </div>
    </div>
@endsection

@section('content')
    
    <div class="content">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'invoices.store']) !!}

            <div class="card-body">

                @include('invoices.fields')

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('invoices.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@push('js')
    <script>

        $(function() {
            const itemProps = ['itemName', 'itemQuantity'];

            $('.btnAdd').click( function(e) {
                e.preventDefault();

                let hasError = validateItem(itemProps);
                if (hasError) return;

                let row = `
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
                `;

                $(row).insertBefore('#tableExpenses tbody tr.insertBefore');
                
            })

            $('.btnSubmit').click( function(e) {
                let hasError = validateItem(itemProps);
                if (hasError) e.preventDefault();

                if(Number($('.amountPaid').val()) > Number($('.grandTotal').val())) {
                    e.preventDefault();
                    $('.amountPaid').css('border-color', 'orangered');
                }

                calcTotalDiscount();
                
            })

            $('.btnFullPaid').click( function(e) {
                e.preventDefault();
                let grandTtl = $('.grandTotal').val();
                $('.amountPaid').val(grandTtl);

                calcDue();
            })

            $('.amountPaid').on('input change', function() {
                calcDue();
            })

            
        });
        
        function selectItem(el) {
            let name = $(el).find(':selected').data('name');
            let quantity = $(el).find(':selected').data('quantity');
            let rate = $(el).find(':selected').data('rate');
            $(el).closest('tr').find('.productName').val(name);
            $(el).closest('tr').find('.itemStock').val(quantity);
            $(el).closest('tr').find('.itemRate').val(rate);

            // in case qty/discount are filled up
            calcTotal(el)

            // in case there is error msg
            removeErrorMsg(el);
        }

        function validateItem(itemProps) {
            var error = false;
            var selectedItemList = [];

            itemProps.forEach( (i) => {
                
                $(`.${i}`).each(function() {
            
                    // removed error msg
                    if ( $(this).prev().is('span') ) $(this).prev().remove() 

                    if ( $(this).val() === '' ) {
                        $(this).parent().prepend(`<span class='text-danger required'>Required</span>`);
                        error = true;
                    } 

                    if ($(this).val() == 0 && $(this).val() !== '' ) {
                        $(this).parent().prepend(`<span class='text-danger invalid'>Invalid</span>`);
                        error = true;
                    }

                    // Avoid duplicate item.
                    if($(this).hasClass('itemName')) {
                        let item = $(this).val();
                        
                        let itemExist = selectedItemList.some((e) => e === item);
                        
                        if(itemExist) {
                            $(this).parent().prepend(`<span class='text-danger invalid'>Item already exist.</span>`);
                            error = true;
                        } else {
                            selectedItemList.push(item)
                        }
                        
                    }

                    // Check if enough stock for the entered qty.
                    if($(this).hasClass('itemQuantity')) {
                        let availableQty = $(this).closest('td').prev().find('input').val();

                        if (Number($(this).val()) > Number(availableQty)) {
                            $(this).parent().prepend(`<span class='text-danger invalid'>Exceed</span>`);
                            error = true;
                        }
                    }

                });
            })

            return error;
        }
        
        function calcTotal(el) {
            let qty = $(el).closest('tr').find('.itemQuantity').val();
            let rate = $(el).closest('tr').find('.itemRate').val();
            let discount = $(el).closest('tr').find('.itemDiscount').val();
            let whole = Math.floor((qty * rate) - (qty * discount));
            $(el).closest('tr').find('.itemTotal').val(whole)
            $(el).closest('tr').find('.rowDiscount').val(qty * discount);

            calcGrandTotal();
            calcDue();
            removeErrorMsg(el);
        }

        function calcTotalDiscount() {
            var ttl = 0;
            $('.rowDiscount').each(function() {
                ttl = Math.floor(ttl + Number($(this).val()));
            })
            $('.totalDiscount').val(ttl);
        }

        function calcGrandTotal() {
            var total = 0;

            $('.itemTotal').each(function() {
                total += Number($(this).val());
            })

            $('.grandTotal').val(total);
        }     

        function calcDue() {
            let grandTtl = $('.grandTotal').val();
            let amountPaid = $('.amountPaid').val();

            if(parseInt(amountPaid) > parseInt(grandTtl)) return $('.due').val(0)
            
            let due = Math.floor(grandTtl - amountPaid);
            $('.due').val(due);
        } 

        function removeItem(el) {
            $(el).closest('tr').remove();
            calcGrandTotal();
            calcDue();
            return false
        }  

        function removeErrorMsg(el) {
            $(el).prev().remove();
        }

    </script>
@endpush
