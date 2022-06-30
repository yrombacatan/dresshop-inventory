<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', old('name', $productCategory->name ?? ''), ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', old('slug', $productCategory->slug ?? ''), ['class' => 'form-control']) !!}
</div>