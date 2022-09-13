@extends('administrator.master')
@section('title', __('Salary List'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('PAYROLL') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Payroll') }}</a></li>
            <li class="active">{{ __('Salary List') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Salary List') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div  class="col-md-6">
                    <a href="{{ url('/hrm/payroll') }}" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i> {{ __('Manage Salary') }}</a>
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
                                <th>{{ __('Designation') }}</th>
                                <th>{{ __('Employee Type') }}</th>
                                <th>{{ __('Gross Salary') }}</th>
                                <th>{{ __('Deductions') }}</th>
                                <th>{{ __('Net Salary') }}</th>
                                <th class="text-center">{{ __('Updated At') }}</th>
                                <th class="text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @php ($sl = 1)
                            @foreach($salaries as $salary)
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>{{ $salary['name'] }}</td>
                                <td>{{ $salary['designation'] }}</td>
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
                                <td>
                                @php($gross_salary = $salary['basic_salary'] + $salary['house_rent_allowance'] + $salary['medical_allowance'] + $salary['special_allowance'] + $salary['other_allowance'])
                                {{ $gross_salary }}
                                </td>
                                <td>
                                @php($total_deduction = $salary['tax_deduction'] + $salary['provident_fund_deduction'] + $salary['other_deduction'])
                                {{ $total_deduction }}
                                </td>
                                <td>{{ $gross_salary - $total_deduction }}</td>

                                <td class="text-center">{{ date("d F Y", strtotime($salary['updated_at'])) }}</td>
                                <td class="text-center">
                                    <a href="{{ url('/hrm/payroll/manage-salary/' . $salary['user_id']) }}"><i class="icon fa fa-edit"></i> {{ __('Edit') }}</a>
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