<!-- Fname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fname', 'Firstname:') !!}
    {!! Form::text('fname', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Lname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('lname', 'Lastname:') !!}
    {!! Form::text('lname', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Mname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('mname', 'Middlename:') !!}
    {!! Form::text('mname', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-12">
    {!! Form::label('mobile', 'Mobile:') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Billing Address Field -->
<div class="form-group col-sm-12">
    {!! Form::label('billing_address', 'Billing Address:') !!}
    {!! Form::text('billing_address', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>