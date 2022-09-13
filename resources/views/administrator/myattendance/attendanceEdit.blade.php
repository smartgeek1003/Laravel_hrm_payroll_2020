@extends('administrator.master')
@section('title', __('Edit Attendance'))
@section('main_content')
<div class="content-wrapper wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        {{ __('Edit Attendance Machine File') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }} </a></li>
            <li><a href=""> {{ __('Attendance') }}</a></li>
            <li class="active"> {{ __('Edit') }}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"> {{ __('Update the Attendance Report File  from the Machine') }}</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="row">
                <!-- Notification Box -->
                <div class="col-md-12">
                    @if (!empty(Session::get('message')))
                    <div class="alert alert-success alert-dismissible" id="notification_box">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-check"></i> {{ Session::get('message') }}
                    </div>
                    @elseif (!empty(Session::get('exception')))
                    <div class="alert alert-warning alert-dismissible" id="notification_box">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                    </div>
                    @else
                   
                    @endif
                </div>
                <!-- /.Notification Box -->
            </div>
            
            <div class="box-body">
                
                
                <div class="row">

                    <form action="{{ url('/machine/attendance/update') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}



                    @foreach($myattds as $myattd)

                    <input type="hidden" name="id" class="form-control" value="{{ $myattd->id }}">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="file_name">{{ __('In Time') }} <span class="text-danger">*</span></label>
                                <input type="text" name="check_in" class="form-control" value="{{ $myattd->check_in }}">
                            </div>
                            <div class="form-group">
                                <label for="file_name">{{ __('Out Time') }} <span class="text-danger">*</span></label>
                                <input type="text" name="check_out" class="form-control" value="{{ $myattd->check_out }}">
                            </div>
                            <div class="form-group">
                                <label for="file_name">{{ __('Work Time') }} <span class="text-danger">*</span></label>
                                <input type="text" name="atttime" class="form-control" value="{{ $myattd->atttime }}">
                            </div>
                            <div class="form-group">
                                <label for="file_name">{{ __('Late') }} <span class="text-danger">*</span></label>
                                <input type="text" name="late" class="form-control" value="{{ $myattd->late }}">
                            </div>
                            <div class="form-group">
                                <label for="file_name">{{ __('Early') }} <span class="text-danger">*</span></label>
                                <input type="text" name="early" class="form-control" value="{{ $myattd->early }}">
                            </div>
                            <div class="form-group">
                                <label for="file_name">{{ __('Absent/Leave') }} <span class="text-danger">*</span></label>
                                <select name="absent" class="form-control"> 
                                    <option value="{{$myattd->absent}}">@if($myattd->absent==NULL) {{__('Current Leave')}} @else {{__('Current Absent')}} @endif</option>
                                    <option value="True">{{__('')}}Absent</option>
                                    <option value="Leave">{{__('')}}Leave</option>
                                </select>
                               
                            </div>
                           @endforeach
                            <div class="form-group">
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success"><i class="icon fa fa-plus"></i> {{ __('Update Attendance') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>

                   


                     
                    
                    
                </div>






                
    
            </div>
            <!-- /.box-body -->


 





            
            
            
           


            
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
document.forms['file_name_add_form'].elements['publication_status'].value = "{{ old('publication_status') }}";
</script>
@endsection