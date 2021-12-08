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

<div style=" text-align: left;  max-width: 80%; padding-bottom: 50px;  ">

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
            <th style=" padding: 10px; color: white; text-align: center;">Medication Desciption</th>
            <th style=" padding: 10px; color: white; text-align: center;">Frequency Taken</th>
            <th style=" padding: 10px; color: white; text-align: center;">Start Date</th>
            <th style=" padding: 10px; color: white; text-align: center;">End Date</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $data['medication']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style=" background: #eee;">
                <td style=" padding: 10px; color: black; text-align: left; font-size: 20px;"><?php echo e(++$key); ?></td>
                <td style=" padding: 10px; color: black; text-align: left; font-size: 20px;"><?php echo e($item['medication']??''); ?></td>
                <td style=" padding: 10px; color: black; text-align: left; font-size: 20px;"><?php echo e($item['frequency_taken']??''); ?></td>
                <td style=" padding: 10px; color: black; text-align: left; font-size: 20px;"><?php echo e($item['start_date']??''); ?></td>
                <td style=" padding: 10px; color: black; text-align: left; font-size: 20px;"><?php echo e($item['end_date']??''); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>


</div>

</body>

</html><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/website/medication_email_send.blade.php ENDPATH**/ ?>