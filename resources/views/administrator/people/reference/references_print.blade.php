<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ __('Job Report') }}</title>

  

</head>
<body onload="window.print();">
    <div class="container table-responsive">
     <table>
        <thead>
            <tr>
                <th>{{ __('SL#') }}</th>
                <th>{{ __('Reference Name') }}</th>
                <th>{{ __('Address') }}</th>
                <th>{{ __('Contact No') }}</th>
            </tr>
        </thead>
        <tbody>
            @php($sl = 1)
            @foreach($references as $reference)
            <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $reference['name'] }}</td>
                <td>{{ $reference['present_address'] }}</td>
                <td>{{ $reference['contact_no_one'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>