@extends('administrator.master')
@section('title', __( 'Loan Details'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('LOAN') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
            <li><a href="{{ url('/hrm/loans') }}">{{ __('Manage Loans') }}</a></li>
            <li class="active">{{ __('Loan Details') }}</li>
        </ol>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('Loan Details') }}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <a href="{{ url('/hrm/loans') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>{{ __('Back') }} </a>
            <hr>
            <table  class="table table-bordered table-striped">
                <tbody id="myTable">
                    <tr>
                        <td>{{ __('Employee Name') }}</td>
                        <td>{{ $loan['name'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Designation') }}</td>
                        <td>{{ $loan['designation'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Loan Name') }}</td>
                        <td>{{ $loan['loan_name'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Loan Amount') }}</td>
                        <td>{{ $loan['loan_amount'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Number of Installments') }}</td>
                        <td>{{ $loan['number_of_installments'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Remaining Installments') }}</td>
                        <td>{{ $loan['remaining_installments'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Description') }}</td>
                        <td>{{ $loan['loan_description'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Create By') }}</td>
                        <td>
                            @foreach($users as $user)
                            @if($user['id'] == $loan['created_by'])
                            {{ $user['name'] }}
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Date Added') }}</td>
                        <td>{{ date("D d F Y h:ia", strtotime($loan['created_at'])) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Last Updated') }}</td>
                        <td>{{ date("D d F Y h:ia", strtotime($loan['updated_at'])) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="btn-group btn-group-justified">
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
                                <div class="btn-group">
                                    <a href="{{ url('/hrm/loans/edit/' . $loan['id']) }}" class="tip btn btn-warning tip btn-flat" title="" data-original-title="Edit Product">
                                        <i class="fa fa-edit"></i>
                                        <span class="hidden-sm hidden-xs"> {{ __('Edit') }}</span>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ url('/hrm/loans/delete/' . $loan['id']) }}" onclick="return confirm('Are you sure to delete this ?');" class="tip btn btn-danger bpo btn-flat" title="" data-content="<div><p>{{ __('Are you sure?') }}</p><a class='btn btn-danger' href='https://btrc.gunitok.com/products/delete/1'>{{ __('Yes I am sure') }}</a> <button class='btn bpo-close'>{{ __('No') }}</button></div>" data-html="true" data-placement="top" data-original-title="<b>{{ __('Delete Product') }}</b>">
                                    <i class="fa fa-trash-o"></i>
                                    <span class="hidden-sm hidden-xs"> {{ __('Delete') }}</span>
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