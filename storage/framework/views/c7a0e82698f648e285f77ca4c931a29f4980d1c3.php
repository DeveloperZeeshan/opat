<div class="last-inner-width">
    <h2>Send Us Enquiry</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
    <form class="h-last-contact" method="post" action="<?php echo e(route('contact_us')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="input-group footer-form">
                    <span class="input-group-addon"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Your Full Name">
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="input-group footer-form">
                    <span class="input-group-addon"><i class="fas fa-phone-alt"></i></span>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                </div>
            </div>
        </div>
        <div class="form-group ">
            <div class="input-group footer-form">
                <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email Address*"/>
            </div>
        </div>
        <div class="form-group">
            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Message"></textarea>
        </div>
        <button type="submit" class="submit-btn btn btn-primary"><i class="fas fa-location-arrow"></i> SUBMIT NOW</button>
    </form>
</div><?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/website/contact_us.blade.php ENDPATH**/ ?>