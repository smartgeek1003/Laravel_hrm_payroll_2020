<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ __('Job Report') }}</title>


</head>
<body onload="window.print();">
    <div id="printable_area" class="col-md-12 table-responsive">

    <table  class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('SL#') }}</th>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Designation') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Contact No') }}</th>
            </tr>
        </thead>
        <tbody>
            @php($sl = 1)
            @foreach($employees as $employee)
            <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $employee['employee_id'] }}</td>
                <td>{{ $employee['name'] }}</td>
                <td>{{ $employee['designation'] }}</td>
                <td>{{ $employee['email'] }}</td>
                <td>{{ $employee['contact_no_one'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>