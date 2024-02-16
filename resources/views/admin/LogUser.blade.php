@extends('layouts.app')
@section('css')

    <title>{{ config('app.name') }} Logs </title>

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
            <li class="breadcrumb-item active">  سجل المستخدمين  </li>
        </ol>
    </div>      
@endsection

@section('content')
<!-- Main content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-primary text-white mt-0"><i class="mdi dripicons-user mr-1"></i>  عرض سجل المستخدمين  </h5>
                <div class="card-body">
                    <div class="row form-material">
                        <table id="log-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>التاريخ</th>
                                <th> الأسم </th>
                                <th> المهمة </th>
                                <th>  رقم العملية   </th>
                                <th>  رمز العملية </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($logs as $log)
                            <tr>
                                <td>{{$log->user->created_at}}</td>
                                <td>{{$log->user->name}}</td>
                                <td>{{$log->title}}</td>
                                <td>{{$log->operating_name}}</td>
                                <td>{{$log->operating_code}}</td>
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

        $('#log-table').DataTable({
              "order": [[ 0, "desc" ]]
            });
        </script>

        <script type="text/javascript">
            function DeleteUser(id) {
                swal({
                    title: 'تحذير  ',
                    text: '   هل تريد حذف المستخدم ؟ ',
                    type: 'warning',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-danger ml-2',
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> Yes',
                    cancelButtonText: '<i class="fa fa-thumbs-down"></i> No',
                        preConfirm: function (){
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                swal({title: 'نجاح العملية !',text: 'تم حذف المستخدم بنجاح  ',type: 'success',
                                        preConfirm: function (){location.reload();}
                                      })

                            }
                        };
                        
                        xmlhttp.open("GET", "{{url('delete-user')}}?id_user="+id, true);
                        xmlhttp.send();
                    }
                })
            };
        </script>
@endsection