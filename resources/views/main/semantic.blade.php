<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>
<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html> <!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>مجلة جامعة غزة للأبحاث والدراسات</title>
    <input id="url" type="hidden" value="{{url('')}}"/>
{{--background-image: linear-gradient(45deg, rgba(72,133,244,0.75) 0%, rgba(44,235,199,0.75) 100%);
}--}}
<!-- favicon  -->
    <link rel="shortcut icon" type="image/ico"
          href="https://portal.gu.edu.ps/public/themes/Falcon/v2.8.0/assets/img/favicons/favicon.ico"/>

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0"/>
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- user defined metatags -->
    <meta name="keywords" content="مجلة جامعة غزة للأبحاث والدراسات,JCES"/>
    <meta name="description" content="مجلة جامعة غزة للأبحاث والدراسات (JCES)"/>

    <!-- WEB FONTS : use %7C instead of | (pipe) -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{url('')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
    <!-- CORE CSS -->
    <link href="{{url('')}}/assets/journal/bootstrap.min.css?v=0.02"
          rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/assets/journal/header.css?v=0.05" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/assets/journal/footer.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/academicons/1.9.4/css/academicons.min.css"
          integrity="sha512-IW0nhlW5MgNydsXJO40En2EoCkTTjZhI3yuODrZIc8cQ4h1XcF53PsqDHa09NqnkXuIe0Oiyyj171BqZFwISBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://jces.journals.ekb.eg/inc/css/essentials.css?v=0.2" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/assets/journal/cookieconsent.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/assets/journal/print.css" rel="stylesheet" type="text/css" media="print"/>
    <!-- RTL CSS -->

    <link href="{{url('')}}/assets/journal/layout-RTL.css?v=0.1" rel="stylesheet"
          type="text/css" id="rtl_ltr"/>
    <link href="{{url('')}}/assets/journal/bootstrap-rtl.min.css"
          rel="stylesheet" type="text/css" id="rtl_ltr_b1"/>
    <link href="{{url('')}}/assets/journal/accordian.css" rel="stylesheet"
          type="text/css"/>

    <!-- user defined metatags-->
    <noscript><img src="https://certify.alexametrics.com/atrk.gif?account=8dxdn1aMp410/9" style="display:none"
                   height="1" width="1" alt=""/></noscript>
    <link href="{{url('')}}/assets/journal/stl_front.css?v=0.25" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/assets/journal/stl.css" rel="stylesheet" type="text/css"/>
    <!-- Latest compiled and minified CSS -->

    <!-- Feed-->
    <link rel="alternate" type="application/rss+xml" title="RSS feed" href="ju.rss"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <script type="text/javascript"
            src="{{url('')}}/assets/journal/jquery.min.js?v=0.5"></script>
    <script type="text/javascript" src="{{url('')}}/assets/journal/common.js?v=0.1"></script>
    <script type="text/javascript" src="{{url('')}}/assets/journal/cookieconsent.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SocialIcons/1.0.1/soc.min.js"
            integrity="sha512-eUJ3eP9+avp5kHKhfx5gB0vzLEgMkZiOmZcpVqJmlg9hMMse2SChMOTSDWl6oYGfmYW2N7oO/W6CqpgYBneqKw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Extra Style Scripts -->

    <!-- Extra Script Scripts -->
    <script type="text/javascript" src="{{url('')}}/assets/journal/article.js?v=0.31"></script>
</head>
<body class="rtl lar">
<div class="container" id="header">
    <div class="row">
        <div class="col-xs-12 text-center">
            <img src="{{url('mainCover.jpeg')}}" class="img-responsive text-center"
                 style="display:-webkit-inline-box; width: 100%;">
        </div>
    </div>
</div>
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

    body, .select2-selection__placeholder, .select2-selection__rendered, a, td {
        font-family: 'Droid Arabic Kufi' !important;
    }

    body, .page-title, h4, h3, h2, h1 {
        font-family: 'Droid Arabic Kufi';
        font-weight: 300 !important;
        font-size: 140% !important;
    }

    .dropdown-menu > li > a {
        color: #4295c9;
        background-image: linear-gradient(45deg, rgba(72, 133, 244, 0.75) 0%, rgba(44, 235, 199, 0.75) 100%);
    }

    .panel-heading {
        background-image: linear-gradient(45deg, rgba(72, 133, 244, 0.75) 0%, rgba(44, 235, 199, 0.75) 100%) !important;

    }
</style>
<div class="container">
    <div class="row">

        <div class="col-xs-12 col-lg-12  col-md-12 text-center">
            <nav
                style=" background-image: linear-gradient(45deg, rgba(72,133,244,0.75) 0%, rgba(44,235,199,0.75) 100%); "
                class="navbar navbar-default noborder nomargin noradius"
                role="navigation">
                <div class="container-fluid nopadding">
                    <div class="navbar-header" style="background: #FFFFFF;">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- <a class="navbar-brand" href="#">Brand</a> -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nopadding" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="{{url('/')}}"> الصفحة الرئيسية</a></li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">تصفح <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('category/3/'.$lastVersion['id'])}}"> العدد الحالي</a></li>
                                    <li class="divider margin-bottom-6 margin-top-6"></li>
                                    <li><a href="{{url('browse_version')}}">بالعدد</a></li>
                                    <li class="divider margin-bottom-6 margin-top-6"></li>
                                    <li><a href="{{url('browse_researcher')}}">بالباحث</a></li>
                                    <li class="divider margin-bottom-6 margin-top-6"></li>
                                    <li><a href="{{url('browse_category')}}">بالموضوع</a></li>
                                    <li class="divider margin-bottom-6 margin-top-6"></li>
                                    <li><a href="{{url('browse_index_researcher')}}">فهرس الباحثين</a></li>
                                    <li class="divider margin-bottom-6 margin-top-6"></li>
                                    {{--
                                                                        <li><a href="https://jces.journals.ekb.eg/keyword.index">فهرس الكلمات الرئيسية</a>
                                    --}}
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">معلومات عن الدورية <b
                                        class="caret"></b></a>
                                <ul class="dropdown-menu">

                                    <li><a href="{{url('browse_about')}}">عن الدورية</a></li>
                                    <li class="divider margin-bottom-6 margin-top-6"></li>
                                    <li><a href="{{url('browse_scope')}}">الأهداف والنطاق</a>
                                    </li>
                                    <li class="divider margin-bottom-6 margin-top-6"></li>
                                    <li><a href="{{url('browse_ethics')}}">أخلاقيات النشر</a>
                                    </li>
                                    <li class="divider margin-bottom-6 margin-top-6"></li>
                                    <li><a href="{{url('browse_condition')}}">قواعد النشر والتوثيق</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{url('browse_authors_nots')}}"> دليل المؤلفين</a></li>
                            {{--             <li><a href="{{url('research')}}"> ارسال المقالة</a></li>

                                         <li><a href="https://jces.journals.ekb.eg/journal/contact.us"> اتصل بنا</a></li>
             --}}
                        </ul>
                        <ul class="nav navbar-nav nomargin">

                            @auth
                                <li><a href="{{url('login')}}">{{Auth::user()->name}}</a></li>
                                <li><a href="{{url('profile')}}"> الملف الشخصي</a></li>
                                <li><a href="{{url('logout')}}"> تسجيل خروج</a></li>

                            @endauth()
                            @guest()
                                <li><a href="{{url('login')}}"> تسجيل الدخول</a></li>
                                <li><a href="{{url('signup')}}"> التسجيل</a></li>
                            @endguest
                        </ul>

                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</div>
