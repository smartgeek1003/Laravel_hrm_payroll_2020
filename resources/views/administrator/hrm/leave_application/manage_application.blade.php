<?php
use Carbon\Carbon;
?>
@extends('administrator.master')
@section('title', __('Leave Application'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('APPLICATION') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
            <li><a>{{ __('Leave') }}</a></li>
            <li class="active">{{ __('Leave application') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Leave application') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div  class="col-md-6">
                <a href="{{ url('/hrm/leave_application/create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ __('Add leave application') }}</a>
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
                                <th>{{ __('Reason') }}</th>
                                <th>{{ __('Starts Date') }}</th>
                                <th>{{ __('End Date') }}</th>
                                <th>{{ __('Leave Days') }}</th>
                                <th>{{ __('Leave category') }}</th>
                                <th>{{ __('Created at') }}</th>
                                <th class="text-center">{{ __('Status') }}</th>
                                <th class="text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                        @php ($sl = 1)
                        @foreach($leave_applications as $leave_application)
                          <tr>
                            <td>{{  $sl++ }}</td>
                            <td>{{str_limit($leave_application['reason'], 65)}}</td>
                            <td>{{ date('d/m/Y', strtotime($leave_application['start_date'])) }}</td>
                            <td>{{ date('d/m/Y', strtotime($leave_application['end_date'])) }}</td>
                            <td class="text-center">
                                @php($leave_days = Carbon::parse($leave_application['start_date'])->diffInDays(Carbon::parse($leave_application['end_date']))+1)
                                {{ $leave_days }}
                            </td>
                            <td>{{ $leave_application['leave_category'] }}</td>
                            <td>{{ date("D d F Y h:ia", strtotime($leave_application['created_at'])) }}</td>
                            <td class="text-center">
                            @if($leave_application['publication_status'] == 0)
                            <a href="" class="btn btn-warning btn-xs btn-flat btn-block" data-toggle="tooltip" data-original-title="Pending"><i class="icon fa fa-hourglass-2"></i>{{ __('Pending') }} </a>
                            @elseif($leave_application['publication_status'] == 1)
                              <a href="" class="btn btn-success btn-xs btn-flat btn-block" data-toggle="tooltip" data-original-title="Accepted"><i class="icon fa fa-smile-o"> {{ __('Accepted') }}</i></a>
                            @else
                              <a href="" class="btn btn-danger btn-xs btn-flat btn-block" data-toggle="tooltip" data-original-title="Not Accepted"><i class="icon fa fa-flag"></i> {{ __('Not Accepted') }}</a>
                            @endif
                          </td>
                          <td class="text-center">
                           <a href="{{ url('/hrm/leave_application/' .$leave_application['id']) }}"><i class="icon fa fa-file-text"></i> {{ __('Details') }}</a>
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
