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
                    <th style=" padding: 10px; color: white; text-align: center;">NAME</th>
                    <th style=" padding: 10px; color: white; text-align: center;">PAYMENT DATE</th>
                    <th style=" padding: 10px; color: white; text-align: center;">MONTHLY RENT AMOUNT</th>
                    <th style=" padding: 10px; color: white; text-align: center;">AMOUNT RECIEVED</th>
                    <th style=" padding: 10px; color: white; text-align: center;">TOTAL DUE</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data['rentPayment']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style=" background: #eee;">
                        <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;"><?php echo e(++$key); ?></td>
                        <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;"><?php echo e($item['getConsumerDetail']['name']??''); ?></td>
                        <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;"><?php echo e($item['rent_date']??''); ?></td>
                        <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;"><?php echo e($item['bed_amount']??''); ?></td>
                        <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;"><?php echo e($item['recieved_amount']??''); ?></td>
                        <td style=" padding: 10px; color: black; text-align: right; font-size: 20px;"><?php echo e($item['due_amount']??''); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div style=" max-width: 30%;  margin-left: auto; text-align: right;">
            <p style=" font-size: 20px;">Subtotal amount:$<?php echo e($data['due_amount']??''); ?> </p>
            
            <hr>
        </div>
        <div style=" display: flex;">
            <p style=" width: 50%; font-size: 25px; text-align: left;">Signature :__________________________</p>
            <h3 style=" width: 50%; font-size: 25px; text-align: right;">Total :$<?php echo e($data['due_amount']??''); ?></h3>
        </div>
    </div>

</body>

</html><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/website/rentpayment_email_send.blade.php ENDPATH**/ ?>