<!--  MAIN SECTION -->

<div class="container">

    @yield('content')
</div>
<!-- /MAIN CONTENT -->

<!-- Subscribe -->
<section class="alternate padding-xxs">

</section>
<!-- /Subscribe -->


<!-- FOOTER -->
<div class="container">
    <footer id="footer">
        <div class="scrollup" id="scroll" href="#"><span></span></div>


        <div class="row">

            <div class="col-md-2">

                <!-- Links -->
                <h4 class="">استكشاف مجلة</h4>
                <ul class="footer-links list-unstyled">
                    <li id="fli_home"><a href="{{url('/')}}">الصفحة الرئيسية</a></li>
                    <li id="fli_about"><a href="{{url('browse_about')}}">عن الدورية</a></li>
                    <li id="fli_Edb"><a href="{{url('browse_users/0')}}">هيئة التحرير</a>
                    </li>
                    <li id="fli_submit"><a href="{{url('research')}}"> ارسال المقالة</a></li>
                    {{-- <li id="fli_contactus"><a href="https://jces.journals.ekb.eg/journal/contact.us">اتصل بنا</a></li>
                     <li id="fli_glossary"><a href="https://jces.journals.ekb.eg/journal/glossary">قاموس المصطلحات
                             التخصصية</a></li>
                     <li id="fli_order_hrdj"><a href="https://jces.journals.ekb.eg/journal/subscription.form">الاشتراك
                             للحصول على نسخة من الدورية</a></li>
                     <li id="fli_sitemap"><a href="https://jces.journals.ekb.eg/sitemap.xml?usr"> خريطة الموقع</a></li>
                 --}}</ul>
                <!-- /Links -->

            </div>


            <div class="col-md-3">

                <!-- Footer Note -->
                <div></div>
                <!-- /Footer Note -->

            </div>


            <div class="col-md-4">

                <!-- Newsletter Form
                <h4 class="">الاشتراك في النشرة الإخبارية</h4>
                <p>اشترك في النشرة الإخبارية لدينا للحصول على الأخبار والتحديثات الهامة</p>

                <form class="validate" action="" method="post" data-success="تم حفظ الاشتراك بنجاح."
                      data-toastr-position="bottom-right">
                    <input type="hidden" name="_token" value="f8fa2cc620fe16bc897eb2031283b2d6586dd7e61a987bea"/>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" id="email" name="email" required="required"
                               class="form-control required sbs_email" placeholder="أدخل بريدك الالكتروني"
                               oninvalid="this.setCustomValidity('أدخل بريد إلكتروني صحيح')"
                               oninput="this.setCustomValidity('')">
                        <span class="input-group-btn">
										<button class="btn btn-primary mybtn" type="submit">الاشتراك</button>
									</span>
                    </div>
                </form> -->
                <!-- /Newsletter Form -->

                <!-- Social Icons -->
                <div class="margin-top-20">
                    <a class="noborder" href="https://www.facebook.com/gazau" target="_blank"
                       class="social-icon social-icon-border social-facebook pull-left block" data-toggle="tooltip"
                       data-placement="top" title="Facebook">
                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                    </a>
                    <a class="noborder" href="" target="_blank"
                       class="social-icon social-icon-border social-facebook pull-left block" data-toggle="tooltip"
                       data-placement="top" title="Twitter">
                        <i class="fa fa-twitter-square" aria-hidden="true"></i>
                    </a>
                    <a class="noborder" href="" target="_blank"
                       class="social-icon social-icon-border social-facebook pull-left block" data-toggle="tooltip"
                       data-placement="top" title="Linkedin">
                        <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                    </a>
                    <a class="noborder" href="{{url('')}}/assets/ju.rss"
                       class="social-icon social-icon-border social-rss pull-left block" data-toggle="tooltip"
                       data-placement="top" title="Rss"><i class="fa fa-rss-square" aria-hidden="true"></i></a>
                </div>
            </div>

        </div>

        <div class="copyright" style="position: relative">

            <ul class="nomargin list-inline mobile-block">
                <li>&copy; نظام إدارة المجلات. <span id='sp_crt'>صمم بواسطة <a target='_blank'
                                                                               href='http://www.notionwave.com/'> م. محمود العالول </a></span>
                </li>
            </ul>

        </div>
    </footer>
