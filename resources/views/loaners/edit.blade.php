@extends('adminlte::page')

@section('title', 'Edit Loaner')

@section('content_header')
    {{ Breadcrumbs::render('loaners.edit', $loaner) }}
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Loaner</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($loaner, ['route' => ['loaners.update', $loaner->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('loaners.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('loaners.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
