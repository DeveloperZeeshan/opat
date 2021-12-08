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

<div style=" text-align: left;  max-width: 80%; padding-bottom: 50px;">
    <p style="font-size: 16px;"><b>Subject:</b>{{$data['subject']}}</p>
    <p style="font-size: 16px;"><b>Notes: </b>{{$data['notes']}}</p>
</div>

<div style="padding: 30px 0;">
    <table style=" width: 100%; margin-bottom: 35px;">
        <thead>
        <tr style=" background: #0F4C82;">
            <th style=" padding: 10px; color: white; text-align: center;">#</th>
            <th style=" padding: 10px; color: white; text-align: center;">Pickup</th>
            <th style=" padding: 10px; color: white; text-align: center;">Drop Off</th>
            <th style=" padding: 10px; color: white; text-align: center;">Amount</th>
            <th style=" padding: 10px; color: white; text-align: center;">Milleage</th>
        </tr>
        </thead>
        <tbody>
        <tr style=" background: #eee;">
            <td style=" padding: 10px; color: black; text-align: left; font-size: 20px;">1</td>
            <td style=" padding: 10px; color: black; text-align: left; font-size: 20px;">{{$data['pickup']}}</td>
            <td style=" padding: 10px; color: black; text-align: left; font-size: 20px;">{{$data['dropoff']}}</td>
            <td style=" padding: 10px; color: black; text-align: left; font-size: 20px;">{{$data['amount']}}</td>
            <td style=" padding: 10px; color: black; text-align: left; font-size: 20px;">{{$data['milleage']}}</td>
        </tr>
        </tbody>
    </table>

</div>
</body>
</html>