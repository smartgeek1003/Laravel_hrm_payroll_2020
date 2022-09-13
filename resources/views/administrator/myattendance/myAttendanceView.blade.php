@extends('administrator.master')
@section('title', __('Add File'))
@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        {{ __('FILES') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }} </a></li>
            <li><a href=""> {{ __('Files') }}</a></li>
            <li class="active"> {{ __('Add file') }}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"> {{ __('Add File') }}</h3>
                <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form method="post" enctype="multipart/form-data" action="{{url('/my/attendance/store')}}">
                {{ csrf_field() }}
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{__('User ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Check In')}}</th>
                                <th>{{__('Check Out')}}</th>
                                <th>{{__('Date')}}</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @php $x = 1 @endphp
                            @foreach ($csv_data as $row)
                            <tr>
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($row as $key => $value)
                                <td><input type="text" value="{{$value }}" class="form-control" name="<?php echo $x; ?>[]"></td>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                            </tr>
                            @php $x++ @endphp
                            @endforeach
                        </tbody>
                        @php
                        $d = $x - 1;
                        @endphp
                        <input type="hidden" name="number" value="{{$d}}">
                        <p>{{__('Total Contact Count:')}} {{$d}}</p>
                        <button type="submit" class="btn btn-primary">
                        {{__('Import Data')}}
                        </button>
                        <a href="{{ url('/my/attendance') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-left-arrow"></i> {{ __('Back') }}</a>
                    </table>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
document.forms['file_name_add_form'].elements['publication_status'].value = "{{ old('publication_status') }}";
</script>
@endsection