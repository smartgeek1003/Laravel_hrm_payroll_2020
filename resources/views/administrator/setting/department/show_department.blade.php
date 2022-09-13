@extends('administrator.master')
@section('title', __('Departments'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('DEPARTMENT') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Setting') }}</a></li>
            <li><a href="{{ url('/setting/departments') }}">{{ __('Departments') }}</a></li>
            <li class="active">{{ __('Details') }}</li>
        </ol>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Details of department') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="{{ url('/setting/departments') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>{{ __('Back') }} </a>
                <hr>
                <table  class="table table-bordered table-striped">
                    <tbody id="myTable">
                        <tr>
                            <td>{{ __('Department') }}</td>
                            <td>{{ $department->department }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Department Description') }}</td>
                            <td>{{ $department->department_description }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Create By') }}</td>
                            <td>{{ $department->name }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Date Added') }}</td>
                            <td>{{ date("D d F Y h:ia", strtotime($department->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Last Updated') }}</td>
                            <td>{{ date("D d F Y h:ia", strtotime($department->updated_at)) }}</td>
                        </tr>
                        <tr>
                           
                                    @if ($department->publication_status == 1)
                                        <div class="btn-group">
                                            <a href="{{ url('/setting/departments/unpublished/' . $department->id)}}" class="tip btn btn-success btn-flat" data-toggle="tooltip" data-original-title="Unpublished">
                                                <i class="fa fa-arrow-down"></i>
                                                <span class="hidden-sm hidden-xs"> {{ __('Published') }}</span>
                                            </a>
                                        </div>
                                    @else
                                        <div class="btn-group">
                                            <a href="{{ url('/setting/departments/published/' . $department->id)}}" class="tip btn btn-warning btn-flat" data-toggle="tooltip" data-original-title="Published">
                                                <i class="fa fa-arrow-up"></i>
                                                <span class="hidden-sm hidden-xs"> {{ __('Unpublished') }}</span>
                                            </a>
                                        </div>
                                    @endif
                                   
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