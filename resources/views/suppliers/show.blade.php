@extends('adminlte::page')

@section('title', 'View Supplier')

@section('content_header')

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="mb-1">View Supplier</h1>
            {{ Breadcrumbs::render('suppliers.show', $supplier) }}
        </div>
        <div class="col-sm-6 mt-3 d-flex justify-content-end align-items-end">
            <a class="btn btn-default"
                href="{{ route('suppliers.index') }}">
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
                    @include('suppliers.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection
