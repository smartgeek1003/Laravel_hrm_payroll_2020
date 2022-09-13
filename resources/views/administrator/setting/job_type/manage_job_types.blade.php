@extends('administrator.master')
@section('title', __('Job types'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('JOB TYPES') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
            <li><a>{{ __('Setting') }}</a></li>
            <li class="active">{{ __('Job Types') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Manage job types') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool"  data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                
                <div  class="col-md-6">
                    <a href="{{ url('/setting/job-types/create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ __('Add job type') }}</a>
                </div>
                <div  class="col-md-6">
                    <input type="text" id="myInput" class="form-control" placeholder="{{ __('Search..') }}">
                </div>
                <!-- Notification Box -->
                <div class="col-md-12 table-responsive">
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
                <table  class="table table-bordered table-striped">
                    <tbody id="myTable">
                        <tr>
                            <th>{{ __('SL#') }}</th>
                            <th>{{ __('Job Type') }}</th>
                            <th>{{ __('Job Type Description') }}</th>
                            <th class="text-center">{{ __('Added') }}</th>
                            <th class="text-center">{{ __('Status') }}</th>
                            <th class="text-center">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($sl = 1) 
                        @foreach($job_types as $job_type)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ $job_type['job_type'] }}</td>
                            <td>{{ str_limit($job_type['job_type_description'], 65) }}</td>
                            <td class="text-center">{{ date("d F Y", strtotime($job_type['created_at'])) }}</td>
                            <td class="text-center">
                                @if ($job_type['publication_status'] == 1)
                                <span class="label label-success">{{ __('Published') }}</span>
                                @else
                                <span class="label label-warning">{{ __('Unpublished') }}</span>
                                @endif
                            </td>
                            <td>
                               <a href="{{ url('/setting/job-types/edit/' . $job_type['id']) }}"><i class="icon fa fa-edit"></i>{{ __('Edit') }} </a>
                            </td>
                        </tr>
                        @endforeach
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