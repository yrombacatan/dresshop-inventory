<div class="form-group col-sm-12">
    {!! Form::label('fname', 'Firstname') !!}
    {!! Form::text('fname', old('fname', $user->fname ?? ''), ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('lname', 'Lastname') !!}
    {!! Form::text('lname', old('lname', $user->lname ?? ''), ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', old('email', $user->email ?? ''), ['class' => 'form-control']) !!}
</div>
@if (! isset($user))
<div class="form-group col-sm-12">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
@endif
<div class="form-group col-sm-12">
    {!! Form::label('age', 'Age') !!}
    {!! Form::text('age', old('age', $user->age ?? ''), ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('gender', 'Gender') !!}
    {!! Form::text('gender', old('gender', $user->gender ?? ''), ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('contact', 'Contact') !!}
    {!! Form::text('contact', old('contact', $user->contact ?? ''), ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status') !!}
    {!! Form::text('status', old('status', $user->status ?? ''), ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">

    {!! Form::label('role', 'Role')  !!}

    @if (isset($userRole))`
        {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control')) !!}
    @else
        {!! Form::select('roles[]', $roles, [], array('class' => 'form-control')) !!}
    @endif

</div>