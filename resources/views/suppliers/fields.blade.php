<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', old('name', $supplier->name ?? ''), ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('contact_person', 'Contact Person') !!}
    {!! Form::text('contact_person', old('contact_person', $supplier->contact_person ?? ''), ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', old('email', $supplier->email ?? ''), ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('phone', 'Phone') !!}
    {!! Form::text('phone', old('phone', $supplier->phone ?? ''), ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('address', 'Address') !!}
    {!! Form::text('address', old('address', $supplier->address ?? ''), ['class' => 'form-control']) !!}
</div>