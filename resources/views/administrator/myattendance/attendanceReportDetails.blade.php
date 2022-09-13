@extends('administrator.master')
@section('title', __('Attendance Report'))
@section('main_content')
<div class="content-wrapper wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->




                   <div class="state_hader clearfix">


                     <div class="card-header Su clearfix">
                    <div class="Left_One float-left w-50">
                        <h3 class="card-title FormTitle">{{__('Salary Sheet')}}</h3>
                    </div>
                    <div class="Left_Two text-right float-left w-50">
                        <button class="btn StateB Print"> {{__('print')}}</button>
                    </div>
                </div>
                        <div class="state_logo float-left w-50">

                        @if(!empty(auth()->user()->avatar))
                        <img src="{{ asset('public/profile_picture/'.auth()->user()->avatar) }}" class="img-fluid" alt="User Image">
                        @else
                        <img src="{{ asset('public/profile_picture/blank_profile_picture.png') }}" class="img-fluid" alt="User Image">
                        @endif

                        </div>
                        <div class="state_title float-left w-50">
                            <h3 class="mb-0"> {{ __('Attendance Report') }} {{__('of')}} {{$empid}}  </h3>
                            <p class="mb-0">{{ auth()->user()->name}}</p>
                            <div class="Employee_dtl pt-2">
                                <p class="mb-0">{{ auth()->user()->present_address}}</p>
                                <p class="mb-0">[{{$startdate}} To {{$enddate}}]</p>
                                <p class="mb-0">{{__('Contact:')}} {{ auth()->user()->contact_no_one}}</p>
                            </div>
                        </div>
                    </div>

<?php 

$lates= DB::table('myattendances')->whereBetween('date', [$startdate, $enddate])
  ->where('name', $empid)->where('late','!=', '')
  ->get(); 
$early= DB::table('myattendances')->whereBetween('date', [$startdate, $enddate])
  ->where('name', $empid)->where('early','!=', '')
  ->get(); 

$absent= DB::table('myattendances')->whereBetween('date', [$startdate, $enddate])
  ->where('name', $empid)->where('absent', 'True')
  ->get(); 
$leave= DB::table('myattendances')->whereBetween('date', [$startdate, $enddate])
  ->where('name', $empid)->where('absent', 'Leave')
  ->get(); 

$intime= DB::table('myattendances')->whereBetween('date', [$startdate, $enddate])
  ->where('name', $empid)->where('check_in','!=', '')
  ->get(); 

  ?>
                    <div class="personal_info py-3 mt-3 clearfix">
                        <div class="Present_add float-left">
                            <p class="mb-0 FB">{{__('Late:')}} {{$lates->count()}}</p>
                            <p class="mb-0 FB">{{__('Early:')}} {{$early->count()}}</p>
                            
                        </div>
                        <div class="Parmanent_add float-left">
                            <p class="mb-0 FB">{{__('Absent:')}}  {{$absent->count()-4}}</p>
                            <p class="mb-0 FB">{{__('Leave:')}}  {{$leave->count()}}</p>
                           
                        </div>
                        <div class="Dates_official float-left">
                            <p class="mb-0 FB">{{__('Working Time:')}} {{$intime->count()}} {{__('Days')}}</p>
                            <p class="mb-0">{{ auth()->user()->email}}</p>
                        </div>
                    </div>










        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
         

            <div class="box-body">
        <!-- Default box -->
        <div class="box box-primary">
            <!-- Notification Box -->
            <div class="col-md-12">
              <table class="table table-bordered">
               <tr class="bg-info">
                <th>{{ __('sl#') }}</th>
                <th>{{ __('Employee ID') }}</th>
                <th>{{ __('Employee Name') }}</th>
                 <th>{{ __('Date') }}</th>
                <th>{{ __('In Time') }}</th>
                <th>{{ __('Out Time') }}</th>
                <th>{{ __('Work Time') }}</th>
                <th>{{ __('Late') }}</th>
                <th>{{ __('Early') }}</th>
                <th>{{ __('Absence') }}</th>
              </tr>

              @php($sl = 1)
              @foreach($myattds as $myattd)
              <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $myattd->empidno }}</td>
                <td>{{ $myattd->name }}</td>
                <td>{{ $myattd->date }}</td>

                <td>{{ $myattd->check_in }}</td>
                <td>{{ $myattd->check_out }}</td>
                <td>{{ $myattd->atttime }}</td>
                <td>{{ $myattd->late }}</td>
                <td>{{ $myattd->early }}</td>
                <td>{{ $myattd->absent }}</td>

               
              </tr>
              @endforeach
            </table>
          </div>
          <!-- /. end col -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.end.col -->
            <!-- /.box-body -->


 





    <script>
        $(function() {
        
        $(".Print").on('click', function() {
            print();
        });
            
        });

    </script>         
            
            
           


            
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
document.forms['file_name_add_form'].elements['publication_status'].value = "{{ old('publication_status') }}";
</script>
@endsection