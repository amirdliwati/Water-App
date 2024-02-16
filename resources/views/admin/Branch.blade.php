@extends('layouts.app')
@section('css')

		<title>{{ config('app.name') }} Branches</title>
        <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('page_title')
<!-- Page-Title -->
    <h4 class="page-title mb-2"><i class="mdi mdi-monitor mr-2"></i>لوحة التحكم   </h4>  
    <div class="">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">لوحة التحكم    </a></li>
            <li class="breadcrumb-item active">  الفروع  </li>
        </ol>
    </div>      
@endsection
@section('content')
<!-- Main content -->
<form id="branch" method="POST" action="/Branches">
  @csrf
  	<div class="container-fluid"> 
		<div class="row">
		    <div class="col-md-12">
		        <div class="card">
		        	<h5 class="card-header bg-info text-white mt-0"><i class="mdi mdi-home mr-1"></i> اضافة فرع </h5>
		            <div class="card-body"> 
		                <div class="form-group row">
		                    <div class="col-md-6">
		                    	<label for="code" class="col-form-label text-right">كود الفرع</label>
		                    	<input type="text" class="form-control @error('code') is-invalid @enderror" placeholder="" id="code" name="code" value="{{ old('code') }}" autocomplete="code" maxlength="6" minlength="3" autofocus required>
                                @error('code')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
		                    </div>
		                    <div class="col-md-6">
		                    	<label for="name" class="col-form-label text-right">اسم الفرع</label>
		                    	<input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="" id="name" name="name" value="{{ old('name') }}" autocomplete="name" maxlength="50" minlength="3" autofocus required>
                                @error('name')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
		                    </div>
		                </div><br>
		                <button type="submit" class="btn btn-primary btn-round waves-effect waves-light"><i class="mdi mdi-home-plus mr-2"></i> حفظ الفرع </button>
		            </div>
		        </div>                                        
		    </div> <!-- end col -->
		</div> <!-- end row --> 

		<div class="row">
		    <div class="col-md-12">
		        <div class="card">
		        	<h5 class="card-header bg-success text-white mt-0"><i class="mdi mdi-home mr-1"></i>جميع الفروع</h5>
		            <div class="card-body"> 
		                <div class="row form-material">
		                    <table id="branchtbl" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
		                        <thead>
		                        <tr>
		                            <th>id</th>
		                            <th>الكود</th>
		                            <th>اسم الفرع</th>
		                        </tr>
		                        </thead>
		                        <tbody>
		                    	@foreach ($branches as $branch)
		                        <tr>
		                            <td>{{$branch->id}}</td>
		                            <td>{{$branch->code}}</td>
		                            <td>{{$branch->name}}</td>
		                        </tr>
		                        @endforeach
		                        </tbody>
		                    </table>
		                </div>	                
		            </div>
		        </div>                                        
		    </div> <!-- end col -->
		</div> <!-- end row --> 
	</div><!-- container -->
</form>
@endsection

@section('javascript')

		<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('pages/jquery.forms-advanced.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Buttons examples -->
        <script src="{{ asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/buttons.colVis.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('pages/jquery.datatable.init.js') }}"></script>

        <!-- Other Scripts -->
        <script type="text/javascript">

        $('input#code').maxlength({warningClass: "badge badge-info",limitReachedClass: "badge badge-warning"});
        $('input#name').maxlength({warningClass: "badge badge-info",limitReachedClass: "badge badge-warning"});
        $('#branchtbl').DataTable({order:[0, 'desc'] , "columnDefs": [{ "visible": false, "targets": 0 } ]}); 
        </script>

@endsection