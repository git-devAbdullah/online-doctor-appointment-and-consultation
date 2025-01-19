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
                    <a href="{{url('doctor/search')}}">Search Doctor</a>
                </li>
                {{-- <li>
                    <a href="{{url('admin/index')}}" target="_blank">Admin</a>
                </li> --}}
                <li>
                    <a href="{{url('blogs')}}">Health Blogs</a>
                </li>
                <li>
                    <a href="{{url('doctor/register')}}">Apply for Doc.</a>
                </li>
                <li class="has-submenu">
                    <a target="_blank" href="{{url('doctor/login')}}">Are you a doctor?</a>
                </li>
                <li class="login-link">
                    <a href="{{url('login')}}">Login / Signup</a>
                </li>
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
                <li class="nav-item">
							<a class="nav-link header-login" href="{{url('patient/login')}}">login / Signup </a>
				</li>
        </ul>
    </nav>
</header>
<!-- /Header -->
