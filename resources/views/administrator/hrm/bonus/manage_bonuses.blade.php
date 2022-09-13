@extends('administrator.master')
@section('title', __('Manage Bonuses'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __(' BONUS') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __(' Dashboard') }}</a></li>
            <li><a>{{ __(' Bonus') }} </a></li>
            <li class="active">{{ __(' Manage Bonuses') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __(' Manage Bonuses') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
            
                <div  class="col-md-6">  <a href="{{ url('/hrm/bonuses/create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ __(' Add bonus') }}</a></div>

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
                                <th>{{ __('Employee Name') }}</th>
                                <th>{{ __('Designation') }}</th>
                                <th>{{ __('Bonus Name') }}</th>
                                <th>{{ __('Bonus Month') }}</th>
                                <th>{{ __('Bonus Amount') }}</th>
                                <th>{{ __('Date Added') }}</th>
                                <th class="text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($sl = 1)
                            @foreach($bonuses as $bonus)
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>{{ $bonus['name'] }}</td>
                                <td>{{ $bonus['designation'] }}</td>
                                <td>{{ $bonus['bonus_name'] }}</td>
                                <td>{{ date("F Y", strtotime($bonus['bonus_month'])) }}</td>
                                <td>{{ $bonus['bonus_amount'] }}</td>
                                <td>{{ date("d F Y", strtotime($bonus['created_at'])) }}</td>
                                <td class="text-center">
                                 <a href="{{ url('/hrm/bonuses/edit/' . $bonus['id']) }}"><i class="icon fa fa-edit"></i> {{ __('Edit') }}</a>
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