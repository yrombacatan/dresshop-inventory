@extends('adminlte::page')

@section('title', 'View Category')

@section('content_header') 

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="mb-1">Product Category Details</h1>
            {{ Breadcrumbs::render('productCategories.show', $productCategory) }}
        </div>
        <div class="col-sm-6 mt-3 d-flex justify-content-end align-items-end">
            <a class="btn btn-default float-right"
                href="{{ route('productCategories.index') }}">
                Back
            </a>
        </div>
    </div>
    
@endsection

@section('content')

    <div class="content">
        <div class="card card-primary card-outline">

            <div class="card-body">
                <div class="row">
                    @include('product_categories.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection
