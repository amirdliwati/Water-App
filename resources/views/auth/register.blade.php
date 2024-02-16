@extends('layouts.app')

@section('css')

        <title>{{ config('app.name') }} Register User</title>

        <!-- Plugins css -->
        <link href="{{ asset('plugins/timepicker/tempusdominus-bootstrap-4.css') }}" rel="stylesheet" />
        <link href="{{ asset('plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/clockpicker/jquery-clockpicker.min.css" rel="stylesheet') }}" />
        <link href="{{ asset('plugins/colorpicker/asColorPicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />

@endsection

@section('page_title')
<!-- Page-Title -->
    <h4 class="page-title mb-2"><i class="mdi mdi-monitor mr-2"></i>لوحة التحكم   </h4>  
    <div class="">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">لوحة التحكم    </a></li>
            <li class="breadcrumb-item active">  تسجيل مستخدم جديد </li>
        </ol>
    </div>      
@endsection

@section('content')
<!-- Main content -->
<form  id="register" action="/RegisterUser" method="POST" >
    @csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-primary text-white mt-0"><i class="mdi mdi-account-multiple-plus-outline"></i>   تسجيل مستخدم جديد  </h5>
                <div class="card-body">
                    <div class="row form-material">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('اسم المستخدم') }}</label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="mdi mdi-account-multiple-plus-outline"></i></span>
                                    </div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror mx"name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="" maxlength="100" minlength="3">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>  
                    </div> <!-- end row --> 
                    <div class="row form-material">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('البريد الألكتروني') }}</label>  
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="mdi mdi-email-plus"></i></span>
                                </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <div class="row form-material">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('كلمة السر') }}</label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="mdi mdi-onepassword"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    </div> <!-- end row --> 
                    <div class="row form-material">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __(' تأكيد كلمة السر ') }}</label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="mdi mdi-onepassword"></i></span>
                                    </div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="">
                                </div>
                            </div>
                    </div> <!-- end row -->
                    <div class="row form-material">
                        <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('الاسم الأول') }}</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="" maxlength="100" minlength="3">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div> <!-- end row -->
                     <br>
                    <div class="row form-material">
                        <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('الاسم الأخير') }}</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="" maxlength="100" minlength="3">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div> <!-- end row -->
                        <br>  
                    <div class="row form-material">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{__('رقم جوال   ')}}</label>
                        <div class="col-md-6">
                          <div class="input-group"><div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="fas fa-phone text-primary"></i></span></div><input type="number" class="form-control  @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" autocomplete="phone_number" placeholder="" autofocus ></div>
                          @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div> <!-- end col -->
                    </div> <!-- end row -->
                        <br>
                    <div class="row form-material">
                        <label for="branch" class="col-md-4 col-form-label text-md-right">{{__('  الفرع   ')}}</label>
                        <div class="col-md-6">
                            <select class="select2 form-control mb-3 custom-select @error('branch') is-invalid @enderror" style="width: 100%; height:36px;" id="branch" name="branch" autocomplete="branch" autofocus required data-parsley-required-message="This field required">
                              <option selected="selected" value="">
                                @if( old('branch') == "" )
                                Not Selected
                                @endif
                              </option>
                                @foreach($branchs as $branch)
                                  <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                            </select>
                            @error('branch')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div> <!-- end col -->
                    </div> <!-- end row -->    
                </div> <!-- end card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round waves-effect waves-light"><i class="mdi mdi-content-save-outline"></i>  حفظ  </button>                       
                        <a href="/"><button type="button" class="btn btn-warning btn-round waves-effect waves-light"><i class="mdi mdi-backup-restore mr-1"></i>  الرجوع للقائمة الرئيسية  </button></a>
                    </div>                                         
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row --> 
</div><!-- container -->
</form>
@endsection

@section('javascript')

    <!-- Plugins js -->
        <script src="{{ asset('plugins/moment/moment.js') }}"></script>
        <script src="{{ asset('plugins/timepicker/tempusdominus-bootstrap-4.js') }}"></script>
        <script src="{{ asset('plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
        <script src="{{ asset('plugins/clockpicker/jquery-clockpicker.min.js') }}"></script>
        <script src="{{ asset('plugins/colorpicker/jquery-asColor.js') }}"></script>
        <script src="{{ asset('plugins/colorpicker/jquery-asGradient.js') }}"></script>
        <script src="{{ asset('plugins/colorpicker/jquery-asColorPicker.min.js') }}"></script>
        <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>

        <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>

        <script src="{{ asset('pages/jquery.clock-img.init.js') }}"></script>
        <script src="{{ asset('pages/jquery.forms-advanced.js') }}"></script>

        <!-- Other Scripts -->
        <script type="text/javascript">
            $('.mx').maxlength({warningClass: "badge badge-info",limitReachedClass: "badge badge-warning"});
        </script>

@endsection
