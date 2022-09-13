@extends('administrator.master')
@section('title', __('Add Expence'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     {{ __('ADD EXPENSES') }} 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
      <li><a>{{ __('HRM') }}</a></li>
      <li><a href="{{ url('/hrm/expence/manage-expence') }}">{{ __('Add new expeses') }}</a></li>
      <li class="active">{{ __('Add expeses') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('Add expeses') }}</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <form action="{{ url('/hrm/expence/store') }}" method="post" name="add_form_expence">
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
              <p class="text-yellow">{{ __('Enter New Accounts details. All field are required.') }} </p>
              @endif
            </div>
            <!-- /.Notification Box -->

            <div class="col-md-6">

<input type="hidden" name="deletion_status" value="0">

          <label for="balance_amount">{{ __('Expense Date') }} <span class="text-danger">*</span></label>
            <div class="form-group">
              <input type="date" name="expense_date" id="theDate1" class="form-control">

            
            </div>

           
            <script type="text/javascript">
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;
            var today = year + "-" + month + "-" + day;
            document.getElementById('theDate1').value = today;
            </script>
                                      

              <label for="employee_id">{{ __('Expense Purpose') }} <span class="text-danger">*</span></label>
            <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }} has-feedback">
              <select name="exp_purpose"  class="form-control">
                <option value="" selected disabled>{{ __('Select one') }}</option>
            <?php $expcats= \App\ExpPurpose::all()->where('created_by', Auth::user()->id);?>
                @foreach($expcats as $expcat)
                <option value="{{$expcat->exp_name}}"> {{$expcat->exp_name}}</option>
                @endforeach
                
               
              </select>
            
            </div>


            <label for="employee_id">{{ __('Employee Name') }} <span class="text-danger">*</span></label>
            <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }} has-feedback">
              <select name="employee_id"  class="form-control">
                <option value="" selected disabled>{{ __('Select one') }}</option>
                @foreach( $employees as $employee )
                <option value="{{ $employee['id'] }}"> {{ $employee['name'] }} </option>
                @endforeach
              </select>
              @if ($errors->has('employee_id'))
              <span class="help-block">
                <strong>{{ $errors->first('employee_id') }}</strong>
              </span>
              @endif
            </div>
            <!-- /.form-group -->


              <label for="balance_amount">{{ __('Expense amount') }} <span class="text-danger">*</span></label>
            <div class="form-group{{ $errors->has('balance_amount') ? ' has-error' : '' }} has-feedback">
              <input type="text" name="exp_amount" id="balance_amount" class="form-control" value="{{ old('balance_amount') }}" placeholder="{{ __('Enter Balance amount..') }}">
              @if ($errors->has('balance_amount'))
              <span class="help-block">
                <strong>{{ $errors->first('balance_amount') }}</strong>
              </span>
              @endif
            </div>


            <label for="balance_amount">{{ __('Cheque No.?') }}</label>
            <div class="form-group">
              <input type="text" name="cheque_no" class="form-control" value="{{ old('balance_amount') }}" placeholder="{{ __('Enter Cheque No.') }}">
            </div>


            </div>
            <!-- /.col -->
            <div class="col-md-12">
              <label for="remarks_if_any">{{ __('Remarks, if any') }} <span class="text-danger"></span></label>
              <div class="form-group{{ $errors->has('remarks_if_any') ? ' has-error' : '' }} has-feedback">
                <textarea class="textarea text-description" name="particular"  placeholder="{{ __('Enter Purchased Details..') }}">{{ old('remarks_if_any') }}</textarea>
                @if ($errors->has('remarks_if_any'))
                <span class="help-block">
                  <strong>{{ $errors->first('remarks_if_any') }}</strong>
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
          <a href="{{ url('/hrm/expence/manage-expence') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> {{ __('Cancel') }}</a>
          <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> {{ __('Add expeses') }}</button>
        </div>
      </form>
    </div>
    <!-- /.box -->


  </section>
  <!-- /.content -->
</div>
<script type="text/javascript">
document.forms['add_form_expence'].elements['publication_status'].value = "{{ old('publication_status') }}";
</script>
@endsection
