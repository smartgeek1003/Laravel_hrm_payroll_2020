<?php
use Carbon\Carbon;
?>
@extends('administrator.master')
@section('title', __('Show Leave Application Lists'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     {{ __('Show Leave Application Lists') }} 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
      <li><a>{{ __('Leave') }}</a></li>
      <li><a href="{{ url('/hrm/application_lists') }}">{{ __('Manage Leave Application Lists') }}</a></li>
      <li class="active">{{ __('Details') }}</li>
    </ol>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{ __('Show of Leave Application Lists') }}</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body table-responsive">
      <a href="{{ url('/hrm/application_lists') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>{{ __('Back') }} </a>
      <hr>
      <table  class="table table-bordered table-striped">
        <tbody id="myTable">


          <tr>
            <td>{{ __('Leave Reason') }}</td>
            <td>{{$leave_application['reason']}}</td>
          </tr>
          <tr>
            <td>{{ __('Start Date') }}</td>
            <td>{{ date("d F Y", strtotime( $leave_application['start_date'] )) }}</td>
          </tr>
          <tr>
            <td>{{ __('End date') }}</td>
            <td>{{ date("d F Y", strtotime($leave_application['end_date'])) }}</td>
          </tr>
          <tr>
            <td>{{ __('Leave Days') }}</td>
            <td>
              @php($leave_days = Carbon::parse($leave_application['start_date'])->diffInDays(Carbon::parse($leave_application['end_date']))+1)
              {{ $leave_days }}
            </td>
          </tr>
          <tr>
            <td>{{ __('Leave Category') }}</td>
            <td>{{ $leave_application['leave_category'] }}</td>
          </tr>
          <tr>
            <td>{{ __('Created By') }}</td>
            <td>{{ $leave_application['name'] }}</td>
          </tr>

          <tr>
            <td>{{ __('Apply date') }}</td>
            <td>{{ date("D d F Y h:ia", strtotime($leave_application['created_at'])) }}</td>
          </tr>
          <tr>
            <tr>
              <td colspan="2">
                <div class="btn-group btn-group-justified">
                  @if($leave_application['publication_status'] == 1)
                  <div class="btn-group">
                    <a href="" class="tip btn btn-success btn-flat" data-toggle="tooltip" data-original-title="Accepted">
                      <i class="icon fa fa-smile-o"></i>
                      <span class="hidden-sm hidden-xs">{{ __('Accepted') }} </span>
                    </a>
                  </div>
                  @elseif($leave_application['publication_status'] == 2)
                  <div class="btn-group">
                    <a href="" class="tip btn btn-danger btn-flat" data-toggle="tooltip" data-original-title="Not Accepted">
                      <i class="icon fa fa-flag"></i>
                      <span class="hidden-sm hidden-xs">{{ __(' Not Accepted') }}</span>
                    </a>
                  </div>
                  @else
                  <div class="btn-group">
                    <a href="" class="tip btn btn-warning btn-flat" data-toggle="tooltip" data-original-title="Pending">
                      <i class="icon fa fa-hourglass-2"></i>
                      <span class="hidden-sm hidden-xs">{{ __('Pending') }}</span>
                    </a>
                  </div>
                  @endif

                  <div class="btn-group">
                    <a href="#" class="tip btn btn-primary btn-flat" title="" data-original-title="Label Printer">
                      <i class="fa fa-print"></i>
                      <span class="hidden-sm hidden-xs"> {{ __('Print') }}</span>
                    </a>
                  </div>
                  <div class="btn-group">
                    <a href="#" class="tip btn btn-primary btn-flat" title="" data-original-title="PDF">
                      <i class="fa fa-file-pdf-o"></i>
                      <span class="hidden-sm hidden-xs"> {{ __('PDF') }}</span>
                    </a>
                  </div>


                </div>
              </td>
            </tr>


          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
@endsection
