@extends('master.doc-main')
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Schedule Timings</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Schedule Timings</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    <div class="profile-sidebar">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img src="{{asset('doctors/'.Auth::guard('doctor')->user()->image)}}" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3>Dr. {{Auth::guard('doctor')->user()->name}}</h3>

                                    <div class="patient-details">
                                        <h5 class="mb-0">{{Auth::guard('doctor')->user()->department->name}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li>
                                        <a href="{{url('doctor/dashboard')}}">
                                            <i class="fas fa-columns"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="{{url('doctor/schedule-timings')}}">
                                            <i class="fas fa-hourglass-start"></i>
                                            <span>Schedule Timings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor/profile')}}">
                                            <i class="fas fa-user-cog"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor/appointment-links')}}">
                                            <i class="fas fa-share-alt"></i>
                                            <span>Appointment Links</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /Profile Sidebar -->

                </div>

                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Schedule Timings</h4>
                                    <div class="profile-box" id="timeslots">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card schedule-widget mb-0">

                                                    <div class="schedule-header">
                                                    @if(session()->has('success'))
                                                        <div class="alert alert-success">{{session('success')}}</div>
                                                    @endif
                                                    @if(session()->has('error'))
                                                        <div class="alert alert-success">{{session('error')}}</div>
                                                    @endif
                                                        <!-- Schedule Add -->
                                                        <div class="schedule-nav">

                                                            <form action="{{url('doctor/schedule-timings/create')}}" method="POST">
                                                            @csrf
                                                        </br></br>
                                                        <div class="row mb-3">
                                                            <div class="col-md-4">
                                                                <label><strong> Slot time: </strong></label>
                                                                <input type="datetime-local" class="form-control" name="dateTime">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label><b> Length(in minutes):</b></lable>
                                                                <input type="number" class="form-control mt-2" name="duration">
                                                            </div>
                                                            <div class="col-md-2 mt-3 d-flex align-items-center">
                                                                <button class="btn btn-primary" type="submit">Add</button>
                                                            </div>
                                                        </div>
                                                            </form>
                                                        </div>
                                                        <!-- /Schedule Nav -->
                                                        <br><br><br>
                                                        <form action="{{url('doctor/schedule/timings/show')}}" method="POST">
                                                            @csrf
                                                            @method('GET')
                                                            <button class="btn btn-outline-primary" id="show_timeslots" type="submit">Show my timslots</button>
                                                        </form>


                                                    </div>
                                                    <!-- /Schedule Add -->

                                                    <!-- Schedule Content -->

                                                    <!-- /Schedule Content -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        <!-- Show Timeslots -->
                                        <div class="profile-box" id="timeslots_show">
                                            <div class="row">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card schedule-widget mb-0">

                                                        <!-- Schedule Header -->
                                                        <div class="schedule-header">
                                                        @if(Session::get('delete'))
                                                            <div class="alert alert-danger">{{Session::get('delete')}}</div>
                                                        @endif
                                                            <!-- Schedule Nav -->
                                                            <div class="tab-content schedule-cont">
                                                            <h4>My Time Slots</h4>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Slot time</th>
                                                                    <th>Slot length(in minutes)</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                @foreach($timeslots as $timeslot)
                                                                <?php
                                                                    $temp = explode(' ',$timeslot->dateTime);
                                                                ?>
                                                                <tr>
                                                                    <td>{{$temp[0]}}</td>
                                                                    <td>{{$temp[1]}}</td>
                                                                    <td>{{$timeslot->duration}}</td>
                                                                    <td>
                                                                        <form action="{{url('doctor/schedule-timings/'.$timeslot->id)}}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </table>

                                                        </div>


                                                        </div>
                                                        <!-- /Schedule Header -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Show Timeslots -->


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->



@endsection
