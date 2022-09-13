@extends('administrator.master')
@section('title', __('Designations'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ __('DESIGNATIONS') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
            <li><a>{{ __('Setting') }}</a></li>
            <li><a href="{{ url('/setting/designations') }}">{{ __('Designations') }}</a></li>
            <li class="active">{{ __('Details') }}</li>
        </ol>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Details of designation') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="{{ url('/setting/designations') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>{{ __('Back') }} </a>
                <hr>
                <table  class="table table-bordered table-striped">
                    <tbody id="myTable">
                        <tr>
                            <td>{{ __('Designation') }}</td>
                            <td>{{ $designation['designation'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Department') }}</td>
                            <td>{{ $designation['department'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Designation Description') }}</td>
                            <td>{{ $designation['designation_description'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Create By') }}</td>
                            <td>{{ $designation['name'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Date Added') }}</td>
                            <td>{{ date("D d F Y h:ia", strtotime($designation['created_at'])) }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Last Updated') }}</td>
                            <td>{{ date("D d F Y h:ia", strtotime($designation['updated_at'])) }}</td>
                        </tr>

                         <tr>
                            <td>{{ __('Last Updated') }}</td>
                            <td>{{ date("D d F Y h:ia", strtotime($designation['updated_at'])) }}</td>
                        </tr>


                        <tr>
                       
                                <div class="btn-group btn-group-justified">
                                    @if ($designation['publication_status'] == 1)
                                        <div class="btn-group">
                                            <a href="{{ url('/setting/designations/unpublished/' . $designation['id'])}}" class="tip btn btn-success btn-flat" data-toggle="tooltip" data-original-title="Unpublished">
                                                <i class="fa fa-arrow-down"></i>
                                                <span class="hidden-sm hidden-xs"> {{ __('Published') }}</span>
                                            </a>
                                        </div>
                                    @else
                                        <div class="btn-group">
                                            <a href="{{ url('/setting/designations/published/' . $designation['id'])}}" class="tip btn btn-warning btn-flat" data-toggle="tooltip" data-original-title="Published">
                                                <i class="fa fa-arrow-up"></i>
                                                <span class="hidden-sm hidden-xs">{{ __('Unpublished') }} </span>
                                            </a>
                                        </div>
                                    @endif
                                   
                                    <div class="btn-group">
                                        <a href="{{ url('/setting/designations/edit/' . $designation['id']) }}" class="tip btn btn-success tip btn-flat" title="" data-original-title="Edit Product">
                                            <i class="fa fa-edit"></i>
                                            <span class="hidden-sm hidden-xs"> {{ __('Edit') }}</span>
                                        </a>
                                    </div>
                                    
                                </div>
                          

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