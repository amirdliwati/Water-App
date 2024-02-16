@extends('layouts.app')
@section('css')

        <title>{{ config('app.name') }} Home</title>

@endsection

@section('page_title')
<!-- Page-Title -->
    <h4 class="page-title mb-2"><i class="mdi mdi-monitor mr-2"></i>لوحة التحكم</h4>  
    <div class="">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">الصفحة الرئيسية</li>
        </ol>
    </div>      
@endsection

@section('content')
<!-- Page Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="ribbon-1">
                <div class="ribbon-box">
                    <div class="ribbon ribbon-mark ribbon-icon bg-danger"><i class="mdi mdi-clipboard-outline mt-0"></i></div>
                    <a href="/Form1"><button type="button" class="btn btn-outline-danger waves-effect waves-light"><i class="mdi mdi-clipboard-outline mt-0"></i>  نماذج التسربات الداخلية  </button></a>
                </div><!-- end ribbon-box -->
            </div><!-- end ribbon-1 -->
        </div><!-- end col -->
        <div class="col-md-3">
            <div class="ribbon-1">
                <div class="ribbon-box">
                    <div class="ribbon ribbon-mark ribbon-icon bg-info"><i class="mdi mdi-file-document-outline mt-0"></i></div>
                    <a href="/Form2"><button type="button" class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-file-document-outline mt-0"></i>     زيارات تدقيق المياه  </button></a>
                </div><!-- end ribbon-box -->
            </div><!-- end ribbon-1 -->
        </div><!-- end col -->
        <div class="col-md-3">
            <div class="ribbon-1">
                <div class="ribbon-box">
                    <div class="ribbon ribbon-mark ribbon-icon bg-primary"><i class="mdi mdi-database-plus mt-0"></i></div>
                    <a href="/Form3"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-database-plus mt-0"></i>   فواتير و تقارير الصيانة  </button></a>
                </div><!-- end ribbon-box -->
            </div><!-- end ribbon-1 -->
        </div><!-- end col -->
        <div class="col-md-3">
            <div class="ribbon-1">
                <div class="ribbon-box">
                    <div class="ribbon ribbon-mark ribbon-icon bg-secondary"><i class="mdi dripicons-user-id mt-0"></i></div>
                    <a href="/Form4"><button type="button" class="btn btn-outline-secondary waves-effect waves-light"><i class="mdi dripicons-user-id mt-0"></i>  ادخال العملاء  </button></a>
                </div><!-- end ribbon-box -->
            </div><!-- end ribbon-1 -->
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-lg-12 p-0 d-flex justify-content-center">
            
                <div class="account-title text-white text-center">
                    <img src="{{ asset('images/logo-NWC.png') }}" alt="NWC Logo" height="200">  
                    <h4 class="mt-3" style="color: black">  أهلاً بعودتك من جديد     {{Auth::User()->users_profile->first_name}}{{__('  ')}}{{Auth::User()->users_profile->last_name}}    </h4>
                    <div class="border w-25 mx-auto border-primary"></div>
                    <h1 class="" style="color: black">  دعنا نبدأ بالعمل الآن  </h1>
                   
                </div>
            
        </div>
    </div><!-- end row --> 
</div><!-- container -->
@endsection

@section('javascript')

        <!-- Widgets js -->
        <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
        <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

        <script src="{{ asset('plugins/moment/moment.js') }}"></script>
        <script src="{{ asset('plugins/apexcharts/apexcharts.min.js') }}"></script>
        <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
        <script src="https://apexcharts.com/samples/assets/series1000.js"></script>
        <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
        <script src="{{ asset('pages/jquery.dashboard.init.js') }}"></script>

@endsection