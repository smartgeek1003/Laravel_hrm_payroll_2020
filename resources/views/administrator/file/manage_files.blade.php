@extends('administrator.master')
@section('title', __('Manage Files'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ __('FILES') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
            <li><a>{{ __('Files') }}</a></li>
            <li class="active">{{ __('Manage Files') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Manage files') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div  class="col-md-6"> 
                    <a href="{{ url('files/create/'. $folder_id) }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ __('Add file') }}</a>
                </div>

                <div  class="col-md-6">  <input type="text" id="myInput" class="form-control" placeholder="{{ __('Search..') }}"></div>
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
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('SL#') }}</th>
                                <th>{{ __('Caption') }}</th>
                                <th>{{ __('Uploded File') }}</th>
                                <th class="text-center">{{ __('Added by') }}</th>
                                <th class="text-center">{{ __('Created at') }}</th>
                                <th class="text-center">{{ __('Download') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($sl = 1)
                            @foreach($files as $file)
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>{{ $file->caption }}</td>
                                <td><a href="{{ url('/files/download/'.$file->file_name) }}">{{ $file->file_name }}</a></td>
                                <td class="text-center" >{{ $file->name }}</td>
                                <td class="text-center">{{ date("d F Y", strtotime($file->created_at)) }}</td>
                                <td class="text-center">
                                    <a href="{{ url('/files/download/'.$file->file_name) }}" class="btn btn-success btn-xs btn-flat btn-block" data-toggle="tooltip" data-original-title="Click to download"><i class="icon fa fa-cloud-download"> {{ __('Downlod') }}</i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              <!-- =================Data Search================== -->
                <script>
                $(document).ready(function(){
                 $("#myInput").on("keyup", function() {
                   var value = $(this).val().toLowerCase();
                   $("#myTable tr").filter(function() {
                     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                   });
                 });
                });
                </script>
                <!-- =================Data Search================== -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
@endsection