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
                <img src="{{asset('front/img/logo.png')}}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{url('/')}}" class="menu-logo">
                    <img src="{{asset('front/img/logo.png')}}" class="img-fluid" alt="Logo">
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
                    <a href="{{url('doctor/add-blog')}}">Add a blog</a>
                </li>
                {{-- @if(Auth::guard('doctor')->check()) --}}
                <li class="has-submenu">
                    <a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li class="active"><a href="{{url('doctor/dashboard')}}">Doctor Dashboard</a></li>
                        <li><a href="{{url('doctor/schedule/timings')}}">Schedule Timing</a></li>
                        <li><a href="{{url('doctor/profile/settings')}}">Profile Settings</a></li>
                        <li><a href="{{url('doctor/dappointmentlinks')}}">Appointment Links</a></li>
                    </ul>
                </li>
                {{-- @endif --}}
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>
                </div>
                <div class="header-contact-detail">
                  <p class="contact-header">Contact</p>
                    <p class="contact-info-header"> +92 3487702953</p>
                </div>
            </li>
            @if(Auth::guard('doctor')->check())
            <li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="{{asset('doctors/'.Auth::guard('doctor')->user()->image)}}" width="31" alt="Darren Elder">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="{{asset('doctors/'.Auth::guard('doctor')->user()->image)}}" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>{{Auth::guard('doctor')->user()->name}}</h6>
										<p class="text-muted mb-0">Doctor</p>
									</div>
								</div>
								<a class="dropdown-item" href="{{url('doctor/dashboard')}}">Dashboard</a>
								<a class="dropdown-item" href="{{url('doctor/profile-setting')}}">Profile Settings</a>
								<a class="dropdown-item" href="{{url('/doctor/logout')}}" >Logout</a>
                                {{-- <form action="{{url('doctor/logout')}}" id="logout-form" method="POST" class="d-none">@csrf</form> --}}
							</div>
						</li>
            @else
            <li class="nav-item">
                <a class="nav-link header-login" href="{{url('/patient/login')}}">login / Signup </a>
            </li>
            @endif


        </ul>
    </nav>
</header>
<!-- /Header -->
