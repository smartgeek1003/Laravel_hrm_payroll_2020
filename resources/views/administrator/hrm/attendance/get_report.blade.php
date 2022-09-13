@extends('administrator.master')
@section('title', __('Set Attendance'))

@section('main_content')

<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          {{ __(' ATTENDANCE REPORT') }}  
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }}  </a></li>
            <li><a>{{ __('Attendance') }} </a></li>
            <li class="active">{{ __('Attendance Report') }} </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Attendance Report') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <form action="{{ url('/hrm/attendance/get-report') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="input-group margin">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="date" class="form-control" id="monthpicker2" value="{{ $date }}">
                                    <span class="input-group-btn">
                                      <button type="submit" class="btn btn-info btn-flat"><i class="icon fa fa-arrow-right"></i> {{ __('Go') }}</button>
                                  </span>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <!-- /. end col -->
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
                @endif
            </div>
            <!-- /.Notification Box -->
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('Employee Name') }}</th>
                            @for($i=1; $i<=$number_of_days; $i++)
                            <th class="text-center">{{ $i }}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td><a href="{{ url('/people/employees/details/' . $employee['id']) }}">{{ $employee['name'] }}</a></td>
                            @for($i = 1; $i <= $number_of_days; $i++)
                            <td class="text-center">
                                @if($i>=1 AND $i<=9)
                                @php($day = $date."-0".$i)
                                @else
                                @php($day = $date."-".$i)
                                @endif
                                @php($day_name = date("D", strtotime($day)))

                                @foreach($monthly_holidays as $monthly_holiday)
                                @if($day == $monthly_holiday['date'])
                                <span class="btn btn-xs btn-danger btn-flat" data-toggle="tooltip" data-original-title="{{ $monthly_holiday['holiday_name'] }}">{{ __('H') }}</span>
                                @endif
                                @endforeach

                                @foreach($weekly_holidays as $weekly_holiday)
                                @if($day_name == $weekly_holiday['day'])
                                <span class="btn btn-xs btn-danger btn-flat" data-toggle="tooltip" data-original-title="Weekly Holiday">{{ __('H') }}</span>
                                @endif
                                @endforeach

                                @foreach($attendances as $attendance)
                                @if($attendance['user_id'] == $employee['id'])
                                @if($attendance['attendance_date'] == $day)
                                @if($attendance['attendance_status'] == 1)
                                <span class="btn btn-xs btn-success btn-flat" data-toggle="tooltip" data-original-title="Present"> {{ __('P') }} </span>
                                @endif
                                @if($attendance['attendance_status'] == 0)
                                
                                @if($attendance['leave_category_id'] == 0)
                                <span class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" data-original-title="Absence">{{ __('A') }}</span> 
                                @else
                                <span class="btn btn-xs btn-info btn-flat" data-toggle="tooltip" data-original-title="{{ $attendance['leave_category'] }}">{{ __('L') }}</span>
                                @endif
                                
                                @endif
                                @endif
                                @endif
                                @endforeach
                            </td>
                            @endfor
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
</div>
<script type="text/javascript">
    $(document).ready(function(){

    });
</script>
@endsection