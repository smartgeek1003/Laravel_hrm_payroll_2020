@extends('administrator.master')
@section('title', __('Dashboard'))

@section('main_content')

<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>{{ __('Dashboard') }}
      
      <small>{{ __('Control panel') }}</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>{{ __(' Home') }}</a></li>
      <li class="active">{{ __('Dashboard') }}</li>
    </ol>
  </section>
  @php($user = Auth::user())
  @if($user->access_label == 1)
  <!-- Main content -->
  <section class="content">
   <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><i class="fa fa-users"></i> {{ count($employees) }}</h3>

          <center><b>{{ __('Employees') }}</b></center>
        </div>
        <div class="icon">
          
        </div>
        <a href="{{ url('/people/clients') }}" class="small-box-footer">{{ __('More info') }} <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-orange">
        <div class="inner">
         <h3><i class="fa fa-envelope"></i> {{ count($references) }}</h3>

          <center><b>{{ __('References') }}</b></center>
        </div>
        <div class="icon">
          
        </div>
        <a href="{{ url('/people/references') }}" class="small-box-footer">{{ __('More info ') }}<i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
          <h3><i class="fa fa-file"></i> {{ count($clients) }}</h3>

            <center><b>{{ __('Clients') }}</b></center>
        </div>
        <div class="icon">
          
        </div>
        <a href="{{ url('/people/employees') }}" class="small-box-footer">{{ __('More info ') }}<i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><i class="fa fa-image"></i> {{ count($files) }}</h3>

          <center> <b>{{ __('Files') }}</b></center> 
        </div>
        <div class="icon">
          
        </div>
        <a href="{{ url('/folders') }}" class="small-box-footer">{{ __('More info') }} <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->







<!-- =================Statistics start ========================-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<?php
$notics= \App\Notice::take(4)->get();
$holidays= \App\Holiday::all();
$files= \App\File::all();

$personalevents= \App\PersonalEvent::all();

?>
<div class="row">
    <div class="col-lg-6">
       <div class="card1">
       <div class="card-body">
        <canvas id="myChart2"></canvas>
           </div>
        </div>
    </div>
    <div class="col-lg-6">
       <div class="card1">
       <div class="card-body">
        <canvas id="myChart"></canvas>
           </div>
        </div>
    </div>
</div>

<div class="row myrow">
    <div class="col-lg-6">
      <h2 class="myh2">{{ __('Holiday') }}</h2>
      <table class="table table-bordered table-striped mt-0">
                        <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{ __('Holiday Name') }}</th>
                                <th>{{ __('Dated') }}</th>
                                <th>{{ __('Description') }}</th> 
                            </tr>
                        </thead>
                        <tbody>
                          <?php $sl=1;?>
                           
                            @foreach($holidays as $holiday)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{$holiday->holiday_name}}</td>
                                <td>{{$holiday->date}}</td>
                                <td>{{$holiday->description}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    </div>
    <div class="col-lg-6">
      <h2 class="myh2-1">{{ __('Notice') }}</h2>
       <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Description') }}</th> 
                            </tr>
                        </thead>
                        <tbody>
                          <?php $sl=1;?>
                           
                            @foreach($notics as $notic)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{$notic->notice_title}}</td>
                                <td>{{$notic->description}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    </div>
</div>

<script type="text/javascript">
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
type: 'pie',
data: {
labels: ['Employees', 'Notices', 'Holidays', 'Files'],
datasets: [{
label: 'Evaluation report by pie chart',
data: [{{ count($employees) }}, {{ count($notics) }}, {{ count($holidays) }} , {{ count($files) }} ],
backgroundColor: [
'#7bed9f',
'#ff6b6b',
'#54a0ff',
'#686de0',
],
borderColor: [
'#7bed9f',
'#ff6b6b',
'#54a0ff',
'#686de0',
],
borderWidth: 0
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});
</script>
<script type="text/javascript">
var ctx = document.getElementById('myChart2');
var myChart2 = new Chart(ctx, {
type: 'bar',
data: {
labels: ['Employees', 'Notices', 'Holidays', 'Files'],
datasets: [{
label: 'Evaluation Report By Bar Chart',
data: [{{ count($employees) }}, {{ count($notics) }}, {{ count($holidays) }} , {{ count($files) }} ],
backgroundColor: [
'#54a0ff',
'#ff6b6b',
'#686de0',
'#7bed9f',
'#CFD8DC'
],
borderColor: [
'#54a0ff',
'#ff6b6b',
'#686de0',
'#7bed9f',
'#CFD8DC'
],
borderWidth: 0
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});
</script>



<!-- =================Statistics end ========================-->














  </div>

    @if(count($personal_events)>0)
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">{{ __('Events') }}</h3>

        <div class="box-tools">
          <div class="input-group input-group-sm mysearch">
            <input type="text" name="table_search" class="form-control pull-right" placeholder="{{ __('Search') }}">

            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table  class="table table-bordered table-striped">
          <tr>
            <th>{{ __('SL#') }}</th>
            <th>{{ __('Event Name') }}</th>
            <th>{{ __('Start Date') }}</th>
            <th>{{ __('End Date') }}</th>
            <th>{{ __('Created By') }}</th>
          </tr>
          @php($sl = 1)
          @foreach($personal_events as $personal_event)
          <tr>
            <td>{{ $sl++ }}</td>
            <td><span class="label label-primary">{{ $personal_event->personal_event }}</span></td>
            <td><span class="label label-warning">{{ date("d F Y", strtotime($personal_event->start_date)) }}</span></td>
            <td><span class="label label-warning">{{ date("d F Y", strtotime($personal_event->end_date)) }}</span></td>
            <td>{{ $personal_event->name }}</td>
          </tr>
          @endforeach
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @endif
      </div>
  </section>
  <!-- /.content -->
  @endif
</div>
@endsection