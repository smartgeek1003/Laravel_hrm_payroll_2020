@extends('administrator.master')
@section('title', __('Add File'))
@section('main_content')
<div class="content-wrapper wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        {{ __('FILES') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }} </a></li>
            <li><a href=""> {{ __('Files') }}</a></li>
            <li class="active"> {{ __('Import file') }}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"> {{ __('Import the Attendance Report File  from the Machine') }}</h3>
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

                    <form action="{{ url('import-excel') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="col-md-6">
                            <label for="file_name">{{ __('Chose XLSX File') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('file_name') ? ' has-error' : '' }} has-feedback">
                                <input type="file" name="import_file" id="file_name" class="form-control" value="{{ old('file_name') }}" placeholder="{{ __('Enter client name..') }}">
                                @if ($errors->has('file_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('file_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success"><i class="icon fa fa-plus"></i> {{ __('Import XL file') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form method="post" action="{{url('/my/attendance/view')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <label for="file_name">{{ __('Chose CSV File') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('file_name') ? ' has-error' : '' }} has-feedback">
                                <input type="file" name="mycsv" id="file_name" class="form-control" value="{{ old('file_name') }}" placeholder="{{ __('Enter client name..') }}">
                                @if ($errors->has('file_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('file_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary"><i class="icon fa fa-plus"></i> {{ __('Import CSV file') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>



                     
                    
                    
                </div>








                <div class="col-md-12">
        <!-- Default box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('Attendance Report') }}</h3>
          </div>
          <div class="box-body">
            <!-- Notification Box -->
            <div class="col-md-12">
              <table class="table table-bordered">
               <tr class="bg-info">
                <th>{{ __('sl#') }}</th>
                <th>{{ __('Employee ID') }}</th>
                <th>{{ __('Employee Name') }}</th>
                 <th>{{ __('Date') }}</th>
                <th>{{ __('In Time') }}</th>
                <th>{{ __('Out Time') }}</th>
                <th>{{ __('Work Time') }}</th>
                <th>{{ __('Late') }}</th>
                <th>{{ __('Early') }}</th>
                <th>{{ __('Absence') }}</th>
              </tr>
<?php $myattds=\App\Myattendance::all();?>

              @php($sl = 1)
              @foreach($myattds as $myattd)
              <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $myattd->empidno }}</td>
                <td>{{ $myattd->name }}</td>
                <td>{{ date("F Y", strtotime($myattd->date)) }}</td>

                <td>{{ $myattd->check_in }}</td>
                <td>{{ $myattd->check_out }}</td>
                <td>{{ $myattd->atttime }}</td>
                <td>{{ $myattd->late }}</td>
                <td>{{ $myattd->early }}</td>
                <td>{{ $myattd->absent }}</td>

               
              </tr>
              @endforeach
            </table>
          </div>
          <!-- /. end col -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.end.col -->

                
    
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