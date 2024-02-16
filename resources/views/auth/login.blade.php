<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name') }} System - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/faviconnwc.ico') }}">

        <!-- App css -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

        <!-- label RTL -->
        <style type="text/css">
          label  {float:right !important;}
        </style>

    </head>

    <body class="account-body">

        <!-- Log In page -->
        <div class="row vh-100">
            <div class="col-lg-3  pr-0">
                <div class="card mb-0 shadow-none">
                    <div class="card-body">
                        
                        <div class="px-3">
                            <div class="media">
                                <a href="index.html" class="logo logo-admin"><img src="{{ asset('images/logo-NWC.png') }}" height="55" alt="NWC logo" class="my-3"></a>
                                <div class="media-body ml-3 align-self-center">                                                                                                                       
                                    <h4 class="mt-0 mb-1">  تسجيل الدخول إلى   نظام الشركة  </h4>
                                    <p class="text-muted mb-0">  سجل الدخول الأن .  </p>
                                </div>
                            </div>                            
                            
                            <form class="form-horizontal my-4" action="{{ route('login') }}" method="POST" autocomplete="on">
                                @csrf
    
                                <div class="form-group">
                                    <label for="email">{{ __('البريد الألكتروني') }}</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input id="email" type="email" type="text" placeholder="mymail@mail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert" style="color: red;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                    
                                </div>
    
                                <div class="form-group">
                                    <label for="userpassword">{{ __('كلمة السر') }}</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
                                        </div>
                                        <input id="password" type="password" placeholder="eg. X8df!90EO" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/> 
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                
                                </div>
                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">  تسجيل الدخول  <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        @if (Route::has('password.request'))
                                        <p class="change_link">                                                    
                                        @endif                                      
                                    </div>
                                </div>                          
                            </form>
                        </div>                       
                    </div>
                </div>
            </div>
            <div class="col-lg-9 p-0 d-flex justify-content-center">
                <div class="accountbg d-flex align-items-center"> 
                    <div class="account-title text-white text-center">
                        <img src="{{ asset('images/logo-NWC1.png') }}" alt="NWC Logo" height="200">
                            <br><br>
                        <div class="border w-25 mx-auto border-primary"></div>
                        <h1 class="">  دعنا نبدأ بالعمل الآن  </h1>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- End Log In page -->


        <!-- jQuery  -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('js/waves.min.js') }}"></script>
        <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>