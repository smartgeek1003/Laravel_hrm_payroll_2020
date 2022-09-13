@extends('administrator.master')
@section('title', __('Bonus Details'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ __(' BONUS') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __(' Dashboard') }} </a></li>
            <li><a href="{{ url('/hrm/bonuses') }}">{{ __(' Manage Bonuses') }}</a></li>
            <li class="active">{{ __(' Bonus Details') }}</li>
        </ol>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __(' Bonus Details') }}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
           

                    
<div  class="col-md-6">   <a href="{{ url('/hrm/bonuses') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> {{ __(' Back') }}</a></div>


        
<div  class="col-md-6">  <input type="text" id="myInput" class="form-control" placeholder="{{ __('Search..') }}"></div>



            <hr>
            <table  class="table table-bordered table-striped">
                <tbody id="myTable">
                    <tr>
                        <td>{{ __(' Employee Name') }}</td>
                        <td>{{ $bonus['name'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __(' Designation') }}</td>
                        <td>{{ $bonus['designation'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __(' Bonus Name') }}</td>
                        <td>{{ $bonus['bonus_name'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __(' Bonus Month') }}</td>
                        <td>{{ date("F Y", strtotime($bonus['bonus_month'])) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __(' Bonus Amount') }}</td>
                        <td>{{ $bonus['bonus_amount'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __(' Description') }}</td>
                        <td>{{$bonus['bonus_description']}}</td>
                    </tr>
                    <tr>
                        <td>{{ __(' Create By') }}</td>
                        <td>
                            @foreach($users as $user)
                            @if($user['id'] == $bonus['created_by'])
                            {{ $user['name'] }}
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __(' Date Added') }}</td>
                        <td>{{ date("D d F Y h:ia", strtotime($bonus['created_at'])) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __(' Last Updated') }}</td>
                        <td>{{ date("D d F Y h:ia", strtotime($bonus['updated_at'])) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="btn-group btn-group-justified">
                                <div class="btn-group">
                                    <a href="#" class="tip btn btn-primary btn-flat" title="" data-original-title="Label Printer">
                                        <i class="fa fa-print"></i>
                                        <span class="hidden-sm hidden-xs"> {{ __(' Print') }}</span>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a href="#" class="tip btn btn-primary btn-flat" title="" data-original-title="PDF">
                                        <i class="fa fa-file-pdf-o"></i>
                                        <span class="hidden-sm hidden-xs"> {{ __(' PDF') }}</span>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ url('/hrm/bonuses/edit/' . $bonus['id']) }}" class="tip btn btn-warning tip btn-flat" title="" data-original-title="Edit Product">
                                        <i class="fa fa-edit"></i>
                                        <span class="hidden-sm hidden-xs">{{ __(' Edit') }} </span>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ url('/hrm/bonuses/delete/' . $bonus['id']) }}" onclick="return confirm('Are you sure to delete this ?');" class="tip btn btn-danger bpo btn-flat" title="" data-content="<div><p>{{ __('Are you sure?') }}</p><a class='btn btn-danger' href='https://btrc.gunitok.com/products/delete/1'>{{ __('Yes I am sure') }}</a> <button class='btn bpo-close'>{{ __('No') }}</button></div>" data-html="true" data-placement="top" data-original-title="<b>{{ __('Delete Product') }}</b>">
                                    <i class="fa fa-trash-o"></i>
                                    <span class="hidden-sm hidden-xs"> {{ __(' Delete') }} </span>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>





 <!-- =================Data Search================== -->
                <script>
                $(document).ready(function(){
                 $("#myInput").on("keyup", function() {
                   var value = $(this).val().toLowerCase();
                   $("#myTable tr").filter(function() {
                     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                   });
                 });
                });
                </script>
<!-- =================Data Search================== -->
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
</section>
<!-- /.content -->
</div>
@endsection