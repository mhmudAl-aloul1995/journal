<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->

<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8"/>
    <title>Gaza University</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin RTL Theme #2 for " name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{url('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{url('assets/global/css/components-rtl.min.css')}}" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{url('assets/global/css/plugins-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{url('assets/pages/css/login-4-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->


<script>
    function closeit() {
        $("#alert-message").fadeOut(500);
    }

    function showAlertMessage(messageType, strongText, messageBody, callback, timeOut) {

        timeOut = typeof timeOut !== 'undefined' ? timeOut : 3000;
        if ($.hasData('#alert-message', 'timeout')) {
            clearTimeout($('#alert-message').data('timeout'));
        }
        $('.alert-message-body strong').html(strongText);
        $('.alert-message-body span').html(messageBody);
        $('#alert-message')
            .hide()
            .removeClass('alert-success alert-info alert-warning alert-danger')
            .addClass(messageType)
            .fadeIn();
        var timeout = setTimeout(function () {
            $('#alert-message').fadeOut('slow', function () {
                if (callback !== undefined) {
                    callback();
                }
            });
        }, timeOut);
        $('#alert-message').data('timeout', timeout);
    }
</script>
<div id="alert-message" class="alert alert-fixed  alert-info" role="alert">
    <div class="container">
        <div class="row">
            <button onclick="closeit()" type="button" class="close close-fixed">
                <span class="fa fa-times"></span>
            </button>
            <p style=" text-align: center; " class="alert-message-body">
                <strong></strong>
                <span></span>
            </p>
        </div>
    </div>
</div>
<script>
    function closeit() {
        $("#alert-message").fadeOut(500);
    }

    function showAlertMessage(messageType, strongText, messageBody, callback, timeOut) {

        timeOut = typeof timeOut !== 'undefined' ? timeOut : 3000;
        if ($.hasData('#alert-message', 'timeout')) {
            clearTimeout($('#alert-message').data('timeout'));
        }
        $('.alert-message-body strong').html(strongText);
        $('.alert-message-body span').html(messageBody);
        $('#alert-message')
            .hide()
            .removeClass('alert-success alert-info alert-warning alert-danger')
            .addClass(messageType)
            .fadeIn();
        var timeout = setTimeout(function () {
            $('#alert-message').fadeOut('slow', function () {
                if (callback !== undefined) {
                    callback();
                }
            });
        }, timeOut);
        $('#alert-message').data('timeout', timeout);
    }
