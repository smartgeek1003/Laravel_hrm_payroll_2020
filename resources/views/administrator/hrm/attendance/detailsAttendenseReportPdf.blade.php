
<div class="invoice">
  <div class="heeading">
    <div class="invo"><b>{{ __('Attendance Sheet') }}</b></div></div>
    <div class="row">
      <div class="column">
        
        <img src="{{ asset('public/profile_picture/'.auth()->user()->avatar) }}" class="img"><br><br><br>
        
        <?php $users= \App\User::all();
        foreach($users as $user){
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
        {{ __('EMP ID NO:') }} {{$empid}}<br>
        
        {{ __('Name:') }} {{$empname}}<br>
        <?php $desig= \App\Designation::find($designation)->designation;?>
        {{ __('Designation:') }} {{$desig}}<br>
        </b>
        
        
      </div>
      
      <div class="column">
      </div>
      <div class="column">
        <br>
        <p>
          {{ __('Date of Birth:') }} {{$datebirth}}<br>
          {{ __('Joining Date:') }} {{$joindate}}<br>
          {{ __('Contact:') }} {{$contact}}<br>
          {{ __('Present Address:') }} {{$prsaddress}}<br>
        {{ __('Permanent Address:') }} {{$prmaddress}}</p>
      </div>
    </div>
    
    <div class="row">
      <table class="mytable" border="1">
        <thead>
          <tr>
            <th>{{ __('SL') }}</th>
            <th>{{ __('User ID') }}</th>
            <th>{{ __('Attendend By') }}</th>
            <th>{{ __('Attendance Date') }}</th>
            <th>{{ __('Attendance Status') }}</th>
            <th>{{ __('Leave Category') }}</th>
            <th>{{ __('In Time') }}</th>
            <th>{{ __('Out Time') }}</th>
          </tr>
        </thead>
        <tbody>
          <?php $sl=1;?>
          @foreach($attendance as $attd)
          <tr>
            <td>{{$sl++}}</td>
            <td>{{ __('ATTD') }}{{$attd->id}}</td>
            <td>{{Auth::user()->name}}</td>
            <td>{{ $attd->attendance_date }}</td>
            <td>
              @if($attd->attendance_status==1)
              <b class="btn btn-success">{{ __('Present') }}</b>
              @else
              <b class="btn btn-danger">{{ __('Absence') }}</b>
              @endif
            </td>
            <td>
              @if($attd->leave_category_id==0)
              <b class="btn btn-primary">{{ __('No Leave') }}</b>
              @else
              <b class="btn btn-success">{{ __('Leave') }}</b>
              @endif
            </td>
            <td>{{ $attd->check_in }}</td>
            <td>{{ $attd->check_out }}</td>
            
          </tr>
          @endforeach
          <tr>
            <th colspan="7">{{ __('Total') }}</th>
            <th>{{$attendance->count()}} days</th>
          </tr>
          <tr>
            <th colspan="7">{{ __('Total') }}</th>
            <th>{{$attds->count()}} {{ __('Present') }}</th>
          </tr>
          <tr>
            <th colspan="7">{{ __('Total') }}</th>
            <th>{{$abs->count()}} {{ __('Absence') }}</th>
          </tr>
        </tbody>
      </table>
      
      <div class="column1">
      </div>
      <div class="column1">
      </div>
      <div class="column1">
        
        
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