</div>
<!-- /FOOTER -->

</div>
<!-- /wrapper -->


<!-- SCROLL TO TOP -->
<a href="#" id="toTop_old"></a>


<!-- PRELOADER -->
<div id="preloader">
    <div class="inner">
        <span class="loader"></span>
    </div>
</div><!-- /PRELOADER -->


<!-- JAVASCRIPT FILES -->
<script
    type="text/javascript">var plugin_path = 'https://jces.journals.ekb.eg/themes/base/front/assets/plugins/';</script>

<script type="text/javascript"
        src="https://jces.journals.ekb.eg/themes/base/front/assets/js/scripts.js?v=0.02"></script>
<script src="{{url('')}}/assets/bootstrapValidator.js"></script>


<!-- user defined scripts-->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-72322659-1"></script>
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

    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag("js", new Date());

    gtag("config", "UA-72322659-1");
</script>
<script type="text/javascript">
    _atrk_opts = {atrk_acct: "8dxdn1aMp410/9", domain: "ekb.eg", dynamic: true};
    (function () {
        var as = document.createElement("script");
        as.type = "text/javascript";
        as.async = true;
        as.src = "https://certify-js.alexametrics.com/atrk.js";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(as, s);
    })();
</script>
<!-- Extra Script Scripts -->

<script type="text/javascript">
    $('ul.nav li.dropdown').hover(function () {
        if (window.matchMedia('(max-width: 767px)').matches) return;
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function () {
        if (window.matchMedia('(max-width: 767px)').matches) return;
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });

    var btn = $('#toTop_old');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, '300');
    });

    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#222"
            },
            "button": {
                "background": "#f1d600"
            }
        },
        "content": {
            "message": "يستخدم هذا الموقع ملفات تعريف الارتباط لضمان حصولك على أفضل تجربة على موقعنا.",
            "dismiss": "فهمتك",
            "link": ""
        }
    });
</script>


</body>
</html>
<div id="actn_modal" class="modal fade" tabindex="-1">
    <div id="" class="modal-dialog modal-dialog madal-aw">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true" href="#lost">
                    &times;
                </button>
                <h5 class="modal-title"></h5>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

