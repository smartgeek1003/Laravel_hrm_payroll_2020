@extends('administrator.master')
@section('title', __('Add File'))
@section('main_content')
<div class="content-wrapper wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        {{ __('Attendance Setting') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }} </a></li>
            <li><a href=""> {{ __('Attendance') }}</a></li>
            <li class="active"> {{ __('Attendance System') }}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{__('Manage the Software of Attendance Machine [ZKTeco F18] ')}} </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                
                
               

                 <div class="row">
                   
                    <div class="col-md-6">
                        <br><label> {{ __('Step 01: Open and start the Attendance Machine Software') }}</label>
                        <img src="{{asset('public/images/attd/1.jpg')}}" class="img-responsive">
                        
                    </div>
                    <div class="col-md-6">
                        <br><label> {{ __('Step 02: Click the OK Button ') }}</label>
                        <img src="{{asset('public/images/attd/2.jpg')}}" class="img-responsive">
                    </div>
                     <div class="col-md-6">
                        <br><label> {{ __('Step 03: Select the Device and Click the Connect in the software ') }}</label>
                        <img src="{{asset('public/images/attd/3.jpg')}}" class="img-responsive">
                        
                    </div>
                    <div class="col-md-6">
                        <br><label> {{ __('Step 04: Create All Employee Records like Enrollment or Registration ') }}</label>
                        <img src="{{asset('public/images/attd/4.jpg')}}" class="img-responsive">
                    </div>
                     <div class="col-md-6">
                        <br><label> {{ __('Step 05: After recorded, must be Upload and Download from left Button') }}</label>
                        <img src="{{asset('public/images/attd/5.jpg')}}" class="img-responsive">
                        
                    </div>
                    <div class="col-md-6">
                       <br> <label> {{ __('Step 06: Select the report for calculatation by date wise. ') }}</label>
                        <img src="{{asset('public/images/attd/6.jpg')}}" class="img-responsive">
                    </div>
                     <div class="col-md-6">
                       <br> <label> {{ __('Step 07: View the attendance reports by the dates') }}</label>
                        <img src="{{asset('public/images/attd/7.jpg')}}" class="img-responsive">
                        
                    </div>
                    <div class="col-md-6">
                        <br><label> {{ __('Step 08: Export the Attendance Report ') }}</label>
                        <img src="{{asset('public/images/attd/8.jpg')}}" class="img-responsive">
                    </div>
                     <div class="col-md-6">
                        <br><label> {{ __('Step 09: Save the  Attendance Report in your PC') }}</label>
                        <img src="{{asset('public/images/attd/9.jpg')}}" class="img-responsive">
                        
                    </div>
                    <div class="col-md-6">
                       <br> <label> {{ __('Step 10: Export the Attendance Report in your HRM Software ') }}</label>
                        <img src="{{asset('public/images/attd/10.jpg')}}" class="img-responsive">
                    </div>
                </div>


                 <div class="row">

                     <hr>
                    <div class="col-md-12"><h3 class="box-title">{{__('Manage the Device of Attendance Machine')}} </h3></div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label> {{ __('Step 01: Setup the Attendance Machine by IP') }}</label>
                        <img src="{{asset('public/images/attd/h1.jpg')}}" class="img-responsive">
                    </div>
                        
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label> {{ __('Step 02: Select the User Management in the Machine') }}</label>
                        <img src="{{asset('public/images/attd/h2.jpg')}}" class="img-responsive">
                    </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                        <label> {{ __('Step 03: Go to the All User Management') }}</label>
                        <img src="{{asset('public/images/attd/h3.jpg')}}" class="img-responsive">
                    </div>
                    </div>

                     <div class="col-md-4">
                       <div class="form-group">
                        <label> {{ __('Step 04: Select the One User and go') }}</label>
                        <img src="{{asset('public/images/attd/h4.jpg')}}" class="img-responsive">
                    </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-group">
                        <label> {{ __('Step 05: Select the finger for print by the user') }}</label>
                        <img src="{{asset('public/images/attd/h5.jpg')}}" class="img-responsive">
                    </div>
                    </div>
                </div>
                
                
                
            </div>
            
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
document.forms['file_name_add_form'].elements['publication_status'].value = "{{ old('publication_status') }}";
</script>
@endsection