@extends('administrator.master')
@section('title', __('Add Notice'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ __('Holiday Lists') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
      <li><a>{{ __('HRM') }}</a></li>
      <li><a href="{{ url('/hrm/notice') }}">{{ __('Manage Notice') }}</a></li>
      <li class="active">{{ __('Add Notice') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('Add Notice') }}</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <form action="{{ url('hrm/notice/store') }}" method="post" name="notice_add_form">
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
              <p class="text-yellow">{{ __('Enter Notice details. All field are required.') }} </p>
              @endif
            </div>
            <!-- /.Notification Box -->

            <div class="col-md-6">
              <label for="notice_title">{{ __('Title') }} <span class="text-danger">*</span></label>
              <div class="form-group{{ $errors->has('notice_title') ? ' has-error' : '' }} has-feedback">
                <input type="text" name="notice_title" id="notice_title" class="form-control" value="{{ old('notice_title') }}" placeholder="{{ __('Enter notice title..') }}">
                @if ($errors->has('notice_title'))
                <span class="help-block">
                  <strong>{{ $errors->first('notice_title') }}</strong>
                </span>
                @endif
              </div>
              <!-- /.form-group -->


              <label for="publication_status">{{ __('Publication Status') }} <span class="text-danger">*</span></label>
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
              <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
              <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} has-feedback">
                <textarea class="textarea text-description" name="description" id="description" placeholder="{{ __('Enter Notice description..') }}">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                <span class="help-block">
                  <strong>{{ $errors->first('description') }}</strong>
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
          <a href="{{ url('/hrm/notice') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> {{ __('Cancel') }}</a>
          <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> {{ __('Add Notice') }}</button>
        </div>
      </form>
    </div>
    <!-- /.box -->


  </section>
  <!-- /.content -->
</div>
<script type="text/javascript">
document.forms['notice_add_form'].elements['publication_status'].value = "{{ old('publication_status') }}";
</script>
@endsection
