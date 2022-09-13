@extends('administrator.master')
@section('title', __('Role Edit'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('ROLE') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Setting') }}</a></li>
            <li><a href="{{ url('/setting/role-types') }}">{{ __('Role') }}</a></li>
            <li class="active">{{ __('Edit role') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Edit role') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle=tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="{{route('setting.role.update', $role->id)}}" method="post" role="form">
              {{method_field('PATCH')}}
              {{csrf_field()}}
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
                        <p class="text-yellow">{{ __('Enter role type details. All field are required.') }} </p>
                        @endif
                    </div>
                    <!-- /.Notification Box -->

                    <div class="col-md-6">
                        <label for="name">{{ __('Name of Role') }} <span class="text-danger">*</span></label>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}">
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- /.form-group -->
                        <label for="display_name">{{ __('Display Name') }} <span class="text-danger">*</span></label>
                        <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }} has-feedback">
                            <input type="text" name="display_name" id="display_name" class="form-control" value="{{ $role->display_name }}">
                            @if ($errors->has('display_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('display_name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- /.form-group -->
                        <label for="description">{{ __('Description ') }}<span class="text-danger">*</span></label>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} has-feedback">
                            <input type="text" name="description" id="description" class="form-control" value="{{ $role->description }}">
                            @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-12">
                        <label for="description">{{ __('Permissions') }} <span class="text-danger">*</span></label>
                        <div class="form-group{{ $errors->has('permission[]') ? ' has-error' : '' }} has-feedback">
                         @foreach($permissions as $permission)
                         <input type="checkbox" {{in_array($permission->id,$role_permissions)?"checked":""}}   name="permission[]" value="{{$permission->id}}" > {{$permission->name}} <br>
                         @endforeach
                     </div>
                     <!-- /.form-group -->
                 </div>
                 <!-- /.col -->
             </div>
             <!-- /.row -->
         </div>
         <!-- /.box-body -->
         <div class="box-footer">
            <a href="{{ route('setting.role.index') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i>{{ __('Cancel') }} </a>
            <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-edit"></i> {{ __('Update Role') }}</button>
        </div>
    </form>
</div>
<!-- /.box -->
</section>
<!-- /.content -->
</div>

@endsection

