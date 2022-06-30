<div class="form-group col-sm-12">
    <strong>Name:</strong>
    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
</div>

<div class="form-group col-sm-12">
    <strong>Permission:</strong>
    <br/>
    @if (isset($rolePermissions))

        @foreach($permission as $value)
            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
            {{ $value->name }}</label>
            <br/>
        @endforeach

    @else 

        @foreach($permission as $value)
            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
            {{ $value->name }}</label>
        <br/>
        @endforeach

    @endif
    
</div>