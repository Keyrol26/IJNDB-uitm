
 @extends('layouts.login-master')
 @section('content')
 

     <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
         <div class="container">
             <div class="card login-card">
                 <div class="row no-gutters">
                     <div class="col-md-5">
                         <img src="{{ asset('multiple/img/login/login.jpg') }}" alt="login" class="login-card-img">
                     </div>
                     <div class="col-md-7">
                         <div class="card-body">
                             @if ($message = Session::get('success'))
                                 <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                                         class="bi bi-info-circle" viewBox="0 0 16 16">
                                         <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                         <path
                                             d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                     </svg>
                                     {{ $message }}
                                 </div>
                             @endif
                             <div class="brand-wrapper">
                                 <img src="{{ asset('multiple/img/ijn-logo.png') }}" alt="logo" class="logo">
                             </div>
                             <p>{{ $date }}</p>
                             <p>Last Data Extracted on {{ $update->updatetime }}</p>
                             <p class="login-card-description">Downtime Database</p>
                             <form action="{{ route('sample.validate_login') }}" method="post">
                                 @csrf
                                 {{-- <div class="form-group">
                                     <label for="yourUsername" class="sr-only">Username</label>
                                     <input type="text" name="name" id="name" class="form-control"
                                         placeholder="musharaf">
                                     @if ($errors->has('name'))
                                         <span class="text-danger">{{ $errors->first('name') }}</span>
                                     @endif
                                 </div> --}}
                                 <div class="form-group mb-4">
                                     <label for="password" class="sr-only">Password</label>
                                     <input type="password" name="password" id="password" class="form-control"
                                         placeholder="***********">
                                     @if ($errors->has('password'))
                                         <span class="text-danger">{{ $errors->first('password') }}</span>
                                     @endif
                                 </div>
                                 <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit"
                                     value="Login">
                             </form>
                             <nav class="login-card-footer-nav">
                                 <a>Designed by</a>
                                 <a href="https://www.google.com/">Management Information System (MIS)</a>
                                 <br>
                                 <a>&copy;20<strong><span>22</span></strong>.</a>

                             </nav>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </main>
 @endsection('content')
