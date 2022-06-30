@extends('adminlte::page')

@section('title', 'Invoices')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="mb-1">Invoices List</h1>
            {{ Breadcrumbs::render('invoices.index') }}
        </div>
    </div>
@endsection

@section('content')
    
    <div class="content">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card card-primary card-outline">
            <div class="card-body p-3">
                @include('invoices.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

