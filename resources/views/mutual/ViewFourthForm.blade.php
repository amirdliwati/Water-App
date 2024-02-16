@extends('layouts.app')
@section('css')

		<title>{{ config('app.name') }} Fourth Forms</title>

        <!-- DataTables -->
        <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Sweet Alert -->
        <link href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

        <!-- Modals -->
        <link href="{{ asset('plugins/custombox/custombox.min.css') }}" rel="stylesheet" type="text/css">

@section('page_title')
<!-- Page-Title -->
    <h4 class="page-title mb-2"><i class="mdi mdi-monitor mr-2"></i>لوحة التحكم   </h4>  
    <div class="">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">لوحة التحكم    </a></li>
            <li class="breadcrumb-item active">  عرض العملاء  </li>
        </ol>
    </div>      
@endsection

@section('content')
<!-- Main content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-success text-white mt-0"><i class="mdi mdi-certificate mr-1"></i>  جميع العملاء   </h5>
                <div class="card-body">
                    <div class="row form-material">
                        <table id="form-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th> التاريخ   </th>
                                <th>  الفرع   </th>
                                <th> عرض التفاصيل </th>
                                <th> طباعة </th>
                                <th> حذف  </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($Forms as $Form)
                            <tr>
                                <td>{{$Form->id}}</td>
                                <td>{{$Form->date}}</td>
                                <td>{{$Form->user->users_profile->branch->name}}</td>
                                <td><button type="button" class="btn btn-outline-info waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target="#modaldetailsform4{{$Form->id}}"> <i class="mdi dripicons-preview mr-2"></i>  عرض   </button></td>
                                <td><a href="/Previwform4/{{$Form->id}}" target="_blank" class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-printer mr-2"></i>   طباعة   </a></td>
                                <td><button type="button" class="btn btn-outline-danger waves-effect waves-light" onclick="DeleteForm('{{$Form->id}}')"><i class="mdi dripicons-trash mr-2"></i> خذف  </button></td>
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

    @foreach($Forms as $Form)
    <!-- Large modal View Details Products -->
    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" id="modaldetailsform4{{$Form->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">التفاصيل</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">                      
                    <div class="row form-material">
                        <div class="col-md-12">
                           <table id="item-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                  <tr>
                                    <th>الاسم</th>
                                    <th>الحي </th>
                                    <th>الوقت</th>
                                    <th>نوع العقار </th>
                                    <th>السعر </th>
                                    <th>رقم الجوال </th>
                                    <th>نوع الصيانة </th>
                                    <th> سعر الصيانة</th>
                                    <th>السعر المتبقي </th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($Form->fourth_forms_details as $FormDetail)
                                  <tr>   
                                    <td>{{$FormDetail->name}}</td>
                                    <td>{{$FormDetail->address}}</td>
                                    <td>{{$FormDetail->time}}</td>
                                    <td>{{$FormDetail->type}}</td>
                                    <td>{{$FormDetail->price}}</td>
                                    <td>{{$FormDetail->phone_number}}</td>
                                    <td>{{$FormDetail->maintenance_type}}</td>
                                    <td>{{$FormDetail->maintenance_price}}</td>
                                    <td>{{$FormDetail->remaining_price}}</td>
                                  </tr>
                                    @endforeach
                                </tbody>
                            </table><!--end table-->
                        </div> <!-- end col -->                    
                    </div> <!-- end row -->
                </div><!-- /.modal-body -->
                    </br>                        
                <div class="modal-footer bg-info">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endforeach

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

        <!-- Modals -->
        <script src="{{ asset('plugins/custombox/custombox.min.js') }}"></script>
        <script src="{{ asset('plugins/custombox/custombox.legacy.min.js') }}"></script>

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
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> Yes',
                    cancelButtonText: '<i class="fa fa-thumbs-down"></i> No',
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