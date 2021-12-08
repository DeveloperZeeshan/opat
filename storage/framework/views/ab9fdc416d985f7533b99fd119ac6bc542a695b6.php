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
    <h2 style=" margin-top: 5px;"><span style=" font-weight: 600;">Date :</span><?php echo e($data['date']??''); ?></h2>
    <p style=" font-size: 20px;"><span style=" font-weight: 600;">Title :</span><?php echo e($data['title']??''); ?></p>
    <p style=" font-size: 20px;"><span style=" font-weight: 600;">Subject :</span> <?php echo e($data['subject']??''); ?></p>
    <p style=" font-size: 20px;"><span style=" font-weight: 600;">Invoice Date :</span> <?php echo e($data['comment']??''); ?></p>
</div>
</body>
</html><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/website/calendar_email.blade.php ENDPATH**/ ?>