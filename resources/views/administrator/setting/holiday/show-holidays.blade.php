@extends('administrator.master')
@section('title', __('Show Holidays'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     {{ __('PERSONAL EVENT') }} 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
      <li><a>{{ __('Setting') }}</a></li>
      <li><a href="{{ url('/setting/holidays') }}">{{ __('Holiday') }}</a></li>
      <li class="active">{{ __('Details') }}</li>
    </ol>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{ __('Details of Holidays') }}</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <a href="{{ url('/setting/holidays') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
      <hr>
      <table  class="table table-bordered table-striped">
        <tbody id="myTable">
          <tr>
            <td>{{ __('Holidays Name') }}</td>
            <td>{{ $holidays['holiday_name'] }}</td>
          </tr>
          <tr>
            <td>{{ __('Date') }}</td>
            <td>{{ date("d F Y", strtotime( $holidays['date'] )) }}</td>
          </tr>
          <tr>
            <td>{{ __('Description') }}</td>
            <td>{{ $holidays['description'] }}</td>
          </tr>
          <tr>
            <td>{{ __('Create By') }}</td>
            <td>{{ $holidays['name'] }}</td>
          </tr>
          <tr>
            <td>{{ __('Date Added') }}</td>
            <td>{{ date("D d F Y h:ia", strtotime($holidays['created_at'])) }}</td>
          </tr>
          <tr>
            <td>{{ __('Last Updated') }}</td>
            <td>{{ date("D d F Y h:ia", strtotime($holidays['updated_at'])) }}</td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="btn-group btn-group-justified">
                @if ($holidays['publication_status'] == 1)
                <div class="btn-group">
                  <a href="{{ url('/setting/holidays/unpublished/' . $holidays['id'])}}" class="tip btn btn-success btn-flat" data-toggle="tooltip" data-original-title="Unpublished">
                    <i class="fa fa-arrow-down"></i>
                    <span class="hidden-sm hidden-xs"> {{ __('Published') }}</span>
                  </a>
                </div>
                @else
                <div class="btn-group">
                  <a href="{{ url('/setting/holidays/published/' . $holidays['id'])}}" class="tip btn btn-warning btn-flat" data-toggle="tooltip" data-original-title="Published">
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
                    <span class="hidden-sm hidden-xs">{{ __('PDF') }} </span>
                  </a>
                </div>
                <div class="btn-group">
                  <a href="{{ url('/setting/holidays/edit/' . $holidays['id']) }}" class="tip btn btn-warning tip btn-flat" title="" data-original-title="Edit Product">
                    <i class="fa fa-edit"></i>
                    <span class="hidden-sm hidden-xs">{{ __('Edit') }} </span>
                  </a>
                </div>
                <div class="btn-group">
                  <a href="{{ url('/setting/holidays/delete/' . $holidays['id']) }}" onclick="return confirm('Are you sure to delete this ?');" class="tip btn btn-danger bpo btn-flat" title="" data-content="<div><p>{{ __('Are you sure?') }}</p><a class='btn btn-danger' href='https://btrc.gunitok.com/products/delete/1'>{{ __('Yes I am sure') }}</a> <button class='btn bpo-close'>{{ __('No') }}</button></div>" data-html="true" data-placement="top" data-original-title="<b>{{ __('Delete Product') }}</b>">
                  <i class="fa fa-trash-o"></i>
                  <span class="hidden-sm hidden-xs"> {{ __('Delete') }}</span>
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
