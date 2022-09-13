@extends('administrator.master')
@section('title', __('NOC/Certificate Add'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ __('NOC/Certificate Add') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('HRM') }}</a></li>
            <li><a href="{{ url('/setting/leave_categories') }}">{{ __('NOC') }}</a></li>
            <li class="active">{{ __('Add NOC/Certificate Add') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Add NOC/Certificate') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="{{ url('/hrm/noc/store') }}" method="post" name="leave_category_add_form">
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
                                <p class="text-yellow">{{ __('Enter the All field are required.') }} </p>
                            @endif
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">

                             <!-- /.form-group -->
                            <label for="publication_status">{{ __('Employee') }}<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select name="empid" class="form-control">
                                    <?php $employees=\App\User::all()->where('access_label',2);?>
                                    @foreach($employees as $emp)
                                    <option value="{{$emp->id}}">[{{$emp->employee_id}}] {{$emp->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form-group -->
                           
                            <!-- /.form-group -->
                            <label for="publication_status">{{ __('Type') }}<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select name="category" class="form-control">
                                    <option value="1">{{ __('NOC') }}</option>
                                    <option value="2">{{ __('Experience Certificate') }}</option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <label>{{ __('Description') }} <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <textarea class="textarea text-description" name="details" placeholder="{{ __('Enter description..') }}"></textarea>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                         <div class="col-md-12">
                            <label>{{ __('Bottom') }} <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <textarea class="textarea text-description" name="bottom" placeholder="{{ __('Enter bottom description') }}"></textarea>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->


                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> {{ __('Save') }} </button>

                    <button type="button" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i>{{ __('Cancel') }} </button>
                </div>
            </form>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    document.forms['leave_category_add_form'].elements['publication_status'].value = "{{ old('publication_status') }}";
</script>
@endsection
