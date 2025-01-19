<!-- Header -->
<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
            </a>
            <a href="{{url('/')}}" class="navbar-brand logo">
                <img src="{{asset('assets/img/.png')}}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{url('/')}}" class="menu-logo">
                    <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="active">
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    <a href="{{url('user/search/doctor')}}">Search Doctor</a>
                </li>
                @if(Auth::guard('doctor')->check())
                <li class="has-submenu">
                    <a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li class="active"><a href="{{url('doctor/dashboard')}}">Doctor Dashboard</a></li>
                        <li><a href="{{url('doctor/schedule/timings')}}">Schedule Timing</a></li>
                        <li><a href="{{url('doctor/profile/settings')}}">Profile Settings</a></li>
                        <li><a href="{{url('admin/doctor/register')}}">Doctor Register</a></li>
                    </ul>
                </li>
                @endif
                @if(Auth::guard('web')->check())
                <li class="has-submenu">
                    <a href="#">Patients <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li class="active"><a href="{{url('user/search/doctor')}}">Search Doctor</a></li>
                        <li><a href="{{url('user/patient/dashboard')}}">Patient Dashboard</a></li>
                        <li><a href="{{url('user/patient/profile/settings')}}">Profile Settings</a></li>
                    </ul>
                </li>
                @endif
{{--                <li class="has-submenu">--}}
{{--                    <a href="#">Pages <i class="fas fa-chevron-down"></i></a>--}}
{{--                    <ul class="submenu">--}}
{{--                        <li><a href="voice-call.html">Voice Call</a></li>--}}
{{--                        <li><a href="video-call.html">Video Call</a></li>--}}
{{--                        <li><a href="search.html">Search Doctors</a></li>--}}
{{--                        <li><a href="calendar.html">Calendar</a></li>--}}
{{--                        <li><a href="components.html">Components</a></li>--}}
{{--                        <li class="has-submenu">--}}
{{--                            <a href="invoices.html">Invoices</a>--}}
{{--                            <ul class="submenu">--}}
{{--                                <li><a href="invoices.html">Invoices</a></li>--}}
{{--                                <li><a href="invoice-view.html">Invoice View</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li><a href="blank-page.html">Starter Page</a></li>--}}
{{--                        <li><a href="login.html">Login</a></li>--}}
{{--                        <li><a href="register.html">Register</a></li>--}}
{{--                        <li><a href="forgot-password.html">Forgot Password</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <li>
                    <a href="{{url('admin/index')}}" target="_blank">Admin</a>
                </li>
                <li class="has-submenu">
                    <a target="_blank" href="{{url('/doctor/login')}}">Are you a doctor?</a>
                </li>
                <li class="login-link">
                    <a href="{{url('/user/login')}}">Login / Signup</a>
                </li>
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>
                </div>
                <div class="header-contact-detail">
                  <!-- <p class="contact-header">Contact</p> -->
                  @if(Auth::guard('web')->check())
                    <a class="contact-header" href="{{url('/user/logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">logout</a>
                <form action="{{url('user/logout')}}" id="logout-form" method="POST" class="d-none">@csrf</form>
                @endif
                @if(Auth::guard('doctor')->check())
                    <a class="contact-header" href="{{url('/doctor/logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">logout</a>
                <form action="{{url('doctor/logout')}}" id="logout-form" method="POST" class="d-none">@csrf</form>
                @endif
                    <p class="contact-info-header"> +92 3487702953</p>
                </div>
            </li>
            @if(Auth::guard('web')->check())
            <li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="{{asset('patients/'.Auth::guard('web')->user()->photo)}}" width="31" alt="Ryan Taylor">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="{{asset('patients/'.Auth::guard('web')->user()->photo)}}" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>{{Auth::guard('web')->user()->name}}</h6>
										<p class="text-muted mb-0">Patient</p>
									</div>
								</div>
								<a class="dropdown-item" href="{{url('user/patient/dashboard')}}">Dashboard</a>
								<a class="dropdown-item" href="{{url('user/patient/profile/settings')}}">Profile Settings</a>
								<a class="dropdown-item" href="{{url('/user/logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form action="{{url('user/logout')}}" id="logout-form" method="POST" class="d-none">@csrf</form>
							</div>
						</li>
            @elseif(Auth::guard('doctor')->check())
            <li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="{{asset('doctors/'.Auth::guard('doctor')->user()->photo)}}" width="31" alt="Darren Elder">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="{{asset('doctors/'.Auth::guard('doctor')->user()->photo)}}" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>{{Auth::guard('doctor')->user()->name}}</h6>
										<p class="text-muted mb-0">Doctor</p>
									</div>
								</div>
								<a class="dropdown-item" href="{{url('doctor/dashboard')}}">Dashboard</a>
								<a class="dropdown-item" href="{{url('doctor/profile/settings')}}">Profile Settings</a>
								<a class="dropdown-item" href="{{url('/doctor/logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form action="{{url('doctor/logout')}}" id="logout-form" method="POST" class="d-none">@csrf</form>
							</div>
						</li>
            @else
            <li class="nav-item">
                <a class="nav-link header-login" href="{{url('/user/login')}}">login / Signup </a>
            </li>
            @endif
            
            
        </ul>
    </nav>
</header>
<!-- /Header -->
