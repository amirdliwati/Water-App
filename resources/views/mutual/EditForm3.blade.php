@extends('layouts.app')
@section('css')

		<title>{{ config('app.name') }} Edit Form 3</title>

        <!-- Plugins css -->
        <link href="{{ asset('plugins/timepicker/tempusdominus-bootstrap-4.css') }}" rel="stylesheet" />
        <link href="{{ asset('plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/clockpicker/jquery-clockpicker.min.css" rel="stylesheet') }}" />
        <link href="{{ asset('plugins/colorpicker/asColorPicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />

        <!-- Text Area -->
        <style type="text/css">
            @import url(https://fonts.googleapis.com/css?family=Roboto);
            @import url(https://fonts.googleapis.com/css?family=Handlee);

            .paper {position: relative;width: 100%;max-width: 900px;min-width: 400px;height: 200px;margin: 0 auto;background: #fafafa;border-radius: 10px;box-shadow: 0 2px 8px rgba(0,0,0,.3);overflow: hidden;}
            .paper:before {content: '';position: absolute;top: 0; bottom: 0; left: 0;width: 60px;background: radial-gradient(#575450 6px, transparent 7px) repeat-y;background-size: 30px 30px;border-right: 3px solid #D44147;box-sizing: border-box;}

            .paper-content {position: absolute;top: 30px; right: 0; bottom: 30px; left: 60px;background: linear-gradient(transparent, transparent 28px, #91D1D3 28px);background-size: 30px 30px;}

            .paper-content textarea {width: 100%;max-width: 100%;height: 100%;max-height: 100%;line-height: 30px;padding: 0 10px;border: 0;outline: 0;background: transparent;color: mediumblue;font-family: 'Handlee', cursive;font-weight: bold;font-size: 15px;box-sizing: border-box;z-index: 1;}
        </style>

@endsection

@section('page_title')
<!-- Page-Title -->
    <h4 class="page-title mb-2"><i class="mdi mdi-monitor mr-2"></i>لوحة التحكم   </h4>  
    <div class="">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">لوحة التحكم    </a></li>
            <li class="breadcrumb-item"><a href="/ThirdForms">عرض الفواتير    </a></li>
            <li class="breadcrumb-item active">   تعديل فاتورة تقرير  صيانة </li>
        </ol>
    </div>      
@endsection

@section('content')
<!-- Main content -->
<form id="form" method="POST" action="/EditForm3/{{ $Form->id }}">
  @csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-warning text-white mt-0"><i class="mdi mdi-certificate mr-1"></i>    تعديل فاتورة تقرير  صيانة </h5>
                <div class="card-body">
                    <div class="row form-material">
                        <div class="col-md-6">
                          <label for="date" class="col-form-label text-right">  التاريخ  </label>
                          <div class="input-group">
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                          <input type="date" class="form-control @error('date') is-invalid @enderror" placeholder="YYY-MM-DD" id="date" name="date" value="{{ $Form->date }}" autocomplete="date" required>
                          </div>
                          @error('date')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div><!-- end col -->
                        <div class="col-md-6">
                            <label for="customer_name" class="col-form-label text-right">{{ __('   اسم المستهلك   ')}}</label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror mx" id="customer_name" name="customer_name" value="{{ $Form->customer_name }}" autocomplete="customer_name" autofocus required maxlength="90" minlength="3">
                                @error('customer_name')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div> <!-- end col -->               
                    </div> <!-- end row -->

                    <div class="row form-material">
                        <div class="col-md-4">
                          <label for="counter_number" class="col-form-label text-right">{{__('  رقم عداد المياه   ')}}</label>
                          <input type="number" class="form-control  @error('counter_number') is-invalid @enderror" id="counter_number" name="counter_number" value="{{ $Form->counter_number }}" autocomplete="counter_number" placeholder="" autofocus required>
                          @error('counter_number')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <label for="field1" class="col-form-label text-right">{{ __('  رقم حساب المشترك   ')}}</label>
                            <input type="text" class="form-control @error('field1') is-invalid @enderror mx" id="field1" name="field1" value="{{ $Form->field1 }}" autocomplete="field1" autofocus maxlength="17" minlength="3">
                                @error('field1')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <label for="field2" class="col-form-label text-right">{{ __('  الحي   ')}}</label>
                            <input type="text" class="form-control @error('field2') is-invalid @enderror mx" id="field2" name="field2" value="{{ $Form->field2 }}" autocomplete="field2" autofocus maxlength="40" minlength="3">
                                @error('field2')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div> <!-- end col -->            
                    </div> <!-- end row -->
                        <br>
                    <div class="row form-material">
                        <div class="col-md-6">
                            <div class="paper">
                                <div class="paper-content">
                                    <textarea type="text" class=" @error('maintenance_time') is-invalid @enderror mx" id="maintenance_time" name="maintenance_time" value="{{ old('maintenance_time') }}" autocomplete="address" placeholder=" مدة الصيانة" autofocus required rows="5"  maxlength="150" minlength="3" data-toggle="tooltip" data-placement="left" title="{{ __('مدة الصيانة')}}" data-parsley-required-message="هذا الحقل مطلوب" > {{ $Form->maintenance_time }}  </textarea>
                                    @error('maintenance_time')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div> <!-- paper-content -->
                            </div> <!-- paper -->
                        </div> <!-- end col -->
                        <div class="col-md-6">
                            <div class="paper">
                                <div class="paper-content">
                                    <textarea type="text" class=" @error('maintenance_type') is-invalid @enderror mx" id="maintenance_type" name="maintenance_type" value="{{ old('maintenance_type') }}" autocomplete="address" placeholder="  نوع الصيانة " autofocus required rows="5" maxlength="150" minlength="3" data-toggle="tooltip" data-placement="left" title="{{ __(' نوع الصيانة  ')}}" data-parsley-required-message="هذا الحقل مطلوب" >  {{ $Form->maintenance_type }}   </textarea>
                                    @error('maintenance_type')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div> <!-- paper-content -->
                            </div> <!-- paper -->
                        </div> <!-- end col -->           
                    </div> <!-- end row -->
                        <br>
                    <div class="row form-material">
                        <div class="col-md-4">
                          <label for="total" class="col-form-label text-right">{{__('  الأجمالي   ')}}</label>
                          <input type="number" step="0.01" class="form-control  @error('total') is-invalid @enderror ts" id="total" name="total" value="{{ $Form->total }}" autocomplete="total" placeholder="" autofocus required>
                          @error('total')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div> <!-- end col -->
                        <div class="col-md-4">
                          <label for="tax" class="col-form-label text-right">{{__('  الضريبة     ')}}</label>
                          <input type="number" step="0.01" class="form-control  @error('tax') is-invalid @enderror ts" id="tax" name="tax" value="{{ $Form->tax }}" autocomplete="tax" placeholder="" autofocus required>
                          @error('tax')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div> <!-- end col --> 
                        <div class="col-md-4">
                          <label for="total_amount" class="col-form-label text-right">{{__('  المبلغ الأجمالي     ')}}</label>
                          <input type="number" step="0.01" class="form-control  @error('total_amount') is-invalid @enderror" id="total_amount" name="total_amount" value="{{ $Form->total_amount }}" autocomplete="total_amount" placeholder="" autofocus readonly>
                          @error('total_amount')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div> <!-- end col --> 

                    </div> <!-- end row -->
                      <br>
                    <div class="row form-material">
                        <div class="col-md-6">
                            <label for="total_amount_write" class="col-form-label text-right">{{ __('   المبلغ الإجمالي كتابة     ')}}</label>
                            <input type="text" class="form-control @error('total_amount_write') is-invalid @enderror mx" id="total_amount_write" name="total_amount_write" value="{{ $Form->total_amount_write }} " autocomplete="total_amount_write" autofocus required maxlength="50" minlength="3">
                                @error('total_amount_write')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div> <!-- end col --> 
                        <div class="col-md-6">
                            <label for="employee" class="col-form-label text-right">{{ __('  الفني     ')}}</label>
                            <input type="text" class="form-control @error('employee') is-invalid @enderror mx" id="employee" name="employee" value="{{ $Form->employee }} " autocomplete="employee" autofocus required maxlength="30" minlength="3">
                                @error('employee')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div> <!-- end col -->               
                    </div> <!-- end row -->
                </div> <!-- end card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-round waves-effect waves-light"><i class="mdi mdi-content-save-outline"></i>  حفظ  </button>                        
                        <a href="/ThirdForms"><button type="button" class="btn btn-warning btn-round waves-effect waves-light"><i class="mdi mdi-backup-restore mr-1"></i>  رجوع  </button></a>
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
            $('input[type=date]').bootstrapMaterialDatePicker({weekStart : 0, time: false });
            $('.mx').maxlength({warningClass: "badge badge-info",limitReachedClass: "badge badge-warning"});
        </script>

        <script type="text/javascript">
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
        </script>
        <script type="text/javascript">
          setInterval(function() {
            var total = $('#total').val(); 
            var tax = (total*$('#tax').val())/100 + parseFloat(total);
            $('#total_amount').val(tax.toFixed(2));
          }, 800);
        </script>
@endsection