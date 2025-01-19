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
                            <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Profile Settings</h2>
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
                {{-- @foreach($doctors as $doctor) --}}
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
                                    <li>
                                        <a href="{{url('doctor/schedule-timings')}}">
                                            <i class="fas fa-hourglass-start"></i>
                                            <span>Schedule Timings</span>
                                        </a>
                                    </li>
                                    <li class="active">
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

                    <!-- Basic Information -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Information</h4>
                            @if(Session::get('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif

                            <div class="row form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="{{asset('doctors/'.$doctor->image)}}" alt="User Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{$doctor->name}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control" value="{{$doctor->email}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone" class="form-control" value="{{$doctor->phone}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <input type="text" name="gender" class="form-control" value="{{$doctor->gender}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" value="{{$doctor->address}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label>city</label>
                                        <input type="text" name="city" class="form-control" value="{{$doctor->city}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label>Speciality</label>
                                        <input type="text" name="speciality" class="form-control" value="{{$doctor->department->name}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label>Experience</label>
                                        <input type="text" name="experience" class="form-control" value="{{$doctor->experience}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label>Fee</label>
                                        <input type="text" name="fee" class="form-control" value="{{$doctor->fee}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>

                                <div class="col-md-6 mt-2">
                                    <label>Education</label>
                                    @foreach (json_decode($doctor->education) as $education)
                                        <div class="row">
                                            <div class="col-md-12 my-1 form-group mb-0">
                                                <input type="text" name="fee" class="form-control" value="{{$education}}" readonly>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label>Services</label>
                                    @foreach (json_decode($doctor->services) as $service)
                                        <div class="row">
                                            <div class="col-md-12 my-1 form-group mb-0">
                                                <input type="text" name="fee" class="form-control" value="{{$service}}" readonly>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                            </div>
                        </div>
                        {{-- @endforeach --}}
                    </div>
                    <!-- /Basic Information -->




                    <div class="submit-section submit-btn-bottom">
                        {{-- <form action="{{url('doctor/profile/settings/'.$doctor->id.'/edit')}}" method="POST"> --}}
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-primary submit-btn">Edit Profile</button>
                        {{-- </form> --}}
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection
