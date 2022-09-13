@extends('administrator.master')
@section('title', __('Attendance Manage'))
@section('main_content')
<div class="content-wrapper wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"> {{ __('Attendance Manage') }}</h3>
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
                

        <!-- Default box -->
        <div class="box box-primary">
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
                <th>{{ __('Action') }}</th>
              </tr>
<?php 
$myattds=\App\Myattendance::all();
?>

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
                <td><a href="{{url('/machine/attendance/edit/'.$myattd->id)}}" class="btn btn-success">{{__('Edit')}}</a></td>

               
              </tr>
              @endforeach
            </table>
          </div>
          <!-- /. end col -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.end.col -->
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