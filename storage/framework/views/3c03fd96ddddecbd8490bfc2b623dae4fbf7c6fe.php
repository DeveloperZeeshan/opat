<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('plugins/images/favicon.png')); ?>">
    <title>OPAT</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="<?php echo e(asset('bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="<?php echo e(asset('plugins/components/chartist-js/dist/chartist.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')); ?>"
          rel="stylesheet">
    <link href="<?php echo e(asset('plugins/components/toast-master/css/jquery.toast.css')); ?>" rel="stylesheet">

    <!-- ===== Animation CSS ===== -->
    <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="<?php echo e(asset('css/common.css')); ?>" rel="stylesheet">


    <?php echo $__env->yieldPushContent('css'); ?>

    <!--====== Dynamic theme changing =====-->

    <?php if(session()->get('theme-layout') == 'fix-header'): ?>
        <link href="<?php echo e(asset('css/style-fix-header.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/colors/default.css')); ?>" id="theme" rel="stylesheet">

    <?php elseif(session()->get('theme-layout') == 'mini-sidebar'): ?>
        <link href="<?php echo e(asset('css/style-mini-sidebar.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/colors/default.css')); ?>" id="theme" rel="stylesheet">
    <?php else: ?>
        <link href="<?php echo e(asset('css/style-normal.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/colors/default.css')); ?>" id="theme" rel="stylesheet">
    <?php endif; ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/css/bootstrap-iconpicker.min.css"/>
    <!-- ===== Color CSS ===== -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <!--//Phone-->
    <link rel="stylesheet" href="https://www.jqueryscript.net/demo/jQuery-International-Telephone-Input-With-Flags-Dial-Codes/build/css/intlTelInput.css">
    <link rel="stylesheet" href="https://www.jqueryscript.net/demo/jQuery-International-Telephone-Input-With-Flags-Dial-Codes/build/css/demo.css">
    <!-- Use as a Vanilla JS plugin -->
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://www.jqueryscript.net/demo/jQuery-International-Telephone-Input-With-Flags-Dial-Codes/build/js/intlTelInput.min.js"></script>
    <!-- Use as a jQuery plugin -->
    <script src="https://www.jqueryscript.net/demo/jQuery-International-Telephone-Input-With-Flags-Dial-Codes/build/js/intlTelInput-jquery.min.js"></script>
    <![endif]-->
    <style>
        .Form_p1, .Form_p2, .Form_p3, .Form_p4, .Form_p5 {
            border-radius: 40px;
        }
        .Form_p1:before, .Form_p2:before, .Form_p3:before, .Form_p4:before, .Form_p5:before {
            border-radius: 50px;
        }
        @media (min-width: 768px) {
            .extra.collapse li a span.hide-menu {
                display: block !important;
            }

            .extra.collapse.in li a.waves-effect span.hide-menu {
                display: block !important;
            }

            .extra.collapse li.active a.active span.hide-menu {
                display: block !important;
            }

            ul.side-menu li:hover + .extra.collapse.in li.active a.active span.hide-menu {
                display: block !important;
            }
        }
        .navbar-header, .right-sidebar .rpanel-title {
   
    background: #0F4C82 !important;
    background: -moz-linear-gradient(left,#0078bc 1%,#00beda 100%);
    background: -webkit-linear-gradient(left,#0078bc 1%,#00beda 100%);
    background: linear-gradient(to right,#0078bc 1%,#00beda 100%);
}


.fc-toolbar .fc-center h2 {
    color: #12525c;
    font-size: 34px;
    font-weight: 700;
}
.fc-button-group button {
    background: #12525c;
    border: 0;
    font-size: 15px;
    padding: 0px 10px;
    color: #fff;
}
.fc-left button {
    background: #12525c;
    border: 0;
    font-size: 15px;
    padding: 0px 10px;
    color: #fff;
}
.sidebar {
    z-index: 10;
    position: absolute;
    width: 265px;
    padding-top: 60px;
    height: 100%;
    top: 0;
    overflow-y: auto;
    background: #628d93;
    border-right: 1px solid #e5ebec;
}
.fc-day-grid-event .fc-content {
    white-space: nowrap;
    overflow: hidden;
    background-color: #628d93;
}
.sidebar-nav, sidebar {
    background: #628d93;
}
.sidebar-nav #side-menu li>a>i, .sidebar-nav #side-menu li>a, .user-profile .profile-text a { color: white !important;}
.btn-success, .btn-success.disabled, .btn-success:hover {
    border: none;
    background-color: #8D8F8E !important;
}

.btn-primary, .btn-primary.disabled, .btn-primary:hover {
    background: #29627C;
    border: 2px solid #29627C;
}

.btn-success:hover, .btn-success.disabled {}

.btn-info:hover, .btn-info {
    background: #4B848E !important;
    border: 2px solid #4B848E !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    border: 1px solid #526F98;
    background-color: #526F98;
}
/*.page-wrapper {
    background: #69949a96;
}*/

li.active.bv-tab-success a, li.active.bv-tab-success a:hover {
    background: #4B848E !important;
    color: #fff;
}
.has-success .form-control {border-color: #12525C;}




/*//Aazmer css*/
.container-fluid {
    padding: 30px;
    padding-bottom: 0;
    background: #F2F6FE;
}
.top-left-part {
    width: 265px;
    float: left;
    background: #F8F7F2;
}
.top-left-part a {
    color: #AAD0D2;
    font-size: 18px;
    padding-left: 0;
    text-transform: uppercase;
}

.navbar-left>li .app-search {
    background-color: #8D8F8E !important;
    line-height: 40px;
    margin-top: 10px;
    border-radius: 10px;
}
.white-box {
    background: #fff;
    padding: 25px;
    margin-bottom: 30px;
    border-radius: 40px;
}
.colorbox-group-widget .info-color-box .media {
    padding: 20px 30px;
    border: none;
    margin: 0;
    border-radius: 40px;
}
.sidebar-nav, .sidebar {
    background: #0F4C82;
}

.media.bg-primary {
    background: #0F4C82 !important;
}
.media.bg-success {
    background: #C45E1E !important;
}
.media.bg-danger {
    background: #D9CBB1 !important;
}
.media.bg-warning {
    background: #8D8F8E !important;
}
.btn-danger, .btn-danger.disabled {
    background: #C45E1E;
    border: none !important;
}
.white-box.bg-success.color-box {
    background: #C45E1E !important;
}
.white-box.bg-primary.color-box {
    background: #0F4C82 !important;
}
.white-box.bg-primary.color-box.box7 {
    background: #8D8F8E !important;
}
.white-box.bg-danger.color-box {
    background: #D9CBB1 !important;
}
#side-menu ul>li>a:hover, .mini-sidebar .sidebar-nav #side-menu>li:hover>a i, .sidebar-nav ul#side-menu li a.active i {
    color: #0F4C82 !important;
}
.sidebar-nav ul#side-menu .active a {
    background-color: #F8F7F2 !important;
    color: #0F4C82 !important;
    max-width: 80%;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    box-shadow: 0 0 15px #0000004a;
    position: relative;
}
.sidebar-nav ul#side-menu .active a {
    background-color: #F8F7F2 !important;
    border-left: 5px solid #C45E1E;
    color: #0F4C82 !important;
    max-width: 80%;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    box-shadow: 0 0 15px #0000004a;
    position: relative;
}
.user-profile .profile-text a {
    font-weight: 600;
    color: #8d9498 !important;
}
.btn-primary, table .btn-primary.disabled, .btn-primary:hover {
    background-color: #D9CBB1 !important;
    border:none !important;
    
}
.btn-danger, .btn-danger.disabled {
    background: #C45E1E;
    border: 2px solid #C45E1E;
}


.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #fff !important;
    background-color: #C45E1E !important;
    border:none !important;
}
.btn-info:hover, table .btn-info {
    background-color: #0F4C82 !important;
   
    border:none !important;
    }

