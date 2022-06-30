<!-- Fname Field -->
<div class="col-sm-12">
    {!! Form::label('fname', 'Fname:') !!}
    <p>{{ $user->fname }}</p>
</div>

<!-- Lname Field -->
<div class="col-sm-12">
    {!! Form::label('lname', 'Lname:') !!}
    <p>{{ $user->lname }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $user->password }}</p>
</div>

<!-- Age Field -->
<div class="col-sm-12">
    {!! Form::label('age', 'Age:') !!}
    <p>{{ $user->age }}</p>
</div>

<!-- Gender Field -->
<div class="col-sm-12">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{{ $user->gender }}</p>
</div>

<!-- Contact Field -->
<div class="col-sm-12">
    {!! Form::label('contact', 'Contact:') !!}
    <p>{{ $user->contact }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $user->status }}</p>
</div>

<!-- Profile Img Field -->
<div class="col-sm-12">
    {!! Form::label('profile_img', 'Profile Img:') !!}
    <p>{{ $user->profile_img }}</p>
</div>

<!-- Remember Token Field -->
<div class="col-sm-12">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $user->remember_token }}</p>
</div>

