@extends('adminlte::page')

@section('title', 'Profile')

@section('content')

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ isset($profile->profile_img) ? asset('image/avatar/'.$profile->profile_img) : 'https://picsum.photos/300/300' }}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ auth()->user()->fname . ' ' . auth()->user()->lname }}</h3>

                        <p class="text-muted text-center">Software Engineer</p>

                        <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="float-right">13,287</a>
                        </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile Information</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Security</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                        
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                        
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                        </div>
                        <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>

@endsection

