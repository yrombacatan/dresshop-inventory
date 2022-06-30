@extends('adminlte::page')

@section('title', 'View Products')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="mb-1">Product Details</h1>
            {{ Breadcrumbs::render('products.show', $product) }}
        </div>
        <div class="col-sm-6">
            <a class="btn btn-default float-right"
                href="{{ route('products.index') }}">
                Back
            </a>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
        <div class="card">

            <div class="card-body">
                   
                @include('products.show_fields')
            
            </div>

        </div>
    </div>
@endsection
