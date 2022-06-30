@extends('adminlte::page')

@section('title', 'Edit Expense Type')

@section('content_header')
    {{ Breadcrumbs::render('expenseTypes.edit', $expenseType) }}
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Expense Type</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($expenseType, ['route' => ['expenseTypes.update', $expenseType->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('expense_types.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('expenseTypes.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
