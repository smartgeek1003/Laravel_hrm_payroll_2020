@extends('administrator.master')
@section('title', __('Client Types'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ __('CLIENT TYPES') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Setting') }}</a></li>
            <li><a href="{{ url('/setting/client-types') }}">{{ __('Client types') }}</a></li>
            <li class="active">{{ __('Edit') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Edit client type') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="{{ url('/setting/client-types/update/'. $client_type['id']) }}" method="post" name="client_type_edit_form">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="row">
                        <!-- Notification Box -->
                        <div class="col-md-12">
                            <?php if (!empty(Session::get('message'))) { ?>
                                <div class="alert alert-success alert-dismissible" id="notification_box">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-check"></i> {{ Session::get('message') }}
                                </div>
                            <?php } else if (!empty(Session::get('exception'))) { ?>
                                <div class="alert alert-warning alert-dismissible" id="notification_box">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                                </div>
                            <?php } ?>
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                            <label for="client_type">{{ __('Client Type') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('client_type') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="client_type" id="client_type" class="form-control" value="{{ $client_type['client_type'] }}">
                                @if ($errors->has('client_type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('client_type') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <label for="publication_status">{{ __('Publication Status ') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('publication_status') ? ' has-error' : '' }} has-feedback">
                                <select name="publication_status" id="publication_status" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                    <option value="1">{{ __('Published') }}</option>
                                    <option value="0">{{ __('Unpublished') }}</option>
                                </select>
                                @if ($errors->has('publication_status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('publication_status') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <label for="client_type_description">{{ __('Client Type Description ') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('client_type_description') ? ' has-error' : '' }} has-feedback">
                                <textarea class="textarea text-description" name="client_type_description" id="client_type_description">{{ $client_type['client_type_description'] }}</textarea>
                                @if ($errors->has('client_type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('client_type_description') }}</strong>
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
                    <a href="{{ url('/setting/client-types') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> {{ __('Cancel') }}</a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-edit"></i> {{ __('Update client type') }}</button>
                </div>
            </form>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    document.forms['client_type_edit_form'].elements['publication_status'].value = "{{ $client_type['publication_status'] }}";
</script>
@endsection
