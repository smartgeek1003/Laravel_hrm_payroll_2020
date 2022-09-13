@extends('administrator.master')
@section('title', __('Provident Funds'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    {{ __('PROVIDENT FUND') }}  
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
      <li><a>{{ __('Provident Fund') }}</a></li>
      <li class="active">{{ __('Provident Funds') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('Manage Salary Payment') }}</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <button type="button" class="btn btn-primary" title="Print" data-original-title="Label Printer" onclick="printDiv('printable_area')"><i class="fa fa-print"></i><span class="hidden-sm hidden-xs">{{ __('Print') }} </span></button>
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
              <div class="col-md-12">
                <div id="printable_area" class="table-responsive">
                  <table class="table table-bordered">
                   <tr class="bg-info">
                    <th>{{ __('sl') }}</th>
                    <th>{{ __('Employee Name') }}</th>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Designation') }}</th>
                    <th>{{ __('Subscription Amount') }}</th>
                    <th>{{ __('Contribution Amount') }}</th>
                    <th>{{ __('Total Provident Funds') }}</th>
              
                  </tr>
                  @php($sl = 1)
                  @php($total = 0)
                  @php($total_provident_fund  = 0)
                  @foreach($employees as $employee)
                  <tr>
                    @foreach($provident_funds as $provident_fund)
                    @if($employee['id'] == $provident_fund->user_id)
                    @php($total += $provident_fund->total_provident_fund)
                    @php($total_provident_fund = $provident_fund->total_provident_fund)
                    @endif
                    @endforeach
                    <td>{{ $sl++ }}</td>
                    <td>{{ $employee['name'] }}</td>
                    <td>{{ $employee['employee_id'] }}</td>
                    <td>{{ $employee['designation'] }}</td>
                    <td>{{ $total_provident_fund/2 }}</td>
                    <td>{{ $total_provident_fund/2 }}</td>
                    <td>{{ $total_provident_fund }}</td>


                    <!--<td><p class="text-warning">Unpaid</p></td>-->
                  </tr>
                  @endforeach
                  <tr>
                    <td colspan="7"> &nbsp; </td>
                  </tr>
                  <tr class="info">
                    <td colspan="5"> &nbsp; </td>
                    <td><strong>{{ __('Total:') }}</strong></td>
                    <td>{{ $total }}</td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- /. end col -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix"></div>
          <!-- /.box-footer -->
        </div>
      </div>
      <!-- /.box -->
    </div>

  </div>
  <!-- /.end.row -->
</section>
<!-- /.content -->
</div>
@endsection