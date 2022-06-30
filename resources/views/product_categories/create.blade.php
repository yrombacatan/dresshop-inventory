@extends('adminlte::page')

@section('title', 'Add category')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="mb-1">Create Product Category</h1>
            {{ Breadcrumbs::render('productCategories.create') }}
        </div>
    </div>
@endsection

@section('content')

    <div class="content">

        @include('adminlte-templates::common.errors')

        <div class="card card-primary card-outline">

            {!! Form::open(['route' => 'productCategories.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('product_categories.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('productCategories.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
