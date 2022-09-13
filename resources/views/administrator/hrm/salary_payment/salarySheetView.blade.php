@extends('administrator.master')
@section('title', __('Salary Sheet'))
@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    {{ __('Salary Sheet') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
      <li><a>{{ __('Salary') }}</a></li>
      <li class="active">{{ __('Salary Sheet') }}</li>
    </ol>
  </section>
  <section class="content">
    <div class="Main_Div">
      <div class="card card-primary card-outline">
        <div class="card-header Su clearfix">
          <div class="Left_One float-left w-50">
            <h3 class="card-title FormTitle">{{__('Salary Sheet')}}</h3>
          </div>
          <div class="Left_Two text-right float-left w-50">
            <button class="btn StateB Print">{{__('print')}} </button>
          </div>
        </div>
        <div class="card-body Border_bg">
          <div class="state_hader clearfix">
            <div class="state_logo float-left w-50">
              @if(!empty(auth()->user()->avatar))
              <img src="{{ asset('public/profile_picture/'.auth()->user()->avatar) }}" class="img-fluid" alt="User Image">
              @else
              <img src="{{ asset('public/profile_picture/blank_profile_picture.png') }}" class="img-fluid" alt="User Image">
              @endif
            </div>
            <div class="state_title float-left w-50">
              <h3 class="mb-0">{{__('Salary Sheet Of')}} {{date("F Y", strtotime($salary_month))}}</h3>
              <p class="mb-0">{{ auth()->user()->name}}</p>
              <div class="Employee_dtl pt-2">
                <p class="mb-0">{{ auth()->user()->present_address}}</p>
                <p class="mb-0">{{__('')}}From {{date("F Y", strtotime($salary_month))}}</p>
                <p class="mb-0">{{__('Contact:')}} {{ auth()->user()->contact_no_one}}</p>
              </div>
            </div>
          </div>
          <div class="personal_info py-3 mt-3 clearfix">
            <div class="Present_add float-left">
              <p class="mb-0 FB">{{__('Address')}}</p>
              <p class="mb-0">{{ auth()->user()->present_address}}</p>
            </div>
            <div class="Parmanent_add float-left">
              <p class="mb-0 FB">{{__('From')}} </p>
              <p class="mb-0">{{date("F Y", strtotime($salary_month))}}</p>
            </div>
            <div class="Dates_official float-left">
              <p class="mb-0 FB">{{ auth()->user()->email}}</p>
              <p class="mb-0">{{__('Contact:')}} {{ auth()->user()->contact_no_one}}</p>
            </div>
          </div>
          <div class="salary_table">
            <table class="table table-bordered">
              <tr class="bg-info">
                <th>{{ __('sl#') }}</th>
                <th>{{ __('Employee Name') }}</th>
                <th>{{ __('Designation') }}</th>
                <th>{{ __('Gross Salary') }}</th>
                <th>{{ __('Total Deduction') }}</th>
                <th>{{ __('Net Salary') }}</th>
                <th>{{ __('Provident Fund') }}</th>
                <th>{{ __('Payment Total') }}</th>
              </tr>
              <?php
              $salarypayments = \App\SalaryPayment::all()->where('payment_month',$salary_month);
              $grosstotal = \App\SalaryPayment::all()->where('payment_month',$salary_month)->sum('gross_salary');
              $didcttotal = \App\SalaryPayment::all()->where('payment_month',$salary_month)->sum('total_deduction');
              $nettotal = \App\SalaryPayment::all()->where('payment_month',$salary_month)->sum('net_salary');
              $pftotal = \App\SalaryPayment::all()->where('payment_month',$salary_month)->sum('provident_fund');
              $paymenttotal = \App\SalaryPayment::all()->where('payment_month',$salary_month)->sum('payment_amount');
              ?>
              @php($sl = 1)
              @foreach($salarypayments as $salarypay)
              <?php
              $emplname = \App\User::find($salarypay->user_id)->name;
              $desigid = \App\User::find($salarypay->user_id)->designation_id;
              $designation = \App\Designation::find($desigid)->designation;
              ?>
              <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $emplname}}</td>
                <td>{{ $designation }}</td>
                <td>{{ number_format($salarypay->gross_salary, 2, '.', ',') }} </td>
                <td>{{ number_format($salarypay->total_deduction, 2, '.', ',') }}</td>
                <td>{{ number_format($salarypay->net_salary, 2, '.', ',') }}</td>
                <td>{{ number_format($salarypay->provident_fund, 2, '.', ',') }}</td>
                <td>{{ number_format($salarypay->payment_amount, 2, '.', ',') }}</td>
                
              </tr>
              @endforeach
              
              
              <tr>
                <td colspan="3"><span class="TR_B">{{__('Total')}}</span></td>
                <td><span class="TR_B">${{number_format($grosstotal, 2, '.', ',')}}</span></td>
                <td><span class="TR_B">${{number_format($didcttotal, 2, '.', ',')}}</span></td>
                <td><span class="TR_B">${{number_format($nettotal, 2, '.', ',')}}</span></td>
                <td><span class="TR_C">${{number_format($pftotal, 2, '.', ',')}} </span></td>
                <td><span class="TR_C">${{number_format($paymenttotal, 2, '.', ',')}} </span></td>
              </tr>
            </tbody>
          </table>
          <div class="Bottom_txt_statement text-center my-3">
            <h4 class="mb-0">{{__('This is Salary sheet of only one month')}}</h4>
          </div>
          <div class="clearfix mt-5">
            <div class="Emplyee_sign w-50 py-2 float-left">
              <span class="mb-0">{{__('HR Signature')}}</span>
            </div>
            <div class="Author_sign py-2 w-50 float-left text-right"><span>{{__('Authorize Signature')}}</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
$(function() {

$(".Print").on('click', function() {
print();
});

});
</script>
</div>
@endsection