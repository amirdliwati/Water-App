@extends('layouts.app')
@section('css')

		<title>{{ config('app.name') }} Edit Form 2</title>

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
            <li class="breadcrumb-item"><a href="/SecondForms">عرض نماذج معلومات زيارة تدقيق المياه    </a></li>
            <li class="breadcrumb-item active">   تعديل  مغلومات زيارة تدقيق المياه </li>
        </ol>
    </div>      
@endsection

@section('content')
<!-- Main content -->
<form id="form" method="POST" action="/EditForm2/{{ $Form->id }}">
  @csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-warning text-white mt-0"><i class="mdi mdi-certificate mr-1"></i>   تعديل  مغلومات زيارة تدقيق المياه </h5>
                <div class="card-body">
                    <div class="row form-material">
                        <div class="col-md-6">
                            <label for="name_inspector" class="col-form-label text-right">{{ __(' اسم المدقق  ')}}</label>
                            <input type="text" class="form-control @error('name_inspector') is-invalid @enderror mx" id="name_inspector" name="name_inspector" value="{{ $Form->name_inspector }}" autocomplete="name_inspector" autofocus maxlength="90" minlength="3" required readonly="">
                                @error('name_inspector')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div> <!-- end col -->
                        <div class="col-md-6">
                            <label for="code_inspector" class="col-form-label text-right">{{ __('  كود المدقق  ')}}</label>
                            <input type="text" class="form-control @error('code_inspector') is-invalid @enderror mx" id="code_inspector" name="code_inspector" value="{{ $Form->code_inspector }}" autocomplete="code_inspector" autofocus required maxlength="90" minlength="3" readonly="">
                                @error('code_inspector')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div> <!-- end col -->              
                    </div> <!-- end row -->

                    <div class="row form-material">
                        <div class="col-md-6">
                            <label for="name_customer" class="col-form-label text-right">{{ __('   اسم المستهلك   ')}}</label>
                            <input type="text" class="form-control @error('name_customer') is-invalid @enderror mx" id="name_customer" name="name_customer" value="{{ $Form->name_customer }}" autocomplete="name_customer" autofocus maxlength="90" minlength="3" required readonly="">
                                @error('name_customer')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div> <!-- end col -->
                        <div class="col-md-6">
                            <label for="address_customer" class="col-form-label text-right">{{ __('  العنوان   ')}}</label>
                            <input type="text" class="form-control @error('address_customer') is-invalid @enderror mx" id="address_customer" name="address_customer" value="{{ $Form->address_customer }}" autocomplete="address_customer" autofocus required maxlength="48" minlength="3" readonly="">
                                @error('address_customer')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div> <!-- end col --> 
                    </div> <!-- end row -->

                    <div class="row form-material">
                        <div class="col-md-6">
                          <label for="account_number" class="col-form-label text-right">{{__('   رقم حساب شركة المياه الوطنية  ')}}</label>
                          <input type="number" class="form-control  @error('account_number') is-invalid @enderror" id="account_number" name="account_number" value="{{ $Form->account_number }}" autocomplete="account_number" placeholder="" autofocus required readonly="">
                          @error('account_number')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div> <!-- end col -->
                      <div class="col-md-6">
                          <label for="counter_number" class="col-form-label text-right">{{__('  رقم عداد المياه   ')}}</label>
                          <input type="number" class="form-control  @error('counter_number') is-invalid @enderror" id="counter_number" name="counter_number" value="{{ $Form->counter_number }}" autocomplete="counter_number" placeholder="" autofocus required readonly="">
                          @error('counter_number')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div> <!-- end col -->
                    </div> <!-- end row --> 

                    <div class="row form-material">
                        <div class="col-md-4">
                          <label for="date" class="col-form-label text-right">  التاريخ  </label>
                          <div class="input-group">
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                          <input type="date" class="form-control @error('date') is-invalid @enderror" placeholder="YYY-MM-DD" id="date" name="date" value="{{ $Form->date }}" autocomplete="date" required readonly="">
                          </div>
                          @error('date')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div><!-- end col -->
                        <div class="col-md-4">
                            <label for="start_time" class="col-form-label text-right">  وقت بداية التدقيق   </label>
                            <div class="input-group">
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                              </div>
                              <input type="text" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ $Form->start_time }}" autocomplete="start_time" autofocus required maxlength="48" minlength="3">
                            </div>
                                @error('start_time')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <label for="end_time" class="col-form-label text-right">   وقت نهاية التدقيق   </label>
                            <div class="input-group">
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                              </div>
                              <input type="text" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{ $Form->end_time }}" autocomplete="end_time" autofocus required maxlength="48" minlength="3">
                          </div>
                                @error('end_time')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div> <!-- end col -->  
                    </div> <!-- end row --> 

                    <div class="row form-material">
                        <div class="col-md-4">
                          <p class="text-muted font-14 mt-3 mb-2"> هل تم اكتشاف اي تسربات ؟  </p>
                          @if($Form->check1 == 1)                            
                            <div class="radio radio-success form-check-inline">
                                <input type="radio" name="check1" id="check1_open" value="1" checked="">
                                <label for="check1_open">
                                    نعم
                                </label>
                            </div>
                            <div class="radio radio-pink form-check-inline">
                                <input type="radio" name="check1" id="check1_close" value="0">
                                <label for="check1_close">
                                    لا
                                </label>
                            </div>
                          @else
                          <div class="radio radio-success form-check-inline">
                                <input type="radio" name="check1" id="check1_open" value="1">
                                <label for="check1_open">
                                    نعم
                                </label>
                            </div>
                            <div class="radio radio-pink form-check-inline">
                                <input type="radio" name="check1" id="check1_close" value="0" checked="">
                                <label for="check1_close">
                                    لا
                                </label>
                            </div>
                          @endif
                        </div> <!-- end col -->
                        <div class="col-md-4">
                          <p class="text-muted font-14 mt-3 mb-2"> هل تم اضافة نموذج فحص التسربات الداخلية المباني ؟    </p>
                          @if($Form->check2 == 1)                                 
                            <div class="radio radio-success form-check-inline">
                                <input type="radio" name="check2" id="check2_open" value="1" checked="">
                                <label for="check2_open">
                                    نعم
                                </label>
                            </div>
                            <div class="radio radio-pink form-check-inline">
                                <input type="radio" name="check2" id="check2_open" value="0">
                                <label for="counter_state_close">
                                    لا
                                </label>
                            </div>
                          @else
                          <div class="radio radio-success form-check-inline">
                                <input type="radio" name="check2" id="check2_open" value="1">
                                <label for="check2_open">
                                    نعم
                                </label>
                            </div>
                            <div class="radio radio-pink form-check-inline">
                                <input type="radio" name="check2" id="check2_open" value="0" checked="">
                                <label for="counter_state_close">
                                    لا
                                </label>
                            </div>
                          @endif
                        </div> <!-- end col -->
                    </div> <!-- end row -->   
                </div> <!-- end card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-round waves-effect waves-light"><i class="mdi mdi-content-save-outline"></i>  حفظ  </button>                         
                        <a href="/SecondForms"><button type="button" class="btn btn-warning btn-round waves-effect waves-light"><i class="mdi mdi-backup-restore mr-1"></i>  رجوع  </button></a>
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
            $('#start_time').bootstrapMaterialDatePicker({format : 'HH:mm', time: true, date: false });
            $('#end_time').bootstrapMaterialDatePicker({format : 'HH:mm', time: true, date: false });
        </script>

@endsection