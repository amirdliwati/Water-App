@extends('layouts.app')
@section('css')

		<title>{{ config('app.name') }} Add Form1</title>

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
            <li class="breadcrumb-item active">  نموذج فحص التسربات الداخلية للمباني  </li>
        </ol>
    </div>      
@endsection

@section('content')
<!-- Main content -->
<form id="form" method="POST" action="/Addform1" enctype="multipart/form-data" data-parsley-required-message="">
  @csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-success text-white mt-0"><i class="mdi mdi-certificate mr-1"></i>  ادخال نموذج فحص التسربات الداخلية للمباني  </h5>
                <div class="card-body">

                    	<div id="smart_wizard_circles" >
						    <ul>
						        <li><a href="#step1" id="v11"><i class="mdi mdi-certificate d-block"></i><small id="v1"> الخطوات العامة  </small></a></li>
						        <li><a href="#step2" id="v22"><i class="mdi mdi-information-outline d-block"></i><small id="v2">  بيانات الفحص الميداني 1  </small></a></li>
						        <li><a href="#step3" id="v33"><i class="mdi mdi-database d-block"></i><small id="v3">  بيانات الفحص الميداني 2  </small></a></li>
						        <li><a href="#step4" id="v44"><i class="mdi mdi-folder-text-outline d-block" ></i><small id="v4">  نتيجة الكشف   </small></a></li>
						        <li><a href="#step5" id="v55"><i class="fas fa-flag-checkered d-block"></i><small id="v5">  معومات نهائية </small></a></li>
                                <li><a href="#step6" id="v55"><i class="mdi mdi-grease-pencil d-block"></i><small id="v5">  توقيع الموظف </small></a></li>
						    </ul>
						    
						    <div class="p-3 sw-circle-content mb-3">
						        <div id="step1" class="">
						            @include('mutual/form1_tools/step1')
						        </div>

						        <div id="step2" class="">
						             @include('mutual/form1_tools/step2')
						        </div>

						        <div id="step3" class="">
						            @include('mutual/form1_tools/step3')
						        </div>

						        <div id="step4" class="">
						            @include('mutual/form1_tools/step4')
						        </div>
						        
						        <div id="step5" class="">
						            @include('mutual/form1_tools/step5')
						        </div>

                                <div id="step6" class="">
                                    @include('mutual/form1_tools/step6')
                                </div>
						        
						    </div><!--end circle-content-->
						</div> <!--end smartwizard-->
						                       

                </div> <!-- end card-body -->
                    <div class="card-footer">                       
                        <a href="/"><button type="button" class="btn btn-warning btn-round waves-effect waves-light"><i class="mdi mdi-backup-restore mr-1"></i>  الرجوع للقائمة الرئيسية  </button></a>
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
                $('#finish').click( function(){
                    if ($('#date').val() == "" || 
                        $('#name').val() == "" || 
                        $('#phone_number').val() == "" ||
                        $('#account_number').val() == "" ||  
                        $('#counter_number').val() == "" ||
                        $('#counter_type').val() == "" || 
                        $('#city').val() == "" || 
                        $('#soporific_type').val() == "" ||
                        $('#soporific_category').val() == "" || 
                        $('#soporific_space').val() == "" || 
                        $('#estimated_average').val() == "" || 
                        $('#recommended').val() == "") {

                        $('#v1').css("color","#f54d6f");
                        $('#v11').css("background-color","#f54d6f");
                    }else {
                        $('#v1').css("color","");
                        $('#v11').css("background-color",""); 
                    }

                    if ($('#resource_pool').val() == "" ) {

                        $('#v2').css("color","#f54d6f");
                        $('#v22').css("background-color","#f54d6f");
                    }else {
                        $('#v2').css("color","");
                        $('#v22').css("background-color",""); 
                    }

                    if ($('#resource_Irrigation').val() == "" ) {

                        $('#v3').css("color","#f54d6f");
                        $('#v33').css("background-color","#f54d6f");
                    }else {
                        $('#v3').css("color","");
                        $('#v33').css("background-color",""); 
                    }

                    if ($('#previous_problem').val() == "") {

                        $('#v4').css("color","#f54d6f");
                        $('#v44').css("background-color","#f54d6f");
                    }else {
                        $('#v4').css("color","");
                        $('#v44').css("background-color",""); 
                    }

                    if ($('#notes').val() == "") {
                        $('#v5').css("color","#f54d6f");
                        $('#v55').css("background-color","#f54d6f");
                    }else {
                        $('#v5').css("color","");
                        $('#v55').css("background-color",""); 
                    }


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
            var $ = skuid.$;
            var topPosition = $('.nx-page').offset().top;
            $('body').scrollTop(0);    
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