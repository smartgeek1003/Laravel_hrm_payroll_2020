<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>{{ $user['name'] }} {{ __('Details') }}</title>

  

</head>
<body>
  <div class="header">
    <img src="{{ url('public/backend/img/logo.png') }}">
  </div>
  <div class="footer"><p>{{ __('Page:') }} <span class="pagenum"></span></p></div>
  <div class="container">
    <table>
      <tr>
        <td>
          <h3>{{ __('MONTHLY PAYROLL') }}</h3>
          <p>
            {{ $user['employee_id'] }}
            <br>
            {{ $user['name'] }}
            <br>
            ({{ $user['designation'] }})
            <br>
            {{ __('Department of ') }}{{ $user['department'] }}
            <br>
            {{ __('Date: ') }}{{ date("d F Y", strtotime(now())) }}
          </p>
        </td>
        <td>
          @if(!empty($user['avatar']))
          <img src="{{ url('public/profile_picture/' . $user['avatar']) }}" class="img-responsive img-thumbnail" width="140px">
          @else
          <img src="{{ url('public/profile_picture/blank_profile_picture.png') }}" alt="blank_profile_picture" class="img-responsive img-thumbnail" width="160px">
          @endif
        </td>
      </tr>
    </table>
    <br>
    <table>
      <tr class="bg-info">
        <th>{{ __('sl#') }}</th>
        <th>{{ __('Description') }}</th>
        <th>{{ __('Debits') }}</th>
        <th>{{ __('Credits') }}</th>
      </tr>
      @php($sl = 1)
      @foreach($salary_payment_details as $data)
      <tr>
        <td>{{ $sl++ }}</td>
        <td>{{ $data->item_name }}</td>
        <td>
          @if($data->status == 'debits')
          -{{ $data->amount }}
          @endif
        </td>
        <td>
          @if($data->status == 'credits')
          {{ $data->amount }}
          @endif
        </td>
      </tr>
      @endforeach
      <tr>
        <td> &nbsp; </td>
      </tr>
      <tr class="success">
        <td><strong class="pull-right">{{ __('Gross Salary:') }}</strong></td>
        <td>
          <strong>
            {{ number_format($salary_payment->gross_salary, 2, '.', '') }}
          </strong>
        </td>
      </tr>
      <tr class="success">
        <td><strong class="pull-right">{{ __('Total Deduction:') }}</strong></td>
        <td><strong>{{ number_format($salary_payment->total_deduction, 2, '.', '') }}</strong></td>
      </tr>
      <tr class="success">
        <td><strong class="pull-right">{{ __('Net Salary:') }}</strong></td>
        <td><strong>{{ number_format($salary_payment->net_salary, 2, '.', '') }}</strong></td>
      </tr>
      <tr class="success">
        <td><strong class="pull-right">{{ __('Provident Fund:') }}</strong></td>
        <td><strong>{{ number_format($salary_payment->provident_fund, 2, '.', '') }}</strong></td>
      </tr>

    </table>

    <table>
      <tr>
        <td>{{ __('Prepared By') }}</td>
        <td>{{ __('Receiver Signature') }}</td>
        <td">{{ __('Approval Signature') }}</td>
      </tr>
    </table>

  </div>
</body>
</html>