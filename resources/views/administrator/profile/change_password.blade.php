@extends('administrator.master')
@section('title', __('Change Password'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ __('PASSWORD') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li class="active">{{ __('Change Password') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Change Password') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="{{ url('/profile/update-password') }}" method="post">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="row">

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
                            @else
                            <p class="text-yellow">{{ __('Enter file details. All field are required.') }} </p>
                            @endif
                        </div>
                        <!-- /.Notification Box -->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="password">{{ __('New Password ') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                                <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" placeholder="{{ __('Enter new password..') }}">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- end/Row-->

                    <div class="row">
                        <div class="col-md-6">
                            <label for="password_confirmation">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" placeholder="{{ __('Enter confirm password..') }}">
                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- end/Row-->
                    
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-edit"></i>{{ __('Edit') }} </button>
            </div>
        </form>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
</div>
@endsection
