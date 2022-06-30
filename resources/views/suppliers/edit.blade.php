@extends('adminlte::page')

@section('title', 'Edit Supplier')

@section('content_header')
    
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="mb-1">Edit Supplier</h1>
            {{ Breadcrumbs::render('suppliers.edit', $supplier) }}
        </div>
    </div>

@endsection

@section('content')

    <div class="content">

        @include('adminlte-templates::common.errors')

        <div class="card card-primary card-outline">

            {!! Form::model($supplier, ['route' => ['suppliers.update', $supplier->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('suppliers.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('suppliers.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
