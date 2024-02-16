@extends('layouts.app')
@section('css')

        <title>Form 1 Signature</title>

        <!-- Sweet Alert -->
        <link href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

        <!-- signature-pad -->
        <link href="{{ asset('libs/signature_pad/css/signature-pad.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('page_title')
<h4 class="page-title mb-2"><i class="mdi mdi-grease-pencil mr-2"></i>توقيع  العميل</h4>  
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">لوحة التحكم    </a></li>
    <li class="breadcrumb-item"><a href="/FirstForms">عرض نماذج التسربات الداخلية للمباني    </a></li>
    <li class="breadcrumb-item active"> توقيع نموذج فحص التسربات الداخلية للمباني </li>
</ol>
@endsection
@section('content')
<!-- Main content -->
<form id="form" method="POST" action="/ClientSignature/{{$Form->id}}" enctype="multipart/form-data">
  @csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h4 class="mt-0 header-title">
                        <div class="avatar-box thumb-sm align-self-center mr-2">
                            <span class="avatar-title bg-primary rounded-circle"><i class="mdi mdi-grease-pencil"></i></span>
                        </div>توقيع العميل
                    </h4> <br>
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
                                  <button type="button" class="btn btn-info btn-round waves-effect waves-light" data-action="change-color" hidden="">Change color</button>
                                </div>
                                <input type="hidden" id="image_client" name="image_client" value="">
                                <div>
                                  <button type="submit" class="btn btn-success btn-round waves-effect waves-light save" data-action="save-png"><i class="mdi mdi-content-save mr-2"></i>حفظ</button>
                                </div> 
                              </div> <!-- end signature-pad--actions --> 
                            </div> <!-- end signature-pad--footer --> 
                          </div> <!-- end signature-pad --> 
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div> <!-- end card-body -->
                    <div class="card-footer">
                        <a href="/FirstForms"><button type="button" class="btn btn-warning btn-round waves-effect waves-light"><i class="mdi mdi-backup-restore mr-1"></i>رجوع إلى نموذج فحص التسربات الداخلية للمباني</button></a>
                    </div>                                         
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
</div><!-- container -->
</form>
@endsection
@section('javascript')

    <!-- Sweet-Alert  -->
    <script src="{{ asset('plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('pages/jquery.sweet-alert.init.js') }}"></script>
    
    <!-- signature_pad js -->
    <script src="{{ asset('libs/signature_pad/js/signature_pad.js') }}"></script>
    <script src="{{ asset('libs/signature_pad/js/app.js') }}"></script>

    <!-- Other Scripts -->
    <script type="text/javascript">
      $(document).ready(function(){
        $('#form').submit(function() {
            if (signaturePad.isEmpty()) {
              swal('أسف!','يرجى التوقيع.','error');
              return false;
            } else {
              var dataURL = signaturePad.toDataURL();
              $('#image_client').val(dataURL);
              //download(dataURL, "signature.png");
            }
          });
        });
    </script>

@endsection