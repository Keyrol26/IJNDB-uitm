 {{-- @extends('layouts.login-master')
 @section('content')
     @if ($message = Session::get('success'))
         <div class="alert alert-info">
             {{ $message }}
         </div>
     @endif
     <body>
         <div class="container">
             <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                 <div class="container">
                     <div class="row justify-content-center">
                         <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                             <div class="d-flex justify-content-center py-4">
                                 <a href onClick="window.location.reload()" class="logo d-flex align-items-center w-auto">

                                     <span class="d-none d-lg-block">DownTime DB</span>
                                 </a>
                             </div><!-- End Logo -->

                             <div class="card mb-3">

                                 <div class="card-body">

                                     <div class="pt-4 pb-2">
                                         <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                         <p class="text-center small">Enter your username & password to login</p>
                                     </div>

                                     <form class="row g-3 needs-validation" action="{{ route('sample.validate_login') }}"
                                         method="post">
                                         @csrf
                                         <div class="col-12">
                                             <label for="yourUsername" class="form-label">Username</label>
                                             <div class="input-group has-validation">
                                                 <input type="text" name="name" class="form-control"
                                                     placeholder="Name" />
                                                 @if ($errors->has('name'))
                                                     <span class="text-danger">{{ $errors->first('name') }}</span>
                                                 @endif
                                             </div>
                                         </div>

                                         <div class="col-12">
                                             <label for="yourPassword" class="form-label">Password</label>
                                             <input type="password" name="password" class="form-control"
                                                 placeholder="Password" />
                                             @if ($errors->has('password'))
                                                 <span class="text-danger">{{ $errors->first('password') }}</span>
                                             @endif
                                         </div>

                                         <div class="col-12">
                                             <button class="btn btn-lg btn-primary w-100" type="submit">Login</button>
                                         </div>

                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

             </section>

         </div>
     </body>
@endsection('content') --}}



 @extends('layouts.login-master')
 @section('content')
     @if ($message = Session::get('success'))
         <div class="alert alert-info  alert-dismissible fade show" role="alert">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-info-circle"
                 viewBox="0 0 16 16">
                 <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                 <path
                     d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
             </svg>
             {{ $message }}
         </div>
     @endif

     {{-- <main>
         <div class="container-fluid">
             <div class="row">
                 <div class="col-sm-6 login-section-wrapper">
                     <div class="brand-wrapper">
                         <img src="{{ asset('multiple/img/ijn-logo.png') }}" alt="logo" class="logo">
                     </div>
                     <div class="login-wrapper my-auto">
                         <h1 class="login-title">Log in</h1>
                         <form action="{{ route('sample.validate_login') }}" method="post">
                             @csrf
                             <div class="form-group">
                                 <label for="yourUsername">Username</label>
                                 <input type="text" name="name" id="name" class="form-control"
                                     placeholder="musharaf">
                                 @if ($errors->has('name'))
                                     <span class="text-danger">{{ $errors->first('name') }}</span>
                                 @endif
                             </div>
                             <div class="form-group mb-4">
                                 <label for="yourPassword">Password</label>
                                 <input type="password" name="password" id="password" class="form-control"
                                     placeholder="enter your passsword">
                                 @if ($errors->has('password'))
                                     <span class="text-danger">{{ $errors->first('password') }}</span>
                                 @endif
                             </div>
                             <input name="login" id="login" class="btn btn-block login-btn" type="submit"
                                 value="Login">
                         </form>
                     </div>
                 </div>
                 <div class="col-sm-6 px-0 d-none d-sm-block">
                     <img src="{{ asset('multiple/img/icon/login-bg.png') }}" alt="login image" class="login-img">
                 </div>
             </div>
         </div>
     </main> --}}

     <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
         <div class="container">
             <div class="card login-card">
                 <div class="row no-gutters">
                     <div class="col-md-5">
                         <img src="{{ asset('multiple/img/login/doc.jpg') }}" alt="login" class="login-card-img">
                     </div>
                     <div class="col-md-7">
                         <div class="card-body">
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
