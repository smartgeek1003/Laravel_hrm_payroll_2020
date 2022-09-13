@extends('administrator.master')
@section('title', __('Manage Folders'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ __('FOLDERS') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Folder') }}</a></li>
            <li class="active">{{ __('Manage Folders') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Manage Folders') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                
                <div  class="col-md-6">     <a href="{{ url('folders/create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ __('Add folder') }}</a></div>
             

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
                                <th>{{ __('Folder Name') }}</th>
                                <th>{{ __('Folder Description') }}</th>
                                <th class="text-center">{{ __('Added by') }}</th>
                                <th class="text-center">{{ __('Added') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($sl = 1)
                            @foreach($folders as $folder)
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td><a href="{{ url('/files/'.$folder->id) }}">{{ $folder->folder_name }}</a></td>
                                <td>{{str_limit($folder->folder_description, 65)}}</td>
                                <td>{{ $folder->name }}</td>
                                <td class="text-center">{{ date("d F Y", strtotime($folder->created_at)) }}</td>
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