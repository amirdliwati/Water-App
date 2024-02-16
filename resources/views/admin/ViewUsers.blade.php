@extends('layouts.app')
@section('css')

		<title>{{ config('app.name') }} Users</title>

        <!-- DataTables -->
        <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Sweet Alert -->
        <link href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
        <!-- switch -->
        <link href="{{ asset('plugins/switch/switch.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('page_title')
<!-- Page-Title -->
    <h4 class="page-title mb-2"><i class="mdi mdi-monitor mr-2"></i>لوحة التحكم   </h4>  
    <div class="">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">لوحة التحكم    </a></li>
            <li class="breadcrumb-item active">  عرض المستخدمين  </li>
        </ol>
    </div>      
@endsection

@section('content')
<!-- Main content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-primary text-white mt-0"><i class="mdi dripicons-user mr-1"></i>  عرض المستخدمين  </h5>
                <div class="card-body">
                    <div class="row form-material">
                        <table id="user-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>البريد الألكتروني</th>
                                <th>الاسم</th>
                                <th>  رقم الجوال </th>
                                <th> الفرع </th>
                                <th> الحالة  </th>
                                <th> تعديل  </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->users_profile->first_name}}{{__('  ')}}{{$user->users_profile->last_name}}</td>
                                <td>{{$user->users_profile->mobile}}</td>
                                <td>{{$user->users_profile->branch->name}}</td>
                                @if($user->status == 1)
                                  <td>
                                    <input type="checkbox" id="status{{$user->id}}" switch="bool" checked onclick="StatusUser('{{$user->id}}')">
                                    <label for="status{{$user->id}}" data-on-label="On" data-off-label="Off"></label>
                                  </td>
                                @else
                                  <td>
                                    <input type="checkbox" id="status{{$user->id}}" switch="bool" onclick="StatusUser('{{$user->id}}')">
                                    <label for="status{{$user->id}}" data-on-label="On" data-off-label="Off"></label>
                                  </td>
                                @endif
                                <td>
                                    <a href="/EditUser/{{$user->id}}"><button type="button" class="btn btn-outline-warning waves-effect waves-light"><i class="mdi mdi-account-edit-outline mr-1"></i>تعديل  </button></a>
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

        $('#user-table').DataTable({
              "order": [[ 0, "desc" ]]
            });
        </script>

        <script type="text/javascript">
            function StatusUser(id) {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      swal({title: 'نجاح العملية !',text: ' تم تغييرحالة المستخدم بنجاح  ',type: 'success',})
                  }
              };
              
              xmlhttp.open("GET", "{{url('status-user')}}?id_user="+id, true);
              xmlhttp.send();
            };
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