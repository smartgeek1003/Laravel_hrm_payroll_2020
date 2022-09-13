
<link rel="stylesheet" href="{{ asset('public/backend/mystyle.css') }}">
<div class="content-wrapper">
  
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
          
            <div class="box-body">
                <div class="btn-body">
                <a href="{{ url('hrm/salary/statement/search') }}" class="mybtn">{{ __('Back') }}</a>
              
                <button onclick="window.print()" class="mybtn">{{ __('Print') }}</button>
               
                </div>
      

        
                <div class="st-left-body">
                    <h4>
                    <?php $users= \App\User::all();
                    foreach($users as $user){
                    $id=$user->id;
                    $empname=$user->name;
                    $idno=$user->id;
                    $joindate=$user->joining_date;
                    $contact=$user->contact_no_one;
                    $datebirth=$user->date_of_birth;
                    $designation=$user->designation_id;
                    $prsaddress=$user->present_address;
                    $prmaddress=$user->permanent_address;
                    }
                    
                    ?>
                    {{ __('EMP ID NO:') }} {{$idno}}000000{{$id}}<br>
                    {{ __('Name:') }} {{$empname}}<br>
                    <?php //$desig= \App\Designation::find($designation)->designation;?>
                    {{ __('Designation:') }} {{$designation}}<br>
                    {{ __('Date of Birth:') }} {{$datebirth}}<br>
                    {{ __('Joining Date:') }} {{$joindate}}<br>
                    {{ __('Contact:') }} {{$contact}}<br>
                    </h4>
                </div>
                
                <div class="st-center-body">
                    <div class="img-body"><img src="{{ asset('public/profile_picture/'.auth()->user()->avatar) }}" class="img"></div>
                    <h2>{{ __('Salary Statement') }}</h2>
                    <center><b>{{ date("F Y", strtotime($startdate)) }} to {{ date("F Y", strtotime($enddate)) }}<br>
                    <?php $users= \App\User::all()->where('employee_id', $empid);
                    foreach($users as $user){
                    $empname=$user->name;
                    }
                    
                    ?>
                    
                    </b></center>
                </div>
                <div class="st-right-body">
                    <h4>
                    {{ __('Present Address:') }} {{$prsaddress}}<br>
                    {{ __('Permanent Address:') }} {{$prmaddress}}
                    
                    </h4>
                </div>



                
                <div id="printable_area" class="table-responsive">
              


                <table class="mytable">
                    <thead>
                        <tr>
                            <th>{{ __('SL') }}</th>
                            <th>{{ __('PAID ID NO') }}</th>
                            <th>{{ __('Pay Month') }}</th>
                            <th>{{ __('Pay By') }}</th>
                            <th>{{ __('Note') }}</th>
                            <th>{{ __('Received Salary') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($sl = 1)
                        @foreach($salarystats as $payroll)
                        <tr>
                            <td>{{ $sl ++ }}</td>
                            <td>{{ __('PRLL') }}{{$payroll->id}}</td>
                            <td>{{ date("d F Y", strtotime($payroll->payment_month)) }}</td>
                            <td>{{Auth::user()->name}}</td>
                            <td>{{$payroll->note}}</td>
                            <td>{{$payroll->gross_salary}}</td>
                           

                        </tr>
                        @endforeach

                        <tr>
                            <th>{{ __('Total') }}</th>
                            <th>{{$datetotal}}</th>
                        </tr>

                    </tbody>
                </table>
            </div><!--printable-->



            <div class="sign-body-l">-----------------------------------<br>{{ __('Employee') }}</div>
            <div class="sign-body-r">-----------------------------------<br>{{ __('Authorized') }}</div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
