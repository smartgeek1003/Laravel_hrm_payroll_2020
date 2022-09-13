@extends('administrator.master')
@section('title', __('Customer'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('Customer') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Customer') }}</a></li>
            <li class="active">{{ __('Customer') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Manage Customer') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-3">
                    <a href="{{ url('/people/clients/create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ __('Add Customer') }}</a>
                </div>
                <div class="col-md-3">
                     <button type="button" class="tip btn btn-primary btn-flat" title="Print" data-original-title="Label Printer" onclick="printDiv('printable_area')">
                    <i class="fa fa-print"></i>
                    <span class="hidden-sm hidden-xs"> {{ __('Print') }}</span>
                </button>
                </div>
                <div  class="col-md-6">  <input type="text" id="myInput" class="form-control" placeholder="{{ __('Search..') }}"></div>
               
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

                
                <div id="printable_area" class="col-md-12 table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('SL#') }}</th>
                                <th>{{ __('Client Name') }}</th>
                                <th>{{ __('Client Type') }}</th>
                                <th>{{ __('Contact No') }}</th>
                                <th>{{ __('Address') }}</th>
                                <th class="text-center">{{ __('Added') }}</th>
                                <th class="text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @php 
                            $sl=1;
                            @endphp
                            @foreach($clients as $client)
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>{{ $client['name'] }}</td>
                                <td>{{ $client['client_type'] }}</td>
                                <td>{{ $client['contact_no_one'] }}</td>
                                <td>{{ $client['present_address'] }}</td>
                                <td class="text-center">{{ date("d F Y", strtotime($client['created_at'])) }}</td>
                              
                                <td class="text-center">
                                   <a href="{{ url('/people/clients/edit/' . $client['id']) }}"><i class="icon fa fa-edit"></i> {{ __('Edit') }}</a>
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