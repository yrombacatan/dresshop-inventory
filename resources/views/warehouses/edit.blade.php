@extends('adminlte::page')

@section('title', 'Edit Warehouse')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="mb-1">Edit Warehouse</h1>
            {{ Breadcrumbs::render('warehouses.edit', $warehouse) }}
        </div>
    </div>
@endsection

@section('content')

    <div class="content">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($warehouse, ['route' => ['warehouses.update', $warehouse->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('warehouses.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('warehouses.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
