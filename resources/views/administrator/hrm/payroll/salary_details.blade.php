@extends('administrator.master')
@section('title', __('Salary Details'))

@section('main_content')

<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     {{ __('PAYROLL') }} 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
      <li><a>{{ __('Payroll') }}</a></li>
      <li class="active">{{ __('Salary Details') }}</li>
    </ol>
  </section>

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
            <!-- Notification Box -->
            <div class="col-md-offset-2 col-md-5 table-responsive">
              <table class="table borderless">
                <tr>
                  <td>{{ __('Employee Name:') }}</td>
                  <td>{{ $salary['name'] }}</td>
                </tr>
                <tr>
                  <td>{{ __('Employee Type:') }}</td>
                  <td>
                    @if($salary['employee_type'] == 1)
                   {{ __('Provision') }} 
                    @elseif($salary['employee_type'] == 2)
                   {{ __('Permanent') }} 
                    @elseif($salary['employee_type'] == 3)
                   {{ __('Full Time') }} 
                    @elseif($salary['employee_type'] == 4)
                   {{ __('Part Time') }} 
                    @else
                    {{ __('Adhoc') }}
                    @endif
                  </td>
                  <tr>
                    <td>{{ __('Department:') }}</td>
                    <td>{{ $salary['department'] }}</td>
                  </tr>
                  <tr>
                    <td>{{ __('Designation:') }}</td>
                    <td>{{ $salary['designation'] }}</td>
                  </tr>
                </tr>
              </table>
            </div>
            <!-- /. end col -->
            <div class="col-md-3">
              @if(!empty($salary['avatar']))
              <img src="{{ url('public/profile_picture/' . $salary['avatar']) }}" class="img-responsive img-thumbnail" width="250px">
              @else
              <img src="{{ url('public/profile_picture/blank_profile_picture.png') }}" alt="blank_profile_picture" class="img-responsive img-thumbnail" width="160px">
              @endif
            </div>
            <!-- /. end col -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.end.col -->

      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('Salary Details') }}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered">
              <tr>
                <th>{{ __('#SL') }}</th>
                <th>{{ __('Transection Type') }}</th>
                <th>{{ __('Debits') }}</th>
                <th>{{ __('Credits') }}</th>
              </tr>
              <tr>
                <td>01.</td>
                <td>{{ __('Basic Salary') }}</td>
                <td></td>
                <td>{{ $salary['basic_salary']}}</td>
              </tr>
              <tr>
                <td>02.</td>
                <td>{{ __('House Rent Allowance') }}</td>
                <td></td>
                <td>{{ $salary['house_rent_allowance'] }}</td>
              </tr>
              <tr>
                <td>03.</td>
                <td>{{ __('Medical Allowance') }}</td>
                <td></td>
                <td>{{ $salary['medical_allowance']}}</td>
              </tr>
              <tr>
                <td>04.</td>
                <td>{{ __('Special Allowance') }}</td>
                <td></td>
                <td>{{ $salary['special_allowance'] }}</td>
              </tr>
              <tr>
                <td>05.</td>
                <td>{{ __('Provident Fund Contribution') }}</td>
                <td></td>
                <td>{{ $salary['provident_fund_contribution'] }}</td>
              </tr>
              <tr>
                <td>06.</td>
                <td>{{ __('Other Allowance') }}</td>
                <td></td>
                <td>{{ $salary['other_allowance']}}</td>
              </tr>
              <tr>
                <td>07.</td>
                <td>{{ __('Tax Deduction') }}</td>
                <td>
                  @if(!empty($salary['tax_deduction']))
                -{{ $salary['tax_deduction']}}
                @endif
              </td>
                <td></td>
              </tr>
              <tr>
                <td>08.</td>
                <td>{{ __('Provident Fund Deduction') }}</td>
                <td>-{{ $salary['provident_fund_deduction']}}</td>
                <td></td>
              </tr>
              <tr>
                <td>09.</td>
                <td>{{ __('Other Deduction') }}</td>
                <td>-{{ $salary['other_deduction']}}</td>
                <td></td>
              </tr>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.end.col -->
      </div>
      <!-- /.end.col -->

      <div class="col-md-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('Total Salary Details') }}</h3>
          </div>
          <!-- /.box-header -->

          @php($total_deduction = $salary['tax_deduction'] + $salary['other_deduction']+ $salary['provident_fund_deduction'])

          @php($gross_salary = $salary['basic_salary'] + $salary['house_rent_allowance'] + $salary['medical_allowance'] + $salary['special_allowance'] + $salary['other_allowance'])

          @php($total_provident_fund = $salary['provident_fund_contribution'] + $salary['provident_fund_deduction'])

          <div class="box-body">
            <table class="table table-bordered">
              <tr>
                <td>{{ __('Gross Salary') }}</td>
                <td>
                  {{ $gross_salary }}
                </td>
              </tr>
              <tr>
                <td>{{ __('Total Deduction') }}</td>
                <td>
                  {{ $total_deduction }}
                </td>
              </tr>
              <tr>
                <td><strong>{{ __('Provident Fund') }}</strong></td>
                <td>{{ $total_provident_fund }}</td>
              </tr>
              <tr>
                <td><strong>{{ __('Net Salary') }}</strong></td>
                <td>{{ $gross_salary - $total_deduction }}</td>
              </tr>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <!-- /.end.col -->
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection