<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Logo Field -->
<div class="form-group col-sm-12">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    @if (isset($company->logo))
                        <img src="{{ asset('image/company/'.$company->logo) }}" alt="Company Logo">
                    @else
                        <span>No image yet</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group col-sm-8 d-flex flex-column align-content-center">
            {!! Form::label('logo', 'Change Log:') !!}
            {!! Form::file('logo', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
        </div>
    </div>
</div>

<!-- Address Field -->
<div class="form-group col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- City and Country Field -->
<div class="form-group col-sm-12">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('city', 'City:') !!}
            {!! Form::text('city', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('country', 'Country:') !!}
            {!! Form::text('country', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
        </div>
    </div>
    
</div>

<!-- Phone, Fax and Website -->
<div class="form-group col-sm-12">
    <div class="row">
        <div class="col-sm-4">
            {!! Form::label('phone', 'Phone:') !!}
            {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('fax', 'Fax:') !!}
            {!! Form::text('fax', null, ['class' => 'form-control','maxlength' => 70,'maxlength' => 70]) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('website', 'Website:') !!}
            {!! Form::text('website', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
        </div>
    </div>
</div>