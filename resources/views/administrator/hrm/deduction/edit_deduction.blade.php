@extends('administrator.master')
@section('title', __('Edit Deduction'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('DEDUCTION') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __(' Dashboard') }}</a></li>
            <li><a href="{{ url('/hrm/deductions') }}">{{ __('Manage Deductiones') }}</a></li>
            <li class="active">{{ __('Edit Deduction') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Edit Deduction') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="{{ url('/hrm/deductions/update/' . $deduction['id']) }}" method="post" name="deduction_add_form">
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
                                <p class="text-yellow">{{ __('Enter deduction details. All field are required.') }} </p>
                            @endif
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                            <label for="user_id">{{ __('Employee Name') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} has-feedback">
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="deduction_name">{{ __('Deduction Name') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('deduction_name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="deduction_name" id="deduction_name" class="form-control" value="{{ $deduction['deduction_name'] }}" placeholder="{{ __('Enter deduction name..') }}">
                                @if ($errors->has('deduction_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deduction_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="deduction_month">{{ __('Deduction Month') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('deduction_month') ? ' has-error' : '' }} has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="deduction_month" class="form-control pull-right" value="{{ $deduction['deduction_month'] }}" id="monthpicker2">
                                </div>
                                @if ($errors->has('deduction_month'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deduction_month') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="deduction_amount">{{ __('Deduction Amount') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('deduction_amount') ? ' has-error' : '' }} has-feedback">
                                <input type="number" name="deduction_amount" id="deduction_amount" class="form-control" value="{{ $deduction['deduction_amount'] }}" placeholder="{{ __('Enter deduction name..') }}">
                                @if ($errors->has('deduction_amount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deduction_amount') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <label for="deduction_description">{{ __('Deduction Description') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('deduction_description') ? ' has-error' : '' }} has-feedback">
                                <textarea class="textarea text-description" name="deduction_description" id="deduction_description" placeholder="{{ __('Enter client description..') }}">{{ $deduction['deduction_description'] }}</textarea>
                                @if ($errors->has('deduction_description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deduction_description') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ url('/hrm/deductions') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> {{ __('Cancel') }}</a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-edit"></i> {{ __('Update deduction') }}</button>
                </div>
            </form>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    document.forms['deduction_add_form'].elements['user_id'].value = "{{ $deduction['user_id'] }}";
</script>
@endsection
