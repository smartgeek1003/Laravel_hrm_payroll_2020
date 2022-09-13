@extends('administrator.master')
@section('title', __('Salary Payment Details'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ __('PAYROLL') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
      <li><a>{{ __('Salary') }}</a></li>
      <li class="active">{{ __('Salary Payment Details') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- Default box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('Employee Details') }}</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <a href="{{ url('/hrm/salary-payments') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> {{ __('Back') }}</a>

            <button type="button" class="btn btn-primary btn-flat" title="Print" data-original-title="Label Printer" onclick="printDiv('printable_area')"><i class="fa fa-print"></i><span class="hidden-sm hidden-xs"> {{ __('Print') }} </span></button>
           
            <hr>
            <div id="printable_area" class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <td>
                    <p>
                      {{ $user['employee_id'] }}
                      <br>
                      {{ $user['name'] }}
                      <br>
                      ({{ $user['designation'] }})
                      <br>
                      {{ __('Department of') }} {{ $user['department'] }}
                      <br>
                     {{ __('Joining Date:') }}  {{ date("d F Y", strtotime($user['created_at'])) }}
                    </p>
                  </td>
                  <td>
                    @if(!empty($user['avatar']))
                    <img src="{{ url('public/profile_picture/' . $user['avatar']) }}" class="img-responsive img-thumbnail">
                    @else
                    <img src="{{ url('public/profile_picture/blank_profile_picture.png') }}" alt="blank_profile_picture" class="img-responsive img-thumbnail">
                    @endif
                  </td>
                </tr>
              </table>
              <hr>

              <table class="table table-bordered">
                <tr class="bg-info">
                  <th>{{ __('sl#') }}</th>
                  <th>{{ __('Description') }}</th>
                  <th>{{ __('Debits') }}</th>
                  <th>{{ __('Credits') }}</th>
                </tr>
                @php($sl = 1)
                @foreach($salary_payment_details as $data)
                <tr>
                  <td>{{ $sl++ }}</td>
                  <td>{{ $data->item_name }}</td>
                  <td>
                    @if($data->status == 'debits')
                    -{{ $data->amount }}
                    @endif
                  </td>
                  <td>
                    @if($data->status == 'credits')
                    {{ $data->amount }}
                    @endif
                  </td>
                </tr>
                @endforeach
                <tr>
                  <td> &nbsp; </td>
                </tr>
                <tr class="success">
                  <td colspan="3"><strong class="pull-right">{{ __('Gross Salary:') }}</strong></td>
                  <td>
                    <strong>
                      {{ number_format($salary_payment->gross_salary, 2, '.', '') }}
                    </strong>
                  </td>
                </tr>
                <tr class="success">
                  <td colspan="3"><strong class="pull-right">{{ __('Total Deduction:') }}</strong></td>
                  <td><strong>{{ number_format($salary_payment->total_deduction, 2, '.', '') }}</strong></td>
                </tr>
                <tr class="success">
                  <td colspan="3"><strong class="pull-right">{{ __('Net Salary:') }}</strong></td>
                  <td><strong>{{ number_format($salary_payment->net_salary, 2, '.', '') }}</strong></td>
                </tr>
                <tr class="success">
                  <td colspan="3"><strong class="pull-right">{{ __('Provident Fund:') }}</strong></td>
                  <td><strong>{{ number_format($salary_payment->provident_fund, 2, '.', '') }}</strong></td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <!-- /.end.col -->

      <div class="col-md-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title"><strong>{{ __('Payment History') }}</strong></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered">
             <tr class="bg-info">
              <th>{{ __('sl#') }}</th>
              <th>{{ __('Salary Month') }}</th>
              <th>{{ __('Gross Salary') }}</th>
              <th>{{ __('Total Deduction') }}</th>
              <th>{{ __('Net Salary') }}</th>
              <th>{{ __('Provident Fund') }}</th>
              <th>{{ __('Payment Amount') }}</th>
              <th>{{ __('Payment Type') }}</th>
              <th>{{ __('Note') }}</th>
            </tr>
            @php($sl = 1)
            @foreach($employee_salaries as $employee_salary)
            <tr>
              <td>{{ $sl++ }}</td>
              <td>{{ date("F Y", strtotime($employee_salary['payment_month'])) }}</td>
              <td>{{ $employee_salary['gross_salary'] }}</td>
              <td>{{ $employee_salary['total_deduction'] }}</td>
              <td>{{ $employee_salary['net_salary'] }}</td>
              <td>{{ $employee_salary['provident_fund'] }}</td>
              <td>{{ $employee_salary['payment_amount'] }}</td>
              <td>
                @if($employee_salary['payment_type'] == 1)
               {{ __(' Cash Payment') }}
                @elseif($employee_salary['payment_type'] == 2)
               {{ __('Chaque Payment') }} 
                @else
               {{ __(' Bank Payment') }}
                @endif
              </td>
              <td>{{ $employee_salary['note'] }}</td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.end.col -->
  </div>
  <!-- /.end.row -->
</section>
<!-- /.content -->
</div>
@endsection