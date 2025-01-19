@extends('master.main')
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Search</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-4 col-12 d-md-block d-none">
                    <div class="sort-by">
                        {{-- <span class="sort-title">Sort by</span> --}}
                        <span class="sortby-fliter">
                            <select class="select form-control">
                                <option>Sort by :</option>
                                <option class="sorting">Rating</option>
                                <option class="sorting">Popular</option>
                                <option class="sorting">Latest</option>
                                <option class="sorting">Free</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Search Filter -->
                    <form action="{{ url('doctor/search') }}" method="post">
                        @csrf
                        <div class="card search-filter">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Search Filter</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class=" filter-widget">
                                        <div class="cal-icon">
                                            <input type="date" class="form-control datetimepicker"
                                                value="{{ $searchData['from'] ?? null }}" name="from"
                                                placeholder="Select Date">
                                        </div>
                                    </div>
                                    <div class=" filter-widget">
                                        <div class="cal-icon">
                                            <input type="date" class="form-control datetimepicker"
                                                value="{{ $searchData['to'] ?? null }}" name="to"
                                                placeholder="Select Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-widget">
                                    <h4>Gender</h4>
                                    <div>
                                        <label class="custom_check">
                                            @if (isset($searchData) && in_array('male', $searchData['gender']))
                                                <input type="checkbox" name="gender[]" value="male" checked>
                                            @else
                                                <input type="checkbox" name="gender[]" value="male">
                                            @endif
                                            <span class="checkmark"></span> Male Doctor
                                        </label>
                                    </div>
                                    <div>
                                        <label class="custom_check">
                                            @if (isset($searchData) && in_array('female', $searchData['gender']))
                                                <input type="checkbox" name="gender[]" value="female" checked>
                                            @else
                                                <input type="checkbox" name="gender[]" value="female">
                                            @endif
                                            <span class="checkmark"></span> Female Doctor
                                        </label>
                                    </div>
                                </div>
                                <div class="filter-widget">
                                    <h4>Select Specialist</h4>
                                    <div>
                                        <label class="custom_check">
                                            @if (isset($searchData['speciality']) && in_array('Urology', $searchData['speciality']))
                                                <input type="checkbox" name="speciality[]" value="Urology" checked>
                                            @else
                                                <input type="checkbox" name="speciality[]" value="Urology">
                                            @endif
                                            <span class="checkmark"></span> Urology
                                        </label>
                                    </div>
                                    <div>
                                        <label class="custom_check">
                                            @if (isset($searchData['speciality']) && in_array('Neurology', $searchData['speciality']))
                                                <input type="checkbox" name="speciality[]" value="Neurology" checked>
                                            @else
                                                <input type="checkbox" name="speciality[]" value="Neurology">
                                            @endif
                                            <span class="checkmark"></span> Neurology
                                        </label>
                                    </div>
                                    <div>
                                        <label class="custom_check">
                                            @if (isset($searchData['speciality']) && in_array('Dentist', $searchData['speciality']))
                                                <input type="checkbox" name="speciality[]" value="Dentist" checked>
                                            @else
                                                <input type="checkbox" name="speciality[]" value="Dentist">
                                            @endif
                                            <span class="checkmark"></span> Dentist
                                        </label>
                                    </div>
                                    <div>
                                        <label class="custom_check">
                                            @if (isset($searchData['speciality']) && in_array('Orthopedic', $searchData['speciality']))
                                                <input type="checkbox" name="speciality[]" value="Orthopedic" checked>
                                            @else
                                                <input type="checkbox" name="speciality[]" value="Orthopedic">
                                            @endif
                                            <span class="checkmark"></span> Orthopedic
                                        </label>
                                    </div>
                                    <div>
                                        <label class="custom_check">
                                            @if (isset($searchData['speciality']) && in_array('Cardiologist', $searchData['speciality']))
                                                <input type="checkbox" name="speciality[]" value="Cardiologist" checked>
                                            @else
                                                <input type="checkbox" name="speciality[]" value="Cardiologist">
                                            @endif
                                            <span class="checkmark"></span> Cardiologist
                                        </label>
                                    </div>
                                </div>
                                <div class="btn-search">
                                    <button type="submit" class="btn btn-block">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /Search Filter -->

                </div>
                <div class="col-md-12 col-lg-8 col-xl-9">
                    @foreach ($doctors as $doctor)
                        <!-- Doctor Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="doctor-widget">
                                    <div class="doc-info-left">
                                        <div class="doctor-img">
                                            <a href="{{ url('doctor/profile') }}">
                                                <img src="{{ asset('doctors/' . $doctor['image']) }}" class="img-fluid"
                                                    alt="User Image">
                                            </a>
                                        </div>
                                        <div class="doc-info-cont">
                                            <h4 class="doc-name"><a href="{{ url('doctor/profile') }}">Dr.
                                                    {{ $doctor['first_name'] . ' ' . $doctor['last_name'] }}</a></h4>
                                            {{ dd($doctor->education) }}
                                            <p class="doc-speciality">{{ $doctor['education'] }}</p>
                                            <h5 class="doc-department"><img
                                                    src="{{ asset('department/' . $doctor['department']['image']) }}"
                                                    class="img-fluid"
                                                    alt="Speciality">{{ $doctor['department']['name'] }}</h5>

                                            <div class="clinic-details">
                                                <p class="doc-location"><i class="fas fa-map-marker-alt"></i>
                                                    {{ $doctor['address'] }}, {{ $doctor['city'] }}</p>
                                            </div>
                                            <div class="clinic-services">
                                                @if (count($doctor['timeslots']) > 0)
                                                    @foreach ($doctor['timeslots'] as $timeslot)
                                                        <span>{{ $timeslot['dateTime'] }}</span>
                                                    @endforeach
                                                @else
                                                    <span>No timeslot added yet.</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="doc-info-right">
                                        <div class="clini-infos">
                                            <ul>
                                                <li><i class="fas fa-map-marker-alt"></i> {{ $doctor['address'] }}</li>
                                                <li><i class="far fa-money-bill-alt"></i> {{ $doctor['fee'] }} </li>
                                            </ul>
                                        </div>
                                        <div class="clinic-booking">
                                            <a class="view-pro-btn" href="doctor-profile.html">View Profile</a>
                                            <a class="apt-btn" href="booking.html">Book Appointment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Doctor Widget -->
                    @endforeach
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection
