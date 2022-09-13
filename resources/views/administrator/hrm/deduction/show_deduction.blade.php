@extends('administrator.master')
@section('title', __('Deduction Details'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('DEDUCTION') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __(' Dashboard') }} </a></li>
            <li><a href="{{ url('/hrm/deductions') }}">{{ __(' Manage Deductiones') }}</a></li>
            <li class="active">{{ __('Deduction Details') }}</li>
        </ol>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('Deduction Details') }}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <a href="{{ url('/hrm/deductions') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
            </div>
            
            <div  class="col-md-6">
                <input type="text" id="myInput" class="form-control" placeholder="{{ __('Search..') }}">
            </div>
            <table  class="table table-bordered table-striped">
                <tbody id="myTable">
                    <tr>
                        <td>{{ __('Employee Name') }}</td>
                        <td>{{ $deduction['name'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Designation') }}</td>
                        <td>{{ $deduction['designation'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Deduction Name') }}</td>
                        <td>{{ $deduction['deduction_name'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Deduction Month') }}</td>
                        <td>{{ date("F Y", strtotime($deduction['deduction_month'])) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Deduction Amount') }}</td>
                        <td>{{ $deduction['deduction_amount'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Description') }}</td>
                        <td>{{$deduction['deduction_description']}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Create By') }}</td>
                        <td>
                            @foreach($users as $user)
                            @if($user['id'] == $deduction['created_by'])
                            {{ $user['name'] }}
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Date Added') }}</td>
                        <td>{{ date("D d F Y h:ia", strtotime($deduction['created_at'])) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Last Updated') }}</td>
                        <td>{{ date("D d F Y h:ia", strtotime($deduction['updated_at'])) }}</td>
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