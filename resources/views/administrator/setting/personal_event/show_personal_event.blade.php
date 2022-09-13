@extends('administrator.master')
@section('title', __('Departments'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ __('PERSONAL EVENT') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Setting') }}</a></li>
            <li><a href="{{ url('/setting/personal_events') }}">{{ __('Personal Events') }}</a></li>
            <li class="active">{{ __('Details') }}</li>
        </ol>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Details of personal event') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="{{ url('/setting/personal-events') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                <hr>
                <table  class="table table-bordered table-striped">
                    <tbody id="myTable">
                        <tr>
                            <td>{{ __('Personal Event Name') }}</td>
                            <td>{{ $personal_event['personal_event'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Date Added') }}</td>
                            <td>{{ date("d F Y", strtotime($personal_event['start_date'])) }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Date Added') }}</td>
                            <td>{{ date("d F Y", strtotime($personal_event['end_date'])) }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Description') }}</td>
                            <td>{{ $personal_event['personal_event_description'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Create By') }}</td>
                            <td>{{ $personal_event['name'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Date Added') }}</td>
                            <td>{{ date("D d F Y h:ia", strtotime($personal_event['created_at'])) }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Last Updated') }}</td>
                            <td>{{ date("D d F Y h:ia", strtotime($personal_event['updated_at'])) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="btn-group btn-group-justified">
                                    @if ($personal_event['publication_status'] == 1)
                                        <div class="btn-group">
                                            <a href="{{ url('/setting/personal-events/unpublished/' . $personal_event['id'])}}" class="tip btn btn-success btn-flat" data-toggle="tooltip" data-original-title="Unpublished">
                                                <i class="fa fa-arrow-down"></i>
                                                <span class="hidden-sm hidden-xs"> {{ __('Published') }}</span>
                                            </a>
                                        </div>
                                    @else
                                        <div class="btn-group">
                                            <a href="{{ url('/setting/personal-events/published/' . $personal_event['id'])}}" class="tip btn btn-warning btn-flat" data-toggle="tooltip" data-original-title="Published">
                                                <i class="fa fa-arrow-up"></i>
                                                <span class="hidden-sm hidden-xs"> {{ __('Unpublished') }}</span>
                                            </a>
                                        </div>
                                    @endif
                                    <div class="btn-group">
                                        <a href="#" class="tip btn btn-primary btn-flat" title="" data-original-title="Label Printer">
                                            <i class="fa fa-print"></i>
                                            <span class="hidden-sm hidden-xs"> {{ __('Print') }}</span>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="#" class="tip btn btn-primary btn-flat" title="" data-original-title="PDF">
                                            <i class="fa fa-file-pdf-o"></i>
                                            <span class="hidden-sm hidden-xs"> {{ __('PDF') }}</span>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ url('/setting/personal-events/edit/' . $personal_event['id']) }}" class="tip btn btn-warning tip btn-flat" title="" data-original-title="Edit Product">
                                            <i class="fa fa-edit"></i>
                                            <span class="hidden-sm hidden-xs"> {{ __('Edit') }}</span>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ url('/setting/personal-events/delete/' . $personal_event['id']) }}" onclick="return confirm('Are you sure to delete this ?');" class="tip btn btn-danger bpo btn-flat" title="" data-content="<div><p>{{ __('Are you sure?') }}</p><a class='btn btn-danger' href='https://btrc.gunitok.com/products/delete/1'>{{ __('Yes I am sure') }}</a> <button class='btn bpo-close'>{{ __('No') }}</button></div>" data-html="true" data-placement="top" data-original-title="<b>{{ __('Delete Product') }}</b>">
                                            <i class="fa fa-trash-o"></i>
                                            <span class="hidden-sm hidden-xs">{{ __('Delete') }} </span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
@endsection
