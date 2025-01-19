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
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Dashboard</h2>
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
                                    <li class="active">
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
                        <div class="col-md-12">
                            <div class="appointment-tab">
                                <h4>Patient Appointments</h4>
                                <!-- Appointment Tab -->
                                <!-- Tab Menu -->
                        <nav class="user-tabs mb-4">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#appointments" data-toggle="tab">Appointments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#acc_appointments" data-toggle="tab">Accepted Appointments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#rej_appointments" data-toggle="tab"><span class="med-records">Rejected Appointments</span></a>
                                </li>
                            </ul>
                        </nav>
                        <!-- /Tab Menu -->

                                <div class="tab-content">
                                    <!-- Appointment Tab -->
                                    <div class="tab-pane fade show active" id="appointments">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>Patient Name</th>
                                                            <th>Appt date</th>
                                                            <th class="text-center">Appt time</th>
                                                            <th>Disease</th>
                                                            <th class="text-center">Info details</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Appointment Tab -->

                                    <!-- Accepted Appointment Tab -->
                                    <div class="tab-pane fade" id="acc_appointments">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>aPatient Name</th>
                                                            <th>Appt date</th>
                                                            <th class="text-center">Appt time</th>
                                                            <th>Disease</th>
                                                            <th class="text-center">Info details</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accepted Appointment Tab -->

                                    <!-- Rejected Appointment Tab -->
                                    <div class="tab-pane fade" id="rej_appointments">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>rPatient Name</th>
                                                            <th>Appt date</th>
                                                            <th class="text-center">Appt time</th>
                                                            <th>Disease</th>
                                                            <th class="text-center">Info details</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Rejected Appointment Tab -->

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
