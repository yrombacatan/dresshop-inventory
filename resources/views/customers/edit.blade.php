@extends('adminlte::page')

@section('title', 'Edit Customer')

@section('content_header')
    {{ Breadcrumbs::render('customers.edit', $customer) }}
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Customer</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('customers.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('customers.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
