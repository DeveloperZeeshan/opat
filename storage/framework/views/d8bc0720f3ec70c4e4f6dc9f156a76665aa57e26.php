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
    <h2 style=" margin-top: 5px;"><?php echo e($data['caretaker_name']??''); ?></h2>
    <p style=" font-size: 20px;"><?php echo e($data['caretaker_address']??''); ?></p>
    <p style=" font-size: 20px;"><span style=" font-weight: 600;">Invoice Date :</span> <?php echo e($data['invoice_date']??''); ?></p>
</div>

<div style="padding: 30px 0;">
    <table style=" width: 100%; margin-bottom: 35px;">
        <thead>
        <tr style=" background: #4B848E;">
            <th style=" padding: 10px; color: white; text-align: center;">#</th>
            <th style=" padding: 10px; color: white; text-align: center;">Nature of incident</th>
            <th style=" padding: 10px; color: white; text-align: center;">Incident Detail</th>
            <th style=" padding: 10px; color: white; text-align: center;">Additional Notes</th>
            <th style=" padding: 10px; color: white; text-align: center;">Incident Date</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $data['incidentReport']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style=" background: #eee;">
                <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;"><?php echo e(++$key); ?></td>
                <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;"><?php echo e($item['nature_of_incident']??''); ?></td>
                <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;"><?php echo e($item['incident_detail']??''); ?></td>
                <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;"><?php echo e($item['additional_notes']??''); ?></td>
                <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;"><?php echo e($item['incident_dates']??''); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div style=" display: flex;">
        <p style=" width: 50%; font-size: 25px; text-align: left;">Signature :__________________________</p>
    </div>
</div>

</body>

</html>s<?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/website/incident_report_email_send.blade.php ENDPATH**/ ?>