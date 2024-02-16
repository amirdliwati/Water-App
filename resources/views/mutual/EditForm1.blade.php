@extends('layouts.app')
@section('css')

		<title>{{ config('app.name') }} Edit Form 1</title>

        <!-- FORM WIZARD ARROWS -->
        <link href="{{ asset('plugins/form-wizard/css/smart_wizard.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/form-wizard/css/smart_wizard_theme_arrows.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/form-wizard/css/smart_wizard_theme_circles.css') }}" rel="stylesheet" type="text/css" />

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

        <!-- Text Area -->
        <style type="text/css">
            @import url(https://fonts.googleapis.com/css?family=Roboto);
            @import url(https://fonts.googleapis.com/css?family=Handlee);

            .paper {position: relative;width: 100%;max-width: 900px;min-width: 400px;height: 200px;margin: 0 auto;background: #fafafa;border-radius: 10px;box-shadow: 0 2px 8px rgba(0,0,0,.3);overflow: hidden;}
            .paper:before {content: '';position: absolute;top: 0; bottom: 0; left: 0;width: 60px;background: radial-gradient(#575450 6px, transparent 7px) repeat-y;background-size: 30px 30px;border-right: 3px solid #D44147;box-sizing: border-box;}

            .paper-content {position: absolute;top: 30px; right: 0; bottom: 30px; left: 60px;background: linear-gradient(transparent, transparent 28px, #91D1D3 28px);background-size: 30px 30px;}

            .paper-content textarea {width: 100%;max-width: 100%;height: 100%;max-height: 100%;line-height: 30px;padding: 0 10px;border: 0;outline: 0;background: transparent;color: mediumblue;font-family: 'Handlee', cursive;font-weight: bold;font-size: 15px;box-sizing: border-box;z-index: 1;}
        </style>

        <!-- Text Area Big -->
        <style type="text/css">

            .paper-big {position: relative;width: 100%;max-width: 900px;min-width: 400px;height: 250px;margin: 0 auto;background: #fafafa;border-radius: 10px;box-shadow: 0 2px 8px rgba(0,0,0,.3);overflow: hidden;}
            .paper-big:before {content: '';position: absolute;top: 0; bottom: 0; left: 0;width: 60px;background: radial-gradient(#575450 6px, transparent 7px) repeat-y;background-size: 30px 30px;border-right: 3px solid #D44147;box-sizing: border-box;}

            .paper-content-big {position: absolute;top: 30px; right: 0; bottom: 30px; left: 60px;background: linear-gradient(transparent, transparent 28px, #91D1D3 28px);background-size: 30px 30px;}

            .paper-content-big textarea {width: 100%;max-width: 100%;height: 100%;max-height: 100%;line-height: 30px;padding: 0 10px;border: 0;outline: 0;background: transparent;color: mediumblue;font-family: 'Handlee', cursive;font-weight: bold;font-size: 15px;box-sizing: border-box;z-index: 1;}
        </style>
@endsection

@section('page_title')
<!-- Page-Title -->
    <h4 class="page-title mb-2"><i class="mdi mdi-monitor mr-2"></i>لوحة التحكم   </h4>  
    <div class="">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">لوحة التحكم    </a></li>
            <li class="breadcrumb-item"><a href="/FirstForms">عرض نماذج التسربات الداخلية للمباني    </a></li>
            <li class="breadcrumb-item active">  تعديل نموذج فحص التسربات الداخلية للمباني  </li>
        </ol>
    </div>      
@endsection

@section('content')
<!-- Main content -->
<form id="form" method="POST" action="/EditForm1/{{ $Form->id }}" enctype="multipart/form-data" data-parsley-required-message="">
  @csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-warning text-white mt-0"><i class="mdi mdi-certificate mr-1"></i>  تعديل  نموذج فحص التسربات الداخلية للمباني  </h5>
                <div class="card-body">

                    <div class="ribbon-2">
                        <div class="card-box ribbon-box">
                            <ul class="nav nav-pills mb-0 nav-justified" id="pills-tab" role="tablist">
                                <li class="nav-item btn-round waves-effect waves-light">
                                    <a class="nav-link active" id="step1-a" data-toggle="pill" href="#step1-tab" aria-selected="true"><b id="step1-b"></b>الخطوات العامة </a>
                                </li>
                                <li class="nav-item btn-round waves-effect waves-light">
                                    <a class="nav-link" id="step2-a" data-toggle="pill" href="#step2-tab"  aria-selected="false"><b id="step2-b"></b>بيانات الفحص الميداني 1 </a>
                                </li>
                                <li class="nav-item btn-round waves-effect waves-light">
                                    <a class="nav-link" id="step3-a" data-toggle="pill" href="#step3-tab"  aria-selected="false"><b id="step3-b"></b>بيانات الفحص الميداني 2</a>
                                </li>
                                <li class="nav-item btn-round waves-effect waves-light">
                                    <a class="nav-link" id="step4-a" data-toggle="pill" href="#step4-tab"  aria-selected="false"><b id="step4-b"></b>نتيجة الكشف   </a>
                                </li> 
                                <li class="nav-item btn-round waves-effect waves-light">
                                    <a class="nav-link" id="step5-a" data-toggle="pill" href="#step5-tab"  aria-selected="false"><b id="step5-b"></b>معلومات نهائية </a>
                                </li>
                                <!-- <li class="nav-item btn-round waves-effect waves-light">
                                    <a class="nav-link" id="step6-a" data-toggle="pill" href="#step6-tab"  aria-selected="false"><b id="step6-b"></b>توقيع الموظف </a>
                                </li>  -->                              
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content mt-4" id="request-tabContent">

                        <div class="tab-pane fade show active" id="step1-tab">
                            @include('mutual/form1_edit_tools/step1')
                        </div><!-- end step1 -->

                        <div class="tab-pane fade mt-4" id="step2-tab">
                            @include('mutual/form1_edit_tools/step2')
                        </div><!-- end step2 -->

                        <div class="tab-pane fade mt-4" id="step3-tab">
                            @include('mutual/form1_edit_tools/step3')
                        </div><!-- end step3 --> 

                        <div class="tab-pane fade mt-4" id="step4-tab">
                            @include('mutual/form1_edit_tools/step4')
                        </div><!-- end step4 --> 

                        <div class="tab-pane fade mt-4" id="step5-tab">
                            @include('mutual/form1_edit_tools/step5')
                        </div><!-- end step5 -->

                        <!-- <div class="tab-pane fade mt-4" id="step6-tab">
                            @include('mutual/form1_edit_tools/step6')
                        </div><!- end step6 -->    

                    </div><!-- /.tab-content -->                     

                </div> <!-- end card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-round waves-effect waves-light"><i class="mdi mdi-content-save-outline"></i>  حفظ  </button>                        
                        <a href="/FirstForms"><button type="button" class="btn btn-warning btn-round waves-effect waves-light"><i class="mdi mdi-backup-restore mr-1"></i>  رجوع  </button></a>
                    </div>                                         
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row --> 
</div><!-- container -->
</form>
@endsection

@section('javascript')

        <!--  WIZARD ARROWS -->
        <script src="{{ asset('plugins/form-wizard/js/jquery.smartWizard.min.js') }}"></script>
        <script src="{{ asset('pages/jquery.form-wizard.init.js') }}"></script>

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

        <!-- Animation -->
        <script src="{{ asset('pages/jquery.modal-animation.js') }}"></script>

        <!-- Parsley js -->
        <script src="{{ asset('plugins/parsleyjs/parsley.min.js') }}"></script>

        <!-- tooltipster  -->
        <script src="{{ asset('plugins/tippy/tippy.all.min.js') }}"></script> 
        <script src="{{ asset('pages/jquery.tooltipster.js') }}"></script>
        <script src="{{ asset('js/jquery.core.js') }}"></script>

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
            $('form').parsley();
        </script>

        <script type="text/javascript">
          $(document).ready(function(){
            $('#form').submit(function() {
                if (signaturePad.isEmpty()) {
                  swal('أسف!','يرجى التوقيع.','error');
                  return false;
                } else {
                  var dataURL = signaturePad.toDataURL();
                  $('#image_employee').val(dataURL);
                  //download(dataURL, "signature.png");
                }
              });
            });
        </script>

        <script type="text/javascript">
            $("#smart_wizard_circles").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                if($('button.sw-btn-next').hasClass('disabled')) {
                    $('#finish').show();
                }else {
                    $('#finish').hide();       
                }
            });
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