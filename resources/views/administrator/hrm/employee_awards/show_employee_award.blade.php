@extends('administrator.master')
@section('title', __('Show Employee Award'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     {{ __('Show Employee Award') }}  
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }} </a></li>
      <li><a>{{ __('HRM') }} </a></li>
      <li><a href="{{ url('/hrm/employee-awards') }}">{{ __('Show Employee Award') }} </a></li>
      <li class="active">{{ __('Details') }} </li>
    </ol>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{ __('Show Employee Award') }}</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <a href="{{ url('/hrm/employee-awards') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> {{ __('Back') }}</a>

      <button type="button" class="btn btn-default btn-flat pull-right" onclick="printDiv('printable_area')">
          <i class="fa fa-print"></i> {{ __('Print') }}</button>

      <hr>
      <div id="printable_area">
        <table class="table table-bordered table-striped">
          <tbody>
            <tr>
              <td>{{ __('Employee Name') }}</td>
              <td>
               @foreach($employees as $employee)
               @if($employee['id'] == $employee_aword['employee_id'])
               {{ $employee['name'] }}
               @endif
               @endforeach
             </td>
           </tr>
           <tr>
            <td>{{ __('Award Category') }}</td>
            <td>{{  $employee_aword['award_title']  }}</td>
          </tr>
          <tr>
            <td>{{ __('Gift Item') }}</td>
            <td>{{  $employee_aword['gift_item']  }}</td>
          </tr>
          <tr>
            <td>{{ __('Month') }} </td>
            <td>{{ date("d F Y", strtotime($employee_aword['select_month'])) }}</td>
          </tr>
          <tr>
            <td>{{ __('Award Details') }}</td>
            <td>{{$employee_aword['description']}}</td>
          </tr>

          <tr>
            <td>{{ __('Created at') }}</td>
            <td>{{ date("D d F Y h:ia", strtotime($employee_aword['created_at'])) }}</td>
          </tr>
        </tr>
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
