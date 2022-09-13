<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ __('Attendance Report') }}</title>

   

</head>
<body>
    <div class="header">
        <img src="{{ url('public/backend/img/corporatelogo.png') }}">
    </div>
    <div class="footer"><p>{{ __('Page:') }} <span class="pagenum"></span></p></div>
    <div class="container table-responsive">
       <table>
        <thead>
            <tr>
                <th>{{ __('SL') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Designation') }}</th> 
                <th>{{ __('Total Attendance') }}</th>
                <th>{{ __('Total Absence') }}</th>
                <th>{{ __('Casual Leave') }}</th>
                <th>{{ __('Earned Leave') }}</th>
                <th>{{ __('Advance Leave') }}</th>
                <th>{{ __('Special Leave') }}</th>
                <th>{{ __('Total Leave') }}</th>
            </tr>
        </thead>
        <tbody>
            @php($sl = 1)
            @php($total_leave = 0)
            @foreach($users as $user)
            <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->employee_id }}</td>
                <td>{{ $user->designation }}</td>
                <td>
                    @foreach($attendances as $attendance)
                    @if($user->id == $attendance->user_id)
                    {{ $attendance->total_attendances }}
                    @endif
                    @endforeach
                </td>
                                <td>
                                    @foreach($absences as $absence)
                                    @if($user->id == $absence->user_id)
                                    {{ $absence->total_absences }}
                                    @endif
                                    @endforeach
                                </td>
                <td>
                    @foreach($casual_leaves as $casual_leave)
                    @if($user->id == $casual_leave->user_id)
                    {{ $casual_leave->total_casual_leaves }}
                    @php($total_leave += $casual_leave->total_casual_leaves)
                    @endif
                    @endforeach
                </td>
                <td>
                    @foreach($earned_leaves as $earned_leave)
                    @if($user->id == $earned_leave->user_id)
                    {{ $earned_leave->total_earned_leaves }}
                    @php($total_leave += $earned_leave->total_earned_leaves)
                    @endif
                    @endforeach
                </td> 
                <td>
                    @foreach($advance_leaves as $advance_leave)
                    @if($user->id == $advance_leave->user_id)
                    {{ $advance_leave->total_advance_leave }}
                    @php($total_leave += $advance_leave->total_advance_leave)
                    @endif
                    @endforeach
                </td>
                                <td>
                                    @foreach($special_leaves as $special_leave)
                                    @if($user->id == $special_leave->user_id)
                                    {{ $special_leave->total_special_leave }}
                                    @php($total_leave += $special_leave->total_special_leave)
                                    @endif
                                    @endforeach
                                </td>
                <td>
                    {{ $total_leave }}
                    @php($total_leave = 0)
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <p>{{ __('Prepared By') }}</p>
        <p>{{ __('Authorised Signature') }}</p>
    </div>
</div>
</body>
</html>