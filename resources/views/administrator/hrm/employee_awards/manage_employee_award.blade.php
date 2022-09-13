@extends('administrator.master')
@section('title', __('Employee Award'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('MANAGE EMPLOYEE AWARD') }}  
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }} </a></li>
            <li><a>{{ __('Setting') }} </a></li>
            <li class="active">{{ __('Manage employee awards') }} </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Manage employee awards') }} </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <a href="{{ url('/hrm/employee-awards/create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i>{{ __(' Add employee award') }}</a>
                </div>
                
                <div  class="col-md-6">
                    <input type="text" id="myInput" class="form-control" placeholder="{{ __('Search..') }}">
                </div>
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
                    @endif
                </div>
                <!-- /.Notification Box -->
                <div class="col-md-12 table-responsive">
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('SL#') }}</th>
                                <th>{{ __('Employee Name') }}</th>
                                <th>{{ __('Award Category') }}</th>
                                <th>{{ __('Gift') }}</th>
                                <th>{{ __('Month') }}</th>
                                <th>{{ __('Award Details') }}</th>
                                <th>{{ __('Created at') }}</th>
                                <th class="text-center">{{ __('Status') }}</th>
                                <th class="text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                          @php($sl=1)
                          @foreach($employee_awords as $employee_aword)
                            <tr>
                                <td>{{$sl ++}}</td>
                                <td>
                                @foreach($employees as $employee)
                                  @if($employee['id'] == $employee_aword['employee_id'])
                                {{ $employee['name'] }}
                              @endif
                              @endforeach
                              </td>
                                <td>{{ $employee_aword['award_title'] }}</td>
                                <td>{{ $employee_aword['gift_item'] }}</td>
                                <td>{{ date("d F Y", strtotime($employee_aword['select_month'])) }}</td>
                                <td>{{str_limit($employee_aword['description'], 65)}}</td>
                                <td>{{ date("D d F Y h:ia", strtotime($employee_aword['created_at'])) }}</td>
                                <td class="text-center">
                                  @if( $employee_aword['publication_status'] == 1)
                                    <span class="label label-success">{{ __('Published') }}</span>
                                @else
                                <span class="label label-warning">{{ __('Unpublished') }}</span>
                                  @endif

                                </td>
                                <td class="text-center">
                                   <a href="{{ url('/hrm/employee-awards/edit/' . $employee_aword['id']) }}"><i class="icon fa fa-edit"></i> {{ __('Edit') }}</a>
                                </td>
                            </tr>
                          @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
@endsection
