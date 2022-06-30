@extends('adminlte::page')

@section('title', 'Edit Product')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="mb-1">Edit Product</h1>
            {{ Breadcrumbs::render('products.edit', $product) }}
        </div>
    </div>
@endsection

@section('plugins.JqueryUi', true)

@section('content')

    <div class="content">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

            <div class="card-body">

                    @include('products.fields')

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary btnSubmit']) !!}
                <a href="{{ route('products.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection

@push('js')
    <script>
    
    $(function() {

        var fields = ['name','mfg_date','exp_date'];
        let tableFields = ['quantity','price','buying_price','model','sku','supplier'];

        $('.btnSubmit').click( function(e) {
            let hasError = validateItems(fields)
            let hasErrorTableField = validateTableFields(tableFields)

            if(hasError || hasErrorTableField) e.preventDefault();
        })

        $('.name').on('input', function() {
            $(this).prev().is('span') ? $(this).prev().remove() : '';
        })

        $('.mfg_date, .exp_date').change(function() {
            $(this).prev().is('span') ? $(this).prev().remove() : '';
        })

        $('.quantity, .price, .buying_price, .model, .sku, .supplier')
            .on('focus', function() {
                $(this).hasClass('border-danger') ? $(this).removeClass('border-danger') : ''
            })
        
    });

    function removeError(input) {
        input.prev().is('span') ? input.prev().remove() : '';
    }

    function validateItems(fields) {
        var error = false;
        fields.forEach( function(e) {
            
            let input = $(`.${e}`);
            
            if (input.val() === '') {
                var msgElement = `<span class='text-danger pl-1'> Required </span>`;
                error = true;
                
            }
            if (input.val() === 0) {
                var msgElement = `<span class='text-danger pl-1'> Invalid </span>`;
                error = true;
            }

            removeError(input);
            $(msgElement).insertBefore(input);
        });

        return error;
    }

    function validateTableFields(fields) {
        var error = false;
        fields.forEach( function(e) {
            
            let input = $(`.${e}`);
            
            if (input.val() === '') {
                input.addClass('border-danger')
                error = true;
            }

            if (input.val() === 0) {
                input.addClass('border-danger')
                error = true;
            }
        });

        return error;
    }

    </script>
@endpush
