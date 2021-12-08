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
    <h2 style=" margin-top: 5px;">Transport Trcaker Invoice </h2>
    <p style="font-size: 16px;"><b>Subject:</b><?php echo e($data['subject']); ?></p>
    <p style="font-size: 16px;"><b>Notes: </b><?php echo e($data['notes']); ?></p>
</div>

<div style="padding: 30px 0;">
    <table style=" width: 100%; margin-bottom: 35px;">
        <thead>
        <tr style=" background: #4B848E;">
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
            <td style=" padding: 10px; color: black; text-align: left; font-size: 20px;"><?php echo e($data['pickup']); ?></td>
            <td style=" padding: 10px; color: black; text-align: left; font-size: 20px;"><?php echo e($data['dropoff']); ?></td>
            <td style=" padding: 10px; color: black; text-align: left; font-size: 20px;"><?php echo e($data['amount']); ?></td>
            <td style=" padding: 10px; color: black; text-align: left; font-size: 20px;"><?php echo e($data['milleage']); ?></td>
        </tr>
        </tbody>
    </table>

</div>
</body>
</html><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/website/tracker_email_send.blade.php ENDPATH**/ ?>