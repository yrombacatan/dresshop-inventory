<div class="row">
    <div class="col-sm-6">
        <!-- Name Field -->
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control name','maxlength' => 150,'maxlength' => 150]) !!}
        </div>

        <!-- Product Category Id Field -->
        <div class="form-group">
            {!! Form::label('product_category_id', 'Product Category Id:') !!}
            {!! Form::select('product_category_id', ['' => 'Select Category'] + $productCategory ,null, ['class' => 'form-control category']) !!}
        </div>

        <!-- Warehouse Id Field -->
        <div class="form-group">
            {!! Form::label('warehouse_id', 'Warehouse Id:') !!}
            {!! Form::select('warehouse_id', ['' => 'Select Warehouse'] + $warehouse, null, ['class' => 'form-control warehouse']) !!}
        </div>

        <!-- Mfg Date Field -->
        <div class="form-group">
            {!! Form::label('mfg_date', 'Mfg Date:') !!}
            {!! Form::text('mfg_date', null, ['class' => 'form-control datepicker mfg_date','maxlength' => 50,'maxlength' => 50]) !!}
        </div>

        <!-- Exp Date Field -->
        <div class="form-group">
            {!! Form::label('exp_date', 'Exp Date:') !!}
            {!! Form::text('exp_date', null, ['class' => 'form-control datepicker exp_date','maxlength' => 50,'maxlength' => 50]) !!}
        </div>

        @push('js')
            <script>
                $(function() {
                    $( ".datepicker" ).datepicker();
                    $( ".datepicker" ).datepicker( "option", "showAnim", "slideDown" );
                });
            </script>
        @endpush
    </div>

    <div class="col-sm-6">
        <!-- Img Field -->
        <div class="form-group">
            {!! Form::label('img', 'Img:') !!}
            {!! Form::file('img', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
        </div>

        <!-- Description Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '10']) !!}
        </div>

    </div>
</div>

<div class="row">
    <div class="table-responsive">
        <table class="table">
            <thead class="table-info">
                <tr>
                    <th>Quantity</th>
                    <th>Sell Price</th>
                    <th>Buying Price</th>
                    <th>Model</th>
                    <th>Sku</th>
                    <th>Supplier</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <!-- Quantity Field -->
                        <div class="form-group">
                            {!! Form::number('quantity', null, ['class' => 'form-control quantity']) !!}
                        </div>
                    </td>
                    <td>
                        <!-- Sell Price Field -->
                        <div class="form-group">
                            {!! Form::number('sell_price', null, ['class' => 'form-control price']) !!}
                        </div>
                    </td>
                    <td>
                        <!-- Supplier Price Field -->
                        <div class="form-group">
                            {!! Form::number('supplier_price', null, ['class' => 'form-control buying_price']) !!}
                        </div>
                    </td>
                    <td>
                        <!-- Model Field -->
                        <div class="form-group">
                            {!! Form::text('model', null, ['class' => 'form-control model','maxlength' => 100,'maxlength' => 100]) !!}
                        </div>
                    </td>
                    <td>
                        <!-- Sku Field -->
                        <div class="form-group">
                            {!! Form::text('sku', null, ['class' => 'form-control sku','maxlength' => 100,'maxlength' => 100]) !!}
                        </div>
                    </td>
                    <td>
                        
                        <!-- Supplier Id Field -->
                        <div class="form-group">
                            {!! Form::select('supplier_id', ['' => 'Select Supplier'] + $suppliers, null, ['class' => 'form-control supplier']) !!}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>