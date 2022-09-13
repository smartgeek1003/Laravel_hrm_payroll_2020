
<div class="invoice">
    <div class="heeading">
        <div class="invo"><b>{{ __('Salary Statement') }}</b></div></div>
<div class="row">
  <div class="column">
   
  <img src="{{ asset('public/profile_picture/'.auth()->user()->avatar) }}" class="img" style="width:150px;"><br><br><br>
   

               <?php $users= \App\User::all();
                    foreach($users as $user){
                      $id=$user->id;
                    $empname=$user->name;
                    $idno=$user->id_number;
                    $joindate=$user->joining_date;
                    $contact=$user->contact_no_one;
                    $datebirth=$user->date_of_birth;
                    $designation=$user->designation_id;
                    $prsaddress=$user->present_address;
                    $prmaddress=$user->permanent_address;
                    }
                    
                    ?>
                    <b> 
                    {{ __('EMP ID NO: ') }}{{$idno}}000000{{$id}}<br>
                    {{ __('Name:') }} {{$empname}}<br>
                    <?php //$desig= \App\Designation::find($designation)->designation;?>
                    {{ __('Designation:') }} {{$designation}}<br>
                    </b>
                     
                  
  </div>
 
  <div class="column">
  </div>
  <div class="column">
                                <br>
<p>
    {{ __('Date of Birth: ') }} {{$datebirth}}<br>
    {{ __('Joining Date:') }} {{$joindate}}<br>
    {{ __('Contact: ') }}{{$contact}}<br>
    {{ __('Present Address:') }} {{$prsaddress}}<br>
    {{ __('Permanent Address:') }} {{$prmaddress}}</p>
  </div>

</div>

 
<div class="row table-responsive">
    <table border="1" class="mytable">

        <tr class="firstrow">
            <td>{{ __('SL') }}</td>
            <td>{{ __('PAID ID NO') }}</td>
            <td>{{ __('Pay Month') }}</td>
            <td>{{ __('Pay By') }}</td>
            <td>{{ __('Note') }}</td>
            <td>{{ __('Received Salary') }}</td></tr>

         
            @php ($sl = 1)
            @foreach($salarystats as $payroll)
            <tr>
                <td>{{ $sl ++ }}</td>
                <td>{{ __('PRLL') }}{{$payroll->id}}</td>
                <td>{{ date("d F Y", strtotime($payroll->payment_month)) }}</td>
                <td>{{Auth::user()->name}}</td>
                <td>{{$payroll->note}}</td>
                <td>${{$payroll->gross_salary}}</td>
            </tr>
            @endforeach
        
    </table>
  
  <div class="column1">
  </div>
  <div class="column1">
  </div>
  <div class="column1">
                         
                            <b>{{ __('Total:') }} ${{$datetotal}}</b><br>
  </div>
</div>


<div class="row">
<div class="column1">

</div>
<div class="column1">
   
</div>
<div class="column1"><br><br><br><br>
    <b>-------------</b><br>
    <b>{{ __('Authorized') }}</b><br>
  </div>
</div>
<br>
     <p>{{ __('Please contact us for more information about payment options') }}</p>
     <p>{{ __('Thank you for your booking') }}</p>

 <div class="heeading"></div>
</div>