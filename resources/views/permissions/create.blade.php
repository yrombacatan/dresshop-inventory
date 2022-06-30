@extends('adminlte::page')

@section('title', 'Add Permissions')

@section('content_header')
    {{ Breadcrumbs::render('roles.create') }}
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Permission</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card card-primary card-outline">

            {!! Form::open(['route' => 'permissions.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('permissions.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('permissions.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
