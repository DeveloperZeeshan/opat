<?php if($message = session()->get('success')): ?>
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>

<?php if($message = session()->get('error')): ?>
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/includes/session_message.blade.php ENDPATH**/ ?>