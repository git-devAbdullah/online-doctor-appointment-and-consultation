@extends('master.doc-main')
@section('content')
<div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Appointment Links</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Appointment Links</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <!-- Profile Sidebar -->
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                    <div class="profile-sidebar">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    {{-- <img src="{{asset('doctors/'.Auth::guard('doctor')->user()->photo)}}" alt="User Image"> --}}
                                </a>
                                <div class="profile-det-info">
                                    {{-- <h3>{{Auth::guard('doctor')->user()->name}}</h3> --}}
                                    <div class="patient-details">
                                        {{-- <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{Auth::guard('doctor')->user()->city}}</h5> --}}
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
                                    <li>
                                        <a href="{{url('doctor/schedule-timings')}}">
                                            <i class="fas fa-hourglass-start"></i>
                                            <span>Schedule Timings</span>
                                        </a>
                                    </li>
                                    <li >
                                        <a href="{{url('doctor/profile')}}">
                                            <i class="fas fa-user-cog"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="{{url('doctor/appointment-links')}}">
                                            <i class="fas fa-share-alt"></i>
                                            <span>Appointment Links</span>
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
                 <!-- / Profile Sidebar -->

                 <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-body pt-0">

                            <!-- Tab Menu -->
                            <nav class="user-tabs mb-4">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments Links</a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- /Tab Menu -->

                            <!-- Tab Content -->
                            <div class="tab-content pt-0">

                                <!-- Appointment Tab -->
                                <div id="pat_appointments" class="tab-pane fade show active">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">Patient name</th>
                                                        <th class="text-center">Appt Date</th>
                                                        <th class="text-center">Appt time</th>
                                                        <th class="text-center">Duration</th>
                                                        <th class="text-center">Diease</th>
                                                        <th class="text-center">Meet the Patient</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- @foreach($appointmentlinks as $appointmentlinks)
                                                        <?php
                                                                $temp = explode(' ',$appointmentlinks->timeslot->slottime);
                                                            ?>
                                                    <tr>
                                                        <td class="text-center">
                                                            <h2 class="table-avatar">

                                                                <a href="">{{$appointmentlinks->p_name}}</a>
                                                            </h2>
                                                        </td>
                                                        <td class="text-center">{{$temp[0]}}</td>
                                                        <td class="text-center"> {{$temp[1]}}</td>
                                                        <td class="text-center">
                                                        {{$appointmentlinks->timeslot->duration}}
                                                        </td>
                                                        <td class="text-center">{{$appointmentlinks->p_diease}}</td>
                                                        <td class="text-center"><a target="_blank" href="{{$appointmentlinks->start_url}}">Click here <span class="d-block text-info">to meet patient.</span></a></td>

                                                    </tr>
                                                    @endforeach --}}

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Appointment Tab -->
                            </div>
                            <!-- Tab Content -->

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
