@extends('layouts.app')
@section('css')
		<title>{{ config('app.name') }} Access Denied</title>
@endsection
@section('content')
<!-- Page Content-->
<div class="container-fluid"> 
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 p-0 align-self-center">
                            <img src="{{ asset('images/server-error.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <div class="error-content text-center">
                                <h1 class="">Access Denied!</h1>
                                <h4 class="text-primary">Looks like you've got lost...</h3><br>
                                <a class="btn btn-primary mb-5 waves-effect waves-light" href="/">Back to Dashboard</a>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end card-->    
        </div><!--end col-->
    </div><!--end row-->
</div><!-- container -->
@endsection

@section('javascript')

@endsection