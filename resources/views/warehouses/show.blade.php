@extends('adminlte::page')

@section('title', 'View Warehouse')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="mb-1">>Warehouse Details</h1>
            {{ Breadcrumbs::render('warehouses.show', $warehouse) }}
        </div>
        <div class="col-sm-6 col-sm-6 mt-3 d-flex justify-content-end align-items-end">
            <a class="btn btn-default float-right"
                href="{{ route('warehouses.index') }}">
                Back
            </a>
        </div>
    </div>
    
@endsection

@section('content')

    <div class="content">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('warehouses.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection
