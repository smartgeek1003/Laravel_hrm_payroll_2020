@extends('administrator.master')
@section('title', __('Update Attendance'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('ALREADY ATTENDANCED') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }}  </a></li>
            <li><a>{{ __('Attendance') }} </a></li>
            <li class="active">{{ __('Update Attendance') }} </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title btn-danger">{{ __('Completed Attendance') }}  </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <form action="{{ url('/hrm/attendance/set') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="input-group margin">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="date" class="form-control" id="datepicker3" value="{{ $date }}">
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
            <form action="{{ url('/hrm/attendance/update') }}" name="attendance_update_form" method="post">
                {{ csrf_field() }}
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('SL#') }}</th>
                            <th>{{ __('Employee Name') }}</th>
                            <th>{{ __('Designation') }}</th>
                            <th  class="text-center">{{ __('Attendance') }}</th>
                            <th>{{ __('Leave Category') }}</th>
                            <th>{{ __('In Time') }}</th>
                            <th>{{ __('Out Time') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($sl = 1)
                        @foreach($employees as $employee)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>
                                <a href="{{ url('/hrm/attendance/details/' . $employee['id']) }}">{{ $employee['name'] }}</a>
                                <input type="hidden" name="user_id[]" value="{{ $employee['id'] }}">
                                <input type="hidden" name="attendance_date[]" value="{{ $date }}">
                            </td>
                            <td>{{ $employee['designation'] }}</td>
                            @foreach($attendances as $attendance)
                            @if($employee['id'] == $attendance['user_id'])
                            <input type="hidden" name="attendance_id[]" value="{{ $attendance['id'] }}">

                            <td  class="text-center">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>

                                            @if($attendance['attendance_status'] == 1)
                                                <input type="hidden" name="attendance_status[]" value="1"><input checked type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                                            @else
                                                <input type="hidden" name="attendance_status[]" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                                            @endif
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select name="leave_category_id[]" id="leave_category_id_{{ $employee['id'] }}" class="form-control">
                                        <option selected value="0">{{ __('Select one') }}</option>
                                        @foreach($leave_categories as $leave_category)
                                        <option value="{{ $leave_category['id'] }}">{{ $leave_category['leave_category'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <script type="text/javascript">
                                document.forms['attendance_update_form'].elements['leave_category_id_{{ $employee['id'] }}'].value = "{{ $attendance['leave_category_id'] }}";
                            </script>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="check_in[]" value="{{ $attendance['check_in'] }}" class="form-control">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="text" name="check_out[]" value="{{ $attendance['check_out'] }}" class="form-control">
                                    </div>
                                </div>
                            </td>
                            @endif
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><button type="submit" class="btn btn-primary btn-flat pull-right"><i class="icon fa fa-edit"></i> {{ __('Update') }}</button></td>
                        </tr>
                    </tfoot>
                </table>
            </form>
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