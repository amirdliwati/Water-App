@extends('layouts.app')
@section('css')

		<title>{{ config('app.name') }} Add Form 2</title>

        <!-- Plugins css -->
        <link href="{{ asset('plugins/timepicker/tempusdominus-bootstrap-4.css') }}" rel="stylesheet" />
        <link href="{{ asset('plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/clockpicker/jquery-clockpicker.min.css" rel="stylesheet') }}" />
        <link href="{{ asset('plugins/colorpicker/asColorPicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />

        <!-- Sweet Alert -->
        <link href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

        <!-- signature-pad -->
        <link href="{{ asset('libs/signature_pad/css/signature-pad.css') }}" rel="stylesheet" type="text/css" />
        
@endsection

@section('page_title')
<!-- Page-Title -->
    <h4 class="page-title mb-2"><i class="mdi mdi-monitor mr-2"></i>لوحة التحكم   </h4>  
    <div class="">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">لوحة التحكم    </a></li>
            <li class="breadcrumb-item active">   ادخال مغلومات زيارة تدقيق المياه </li>
        </ol>
    </div>      
@endsection

@section('content')
<!-- Main content -->
<form id="form" method="POST" action="/Addform2" enctype="multipart/form-data">
  @csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-success text-white mt-0"><i class="mdi mdi-certificate mr-1"></i>   ادخال مغلومات زيارة تدقيق المياه </h5>
                <div class="card-body">
                    <div class="row form-material">
                        <div class="col-md-6">
                            <label for="name_inspector" class="col-form-label text-right">{{ __(' اسم المدقق  ')}}</label>
                            <select class="select2 form-control mb-3 custom-select @error('name_inspector') is-invalid @enderror" style="width: 100%; height:36px;" id="name_inspector" name="name_inspector" autocomplete="name_inspector" autofocus required data-parsley-required-message="This field required">
                              <option selected="selected" value="">
                                @if( old('name_inspector') == "" )
                                لم يتم الأختيار
                                @endif
                              </option>
                                @foreach($Inspectors as $Inspector)
                                  <option value="{{$Inspector->name}}">{{$Inspector->name}}</option>
                                @endforeach
                            </select>
                                @error('name_inspector')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div> <!-- end col -->
                        <div class="col-md-6">
                            <label for="code_inspector" class="col-form-label text-right">{{ __('  كود المدقق  ')}}</label>
                            <input type="text" class="form-control @error('code_inspector') is-invalid @enderror mx" id="code_inspector" name="code_inspector" value="{{ old('code_inspector') }}" autocomplete="code_inspector" autofocus required maxlength="90" minlength="3" readonly="">
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
                            <select class="select2 form-control mb-3 custom-select @error('name_customer') is-invalid @enderror" style="width: 100%; height:36px;" id="name_customer" name="name_customer" autocomplete="name_customer" autofocus required data-parsley-required-message="This field required">
                              <option selected="selected" value="">
                                @if( old('name_customer') == "" )
                                لم يتم الأختيار
                                @endif
                              </option>
                                @foreach($Forms as $Form)
                                  <option value="{{$Form->general_informatione->id}}">{{$Form->general_informatione->name}}</option>
                                @endforeach
                            </select>
                                @error('name_customer')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div> <!-- end col -->
                        <div class="col-md-6">
                            <label for="address_customer" class="col-form-label text-right">{{ __('  العنوان   ')}}</label>
                            <input type="text" class="form-control @error('address_customer') is-invalid @enderror mx" id="address_customer" name="address_customer" value="{{ old('address_customer') }}" autocomplete="address_customer" autofocus required maxlength="48" minlength="3" readonly="">
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
                          <input type="number" class="form-control  @error('account_number') is-invalid @enderror" id="account_number" name="account_number" value="{{ old('account_number') }}" autocomplete="account_number" placeholder="" autofocus required readonly="">
                          @error('account_number')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div> <!-- end col -->
                      <div class="col-md-6">
                          <label for="counter_number" class="col-form-label text-right">{{__('  رقم عداد المياه   ')}}</label>
                          <input type="number" class="form-control  @error('counter_number') is-invalid @enderror" id="counter_number" name="counter_number" value="{{ old('counter_number') }}" autocomplete="counter_number" placeholder="" autofocus required readonly="">
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
                          <input type="date" class="form-control @error('date') is-invalid @enderror" placeholder="YYY-MM-DD" id="date" name="date" value="{{ old('date') }}" autocomplete="date" required readonly="">
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
                              <input type="text" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ old('start_time') }}" autocomplete="start_time" autofocus required maxlength="48" minlength="3">
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
                              <input type="text" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{ old('end_time') }}" autocomplete="end_time" autofocus required maxlength="48" minlength="3">
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
                        </div> <!-- end col -->
                        <div class="col-md-4">
                          <p class="text-muted font-14 mt-3 mb-2"> هل تم اضافة نموذج فحص التسربات الداخلية المباني ؟    </p>                                 
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
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                      <br>
                    <div class="ribbon-1">
                      <div class="ribbon-box">
                        <div class="ribbon ribbon-mark ribbon-right bg-danger">  التوقيع  </div>
                          <div class="row form-material">
                            <div class="col-md-12" align="center">
                                <div id="signature-pad" class="signature-pad">
                                <div class="signature-pad--body">
                                  <canvas></canvas>
                                </div>
                                <div class="signature-pad--footer">
                                  <div class="signature-pad--actions">
                                    <div>
                                      <button type="button" class="btn btn-danger btn-round waves-effect waves-light clear" data-action="clear"><i class="mdi mdi-eraser mr-1"></i></button>
                                      <button type="button" class="btn btn-info btn-round waves-effect waves-light" data-action="undo"><i class="mdi mdi-undo-variant mr-1"></i></button>
                                      <button type="button" class="btn btn-success btn-round waves-effect waves-light" data-action="change-color">تغيير اللون</button>
                                    </div>
                                    <input type="hidden" id="image" name="image" value="">
                                  </div> <!-- end signature-pad--actions --> 
                                </div> <!-- end signature-pad--footer --> 
                              </div> <!-- end signature-pad --> 
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                      </div><!-- end ribbon-box -->
                    </div><!-- end ribbon-1 -->   
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

        <!-- Sweet-Alert  -->
        <script src="{{ asset('plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('pages/jquery.sweet-alert.init.js') }}"></script>
        
        <!-- signature_pad js -->
        <script src="{{ asset('libs/signature_pad/js/signature_pad.js') }}"></script>
        <script src="{{ asset('libs/signature_pad/js/app.js') }}"></script>

        <!-- Other Scripts -->
        <script type="text/javascript">
            $('input[type=date]').bootstrapMaterialDatePicker({weekStart : 0, time: false });
            $('.mx').maxlength({warningClass: "badge badge-info",limitReachedClass: "badge badge-warning"});
            $('#start_time').bootstrapMaterialDatePicker({format : 'HH:mm', time: true, date: false });
            $('#end_time').bootstrapMaterialDatePicker({format : 'HH:mm', time: true, date: false });
        </script>

        <script type="text/javascript">
          $('#name_customer').change(function(){
              var CustomerID = $(this).val();    
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                  var obj = JSON.parse(this.responseText);
                    $('#address_customer').val(obj.city);
                    $('#account_number').val(obj.account_number);
                    $('#counter_number').val(obj.counter_number);
                    $('#date').val(obj.date);                
                }   
              };

              xmlhttp.open("GET", "{{url('get-customer-details')}}?customer_id="+CustomerID, true);
              xmlhttp.send();      
          });
        </script>

        <script type="text/javascript">
          $('#name_inspector').change(function(){
              var inspector = $(this).val();    
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                  var obj = JSON.parse(this.responseText);
                    $('#code_inspector').val(obj.code);               
                }   
              };

              xmlhttp.open("GET", "{{url('get-inspector-details')}}?inspector_name="+inspector, true);
              xmlhttp.send();      
          });
        </script>

        <script type="text/javascript">
          $(document).ready(function(){
            $('#form').submit(function() {
                if (signaturePad.isEmpty()) {
                  swal('أسف!','يرجى التوقيع.','error');
                  return false;
                } else {
                  var dataURL = signaturePad.toDataURL();
                  $('#image').val(dataURL);
                  //download(dataURL, "signature.png");
                }
              });
            });
        </script>
@endsection