.footer {
    bottom: 0;
    color: aliceblue;
    left: 0;
    background: #F2F6FE;
    padding: 20px 30px;
    position: absolute;
    right: 0;
}
.badge-danger {
    background-color: #c45e1e;
}

#side-menu ul>li>a:hover, .mini-sidebar .sidebar-nav #side-menu>li:hover>a i, .sidebar-nav ul#side-menu li a.active i {
    color: inherit !important;
}
    </style>
</head>

<body class="<?php if(session()->get('theme-layout')): ?> <?php echo e(session()->get('theme-layout')); ?> <?php endif; ?>">
<!-- ===== Main-Wrapper ===== -->
<div id="wrapper">
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <!-- ===== Top-Navigation ===== -->
<?php echo $__env->make('layouts.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- ===== Top-Navigation-End ===== -->

    <!-- ===== Left-Sidebar ===== -->
<?php echo $__env->make('layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.partials.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- ===== Left-Sidebar-End ===== -->
    <!-- ===== Page-Content ===== -->
    <div class="page-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
        <footer class="footer t-a-c">
            <div class="p-20 bg-white">
                <center> 2017 © <?php echo e(env('SITE_TITLE')); ?> Admin / Design & Developed By <a  target="_blank"><?php echo e(env('SITE_TITLE')); ?></a> </center>
            </div>
        </footer>
    </div>
    <!-- ===== Page-Content-End ===== -->
</div>
<!-- ===== Main-Wrapper-End ===== -->
<!-- ==============================
    Required JS Files
=============================== -->
<!-- ===== jQuery ===== -->
<script src="<?php echo e(asset('plugins/components/jquery/dist/jquery.min.js')); ?>"></script>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<!-- ===== Bootstrap JavaScript ===== -->
<script src="<?php echo e(asset('bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- ===== Slimscroll JavaScript ===== -->
<script src="<?php echo e(asset('js/jquery.slimscroll.js')); ?>"></script>
<!-- ===== Wave Effects JavaScript ===== -->
<script src="<?php echo e(asset('js/waves.js')); ?>"></script>
<!-- ===== Menu Plugin JavaScript ===== -->
<script src="<?php echo e(asset('js/sidebarmenu.js')); ?>"></script>
<!-- ===== Custom JavaScript ===== -->

<?php if(session()->get('theme-layout') == 'fix-header'): ?>
    <script src="<?php echo e(asset('js/custom-fix-header.js')); ?>"></script>
<?php elseif(session()->get('theme-layout') == 'mini-sidebar'): ?>
    <script src="<?php echo e(asset('js/custom-mini-sidebar.js')); ?>"></script>
<?php else: ?>
    <script src="<?php echo e(asset('js/custom-normal.js')); ?>"></script>
<?php endif; ?>


<!-- ===== Plugin JS ===== -->
<script src="<?php echo e(asset('plugins/components/chartist-js/dist/chartist.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/sparkline/jquery.sparkline.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/sparkline/jquery.charts-sparkline.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/knob/jquery.knob.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/easypiechart/dist/jquery.easypiechart.min.js')); ?>"></script>
<!-- ===== Style Switcher JS ===== -->
<script src="<?php echo e(asset('plugins/components/styleswitcher/jQuery.style.switcher.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/js/bootstrap-iconpicker-iconset-all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/js/bootstrap-iconpicker.min.js"></script>
<script type="text/javascript">
     
    $(document).on('click','.waves-effect',function(e){
        if ($(this).attr('href') == 'http://opat.devcustomprojects.com/dashboard') {
            $('#search_div').hide();
        }else{
            $('#search_div').show();
        }
    });
</script>
    
    <script src="https://www.jqueryscript.net/demo/jQuery-International-Telephone-Input-With-Flags-Dial-Codes/build/js/intlTelInput.js"></script>
    <script>
        $("#phone").intlTelInput();
    </script>
    <script>
        try {
            fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
                return true;
            }).catch(function(e) {
                var carbonScript = document.createElement("script");
                carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                carbonScript.id = "_carbonads_js";
                document.getElementById("carbon-block").appendChild(carbonScript);
            });
        } catch (error) {
            console.log(error);
        }
    </script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>


    <script>
        $('#nation_id_card').keyup(function(e) {
            if ((e.keyCode > 47 && e.keyCode < 58) || (e.keyCode < 106 && e.keyCode > 95)) {
                this.value = this.value.replace(/(\d{3})\-?/g, '$1-');
                return true;
            }
            //remove all chars, except dash and digits
            this.value = this.value.replace(/[^\-0-9]/g, '');
        });

    </script>
<?php echo $__env->yieldPushContent('js'); ?>
</body>

</html><?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/layouts/master.blade.php ENDPATH**/ ?>