</script>
<style>
    .alert-warning {
        background: none;
        filter: none;
        border: 0;
        background-color: rgba(223, 170, 99, .9);
    }

    .alert-danger {
        background: none;
        filter: none;
        border: 0;
        background-color: rgba(219, 68, 55, .9);
    }

    .alert {
        text-shadow: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        padding: 15px;
        border-radius: 0px;
        border: 0;
        color: #fff;
        margin-bottom: 0;
        display: none;
    }


    #page-sidebar-wrapper {
        background-color: red !important;
    }

    .alert-fixed {
        width: 100%;
        overflow: hidden;
        top: 0;
        left: 0;
        z-index: 2147483647;
        position: fixed;
        -webkit-transition: height 0.3s;
        -moz-transition: height 0.3s;
        -ms-transition: height 0.3s;
        -o-transition: height 0.3s;
        transition: height 0.3s;
    }

    .alert-fixed.smaller {
        width: 100%;
        overflow: hidden;
        position: fixed;
    }

    .alert .close-fixed {
        font-size: 14px;
        line-height: 1;
        color: #fff;
        text-shadow: none;
        opacity: 0.9;
        filter: alpha(opacity=90);
        padding-top: 2px;
    }

    .alert .close-fixed:hover {
        color: #000;
    }

    .alert-success {
        background: none;
        filter: none;
        border: 0;
        background-color: rgba(58, 149, 207, .9);
    }

    @font-face {

        font-family: 'Droid Arabic Kufi';

        src: url('<?php echo url('DroidArabicKufi.eot'); ?>');

        src: url('<?php echo url('DroidArabicKufi.eot?#iefix'); ?>') format('embedded-opentype'),
        url('<?php echo url('DroidArabicKufi.woff'); ?>') format('woff'),
        url('<?php echo url('DroidArabicKufi.ttf'); ?>') format('truetype');
        font-weight: normal;

        font-style: normal;

    }

    body, h2, .external, h3, li {
        font-family: 'Droid Arabic Kufi' !important;


    }

    span {
        font-family: 'Droid Arabic Kufi' !important;

    }

    body, .page-title, h4, h1 {
        font-family: 'Droid Arabic Kufi';

        font-weight: 300 !important;
        font-size: 120% !important;

    }

</style>

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">

</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="" method="post">
        <h3 class="form-title">تسجيل الدخول</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Enter any name and password. </span>
        </div>
        {{ csrf_field() }}

        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">إسم المستخدم</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="إسم المستخدم"
                       name="name"/></div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">كلمة المرور</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                       placeholder="كلمة المرور" name="password"/></div>
        </div>
        <div class="form-actions">
            <label class="rememberme mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1"/> تذكرني
                <span></span>
            </label>
            <button type="submit" class="btn green pull-right"> دخول</button>
        </div>


    </form>

</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright"> 2023 &copy;Gaza University</div>
<!-- END COPYRIGHT -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script>
<script src="assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{url('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"
        type="text/javascript"></script>
<script src="{{url('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"
        type="text/javascript"></script>
<script src="{{url('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}"
        type="text/javascript"></script>
<script src="{{url('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/backstretch/jquery.backstretch.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}"
        type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{url('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(document).ready(function () {
        $('#clickmewow').click(function () {
            $('#radio1003').attr('checked', 'checked');
        });
    })

    var Login = function () {

        var handleLogin = function () {
            $('.login-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    name: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },
                messages: {
                    name: {
                        required: "إسم المستخدم مطلوب"
                    },
                    password: {
                        required: "كلمة المرور مطلوب"
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit
                    $('.alert-danger', $('.login-form')).show();
                },
                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },
                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },
                submitHandler: function (form, event) {
                    event.preventDefault();
                    var $form = $('.login-form'),
                        formData = new FormData(),
                        params = $form.serializeArray();


                    $.each(params, function (i, obj) {
                        formData.append(obj.name, obj.value);

                    });

                    $.ajax({
                        url: "{{url('login')}}",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'POST',
                        success: function (data) {
                            if (data.success) {
                                location.href = "{{url('/research')}}"
                            } else {
                                showAlertMessage('alert-danger', ' نظام الدخول / ', data.message);


                            }
                        },
                        error: function (data) {
                            showAlertMessage('alert-danger', ' نظام الدخول / ', data.message);
                        },
                        statusCode: {
                            500: function (data) {
                                console.log(data);
                            }
                        }
                    });

                }
            });

            $('.login-form input').keypress(function (e) {
                if (e.which == 13) {
                    if ($('.login-form').validate().form()) {
                        //      $('.login-form').submit();
                    }
                    return false;
                }
            });
        }

        var handleForgetPassword = function () {
            $('.forget-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    email: {
                        required: "Email is required."
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit

                },
                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },
                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },
                submitHandler: function (form) {
                    //   form.submit();
                }
            });

            $('.forget-form input').keypress(function (e) {
                if (e.which == 13) {
                    if ($('.forget-form').validate().form()) {
                        $('.forget-form').submit();
                    }
                    return false;
                }
            });

            jQuery('#forget-password').click(function () {
                jQuery('.login-form').hide();
                jQuery('.forget-form').show();
            });

            jQuery('#back-btn').click(function () {
                jQuery('.login-form').show();
                jQuery('.forget-form').hide();
            });

        }


        return {
            //main function to initiate the module
            init: function () {

                handleLogin();
                handleForgetPassword();
                handleRegister();

                // init background slide images
                $.backstretch([
                        "{{url('assets/pages/media/bg/1.jpg')}}",
                        "{{url('assets/pages/media/bg/2.jpg')}}",
                        "{{url('assets/pages/media/bg/3.jpg')}}",
                        "{{url('assets/pages/media/bg/4.jpg')}}"
                    ], {
                        fade: 1000,
                        duration: 8000
                    }
                );
            }
        };

    }();

    jQuery(document).ready(function () {
        Login.init();
    });
</script>
</body>

</html>
