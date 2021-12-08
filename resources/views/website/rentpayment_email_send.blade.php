<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opat Email</title>
</head>
<body>
    
    <div style=" text-align: center; padding: 100px;">
        <img src="http://opat.devcustomprojects.com/website/images/logo.png">
    </div>

    <div style=" text-align: right;  max-width: 80%; padding-bottom: 50px;  margin-left: auto;">

        <h4 style=" margin-bottom: 0;">Caretaker,</h4>
        <h4 style=" margin-top: 5px;">{{$data['caretaker_name']??''}}</h4>
        <p style=" font-size: 18px;">{{$data['caretaker_address']??''}}</p>
        <p style=" font-size: 18px;"><span style=" font-weight: 400;">Invoice Date :</span> {{$data['invoice_date']??''}}</p>
    </div>

    <div style="padding: 30px 0;">
        <table style=" width: 100%; margin-bottom: 35px;">
            <thead>
                <tr style=" background:#0F4C82;">
                    <th style=" padding: 10px; color: white; text-align: center;">#</th>
                    <th style=" padding: 10px; color: white; text-align: center;">NAME</th>
                    <th style=" padding: 10px; color: white; text-align: center;">PAYMENT DATE</th>
                    <th style=" padding: 10px; color: white; text-align: center;">MONTHLY RENT AMOUNT</th>
                    <th style=" padding: 10px; color: white; text-align: center;">AMOUNT RECIEVED</th>
                    <th style=" padding: 10px; color: white; text-align: center;">TOTAL DUE</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data['rentPayment'] as $key=>$item)
                    <tr style=" background: #eee;">
                        <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;">{{++$key}}</td>
                        <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;">{{$item['getConsumerDetail']['name']??''}}</td>
                        <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;">{{$item['rent_date']??''}}</td>
                        <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;">{{$item['bed_amount']??''}}</td>
                        <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;">{{$item['recieved_amount']??''}}</td>
                        <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;">{{$item['due_amount']??''}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style=" max-width: 30%;  margin-left: auto; text-align: right;">
            <p style=" font-size: 20px;">Subtotal amount:${{ $data['due_amount']??''}} </p>
            {{--<p style=" font-size: 20px;">vat (0%) : $0</p>--}}
            <hr>
        </div>
        <div style=" display: flex;">
            <p style=" width: 50%; font-size: 18px; text-align: left;">Signature :_______________</p>
            <h4 style=" width: 50%; font-size: 18px; text-align: right;">Total :${{$data['due_amount']??''}}</h4>
        </div>
    </div>

</body>

</html>