@extends('adminlte::page')

@section('title', 'Company Profile')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Company</h1>
            {{ Breadcrumbs::render('companies.index') }}
        </div>
    </div>
@endsection

@section('content')
    <div class="content">

        @include('flash::message')

        <div class="clearfix"></div>

        @include('adminlte-templates::common.errors')

    <div class="card card-primary card-outline">

        @if (isset($company))
            {!! Form::model($company, ['route' => ['companies.update', $company->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}
        @else 
            {!! Form::open(['route' => 'companies.store', 'enctype' => 'multipart/form-data']) !!}
        @endif

        <div class="card-body">

            <div class="row">

                    @include('companies.fields')

            </div>

        </div>

        <div class="card-footer">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <!-- <a href="{{ route('companies.index') }}" class="btn btn-default">Cancel</a> -->
        </div>

        {!! Form::close() !!}

    </div>
    </div>

@endsection

