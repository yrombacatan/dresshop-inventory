<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', old('name', $permission->name ?? ''), ['class' => 'form-control']) !!}
</div>