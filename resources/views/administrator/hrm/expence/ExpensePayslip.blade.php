

<link rel="stylesheet" href="{{asset('public/shiplucss/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/shiplucss/style.css')}}">
<style>
    * {
        margin: 0;
        padding: 0;
        outline: 0;
    }

    body {
        font-family: 'Roboto', sans-serif;
    }

    ul,
    ol {
        list-style-type: none;
    }

    a,
    a:hover,
    a:focus {
        text-decoration: none;
        outline: 0;
    }

    img {
        vertical-align: middle;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
        margin: 0;
        padding: 0;
    }
.text-right{text-align: right;}
    .btn,
    .btn:focus {
        outline: 0;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -ms-box-shadow: none;
        -o-box-shadow: none;
        box-shadow: none;
    }

    button {
        overflow: hidden;
    }

    button,
    button:focus {
        outline: 0;
    }

    /*====================================
    Common CSS Ends 
====================================*/
    /*====================================
    payslip_new Part CSS Starts 
====================================*/

    #payslip_new {
        width: 100%;
        position: relative;
    }

    .header_main {
        display: -ms-flex;
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .brand_logo {
        width: 35%;
    }

    .brand_logo img {
        max-width: 200px;
        max-height: 45px;
    }

    .header_main .payslip_new_head {
        width: 45%;
        text-align: right;
    }

    .Pay_slip_header_tilte {
        width: 20%;
        text-align: center;
    }

    .Pay_slip_header_tilte span {
        display: inline-block;
        font-size: 24px;
        padding: 3px 16px 8px;
        color: #444;
        font-weight: 500;
        line-height: 1.25;
        border: 3px solid #444;
    }

    .Pay_slip_header_tilte p {
        font-size: 16px;
        color: #666;
        font-weight: 500;
        text-transform: capitalize;
    }

    .header_main .payslip_new_head h5 {
        font-size: 24px;
        color: #404040;
        font-weight: 500;
        margin-bottom: 3px;
    }

    .header_main .payslip_new_head p {
        font-size: 16px;
        color: #777777;
        font-weight: 400;
    }

    .Employee_details_table,
    .Earning_deduction_table {
        display: -ms-flex;
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .Earning_deduction_table .table {
        margin-bottom: 0px;
        border: 1px solid #555;
    }

    .net_payTable .table {
        width: 100%;
        text-align: right;
        border-top: 1px solid #555;
        border-left: 1px solid #555;
        border-right: 1px solid #555;
    }

    .Earning_deduction_table .table td,
    .Earning_deduction_table .table th {
        vertical-align: middle;
        border-top: none;
    }

    .Employee_details_table table,
    .Earning_deduction_table table {
        width: 50%;
    }

    .Earning_deduction_table table {
        min-height: 196px;
    }

    .Earning_deduction_table tfoot {
        border-top: 1px solid #555;
    }

    .Employee_details_table .table td,
    .Employee_details_table .table th {
        padding: 2px 4px;
        vertical-align: middle;
    }

    .table_tilte {
        background: #30336b;
    }

    .table_tilte01,
    .table_tilte02,
    .table_tilte03,
    .table_tilte04 {
        background: #b4b4b4;
        border-bottom: 1px solid #999;
    }

    .table_Sub_content {
        padding: 15px;
        border-left: 1px solid #999;
    }

    .table_Sub_content.table_Sub_content01 {
        border-color: transparent;
    }

    .table_tilte h4 {
        font-size: 16px;
        color: #404040;
        font-weight: 700;
    }

    .table_tilte01 p,
    .table_tilte02 p,
    .table_tilte03 p,
    .table_tilte04 p,
    .table_title05 p {
        font-size: 16px;
        color: #666;
        font-weight: 400;
        line-height: 24px;
    }

    .table_total {
        padding-top: 20px;
        border-top: 1px solid #999;
        margin-bottom: 30px;
    }

    .table_total .table_title05 {
        float: left;
        width: 50%;
    }

    .table_total .table_title06 {
        float: left;
        width: 50%;
    }

    .table_title05 .table_Sub_content,
    .table_title06 .table_Sub_content {
        padding: 0px;
        border: none;
    }

    .table_title05 p,
    .table_title06 p {
        font-size: 16px;
        color: #222;
        font-weight: 700;
        text-transform: capitalize;
        padding-top: 5px;
    }

    .Signature_container {
        margin-top: 80px;
        display: -ms-flex;
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .Signature_container .authority_sign,
    .Signature_container .Employer_sign {
        width: 50%;
    }
    .Signature_container .Employer_sign {
        display: -ms-flex;
        display: flex;
        justify-content: flex-end;
        align-items: flex-start
    }
    .Signature_container .Employer_sign {
        text-align: right;
    }
    .Signature_container .act_signature {
        width: 300px;
        padding-top: 8px;
        border-top: 2px solid #555;
        text-align: center;
    }
    .Signature_container .act_signature h4 {
        font-size: 21px;
        color: #444
    }

    .Btt_table {
        margin-top: 15px;
        display: -ms-flex;
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .Btt_table .BTT_LEFT {
        width: 58.333333%;
    }

    .Btt_table .BTT_RIGH {
        width: 41.666667%;
    }

    .exchange_policy {
        padding-bottom: 40px;
    }

    .exchange_policy h3 {
        margin-bottom: 8px;
    }

    /*=========== for payslip_new Table============*/
    .table.border_less,
    .table.border_less td,
    .table.border_less th {
        border: none !important;
    }

    .table td,
    .table th {
        color: #444444;
        padding: 4px 12px;
    }

    .table .thead-dark th {
        color: #404040;
        background-color: #fff;
        border-color: #555;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #555;
    }

    .table thead th {
        border-bottom: 2px solid #555;
    }

    .Null_text {
        color: transparent !important;
    }
    .row{background: #d4e3e3;}

    .container{
        border:1px solid #42BF6D;
    }

    /*=========== for payslip_new Table============*/

</style>

<body>
    <!--=================================================
        payslip_new Part HTML Starts
==================================================-->
    <section id="payslip_new">
        <div class="container">

           <?php $expenses=\App\ExpenceManagement::all()->where('id', $id);?>
           @foreach($expenses as $expense)
                        
            <div class="row" >

                <div class="col-lg-12 header_main clear-fix">

                    <div class="brand_logo">
                       
                       @if(!empty(auth()->user()->avatar))
                        <img src="{{ asset('public/profile_picture/'.auth()->user()->avatar) }}" class="receiptlogo" alt="User Image">
                        @else
                        <img src="{{ asset('public/profile_picture/blank_profile_picture.png') }}" class="receiptlogo" alt="User Image">
                        @endif
                    </div>


                    <div class="Pay_slip_header_tilte"><span>Pay Slip</span>
                        <p>{{$expense->purchased_date}}</p>
                    </div>
                    <div class="payslip_new_head">
                        <h5>{{Auth::user()->name}}</h5>
                        <p>{{Auth::user()->present_address}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="Employee_details_table">
                        <table class="table border_less">

                            <tbody>
                                <tr>
                                    <th scope="row">Slip No.</th>
                                    <td>: #{{__('EXP')}}{{$expense->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{__('Employee')}}</th>
                                    <td>: {{\App\User::find($expense->employee_id)->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{__('Payment Date')}}</th>
                                    <td>: {{$expense->purchased_date}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table border_less">
                            <tbody>
                                <tr>
                                    <th scope="row">{{__('Cheque No')}}</th>
                                    <td>: @if($expense->purchased_from==NULL) None @else {{$expense->purchased_from}} @endif</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{__('Pay By Email')}}</th>
                                    <td>: {{Auth::user()->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{__('Pay By Number')}} :</th>
                                    <td>: {{Auth::user()->contact_no_one}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
             
                <div class="col-lg-12">
                       <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">{{__('S/L')}}<span class="Null_text">__</span></th>
                                    <th scope="col">{{__('Purpose')}}<span class="Null_text">__</span></th>
                                    <th scope="col">{{__('Particular')}}</th>
                                    <th scope="col" class="text-right">{{__('Amount')}}</th>
                                </tr>
                            </thead>
                             <tr>
                                    <td scope="col">1<span class="Null_text">__</span></td>
                                    <td scope="col">{{$expense->item_name}}<span class="Null_text">__</span></td>
                                    <td scope="col">{{$expense->purchased_details}}</td>
                                    <td scope="col" class="text-right">${{$expense->amount_spent}}.00</td>
                                </tr>
                        </table>
                    <div class="net_payTable">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"><span class="Null_text">__</span></th>
                                    <th scope="col"><span class="Null_text">__</span></th>
                                    <th scope="col">{{__('Net Pay')}}</th>
                                    <th scope="col">${{$expense->amount_spent}}.00</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
         @endforeach 
            <div class="row">
                <div class="col-lg-12">
                    <div class="Signature_container">
                        <div class="authority_sign">
                            <div class="act_signature">
                                <h4>{{__('Authorize Signature')}}</h4>
                            </div>
                        </div>
                        <div class="Employer_sign">
                            <div class="act_signature">
                                <h4>{{__('Employee\'s Signature')}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="myprint">
                    <button class="btn btn-primary" onclick="window.print()" ><i  class="fa fa-print"></i> {{ __('Print') }}</button>
                    <a href="{{url('hrm/expence/manage-expence')}}"><button class="btn btn-primary"><i class="fa fa-download"></i> {{ __('Back') }}</button></a>
                    
                </div>

        </div>
    </section>

    <!--=================================================
        payslip_new Part HTML Ends
==================================================-->


     


