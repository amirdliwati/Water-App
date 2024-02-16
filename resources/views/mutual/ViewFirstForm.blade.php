@extends('layouts.app')
@section('css')

		<title>{{ config('app.name') }} First Forms</title>

        <!-- DataTables -->
        <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Sweet Alert -->
        <link href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('page_title')
<!-- Page-Title -->
    <h4 class="page-title mb-2"><i class="mdi mdi-monitor mr-2"></i>لوحة التحكم   </h4>  
    <div class="">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">لوحة التحكم    </a></li>
            <li class="breadcrumb-item active">  عرض نماذج التسربات الداخلية للمباني  </li>
        </ol>
    </div>      
@endsection

@section('content')
<!-- Main content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-success text-white mt-0"><i class="mdi mdi-certificate mr-1"></i>  جميع نماذج فصح التسربات الداخلية للمباني  </h5>
                <div class="card-body">
                    <div class="row form-material">
                        <table id="form-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>اسم الموظف</th>
                                <th>الفرع</th>
                                <th>  تاريخ الشكوى </th>
                                <th> اسم العميل </th>
                                <th> رقم الجوال  </th>
                                <th>عرض</th>
                                <th> تعديل  </th>
                                <th>توقيع العميل</th>
                                <th> حذف  </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($FirstForms as $FirstForm)
                            <tr>
                                <td>{{$FirstForm->id}}</td>
                                <td>{{$FirstForm->employee_name}}</td>
                                <td>{{$FirstForm->user->users_profile->branch->name}}</td>
                                <td>{{$FirstForm->general_informatione->date}}</td>
                                <td>{{$FirstForm->general_informatione->name}}</td>
                                <td>{{$FirstForm->general_informatione->phone_number}}</td>
                                <td><a href="/Previwform1/{{$FirstForm->id}}" target="_blank" class="btn btn-outline-info waves-effect waves-light"><i class="mdi dripicons-preview mr-2"></i>  عرض   </a></td>
                                <td>
                                    <a href="/EditForm1/{{$FirstForm->id}}"><button type="button" class="btn btn-outline-warning waves-effect waves-light"><i class="mdi mdi-circle-edit-outline mr-2"></i>تعديل  </button></a>
                                </td>
                                <td>
                                    <a href="/ClientSignature/{{$FirstForm->id}}"  class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-grease-pencil mr-2"></i>توقيع</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger waves-effect waves-light" onclick="DeleteForm('{{$FirstForm->id}}')"><i class="mdi dripicons-trash mr-2"></i> خذف  </button>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                                      
                    </div> <!-- end row --> 
                </div> <!-- end card-body -->
                    <div class="card-footer">                       
                        <a href="/"><button type="button" class="btn btn-warning btn-round waves-effect waves-light"><i class="mdi mdi-backup-restore mr-1"></i>  الرجوع للقائمة الرئيسية  </button></a>
                    </div>                                         
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row --> 
</div><!-- container -->
@endsection

@section('javascript')

        <!-- Required datatable js -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('pages/jquery.datatable.init.js') }}"></script>

        <!-- Sweet-Alert  -->
        <script src="{{ asset('plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('pages/jquery.sweet-alert.init.js') }}"></script>

        <!-- Other Scripts -->
        <script type="text/javascript">

        $('#form-table').DataTable({
              "order": [[ 0, "desc" ]]
            });
        </script>

        <script type="text/javascript">
            function DeleteForm(id) {
                swal({
                    title: 'تحذير  ',
                    text: '  هل أنت متأكد من حذف النموذج ؟  ',
                    type: 'warning',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-danger ml-2',
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> نعم',
                    cancelButtonText: '<i class="fa fa-thumbs-down"></i> لا',
                        preConfirm: function (){
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                var obj = JSON.parse(this.responseText);
                                swal({title: 'نجاح العملية! ',text: 'تم حذف النموذج بنجاح   ',type: 'success',
                                        preConfirm: function (){location.reload();}
                                      })
                            }
                        };
                        
                        xmlhttp.open("GET", "{{url('delete-first-form')}}?id_form="+id, true);
                        xmlhttp.send();
                    }
                })
            };
        </script>
@endsection