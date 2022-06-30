<!-- Fname Field -->
<div class="col-sm-12">
    {!! Form::label('fname', 'Fname:') !!}
    <p>{{ $customer->fname }}</p>
</div>

<!-- Lname Field -->
<div class="col-sm-12">
    {!! Form::label('lname', 'Lname:') !!}
    <p>{{ $customer->lname }}</p>
</div>

<!-- Mname Field -->
<div class="col-sm-12">
    {!! Form::label('mname', 'Mname:') !!}
    <p>{{ $customer->mname }}</p>
</div>

<!-- Mobile Field -->
<div class="col-sm-12">
    {!! Form::label('mobile', 'Mobile:') !!}
    <p>{{ $customer->mobile }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $customer->email }}</p>
</div>

<!-- Billing Address Field -->
<div class="col-sm-12">
    {!! Form::label('billing_address', 'Billing Address:') !!}
    <p>{{ $customer->billing_address }}</p>
</div>

