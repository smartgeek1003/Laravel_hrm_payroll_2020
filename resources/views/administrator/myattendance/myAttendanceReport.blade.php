@extends('administrator.master')
@section('title', __('Attendance Report'))
@section('main_content')
<div class="content-wrapper wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"> {{ __('Attendance Report') }}</h3>
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



               <form class="form-horizontal" action="{{ url('/machine/attendance/report/details') }}" method="post">
            {{ csrf_field() }}



            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
              <label for="user_id" class="col-sm-3 control-label">{{ __('Employee Name') }}</label>
              <div class="col-sm-3">
                <select name="empname" id="empname" class="form-control">
                  <option selected disabled>{{ __('Select One') }}</option>

                  <?php 
$myattds=\App\Myattendance::all();
$groupmyattds=DB::table('myattendances')
        ->select('name', DB::raw('count(*) as total'))
        ->groupBy('name')
        ->get();

?>

                  @foreach($groupmyattds as $groupmyattd)
                  
                  <option value="{{ $groupmyattd->name }}"><strong>{{ $groupmyattd->name }}</option>
                    @endforeach
                  </select>
                
                </div>
              </div>


               <!-- /.end group -->
              <div class="form-group{{ $errors->has('salary_month') ? ' has-error' : '' }}">
                <label for="salary_month" class="col-sm-3 control-label">{{ __('Select Month') }}</label>
                <div class="col-sm-3">

                    <input type="text" name="daterange" class="form-control" id="reservation">

                </div>
              </div>

             
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-arrow-right"></i> {{ __('View Salary Statement') }}</button>
                </div>
              </div>
              <!-- /.end group -->
            </form>
            <!-- /. end form -->  

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
              </tr>

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