@extends('administrator.master')
@section('title', __('Add File'))
@section('main_content')
<div class="content-wrapper wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        {{ __('Attendance Setting') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }} </a></li>
            <li><a href=""> {{ __('Attendance') }}</a></li>
            <li class="active"> {{ __('Attendance System') }}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                <?php $machines=\App\Machine::all();?>
                @foreach($machines as $act)
                @if($act->activation==1)
                <b class="text-green">{{ __('Finger Print Attendance Machine Currently Activated') }} </b>
                @else
                <b class="text-green">{{ __('Whithout Finger Print Attendance Machine Currently Activated ') }} </b>
                @endif
                @endforeach</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
                    
                    @endif
                </div>
                <!-- /.Notification Box -->
                
                <form method="post" action="{{url('machine/activation/update')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="radio">
                                    <label class="Radio_label"><input class="Sourov_bhai" type="radio" name="activation" value="0"> {{ __('Whithout Finger Print Attendance Machine ') }}<span class="Looking"></span></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="radio">
                                    <label class="Radio_label"><input class="Sourov_bhai" type="radio" name="activation" value="1"> {{ __(' Finger Print Attendance Machine ') }}<span class="Looking"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        
                        <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> {{ __('Active') }}</button>
                    </div>
                </form>
            </div>
            
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
document.forms['file_name_add_form'].elements['publication_status'].value = "{{ old('publication_status') }}";
</script>
@endsection