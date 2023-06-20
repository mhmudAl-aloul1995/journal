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
<style>
    @font-face {
        font-family: 'Droid Arabic Kufi';
        src: url('DroidArabicKufi.eot');
        src: url('DroidArabicKufi.eot?#iefix') format('embedded-opentype'),
        url({{url('DroidArabicKufi.woff')}}) format('woff'),
        url({{url('DroidArabicKufi.ttf')}}) format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    span {
        cursor: pointer;
    }

    body, .select2-selection__placeholder, .select2-selection__rendered, a, td, h3, span, h2 {
        font-family: 'Droid Arabic Kufi' !important;
    }

    body, .page-title, h4 {
        font-family: 'Droid Arabic Kufi';
        font-weight: 300 !important;
        font-size: 140% !important;
    }


    .alert-success {
        background: none;
        filter: none;
        border: 0;
        background-color: rgba(58, 149, 207, .9);
    }

    .modal1 {
        display: none;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        height: 100%;
        width: 90%;
        background: url('http://i.stack.imgur.com/FhHRx.gif') 50% 50% no-repeat;
        left: 200;
    }

    /* When the body has the loading class, we turn
       the scrollbar off with overflow:hidden */
    body.loading {
        overflow: hidden;
    }

    /* Anytime the body has the loading class, our
       modal element will be visible */
    body.loading .modal1 {
        display: block;
    }

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

    .form-group > label {
        color: #44b6ae;
    }

    .alert-message-body {
        text-align: center;
        /*margin-right:40%;*/
        /*margin-left:40%;*/
    }

    .btn.red:not(.btn-outline) {
        color: #fff;
        BORDER-RADIUS: 6PX !IMPORTANT;
        background-color: #e7505a;
        border-color: #e7505a;
    }

    .page-header.navbar .page-top {
        box-shadow: 0PX 0PX 0PX 0PX #FFF !IMPORTANT;
        background: #fff;
    }

    /* .portlet.box.green {
       border: 1px solid #ffffff !important;
       border-top: 0;
   }

 .page-footer {
       display: none !important;
   }*/
</style>
<script>
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
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin RTL Theme #2 for blank page layout" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet"
          type="text/css"/>
    <!--
        <link href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5-rtl.css" rel="stylesheet" type="text/css" />
    -->
    <link href="{{url('')}}/assets/pages/css/profile-rtl.min.css" rel="stylesheet" type="text/css"/>

    <link href="{{url('')}}/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet"
          type="text/css"/>

    <link href="{{url('')}}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"
          rel="stylesheet" type="text/css"/>

    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{url('')}}/assets/global/css/components-rtl.min.css" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{url('')}}/assets/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{url('')}}/assets/layouts/layout2/css/layout-rtl.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/assets/layouts/layout2/css/themes/blue-rtl.min.css" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="{{url('')}}/assets/layouts/layout2/css/custom-rtl.min.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
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
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{url('profile')}}">
                <img style=" width: 120px; margin-top:10%; " src="{{url('')}}/assets/gu.png" alt="logo" width="150"
                     height="40" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->

        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN HEADER SEARCH BOX -->
            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->


            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    {{--  <!-- BEGIN NOTIFICATION DROPDOWN -->
                      <!-- DOC: Apply "dropdown-dark" class below "dropdown-extended" to change the dropdown styte -->
                      <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                      <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                      <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="icon-bell"></i>
                              <span class="badge badge-default"> 7 </span>
                          </a>
                          <ul class="dropdown-menu">
                              <li class="external">
                                  <h3>
                                      <span class="bold">12 pending</span> notifications</h3>
                                  <a href="page_user_profile_1.html">view all</a>
                              </li>
                              <li>
                                  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                                      <li>
                                          <a href="javascript:;">
                                              <span class="time">just now</span>
                                              <span class="details">
                                                  <span class="label label-sm label-icon label-success">
                                                      <i class="fa fa-plus"></i>
                                                  </span> New user registered. </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="time">3 mins</span>
                                              <span class="details">
                                                  <span class="label label-sm label-icon label-danger">
                                                      <i class="fa fa-bolt"></i>
                                                  </span> Server #12 overloaded. </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="time">10 mins</span>
                                              <span class="details">
                                                  <span class="label label-sm label-icon label-warning">
                                                      <i class="fa fa-bell-o"></i>
                                                  </span> Server #2 not responding. </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="time">14 hrs</span>
                                              <span class="details">
                                                  <span class="label label-sm label-icon label-info">
                                                      <i class="fa fa-bullhorn"></i>
                                                  </span> Application error. </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="time">2 days</span>
                                              <span class="details">
                                                  <span class="label label-sm label-icon label-danger">
                                                      <i class="fa fa-bolt"></i>
                                                  </span> Database overloaded 68%. </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="time">3 days</span>
                                              <span class="details">
                                                  <span class="label label-sm label-icon label-danger">
                                                      <i class="fa fa-bolt"></i>
                                                  </span> A user IP blocked. </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="time">4 days</span>
                                              <span class="details">
                                                  <span class="label label-sm label-icon label-warning">
                                                      <i class="fa fa-bell-o"></i>
                                                  </span> Storage Server #4 not responding dfdfdfd. </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="time">5 days</span>
                                              <span class="details">
                                                  <span class="label label-sm label-icon label-info">
                                                      <i class="fa fa-bullhorn"></i>
                                                  </span> System Error. </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="time">9 days</span>
                                              <span class="details">
                                                  <span class="label label-sm label-icon label-danger">
                                                      <i class="fa fa-bolt"></i>
                                                  </span> Storage server failed. </span>
                                          </a>
                                      </li>
                                  </ul><div class="slimScrollBar" style="background: rgb(99, 114, 131); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; left: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; left: 1px;"></div></div>
                              </li>
                          </ul>
                      </li>
                      <!-- END NOTIFICATION DROPDOWN -->
                      <!-- BEGIN INBOX DROPDOWN -->
                      <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                      <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="icon-envelope-open"></i>
                              <span class="badge badge-default"> 4 </span>
                          </a>
                          <ul class="dropdown-menu">
                              <li class="external">
                                  <h3>You have
                                      <span class="bold">7 New</span> Messages</h3>
                                  <a href="app_inbox.html">view all</a>
                              </li>
                              <li>
                                  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 275px;"><ul class="dropdown-menu-list scroller" style="height: 275px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                                      <li>
                                          <a href="#">
                                              <span class="photo">
                                                  <img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                              <span class="subject">
                                                  <span class="from"> Lisa Wong </span>
                                                  <span class="time">Just Now </span>
                                              </span>
                                              <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">
                                              <span class="photo">
                                                  <img src="../assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                              <span class="subject">
                                                  <span class="from"> Richard Doe </span>
                                                  <span class="time">16 mins </span>
                                              </span>
                                              <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">
                                              <span class="photo">
                                                  <img src="../assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                              <span class="subject">
                                                  <span class="from"> Bob Nilson </span>
                                                  <span class="time">2 hrs </span>
                                              </span>
                                              <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">
                                              <span class="photo">
                                                  <img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                              <span class="subject">
                                                  <span class="from"> Lisa Wong </span>
                                                  <span class="time">40 mins </span>
                                              </span>
                                              <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">
                                              <span class="photo">
                                                  <img src="../assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                              <span class="subject">
                                                  <span class="from"> Richard Doe </span>
                                                  <span class="time">46 mins </span>
                                              </span>
                                              <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                          </a>
                                      </li>
                                  </ul><div class="slimScrollBar" style="background: rgb(99, 114, 131); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; left: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; left: 1px;"></div></div>
                              </li>
                          </ul>
                      </li>
                      <!-- END INBOX DROPDOWN -->
                      <!-- BEGIN TODO DROPDOWN -->
                      <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                      <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="icon-calendar"></i>
                              <span class="badge badge-default"> 3 </span>
                          </a>
                          <ul class="dropdown-menu extended tasks">
                              <li class="external">
                                  <h3>You have
                                      <span class="bold">12 pending</span> tasks</h3>
                                  <a href="app_todo.html">view all</a>
                              </li>
                              <li>
                                  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 275px;"><ul class="dropdown-menu-list scroller" style="height: 275px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                                      <li>
                                          <a href="javascript:;">
                                              <span class="task">
                                                  <span class="desc">New release v1.2 </span>
                                                  <span class="percent">30%</span>
                                              </span>
                                              <span class="progress">
                                                  <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                      <span class="sr-only">40% Complete</span>
                                                  </span>
                                              </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="task">
                                                  <span class="desc">Application deployment</span>
                                                  <span class="percent">65%</span>
                                              </span>
                                              <span class="progress">
                                                  <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                      <span class="sr-only">65% Complete</span>
                                                  </span>
                                              </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="task">
                                                  <span class="desc">Mobile app release</span>
                                                  <span class="percent">98%</span>
                                              </span>
                                              <span class="progress">
                                                  <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                      <span class="sr-only">98% Complete</span>
                                                  </span>
                                              </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="task">
                                                  <span class="desc">Database migration</span>
                                                  <span class="percent">10%</span>
                                              </span>
                                              <span class="progress">
                                                  <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                      <span class="sr-only">10% Complete</span>
                                                  </span>
                                              </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="task">
                                                  <span class="desc">Web server upgrade</span>
                                                  <span class="percent">58%</span>
                                              </span>
                                              <span class="progress">
                                                  <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                      <span class="sr-only">58% Complete</span>
                                                  </span>
                                              </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="task">
                                                  <span class="desc">Mobile development</span>
                                                  <span class="percent">85%</span>
                                              </span>
                                              <span class="progress">
                                                  <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                      <span class="sr-only">85% Complete</span>
                                                  </span>
                                              </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="task">
                                                  <span class="desc">New UI release</span>
                                                  <span class="percent">38%</span>
                                              </span>
                                              <span class="progress progress-striped">
                                                  <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                      <span class="sr-only">38% Complete</span>
                                                  </span>
                                              </span>
                                          </a>
                                      </li>
                                  </ul><div class="slimScrollBar" style="background: rgb(99, 114, 131); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; left: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; left: 1px;"></div></div>
                              </li>
                          </ul>
                      </li>
                      <!-- END TODO DROPDOWN -->
                      <!-- BEGIN USER LOGIN DROPDOWN -->
                      <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                     --}}
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true" aria-expanded="true">
                            <img alt="" class="img-circle"
                                 src="{{Auth::user()->avatar}}">
                            <span
                                class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{url('profile')}}">
                                    <i class="icon-user"></i> إعدادات الحساب </a>
                            </li>

                            <li>
                                <a href="{{url('logout')}}">
                                    <i class="icon-key"></i> تسجيل خروج </a>
                            </li>
                        </ul>
                    </li>
                    {{--  <!-- END USER LOGIN DROPDOWN -->
                      <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                      <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                      <li class="dropdown dropdown-extended quick-sidebar-toggler">
                          <span class="sr-only">Toggle Quick Sidebar</span>
                          <i class="icon-logout"></i>
                      </li>
                      <!-- END QUICK SIDEBAR TOGGLER -->--}}
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- END SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false"
                data-auto-scroll="true" data-slide-speed="200">
                @if(Auth::user()->can('research-list')))
                <li class="nav-item start ">
                    <a href="{{url('research')}}" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">الأبحاث</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                @endIf
                @if(Auth::user()->can('publicationManagement-list')))

                <li class="nav-item start ">
                    <a href="{{url('publicationManagement')}}" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">إدارة طلبات النشر</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                @endIf

                @if(Auth::user()->can('researchApplication-list')))

                <li class="nav-item start ">
                    <a href="{{url('researchApplication')}}" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">تقديم طلب نشر</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                @endIf
                @if(Auth::user()->can('evaluator-list')))

                <li class="nav-item start ">
                    <a href="{{url('evaluator')}}" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">طلبات التحكيم</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                @endIf

                @if(Auth::user()->can('user-list')))

                <li class="nav-item start ">
                    <a href="{{url('user')}}" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">المستخدمين</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->can('folder-list')))

                <li class="nav-item start ">
                    <a href="{{url('folder')}}" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">المجلدات</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->can('version-list')))

                <li class="nav-item start ">
                    <a href="{{url('version')}}" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">الأعداد</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                @endif
                {{--
                                <li class="nav-item start ">
                                    <a href="{{url('category')}}" class="nav-link nav-toggle">
                                        <i class="icon-home"></i>
                                        <span class="title">التصنيفات</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                --}}
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="{{url('/')}}">الرئيسية</a>
                        <i class="fa fa-angle-left"></i>
                    </li>
                    <li>
                        <a href="{{url()->current()}}">@yield('pageName')</a>
                    </li>

                </ul>
                <div class="page-toolbar">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle"
                                data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                            {{date('Y-m-d h:m')}}
                            <i class="fa fa-time"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- END PAGE HEADER-->
            @yield('content')
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler">
        <i class="icon-login"></i>
    </a>
    <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
        <div class="page-quick-sidebar">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                        <span class="badge badge-danger">2</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                        <span class="badge badge-success">7</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-bell"></i> Alerts </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-info"></i> Notifications </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-speech"></i> Activities </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-settings"></i> Settings </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                    <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd"
                         data-wrapper-class="page-quick-sidebar-list">
                        <h3 class="list-heading">Staff</h3>
                        <ul class="media-list list-items">
                            <li class="media">
                                <div class="media-status">
                                    <span class="badge badge-success">8</span>
                                </div>
                                <img class="media-object" src="{{url('')}}/assets/layouts/layout/img/avatar3.jpg"
                                     alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Bob Nilson</h4>
                                    <div class="media-heading-sub"> Project Manager</div>
                                </div>
                            </li>
                            <li class="media">
                                <img class="media-object" src="{{url('')}}/assets/layouts/layout/img/avatar1.jpg"
                                     alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Nick Larson</h4>
                                    <div class="media-heading-sub"> Art Director</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-status">
                                    <span class="badge badge-danger">3</span>
                                </div>
                                <img class="media-object" src="{{url('')}}/assets/layouts/layout/img/avatar4.jpg"
                                     alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Deon Hubert</h4>
                                    <div class="media-heading-sub"> CTO</div>
                                </div>
                            </li>
                            <li class="media">
                                <img class="media-object" src="{{url('')}}/assets/layouts/layout/img/avatar2.jpg"
                                     alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Ella Wong</h4>
                                    <div class="media-heading-sub"> CEO</div>
                                </div>
                            </li>
                        </ul>
                        <h3 class="list-heading">users</h3>
                        <ul class="media-list list-items">
                            <li class="media">
                                <div class="media-status">
                                    <span class="badge badge-warning">2</span>
                                </div>
                                <img class="media-object" src="{{url('')}}/assets/layouts/layout/img/avatar6.jpg"
                                     alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Lara Kunis</h4>
                                    <div class="media-heading-sub"> CEO, Loop Inc</div>
                                    <div class="media-heading-small"> Last seen 03:10 AM</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-status">
                                    <span class="label label-sm label-success">new</span>
                                </div>
                                <img class="media-object" src="{{url('')}}/assets/layouts/layout/img/avatar7.jpg"
                                     alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Ernie Kyllonen</h4>
                                    <div class="media-heading-sub"> Project Manager,
                                        <br> SmartBizz PTL
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <img class="media-object" src="{{url('')}}/assets/layouts/layout/img/avatar8.jpg"
                                     alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Lisa Stone</h4>
                                    <div class="media-heading-sub"> CTO, Keort Inc</div>
                                    <div class="media-heading-small"> Last seen 13:10 PM</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-status">
                                    <span class="badge badge-success">7</span>
                                </div>
                                <img class="media-object" src="{{url('')}}/assets/layouts/layout/img/avatar9.jpg"
                                     alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Deon Portalatin</h4>
                                    <div class="media-heading-sub"> CFO, H&D LTD</div>
                                </div>
                            </li>
                            <li class="media">
                                <img class="media-object" src="{{url('')}}/assets/layouts/layout/img/avatar10.jpg"
                                     alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Irina Savikova</h4>
                                    <div class="media-heading-sub"> CEO, Tizda Motors Inc</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-status">
                                    <span class="badge badge-danger">4</span>
                                </div>
                                <img class="media-object" src="{{url('')}}/assets/layouts/layout/img/avatar11.jpg"
                                     alt="...">
                                <div class="media-body">
                                    <h4 class="media-heading">Maria Gomez</h4>
                                    <div class="media-heading-sub"> Manager, Infomatic Inc</div>
                                    <div class="media-heading-small"> Last seen 03:10 AM</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="page-quick-sidebar-item">
                        <div class="page-quick-sidebar-chat-user">
                            <div class="page-quick-sidebar-nav">
                                <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                    <i class="icon-arrow-left"></i>Back</a>
                            </div>
                            <div class="page-quick-sidebar-chat-user-messages">
                                <div class="post out">
                                    <img class="avatar" alt="" src="{{url('')}}/assets/layouts/layout/img/avatar3.jpg"/>
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Bob Nilson</a>
                                        <span class="datetime">20:15</span>
                                        <span class="body"> When could you send me the report ? </span>
                                    </div>
                                </div>
                                <div class="post in">
                                    <img class="avatar" alt="" src="{{url('')}}/assets/layouts/layout/img/avatar2.jpg"/>
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Ella Wong</a>
                                        <span class="datetime">20:15</span>
                                        <span class="body"> Its almost done. I will be sending it shortly </span>
                                    </div>
                                </div>
                                <div class="post out">
                                    <img class="avatar" alt="" src="{{url('')}}/assets/layouts/layout/img/avatar3.jpg"/>
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Bob Nilson</a>
                                        <span class="datetime">20:15</span>
                                        <span class="body"> Alright. Thanks! :) </span>
                                    </div>
                                </div>
                                <div class="post in">
                                    <img class="avatar" alt="" src="{{url('')}}/assets/layouts/layout/img/avatar2.jpg"/>
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Ella Wong</a>
                                        <span class="datetime">20:16</span>
                                        <span class="body"> You are most welcome. Sorry for the delay. </span>
                                    </div>
                                </div>
                                <div class="post out">
                                    <img class="avatar" alt="" src="{{url('')}}/assets/layouts/layout/img/avatar3.jpg"/>
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Bob Nilson</a>
                                        <span class="datetime">20:17</span>
                                        <span class="body"> No probs. Just take your time :) </span>
                                    </div>
                                </div>
                                <div class="post in">
                                    <img class="avatar" alt="" src="{{url('')}}/assets/layouts/layout/img/avatar2.jpg"/>
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Ella Wong</a>
                                        <span class="datetime">20:40</span>
                                        <span class="body"> Alright. I just emailed it to you. </span>
                                    </div>
                                </div>
                                <div class="post out">
                                    <img class="avatar" alt="" src="{{url('')}}/assets/layouts/layout/img/avatar3.jpg"/>
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Bob Nilson</a>
                                        <span class="datetime">20:17</span>
                                        <span class="body"> Great! Thanks. Will check it right away. </span>
                                    </div>
                                </div>
                                <div class="post in">
                                    <img class="avatar" alt="" src="{{url('')}}/assets/layouts/layout/img/avatar2.jpg"/>
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Ella Wong</a>
                                        <span class="datetime">20:40</span>
                                        <span class="body"> Please let me know if you have any comment. </span>
                                    </div>
                                </div>
                                <div class="post out">
                                    <img class="avatar" alt="" src="{{url('')}}/assets/layouts/layout/img/avatar3.jpg"/>
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a href="javascript:;" class="name">Bob Nilson</a>
                                        <span class="datetime">20:17</span>
                                        <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                    </div>
                                </div>
                            </div>
                            <div class="page-quick-sidebar-chat-user-form">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Type a message here...">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn green">
                                            <i class="icon-paper-clip"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                    <div class="page-quick-sidebar-alerts-list">
                        <h3 class="list-heading">General</h3>
                        <ul class="feeds list-items">
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> You have 4 pending tasks.
                                                <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> Just now</div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-bar-chart-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> Finance Report for year 2013 has been released.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 20 mins</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-danger">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> You have 5 pending membership that requires a quick
                                                review.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 24 mins</div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> New order received with
                                                <span
                                                    class="label label-sm label-success"> Reference Number: DR23923 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 30 mins</div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> You have 5 pending membership that requires a quick
                                                review.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 24 mins</div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-bell-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> Web server hardware needs to be upgraded.
                                                <span class="label label-sm label-warning"> Overdue </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 2 hours</div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-default">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> IPO Report for year 2013 has been released.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 20 mins</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <h3 class="list-heading">System</h3>
                        <ul class="feeds list-items">
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> You have 4 pending tasks.
                                                <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> Just now</div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-danger">
                                                    <i class="fa fa-bar-chart-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> Finance Report for year 2013 has been released.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 20 mins</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-default">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> You have 5 pending membership that requires a quick
                                                review.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 24 mins</div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> New order received with
                                                <span
                                                    class="label label-sm label-success"> Reference Number: DR23923 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 30 mins</div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> You have 5 pending membership that requires a quick
                                                review.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 24 mins</div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-warning">
                                                <i class="fa fa-bell-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> Web server hardware needs to be upgraded.
                                                <span class="label label-sm label-default "> Overdue </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 2 hours</div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> IPO Report for year 2013 has been released.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 20 mins</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                    <div class="page-quick-sidebar-settings-list">
                        <h3 class="list-heading">General Settings</h3>
                        <ul class="list-items borderless">
                            <li> Enable Notifications
                                <input type="checkbox" class="make-switch" checked data-size="small"
                                       data-on-color="success" data-on-text="ON" data-off-color="default"
                                       data-off-text="OFF"></li>
                            <li> Allow Tracking
                                <input type="checkbox" class="make-switch" data-size="small" data-on-color="info"
                                       data-on-text="ON" data-off-color="default" data-off-text="OFF"></li>
                            <li> Log Errors
                                <input type="checkbox" class="make-switch" checked data-size="small"
                                       data-on-color="danger" data-on-text="ON" data-off-color="default"
                                       data-off-text="OFF"></li>
                            <li> Auto Sumbit Issues
                                <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning"
                                       data-on-text="ON" data-off-color="default" data-off-text="OFF"></li>
                            <li> Enable SMS Alerts
                                <input type="checkbox" class="make-switch" checked data-size="small"
                                       data-on-color="success" data-on-text="ON" data-off-color="default"
                                       data-off-text="OFF"></li>
                        </ul>
                        <h3 class="list-heading">System Settings</h3>
                        <ul class="list-items borderless">
                            <li> Security Level
                                <select class="form-control input-inline input-sm input-small">
                                    <option value="1">Normal</option>
                                    <option value="2" selected>Medium</option>
                                    <option value="e">High</option>
                                </select>
                            </li>
                            <li> Failed Email Attempts
                                <input class="form-control input-inline input-sm input-small" value="5"/></li>
                            <li> Secondary SMTP Port
                                <input class="form-control input-inline input-sm input-small" value="3560"/></li>
                            <li> Notify On System Error
                                <input type="checkbox" class="make-switch" checked data-size="small"
                                       data-on-color="danger" data-on-text="ON" data-off-color="default"
                                       data-off-text="OFF"></li>
                            <li> Notify On SMTP Error
                                <input type="checkbox" class="make-switch" checked data-size="small"
                                       data-on-color="warning" data-on-text="ON" data-off-color="default"
                                       data-off-text="OFF"></li>
                        </ul>
                        <div class="inner-content">
                            <button class="btn btn-success">
                                <i class="icon-settings"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2023 &copy; Created By
        <a target="_blank" href="http://gu.edu.ps">Gaza University</a> &nbsp;|&nbsp;
        <a href="http://gu.edu.ps"
           title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Mahmoud Al-Aloul</a>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->


