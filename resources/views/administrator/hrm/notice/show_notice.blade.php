@extends('administrator.master')
@section('title', __('Notice'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('NOTICE') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a href="">{{ __('Notice') }}</a></li>
            <li class="active">{{ __('Details') }}</li>
        </ol>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    @foreach($notices as $notice)
    <div class="row">

        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>{{ __('Created At:') }} <br> {{ date("D d F Y h:ia", strtotime($notice['created_at'])) }} </b> 
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('Created By:') }} <br> {{ $notice['name'] }} </b> 
                        </li>
                       
                    </ul>
                    
                 <strong><i class="fa fa-info-circle margin-r-5"></i> {{ __('Status') }}</strong>

                 <p>
                    
                    <span class="label label-success">{{ __('notice') }}</span>

                </p>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#job_details" data-toggle="tab" aria-expanded="true">{{ __('Notice') }}</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="job_details">

                    <!-- notice details -->
                    <table  class="table table-bordered table-striped">
                        <tbody id="myTable">
                            <tr>
                                <td><strong>{{ $notice['notice_title'] }}</strong></td>
                            </tr>
                            
                            <tr>
                                <td>{{ $notice['description'] }}</td>
                                
                            </tr>
                            
                            </tbody>
                        </table>
                        <!-- /.notice details -->
                    </div>
                  
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        @endforeach

        <div>
            {{ $notices->links() }}
        </div>

    </section>
    <!-- /.content -->
</div>

@endsection