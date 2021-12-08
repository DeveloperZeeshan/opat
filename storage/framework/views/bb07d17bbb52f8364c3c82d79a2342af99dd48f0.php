<div class="right-sidebar">
    <div class="slimscrollright">
        <div class="rpanel-title"> Service Panel <span><i class="icon-close right-side-toggler"></i></span> </div>
        <div class="text-center">
            <a class="btn btn-primary m-t-10" href="<?php echo e(route('logout')); ?>">Logout</a>

        </div>
        <div class="r-panel-body">
            <p><b>Layout type</b></p>
            <ul class="layouts">
                <li class="<?php if(session()->get('theme-layout') == 'normal'): ?> active <?php endif; ?>"><a href="<?php echo e(asset('?theme=normal')); ?>">Normal Layout</a></li>
                <li class="<?php if(session()->get('theme-layout') == 'fix-header'): ?> active <?php endif; ?>"><a href="<?php echo e(asset('?theme=fix-header')); ?>">Fixed Header</a></li>
                <li class="<?php if(session()->get('theme-layout') == 'mini-sidebar'): ?> active <?php endif; ?>"><a href="<?php echo e(asset('?theme=mini-sidebar')); ?>">Mini-sidebar</a></li>
            </ul>
            <br>
            <?php if(session()->get('theme-layout') != 'fix-header'): ?>
                <ul class="hidden-xs">
                    <li><b>Layout Options</b></li>
                    <li>
                        <div class="checkbox checkbox-danger">
                            <input id="headcheck" type="checkbox" class="fxhdr">
                            <label for="headcheck"> Fix Header </label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox checkbox-warning">
                            <input id="sidecheck" type="checkbox" class="fxsdr">
                            <label for="sidecheck"> Fix Sidebar </label>
                        </div>
                    </li>
                </ul>
            <?php endif; ?>

            <ul id="themecolors" class="m-t-20">
                <li><b>With Light sidebar</b></li>
                <li><a href="javascript:void(0)" data-theme="default" class="default-theme working">1</a></li>
                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                <li><a href="javascript:void(0)" data-theme="yellow" class="yellow-theme">3</a></li>
                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">4</a></li>
                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                <li><a href="javascript:void(0)" data-theme="black" class="black-theme">6</a></li>
                <li class="db"><b>With Dark sidebar</b></li>
                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                <li><a href="javascript:void(0)" data-theme="yellow-dark" class="yellow-dark-theme">9</a></li>
                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">10</a></li>
                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                <li><a href="javascript:void(0)" data-theme="black-dark" class="black-dark-theme">12</a></li>
            </ul>
            
        </div>
    </div>
</div><?php /**PATH C:\wamp64\www\opatlive\opatlive\resources\views/layouts/partials/right-sidebar.blade.php ENDPATH**/ ?>