<!--[if lt IE 9]>
    <script src="{{url('')}}/assets/global/plugins/respond.min.js"></script>
    <script src="{{url('')}}/assets/global/plugins/excanvas.min.js"></script>
    <script src="{{url('')}}/assets/global/plugins/ie8.fix.min.js"></script>
    <![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="{{url('')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
            type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
            type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"
            type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js"
            type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
            type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
            type="text/javascript"></script>
    <!--    <script src="/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="/assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>-->

    <!-- END CORE PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{url('')}}/assets/global/scripts/app.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>

    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{url('')}}/assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/bootstrapValidator.js"></script>
    <script src="{{url('')}}/assets/jquery.validate.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.6/js/mdb.min.js"></script>

    <!-- END THEME LAYOUT SCRIPTS -->
    <script>
        var token = '{{csrf_token()}}'
        var $loading = $('.ok');
        $(document)
            .ajaxStart(function () {
                $loading.prop('disabled', true);
                //$('.reload').click()
            })
            .ajaxStop(function () {
                $loading.prop('disabled', false);
                $('.buttons-page-length').on('click', function (e) {
                });
            });
        $(document).ready(function () {
            $('#clickmewow').click(function () {
                $('#radio1003').attr('checked', 'checked');
            });
        })

        function submitForm(formName) {

            var form = $('#' + formName + 'Form')

            form.attr('action', '{{url('')}}' + formName + id);
            form.bootstrapValidator();

            $('#' + formName + 'Form').data('bootstrapValidator').validate();
            if (!$('#' + formName + 'Form').data('bootstrapValidator').isValid()) {
                return true;
            } else {
                var $form = $('#' + formName + 'Form'),
                    formData = new FormData(),
                    params = $form.serializeArray();
                formData.append('_token', '{{csrf_token()}}');
                $.each(params, function (i, obj) {
                    formData.append(obj.name, obj.value);
                });
                var file = $('#' + formName + 'Form').find('[type="file"]');
                if (file.length > 0) {
                    formData.append(file.attr('name'), file[0].files[0]);
                }
                var id = $('#' + formName + 'Form').find('[name="id"]').val();
                id ? formData.append('_method', "PUT") : formData.append('_method', "POST")
                //   id ? '' : $('#' + formName + 'Form').bootstrapValidator('resetForm', true)

                $.ajax({
                    url: id ? '{{url('')}}' + '/' + formName + '/' + id : '{{url('')}}' + '/' + formName,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (data) {
                        if (data.errors) {
                            var errors = "<ul  style='width: auto; text-align: right; margin-right: 500px;' >";
                            $.each(data.errors, function (i, currProgram) {
                                $.each(currProgram, function (key, val) {
                                    errors += "<li>" + val + "</li>";
                                });
                            });
                            errors += "</ul>"
                            showAlertMessage('alert-danger', null, errors);
                            return false
                        }
                        if (data.avatar) {

                            $('.img-circle').attr('src', data.avatar)
                            $('.profile-userpic').find('img').attr('src', data.avatar)
                        }
                        if (data.success == true) {

                            //   $('#' + formName + 'Form').bootstrapValidator('resetForm', true);
                            $('#' + formName + 'Modal').modal('hide');
                            $('.' + formName + 'Table').click()
                            $('.reload').click()

                            showAlertMessage('alert-success', null, data.message);
                        } else {
                            showAlertMessage('alert-danger', null, data.message);

                        }

                        return true


                    },
                    error: function (data) {

                        showAlertMessage('alert-danger', 'Fatal error !', 'An unknown error occured !');
                    },
                    statusCode: {
                        500: function (data) {
                            console.log(data);
                        }
                    }
                });
            }

        }

        function deleteThis(formName, id) {
            if (!confirm('هل انت متاكد؟')) {
                return false;
            } else {
                $.ajax({
                    url: "{{url('')}}/" + formName + '/' + id,
                    data: {_token: token},
                    type: "DELETE",
                    success: function (data, textStatus, jqXHR) {
                        if (data.success == true) {
                            $('.' + formName + 'Table').click()
                            showAlertMessage('alert-success', null, data.message);
                        } else {
                            showAlertMessage('alert-danger', null, data.message);

                        }
                    },
                    error: function (data, textStatus, jqXHR) {
                        console.log(data)
                        showAlertMessage('alert-danger', null, data.message);
                    },
                });
            }
        }


        function showModal(formName, id) {

            $('#' + formName + 'Form').find('select').val(null).trigger('change');
            $('#' + formName + 'Form').bootstrapValidator();

            if (id == null) {
                $('#' + formName + 'Modal').modal('show', {backdrop: 'static'});
                //   $('#' + formName + 'Form').attr('action', "{{url('')}}/" + formName);
                $('#' + formName + 'Form').find('[name="id"]').val(null);
                //    $('#' + formName + 'Form').bootstrapValidator('resetForm', true);
                //  $('#' + formName + 'Form').bootstrapValidator('enableFieldValidators', 'res_link', true);

            } else {
                //     $('#' + formName + 'Form').bootstrapValidator('resetForm', true);

                $.get('{{url('')}}' + "/" + formName + '/' + id + "/edit", function (data) {
                    if (data) {

                        try {
                            var data = JSON.parse(data)

                        } catch (err) {
                            data

                        }


                        var selects = $('#' + formName + 'Form').find('select').serializeArray();
                        var inputs = $('#' + formName + 'Form').find('input,textarea').serializeArray();
                        var inputs = $('#' + formName + 'Form').find('input,textarea').serializeArray();



                        $.each(selects, function (i, field) {
                            var fieldName = field.name

                            $('#' + formName + 'Form').find('[name="' + fieldName + '"]').val(data[formName][fieldName]).trigger('change');

                        });
                        $.each(inputs, function (i, field) {

                            var fieldName = field.name

                            $('#' + formName + 'Form').find('[name="' + fieldName + '"]').val(data[formName][fieldName]);


                        });
                        if (formName == "user") {
                            //  $('#' + formName + 'Form').bootstrapValidator('enableFieldValidators', 'res_link', false);
                            var roles_ids = [];

                            $.each(data[formName]['roles'], function (i, field) {
                                roles_ids.push(field.id);

                            });
                            console.log(roles_ids)
                            $('#' + formName + 'Form').find('[name="roles[]"]').val(roles_ids).trigger('change');

                        }
                        if (formName == "research") {
                            //  $('#' + formName + 'Form').bootstrapValidator('enableFieldValidators', 'res_link', false);
                            var user_ids = [];

                            $.each(data[formName]['researchers'], function (i, field) {
                                user_ids.push(field.user_id);

                            });
                            console.log(user_ids)
                            $('#' + formName + 'Form').find('[name="researchers[]"]').val(user_ids).trigger('change');

                        }
                        $('#' + formName + 'Modal').modal('show', {backdrop: 'static'});
                    }
                }).fail(function () {
                    showAlertMessage('alert-danger', null, data.message);
                })
            }
        }

        $('.modal').on('hidden', function () {
            var form = $(this).find('form')
            $(".select2").val(null).trigger('change');

            form.find('.has-success').removeClass('has-success');
            form.bootstrapValidator('resetForm', true)
        })

    </script>

@yield('myScript')


</body>

</html>
