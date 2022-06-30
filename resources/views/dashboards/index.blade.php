@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="row">
                <div class="col-6">
                    <div class="bg-info shadow p-3 rounded position-relative">
                        <h1>Order</h1>
                        <hr class="line">
                        <h2 class="font-weight-bold">200</h2>
                        <i class="fas fa-shopping-cart"></i>
                        <i class="fas fa-chart-area fa-10x position-absolute card-icon-bg"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class=" bg-info shadow p-3 rounded position-relative">
                        <h1>Stock</h1>
                        <hr class="line">
                        <h2 class="font-weight-bold">200</h2>
                        <i class="fas fa-shopping-cart"></i>
                        <i class="fas fa-chart-area fa-10x position-absolute card-icon-bg"></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="bg-primary p-3 mt-3 shadow rounded">
                        <h2 >Product: <b>20</b></h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-success p-3 mt-3 shadow rounded">
                        <h2 >Supplier: <b>5</b></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-primary p-3 mt-3 shadow rounded">
                        <h2 >Category: <b>20</b></h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="bg-success p-3 mt-3 shadow rounded">
                        <h2 >Recievable: <b>Php 5000</b></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-title">
                        Order
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-8"><b>Status</b></div>
                                <div class="col-4"><b>Total</b></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-8">Pending</div>
                                <div class="col-4"><span class="badge badge-info" style="font-size: 1rem">10</span></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-8">Picked Up</div>
                                <div class="col-4"><span class="badge badge-primary" style="font-size: 1rem">20</span></div>
                            </div>
                        </li><li class="list-group-item">
                            <div class="row">
                                <div class="col-8">Invoiced</div>
                                <div class="col-4"><span class="badge badge-danger" style="font-size: 1rem">13</span></div>
                            </div>
                        </li><li class="list-group-item">
                            <div class="row">
                                <div class="col-8">Cancelled</div>
                                <div class="col-4"><span class="badge badge-warning" style="font-size: 1rem">10</span></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-8">Completed</div>
                                <div class="col-4"><span class="badge badge-success" style="font-size: 1rem">10</span></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-8"><b>Total</b></div>
                                <div class="col-4"><b>200</b></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .card-icon-bg {
            bottom: 0;
            right: 0;
            opacity: 0.2
        }
        .card-wrapper {
            gap: 2em
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop