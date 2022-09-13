<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ __('Job Report') }}</title>

 
</head>
<body onload="window.print();">
    <div class="container">
       <table class="border">
        <thead>
            <tr>
                <th>{{ __('SL#') }}</th>
                <th>{{ __('Client Name') }}</th>
                <th>{{ __('Client Type') }}</th>
                <th>{{ __('Contact No') }}</th>
                <th>{{ __('Address') }}</th>
            </tr>
        </thead>
        <tbody>
            @php($sl = 1)
            @foreach($clients as $client)
            <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $client['name'] }}</td>
                <td>{{ $client['client_type'] }}</td>
                <td>{{ $client['contact_no_one'] }}</td>
                <td>{{ $client['present_address'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>