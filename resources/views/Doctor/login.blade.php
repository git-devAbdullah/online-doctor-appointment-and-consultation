 {{--@extends('layouts.app')--}}
 @extends('master.main')
 @section('content')

 <div class="content">
     <div class="container-fluid">

         <div class="row">
             <div class="col-md-8 offset-md-2">

             @if(Session::get('error'))
             <div class="alert alert-danger">{{Session::get('error')}}</div>
             @endif
                 <!-- Login Tab Content -->
                 <div class="account-content">
                     <div class="row align-items-center justify-content-center">
                         <div class="col-md-7 col-lg-6 login-left">
                             <img src="{{asset('front/img/login-banner.png')}}" class="img-fluid" alt="Doccure Login">
                         </div>
                         <div class="col-md-12 col-lg-6 login-right">
                             <div class="login-header">
                                 <h3>Doctor Login <a href="{{route('patient.login')}}">Are you a Patient?</a></h3>
                             </div>

                             <form method="POST" action="{{ url('doctor/login') }}">
                                 @csrf
                                 <div class="form-group form-focus">
                                     <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus floating>
                                     <label class="focus-label">Email</label>

                                     @error('email')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                     @enderror
                                 </div>
                                 <div class="form-group form-focus">
                                     <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" floating>
                                     <label class="focus-label">Password</label>

                                     @error('password')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                     @enderror
                                 </div>
                                 <div class="text-right">
                                     <a class="forgot-link" href="password/reset">Forgot Password ?</a>
                                 </div>
                                 <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>

                                 </form>
                         </div>
                     </div>
                 </div>
                 <!-- /Login Tab Content -->

             </div>
         </div>

     </div>

 </div>
 @endsection
