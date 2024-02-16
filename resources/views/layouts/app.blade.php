<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />  
        <meta content="{{ config('app.name') }} System" name="description" />
        <meta content="Mohamad Amir Dliwati" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/faviconnwc.ico') }}">

        @yield('css') 

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

    <body>
        <!-- Top Bar Start -->
        <div class="topbar">
             <!-- Navbar -->
             <nav class="navbar-custom">
                <div class="topbar-left">
                    <a href="/" class="logo">
                        <span>
                            <img src="{{ asset('images/logo-NWC.png') }}" alt="NWC Logo" height="60">
                        </span>
                        <span>
                            <img src="{{ asset('images/aa.png') }}" alt="logo-large" height="40" >
                        </span>
                    </a>
                </div>

                
    
                <ul class="list-unstyled topbar-nav mb-0">  
                    <li>
                        <button class="button-menu-mobile nav-link waves-effect waves-light">
                            <i class="mdi mdi-menu nav-icon"></i>
                        </button>

                        <label for="date" class="col-form-label text-right"> <h3> اخفاء الشريط الجانبي   </h3></label>
                    </li>

                    <li>
                        <br>
                        <a href="/FirstForms"><button type="button" class="btn btn-outline-pink btn-round waves-effect waves-light"><i class="mdi mdi mdi-table-search mt-0"></i>  نماذج التسربات الداخلية  </button></a>
                    </li>

                    <li>
                        <br>
                        <a href="/SecondForms"><button type="button" class="btn btn-outline-info btn-round waves-effect waves-light"><i class="mdi mdi mdi-file-search-outline mt-0"></i>     زيارات تدقيق المياه  </button></a>
                    </li>

                    <li>
                        <br>
                        <a href="/ThirdForms"><button type="button" class="btn btn-outline-primary btn-round waves-effect waves-light"><i class="mdi mdi-database-search mt-0"></i>   فواتير و تقارير الصيانة  </button></a>
                    </li>

                    <li>
                        <br>
                        <a href="/FourthForms"><button type="button" class="btn btn-outline-secondary btn-round waves-effect waves-light"><i class="mdi mdi-search-web mt-0"></i>  بحث في العملاء  </button></a>
                    </li>
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <div class="sidebar-user media">                    
                    <div class="media-body">
                        <h3 class="text-light">{{__(' اهلا بك مرة ثانية ')}}</h3>
                        <ul class="list-unstyled list-inline mb-0 mt-2">
                            <li class="list-inline-item">
                                <h4 class="text-light">{{Auth::User()->users_profile->first_name}}{{__('  ')}}{{Auth::User()->users_profile->last_name}}  </h4>
                            </li>
                            <li class="list-inline-item">
                                
                            </li>
                        </ul>
                    </div>                    
                </div>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-right align-item-center mt-2">
                                <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><button type="button" class="btn btn-danger btn-round waves-effect waves-light"><i class="mdi mdi-power text-secondary"></i>  نسجيل الخروج  </button></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                            </div>
                           @yield('page_title')                                        
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
            </div>
        </div>
        
        <div class="page-wrapper">
            <div class="page-wrapper-inner">
                <!-- Left Sidenav -->
                <div class="left-sidenav ">
                    <ul class="metismenu left-sidenav-menu" id="side-nav">
                        @include('layouts/nav/mutual')
                    @if(Auth::User()->id == 1)
                        @include('layouts/nav/admin')
                    @else
                        @include('layouts/nav/users')
                    @endif
                    </ul>
                </div><!-- end left-sidenav-->
                        
                <!-- Page Content-->

                <div class="page-content">
                    <div class="container-fluid">

                        @yield('content')

                    </div><!-- container -->

                    <footer class="footer text-center text-sm-left">
                        Copyright &copy; <script>document.write(new Date().getFullYear())</script> NWC Group System is Powered By <a href="https://frontier-ibs.us/"> <i class="mdi mdi-heart text-danger"></i> Frontier go beyind </a><span class="text-muted d-none d-sm-inline-block float-right"><b>Version</b> 1.0.1</span>
                    </footer>

                </div>
                <!-- end page content -->
            </div>
        </div>
        <!-- end page-wrapper -->
        
        <!-- jQuery  -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('js/waves.min.js') }}"></script>
        <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>

        @yield('javascript') 

       <!-- App js -->
        <script src="{{ asset('js/app.js') }}"></script>



    </body>
</html>