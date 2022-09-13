@extends('administrator.master')
@section('title', __('Add Loan/Credit'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('LOAN/CREDIT') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
            <li><a href="{{ url('/hrm/loans') }}">{{ __('Manage Loan/Credit') }}</a></li>
            <li class="active">{{ __('Add Loan/Credit') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Add Loan/Credit') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="{{ url('/hrm/loans/store') }}" method="post" name="loan_add_form">
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
                                <p class="text-yellow">{{ __('Enter loan details. All field are required.') }} </p>
                            @endif
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                            <label for="user_id">{{ __('Employee Name ') }}<span class="text-danger">*</span></label>
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

                            <label for="loan_name">{{ __('Loan Name') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('loan_name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="loan_name" id="loan_name" class="form-control" value="{{ old('loan_name') }}" placeholder="{{ __('Enter loan name..') }}">
                                @if ($errors->has('loan_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('loan_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="number_of_installments">{{ __('Number of Installment') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('number_of_installments') ? ' has-error' : '' }} has-feedback">
                                    <input type="text" name="number_of_installments" class="form-control pull-right" value="{{ old('number_of_installments') }}" id="number_of_installments" placeholder="{{ __('Enter number of installment') }}">
                                @if ($errors->has('number_of_installments'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('number_of_installments') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="loan_amount">{{ __('Loan Amount ') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('loan_amount') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="loan_amount" id="loan_amount" class="form-control" value="{{ old('loan_amount') }}" placeholder="{{ __('Enter loan name..') }}">
                                @if ($errors->has('loan_amount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('loan_amount') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <label for="loan_description">{{ __('Loan Description') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('loan_description') ? ' has-error' : '' }} has-feedback">
                                <textarea class="textarea text-description" name="loan_description" id="loan_description" placeholder="{{ __('Enter client description..') }}">{{ old('loan_description') }}</textarea>
                                @if ($errors->has('loan_description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('loan_description') }}</strong>
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
                    <a href="{{ url('/hrm/loans') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> {{ __('Cancel') }}</a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> {{ __('Add loan') }}</button>
                </div>
            </form>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    document.forms['loan_add_form'].elements['user_id'].value = "{{ old('user_id') }}";
</script>
@endsection
