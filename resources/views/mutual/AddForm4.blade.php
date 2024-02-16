@extends('layouts.app')
@section('css')

		<title>{{ config('app.name') }} Add Form 4</title>

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
            <li class="breadcrumb-item active">   ادخال عملاء  </li>
        </ol>
    </div>      
@endsection

@section('content')
<!-- Main content -->
<form id="form" method="POST" action="/Addform4" data-parsley- -message="">
  @csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-success text-white mt-0"><i class="mdi mdi-certificate mr-1"></i>  ادخال عملاء  </h5>
                <div class="card-body">
                    <div class="row form-material">
                        <div class="col-md-6">
                            <label for="today" class="col-form-label text-right">{{__('  اليوم  ')}}</label>
                            <select class="select2 form-control mb-3 custom-select @error('today') is-invalid @enderror" id="today" name="today" autocomplete="today" required data-parsley-required-message=" هذا الحقل مطلوب " autofocus>
                                <option selected="selected" value="">{{ __(' أختر يوم ')}}</option>
                                <option value=" {{ __('السبت')}} ">{{ __('السبت')}}</option>
                                <option value="{{ __('الأحد')}}">{{ __('الأحد')}}</option>
                                <option value="{{ __('الأثنين')}}">{{ __('الأثنين')}}</option>
                                <option value="{{ __('الثلاثاء')}}">{{ __('الثلاثاء')}}</option>
                                <option value="{{ __('الأربعاء')}}">{{ __('الأربعاء')}}</option>
                                <option value="{{ __('الخميس')}}">{{ __('الخميس')}}</option>
                                <option value="{{ __('الجمعة')}}">{{ __('الجمعة')}}</option>
                            </select>
                            @error('today')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!-- end col -->
                        <div class="col-md-6">
                          <label for="date" class="col-form-label text-right">  التاريخ  </label>
                          <div class="input-group">
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                          <input type="date" class="form-control @error('date') is-invalid @enderror" placeholder="YYY-MM-DD" id="date" name="date" value="{{ old('date') }}" autocomplete="date">
                          </div>
                          @error('date')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div><!-- end col -->                     
                    </div> <!-- end row -->
                        <br>
                    <div class="row form-material">
                        <div class="col-md-12">
                            <fieldset>
                              <div class="repeater-custom-show-hide">
                                  <div data-repeater-list="ResultsR">                                        
                                      <div data-repeater-item="">
                                          <div class="ribbon-2">
                                              <div class="card-box ribbon-box">
                                                  <div class="ribbon ribbon-danger">
                                                      <span data-repeater-delete="" onclick="fundelresults()">
                                                          <span class="far fa-trash-alt mr-2"></span>
                                                      </span>
                                                      <script type="text/javascript">
                                                          function fundelresults(){
                                                            var x =  document.getElementById("count_results").value = parseInt( document.getElementById("count_results").value ) - 1 ;
                                                              console.log(document.getElementById("count_results").value);
                                                              if (document.getElementById("count_results").value <= 35)
                                                                {document.getElementById("addresult").style.display = "block"; }
                                                          }
                                                      </script>                                           
                                                  </div><!--end col-->
                                                  <div class="row form-material">
                                                      <div class="col-md-12">
                                                        <div class="row form-material">
                                                            <div class="col-md-4">
                                                                <label for="name" class="col-form-label text-right">{{ __('   الاسم    ')}}</label>
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror mx" id="name" name="name" value="{{ old('name') }}" autocomplete="name" autofocus maxlength="100" minlength="3">
                                                                    @error('name')
                                                                      <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                      </span>
                                                                    @enderror
                                                            </div> <!-- end col -->
                                                            <div class="col-md-3">
                                                                <label for="address" class="col-form-label text-right">{{ __('  الحي   ')}}</label>
                                                                <input type="text" class="form-control @error('address') is-invalid @enderror mx" id="address" name="address" value="{{ old('address') }}" autocomplete="address" autofocus maxlength="20" minlength="3">
                                                                    @error('address')
                                                                      <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                      </span>
                                                                    @enderror
                                                            </div> <!-- end col -->
                                                            <div class="col-md-2">
                                                                <label for="time" class="col-form-label text-right">  الوقت   </label>
                                                                <div class="input-group">
                                                                  <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                                                  </div>
                                                                    <input type="text" class="form-control @error('time') is-invalid @enderror tim" id="time" name="time" value="{{ old('time') }}" autocomplete="time" autofocus maxlength="100" minlength="3">
                                                                </div>
                                                                    @error('time')
                                                                      <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                      </span>
                                                                    @enderror
                                                            </div> <!-- end col -->
                                                            <div class="col-md-3">
                                                                <label for="type" class="col-form-label text-right">{{ __('  توع العقار   ')}}</label>
                                                                <input type="text" class="form-control @error('type') is-invalid @enderror mx" id="type" name="type" value="{{ old('type') }}" autocomplete="type" autofocus maxlength="20" minlength="3">
                                                                    @error('type')
                                                                      <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                      </span>
                                                                    @enderror
                                                            </div> <!-- end col --> 
                                                        </div> <!-- end row -->
                                                          <br>
                                                        <div class="row form-material">
                                                            <div class="col-md-4">
                                                              <label for="price" class="col-form-label text-right">{{__('  السعر   ')}}</label>
                                                              <input type="number" step="0.01" class="form-control  @error('price') is-invalid @enderror ts" id="price" name="price" value="{{ old('price') }}" autocomplete="price" placeholder="" autofocus>
                                                              @error('price')
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                                </span>
                                                              @enderror
                                                            </div> <!-- end col -->
                                                            <div class="col-md-4">
                                                              <label for="phone_number" class="col-form-label text-right">{{__('رقم جوال العميل  ')}}</label>
                                                              <div class="input-group"><div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="fas fa-phone text-primary"></i></span></div><input type="number" class="form-control  @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" autocomplete="phone_number" placeholder="" autofocus></div>
                                                              @error('phone_number')
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                                </span>
                                                              @enderror
                                                          </div> <!-- end col -->
                                                          <div class="col-md-4">
                                                                <label for="maintenance_type" class="col-form-label text-right">{{ __('   نوع الصيانة    ')}}</label>
                                                                <textarea class="form-control @error('maintenance_type') is-invalid @enderror mx" id="maintenance_type" name="maintenance_type" value="{{ old('maintenance_type') }}" autocomplete="maintenance_type" autofocus maxlength="100" minlength="3" rows="4"></textarea>
                                                                    @error('maintenance_type')
                                                                      <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                      </span>
                                                                    @enderror
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                        <div class="row form-material">
                                                          <div class="col-md-4">
                                                              <label for="maintenance_price" class="col-form-label text-right">{{__('  سعر الصيانة   ')}}</label>
                                                              <input type="number" step="0.01" class="form-control  @error('maintenance_price') is-invalid @enderror ts" id="maintenance_pricee" name="maintenance_price" value="{{ old('maintenance_price') }}" autocomplete="maintenance_price" placeholder="" autofocus>
                                                              @error('maintenance_price')
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                                </span>
                                                              @enderror
                                                            </div> <!-- end col -->
                                                            <div class="col-md-4">
                                                              <label for="remaining_price" class="col-form-label text-right">{{__('  السعر المتبقي   ')}}</label>
                                                              <input type="number" step="0.01" class="form-control  @error('remaining_price') is-invalid @enderror ts" id="remaining_pricee" name="remaining_price" value="{{ old('remaining_price') }}" autocomplete="remaining_price" placeholder="" autofocus>
                                                              @error('remaining_price')
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                                </span>
                                                              @enderror
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                      </div><!--end col-->
                                                  </div><!-- end row -->
                                              </div> <!-- end ribbon-box -->
                                          </div><!-- end ribbon-2 -->
                                      </div><!-- end data-repeater-item -->
                                      <input type="hidden" id="count_results" name="count_results" value="1">
                                  </div><!--end repet-list-->
                                  <div id="addresult" class="form-group row mb-0">
                                      <div class="col-md-3" >
                                          <span data-repeater-create="" class="btn btn-light btn-md" onclick="funaddreslts()">
                                              <span class="fa fa-plus"></span> اضافة  سجل جديد
                                          </span>
                                          <script type="text/javascript">
                                              function funaddreslts(){
                                                var x =  document.getElementById("count_results").value = parseInt( document.getElementById("count_results").value ) + 1 ;
                                                if (document.getElementById("count_results").value >= 35)
                                                    {document.getElementById("addresult").style.display = "none";}
                                                  setTimeout(function(){
                                                    $('.mx').maxlength({warningClass: "badge badge-info",limitReachedClass: "badge badge-warning"});
                                                    $('.tim').bootstrapMaterialDatePicker({format : 'HH:mm', time: true, date: false });
                                                  }, 900);
                                                }
                                          </script>
                                      </div><!--end col-->
                                  </div><!--end row-->
                              </div> <!--end repeter-->                                           
                            </fieldset><!--end fieldset--> 
                        </div> <!-- end col -->
                    </div> <!-- end row -->                     
                </div> <!-- end card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-round waves-effect waves-light"><i class="mdi mdi-content-save-outline"></i>  حفظ  </button>                        
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

        <!-- Parsley js -->
        <script src="{{ asset('plugins/parsleyjs/parsley.min.js') }}"></script>

        <!-- Repeater -->
        <script src="{{ asset('plugins/repeater/jquery.repeater.min.js') }}"></script>
        <script src="{{ asset('pages/jquery.form-repeater.js') }}"></script>

        <!-- Other Scripts -->
        <script type="text/javascript">
            $('input[type=date]').bootstrapMaterialDatePicker({weekStart : 0, time: false });
            $('.mx').maxlength({warningClass: "badge badge-info",limitReachedClass: "badge badge-warning"});
            $('#time').bootstrapMaterialDatePicker({format : 'HH:mm', time: true, date: false });
            $('form').parsley();
        </script>
        <script type="text/javascript">
            setInterval(function() {
                $('.ts').TouchSpin({
                          min: 0,
                          max: 1000000,
                          step: 0.01,
                          decimals: 2,
                          boostat: 5,
                          maxboostedstep: 10,
                          buttondown_class: 'btn btn-primary',
                          buttonup_class: 'btn btn-primary'
                      });
                  }, 800);
        </script>
@endsection