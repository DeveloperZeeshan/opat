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

<div style=" text-align: left;  max-width: 80%; padding-bottom: 50px;  margin-left: auto;">

    <h4 style=" margin-bottom: 0;">Event</h4>
    <p style=" margin-top: 5px;"><span style=" font-weight: 600;">Date :</span>{{$data['date']??''}}</p>
    <p style=" font-size: 20px;"><span style=" font-weight: 600;">Title :</span>{{$data['title']??''}}</p>
    <p style=" font-size: 20px;"><span style=" font-weight: 600;">Subject :</span> {{$data['subject']??''}}</p>
    <p style=" font-size: 20px;"><span style=" font-weight: 600;">Comment :</span> {{$data['comment']??''}}</p>
</div>
</body>
</html>