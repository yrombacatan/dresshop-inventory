@extends('adminlte::page')

@section('title', 'Add Expenses Invoice')

@section('content_header')
    {{ Breadcrumbs::render('expenses.create') }}
@endsection

@section('plugins.JqueryUi', true)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Expense</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'expenses.store']) !!}

            <div class="card-body">

                
                    @include('expenses.fields')
                

            </div>

            <div class="card-footer">
                <!-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} -->
                <a href="{{ route('expenses.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@push('js')
    <script>

        $(function() {
            const itemProps = ['itemName', 'itemQuantity', 'itemRate'];

            $('.btnAdd').click( function(e) {
                e.preventDefault();

                let hasError = validateItem(itemProps);
                if (hasError) return;

                let row = `
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
                `;

                $(row).insertBefore('#tableExpenses tbody tr.insertBefore');
                
            })

            $('.btnSubmit').click( function(e) {
                let hasError = validateItem(itemProps);
                if (hasError) e.preventDefault();

                if($('.amountPaid').val() > $('.grandTotal').val()) {
                    e.preventDefault();
                    $('.amountPaid').css('border-color', 'orangered');
                }
            })

            $('.btnFullPaid').click( function(e) {
                e.preventDefault();
                let grandTtl = $('.grandTotal').val();
                $('.amountPaid').val(grandTtl);

                calcDue();
            })

            $('.amountPaid').on('input', function() {
                calcDue();
            })

            
        });

        function validateItem(itemProps) {
            var error = false;
            itemProps.forEach( (i) => {
                
                $(`.${i}`).each(function() {

                    if ( $(this).prev().is('span') ) $(this).prev().remove() // removed error msg

                    if ( $(this).val() === '' ) {
                        $(this).parent().prepend(`<span class='text-danger required'>Required</span>`);
                        error = true;
                    } 

                    if ($(this).val() === 0 ) {
                        $(this).parent().prepend(`<span class='text-danger invalid'>Invalid</span>`);
                        error = true;
                    }
                });
            })

            return error;
        }

        function multiplyQuantityToRate(el) {
            let quantity = $(el).val();
            let rate = $(el).closest('td').next().find('input').val();

            if( rate === '') return
            
            let total = quantity * rate;
            let itemTotal = $(el).closest('tr').find('.itemTotal');
            itemTotal.val(total);

            calcGrandTotal();
            calcDue();
        }

        function multiplyRateToQuantity(el) {
            let rate = $(el).val();
            let quantity = $(el).closest('td').prev().find('input').val();

            if( quantity === '') return
            
            let total = quantity * rate;
            let itemTotal = $(el).closest('tr').find('.itemTotal');
            itemTotal.val(total);

            calcGrandTotal();
            calcDue();
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

        function removeItem(e) {
            $(e).closest('tr').remove();
            calcGrandTotal();
            return false
        }  

    </script>
@endpush
