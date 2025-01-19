@extends('master.main')
@section('content')

    <!-- Home Banner -->
    <section class="section section-search">
        <div class="container-fluid">
            <div class="banner-wrapper">
                <div class="banner-header text-center">
                    <h1>Search Doctor, Make an Appointment</h1>
                    <p>Discover the best doctors from around the country and consult them online.</p>
                </div>

                <!-- Search -->
                <div class="search-box">
                <form action="{{url('user/searching/doctor')}}" method="POST">
                            @csrf
                            @method('GET')
                        <div class="form-group search-location">
                            <input type="text" id="search_loc" name="search_loc" class="form-control" placeholder="Search Location">
                            <span class="form-text">Search by city</span>
                        </div>
                        <div class="form-group search-info">
                            <input type="text" id="search" name="search" class="form-control" placeholder="Search Doctors.. ">
                            <span class="form-text">search doctors by their name</span>
                        </div>
                        <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
                    </form>
                </div>
                <!-- /Search -->

            </div>
        </div>
    </section>
    <!-- /Home Banner -->

@endsection
