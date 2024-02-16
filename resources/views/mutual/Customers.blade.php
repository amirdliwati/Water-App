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

                            @foreach ($Customers as $Customer)
                            <tr>
                                <td>{{$Customer->fourth_form->id}}</td>
                                <td>{{$Customer->fourth_form->date}}</td>
                                <td>{{$Customer->fourth_form->user->users_profile->branch->name}}</td>
                                <td>{{$Customer->name}}</td>
                                <td>{{$Customer->address}}</td>
                                <td>{{$Customer->time}}</td>
                                <td>{{$Customer->type}}</td>
                                <td>{{$Customer->price}}</td>
                                <td>{{$Customer->phone_number}}</td>
                                <td>{{$Customer->maintenance_type}}</td>
                                <td>{{$Customer->maintenance_price}}</td>
                                <td>{{$Customer->remaining_price}}</td>
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

        <!-- Modals -->
        <script src="{{ asset('plugins/custombox/custombox.min.js') }}"></script>
        <script src="{{ asset('plugins/custombox/custombox.legacy.min.js') }}"></script>

        <!-- Other Scripts -->
        <script type="text/javascript">
            $('#form-table').DataTable({
              "order": [[ 0, "desc" ]]
            });
        </script>
@endsection