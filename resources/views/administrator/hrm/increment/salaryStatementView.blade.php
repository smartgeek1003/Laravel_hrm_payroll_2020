@extends('administrator.master')
@section('title', __('Salary Statement'))

@section('main_content')


<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('Salary Statement') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Increment') }}</a></li>
            <li class="active">{{ __('Salary Statement') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Salary Statement') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="btn-body">
                <a href="{{ url('hrm/salary/statement/search') }}" class="tip btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ __('add new Salary Statement') }}</a>



                    <form action="{{ url('/hrm/salary/statement/preview') }}" method="get">

                        {{ csrf_field() }}

                        <input type="hidden" name="emp_id" value="{{$empid}}">
                        <input type="hidden" name="date1" value="{{$startdate}}">
                        <input type="hidden" name="date2" value="{{$enddate}}">
                        <button type="submit" class="tip btn btn-primary btn-flat">{{ __('Preview') }} </button>
                        
                    </form>


                 <form action="{{ url('/hrm/salary/statement/pdf') }}" method="get">
                        {{ csrf_field() }}
                       <input type="hidden" name="emp_id" value="{{$empid}}">
                        <input type="hidden" name="date1" value="{{$startdate}}">
                        <input type="hidden" name="date2" value="{{$enddate}}">
                        <button type="submit" class="tip btn btn-primary btn-flat">{{ __('PDF') }} </button>
                        
                    </form>
                </div>
                <hr>

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


                <div class="st-left-body">
                    <h4>
                    <?php $users= \App\User::all();
                    foreach($users as $user){
                        $id=$user->id;
                    $empname=$user->name;
                    $idno=$user->id_number;
                    $joindate=$user->joining_date;
                    $contact=$user->contact_no_one;
                    $datebirth=$user->date_of_birth;
                    $designation=$user->designation_id;
                    $prsaddress=$user->present_address;
                    $prmaddress=$user->permanent_address;
                    }
                    
                    ?>
                    {{ __('EMP ID NO:') }} {{$idno}}000000{{$id}}<br>
                    {{ __('Name: ') }}{{$empname}}<br>
                    <?php //$desig= \App\Designation::find($designation)->designation;?>
                    {{ __('Designation: ') }} {{$designation}}<br>
                    {{ __('Date of Birth: ') }}{{$datebirth}}<br>
                    {{ __('Joining Date: ') }}{{$joindate}}<br>
                    {{ __('Contact: ') }}{{$contact}}<br>
                    </h4>
                </div>
                <div class="st-center-body">
                    <div class="img-body"><img src="{{ asset('public/profile_picture/'.auth()->user()->avatar) }}" class="img"></div>
                    <h2>{{ __('Salary Statement') }}</h2>
                    <center><b>{{ date("F Y", strtotime($startdate)) }} to {{ date("F Y", strtotime($enddate)) }}<br>
                    <?php $users= \App\User::all()->where('employee_id', $empid);
                    foreach($users as $user){
                    $empname=$user->name;
                    }
                    
                    ?>
                    
                    </b></center>
                </div>
                <div class="st-right-body">
                    <h4>
                    {{ __('Present Address: ') }}{{$prsaddress}}<br>
                    {{ __('Permanent Address: ') }}{{$prmaddress}}
                    
                    </h4>
                </div>



               <div id="printable_area" class="col-md-12 table-responsive">
               <table  class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('SL') }}</th>
                            <th>{{ __('PAID ID NO') }}</th>
                            <th>{{ __('Pay Month') }}</th>
                            <th>{{ __('Pay By') }}</th>
                            <th>{{ __('Note') }}</th>
                            <th>{{ __('Received Salary') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($sl = 1)
                        @foreach($salarysheets as $payroll)
                        <tr>
                            <td>{{ $sl ++ }}</td>
                            <td>PRLL{{$payroll->id}}</td>
                            <td>{{ date("d F Y", strtotime($payroll->payment_month)) }}</td>
                            <td>{{Auth::user()->name}}</td>
                            <td>{{$payroll->note}}</td>
                            <td>{{$payroll->gross_salary}}</td>
                           

                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"></td>
                            <th>{{ __('Total') }}</th>
                            <th>{{$datetotal}}</th>
                        </tr>

                    </tbody>
                </table>
            </div><!--printable-->



            <div class="sign-body-l">-----------------------------------<br>{{ __('Employee') }}</div>
            <div class="sign-body-r">-----------------------------------<br>{{ __('Authorized') }}</div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
@endsection
