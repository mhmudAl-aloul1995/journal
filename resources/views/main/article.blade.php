@extends('main/semantic')

@section('content')

    <div id="dv_main_cnt">


        <section class="no-cover-box">

            <div class="row">

                <!-- CENTER -->
                <div class="col-lg-9 col-md-9 col-sm-8" id="dv_artcl">

                    <!-- Current Issue -->
                    <div>
                        <h1 class="margin-bottom-20 size-18 rtl"><span
                                class="article_title bold"> {{$article->res_title}}</span></h1>
                        <div>


                            <div class="margin-bottom-3">
                            </div>

                            <!--
                                                        <p class="margin-bottom-3">نوع المستند : المقالة الأصلية</p>
                            -->


                            <p class="padding-0" style="margin:12px -2px 0 -2px"><strong> الباحث</strong></p>

                            <ul class="list-inline list-inline-seprator margin-bottom-6 rtl">
                                @foreach($article->user as $value)
                                <li class="padding-3">
                                    <a href="{{url('browse_users').'/'.$value->id}}">{{$value->name}}</a>

                                </li>
                                @endforeach
                            </ul>

                            <p class="margin-bottom-3 rtl" id="aff1">
                            @foreach($article->user as $value)
                                    {{$value->cv.','}}
                                @endforeach
                            </p>


                            <p style="margin:12px -2px 0 -2px"><strong>المستخلص</strong></p>
                            <div class="padding_abstract justify rtl">
                                {{$article->res_summary}}
                            </div>


<!--
                            <p class="padding-0" style="margin:12px -2px 0 -2px"><strong> الكلمات الرئيسية</strong></p>

                            <ul class="block list-inline list-inline-seprator margin-bottom-6 rtl">
                                <li class="padding-3">
                                    <a class="tag_a"
                                       href="./?_action=article&amp;kw=377493&amp;_kw=%28%D8%A7%D9%84%D8%AC%D9%87%D9%88%D8%AF+%D8%A7%D9%84%D9%85%D8%B5%D8%B1%D9%8A%D8%A9">(الجهود
                                        المصرية</a>
                                </li>
                                <li class="padding-3">
                                    <a class="tag_a"
                                       href="./?_action=article&amp;kw=377494&amp;_kw=%D8%B3%D9%8A%D8%A7%D8%B3%D8%A7%D8%AA+%D9%85%D9%83%D8%A7%D9%81%D8%AD%D8%A9+%D8%A7%D9%84%D8%A5%D8%B1%D9%87%D8%A7%D8%A8">سياسات
                                        مكافحة الإرهاب</a>
                                </li>
                                <li class="padding-3">
                                    <a class="tag_a"
                                       href="./?_action=article&amp;kw=31842&amp;_kw=%D8%A7%D9%84%D8%AA%D8%B7%D8%B1%D9%81">التطرف</a>
                                </li>
                                <li class="padding-3">
                                    <a class="tag_a"
                                       href="./?_action=article&amp;kw=20883&amp;_kw=%D8%A7%D9%84%D8%B3%D9%8A%D8%A7%D8%B3%D8%A9+%D8%A7%D9%84%D8%AE%D8%A7%D8%B1%D8%AC%D9%8A%D8%A9">السياسة
                                        الخارجية</a>
                                </li>
                                <li class="padding-3">
                                    <a class="tag_a"
                                       href="./?_action=article&amp;kw=31952&amp;_kw=%D8%A7%D9%84%D8%A5%D8%B1%D9%87%D8%A7%D8%A8">الإرهاب</a>
                                </li>
                                <li class="padding-3">
                                    <a class="tag_a"
                                       href="./?_action=article&amp;kw=377495&amp;_kw=%D8%A7%D9%84%D8%A5%D8%B3%D9%84%D8%A7%D9%85+%D8%A7%D9%84%D8%B3%D9%8A%D8%A7%D8%B3%D9%8A%29+%28Egyptian+efforts">الإسلام
                                        السياسي) (Egyptian efforts</a>
                                </li>
                                <li class="padding-3">
                                    <a class="tag_a"
                                       href="./?_action=article&amp;kw=377496&amp;_kw=Terrorism+compating+policies+-+Extremism+-+Foreign+policy+-Terrorism+-+Political+Islam%29">Terrorism
                                        compating policies - Extremism - Foreign policy -Terrorism - Political
                                        Islam)</a>
                                </li>
                            </ul>
-->

                            <p class="padding-0" style="margin:12px -2px 0 -2px"><strong>الموضوعات الرئيسية</strong></p>

                            <ul class="block list-inline list-inline-seprator margin-bottom-6">
                                <li class="padding-3">
                                    <a href="{{url('category').'/1/'.$article->category->id}}"> {{$article->category->ctg_name}}     </a>
                                </li>
                            </ul>
                        </div>

                        <hr>


                    </div>


                </div>
                <!-- /CENTER -->

                <!-- LEFT -->
                <div class="col-lg-3 col-md-3 col-sm-4">

                    <div class="panel panel-default my_panel-default  margin-bottom-10">
                        <div class="panel-body ar_info_pnl" id="ar_info_pnl_cover">

                            <div id="pnl_cover">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6 nomargin-bottom">
                                        <a href="javascript:loadModal('مجلة جامعة غزة للأبحاث والدراسات', './data/jces/coversheet/cover_ar.jpg')">
                                            <img src="{{url('logo.jpeg')}}"
                                                 alt="مجلة جامعة غزة للأبحاث والدراسات" style="width: 100%;">
                                        </a>
                                    </div>
                                    <div class="col-xs-6 col-md-6 nomargin-bottom">
                                        <h6><a href="#">المجلد {{$article->version->folder->flr_no}}، العدد {{$article->version->vr_no}} - الرقم المسلسل للعدد
                                                {{$article->id}}</a><br/>يناير 2023
<!--                                            <div id="sp_ar_pages"> الصفحة <span dir="ltr">90-139</span></div>-->
                                        </h6>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Download Files -->

                    <div class="panel panel-default my_panel-default  margin-bottom-10 panel-lists">
                        <div class="panel-heading">
                            <h3 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                       href="#ar_info_pnl_fl"><i class="fa fa-files-o"></i> ملفات</a>
                            </h3>
                        </div>
                        <div id="ar_info_pnl_fl" class="panel-collapse collapse in">
                            <div class="panel-body ar_info_pnl padding-6">
                                <ul class="list-group list-group-bordered list-group-noicon nomargin">

                                    <li class="list-group-item"><a
                                            href="{{asset($article->res_link)}}" target="_blank"
                                            class="tag_a pdf_link"><i class="fa fa-file-pdf-o text-red"></i> عرض</a></li>

                                    <!-- Suplement Files -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default my_panel-default  margin-bottom-10">
                        <div class="panel-heading">
                            <h3 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#ar_info_pnl_share" aria-expanded="true"><i class="fa fa-share-square-o" aria-hidden="true"></i> شارك</a></h3>
                        </div>
                        <div id="ar_info_pnl_share" class="panel-collapse collapse in" aria-expanded="true" style="">
                            <div class="panel-body ar_info_pnl padding-10 text-center">
                                <a id="share_facebook" href="https://www.facebook.com/sharer.php?u=https://journal.gu.edu.ps/article/8" target="_blank" class="social-icon social-icon-sm  social-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a id="share_linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://jces.journals.ekb.eg/article_69158.html" target="_blank" class="social-icon social-icon-sm  social-linkedin" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
                                    <i class="icon-linkedin"></i>
                                    <i class="icon-linkedin"></i>
                                </a>
                                <a id="share_mendeley" href="https://www.mendeley.com/import/?url=https://jces.journals.ekb.eg/article_69158.html" target="_blank" class="social-icon social-icon-sm  social-youtube" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mendeley">
                                    <i class="icon-mendeley"></i>
                                    <i class="icon-mendeley"></i>
                                </a>
                                <a id="share_refworks" href="https://www.refworks.com/express/ExpressImport.asp?url=https://jces.journals.ekb.eg/article_69158.html" target="_blank" class="social-icon social-icon-sm  social-disqus" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refworks">
                                    <i class="icon-refworks"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>
                                    <i class="icon-refworks"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>
                                </a>
                                <a id="share_instagram" href="https://www.instagram.com/?url=https://jces.journals.ekb.eg/article_69158.html" target="_blank" class="social-icon social-icon-sm  social-instagram" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </a>
                                <a id="share_twitter" href="https://twitter.com/share?url=https://jces.journals.ekb.eg/article_69158.html&amp;text=استخدام بطاقة الأداء المتوازن في قياس وتقييم الأداء المؤسسي في المنظمات العامة" target="_blank" class="social-icon social-icon-sm  social-twitter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a id="share_email" href="javascript:act('email')" class="social-icon social-icon-sm  social-email3 " data-toggle="tooltip" data-placement="top" title="" data-original-title="Email">
                                    <i class="icon-email3"></i>
                                    <i class="icon-email3"></i>
                                </a>
                                <a id="share_print" href="javascript:printDiv('dv_artcl')" class="social-icon social-icon-sm  social-print" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print">
                                    <i class="icon-print"></i>
                                    <i class="icon-print"></i>
                                </a>
                                <a id="share_stumble" href="https://mix.com/mixit?su=submit&amp;url=https://jces.journals.ekb.eg/article_69158.html" target="_blank" class="social-icon social-icon-sm  social-stumbleupon" data-toggle="tooltip" data-placement="top" title="" data-original-title="StumbleUpon">
                                    <i class="icon-stumbleupon"></i>
                                    <i class="icon-stumbleupon"></i>
                                </a>
                                <a id="share_acedemia" href="https://www.academia.edu/" target="_blank" class="social-icon social-icon-sm  social-academia" data-toggle="tooltip" data-placement="top" title="" data-original-title="Academia">
                                    <i class="ai ai-academia"></i>
                                    <i class="ai ai-academia"></i>
                                </a>
                                <a id="share_sems" href="https://www.semanticscholar.org/" target="_blank" class="social-icon social-icon-sm  social-forrst" data-toggle="tooltip" data-placement="top" title="" data-original-title="Semantic scholar">
                                    <i class="ai ai-semantic-scholar"></i>
                                    <i class="ai ai-semantic-scholar"></i>
                                </a>
                                <a id="share_reddit" href="https://www.reddit.com/submit?url=https://jces.journals.ekb.eg/article_69158.html" target="_blank" class="social-icon social-icon-sm  social-dwolla" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reddit">
                                    <i class="icon-reddit"></i>
                                    <i class="icon-reddit"></i>
                                </a>
                                <a id="share_rg" href="https://www.researchgate.net/" target="_blank" class="social-icon social-icon-sm  social-researchgate" data-toggle="tooltip" data-placement="top" title="" data-original-title="Research Gate">
                                    <i class="ai ai-researchgate"></i>
                                    <i class="ai ai-researchgate"></i>
                                </a>
                                <a id="share_blogger" href="https://www.blogger.com/blog-this.g?u=https://jces.journals.ekb.eg/article_69158.html" target="_blank" class="social-icon social-icon-sm  social-blogger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Blogger">
                                    <i class="icon-blogger"></i>
                                    <i class="icon-blogger"></i>
                                </a>
                                <a id="share_pinterest" href="https://pinterest.com/pin/create/bookmarklet/?media=&amp;url=https://jces.journals.ekb.eg/article_69158.html" target="_blank" class="social-icon social-icon-sm  social-pinterest" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
                                    <i class="icon-pinterest"></i>
                                    <i class="icon-pinterest"></i>
                                </a>
                                <a id="share_digg" href="https://www.digg.com/submit?https://jces.journals.ekb.eg/article_69158.html&amp;title=استخدام بطاقة الأداء المتوازن في قياس وتقييم الأداء المؤسسي في المنظمات العامة" target="_blank" class="social-icon social-icon-sm  social-digg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Digg">
                                    <i class="icon-digg"></i>
                                    <i class="icon-digg"></i>
                                </a>
                                <a id="share_delicious" href="https://del.icio.us/post?url=https://jces.journals.ekb.eg/article_69158.html" target="_blank" class="social-icon social-icon-sm  social-delicious" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delicious">
                                    <i class="icon-delicious"></i>
                                    <i class="icon-delicious"></i>
                                </a>
                                <a id="share_skype" href="https://web.skype.com/share?url=https://jces.journals.ekb.eg/article_69158.html" target="_blank" class="social-icon social-icon-sm  social-skype" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">
                                    <i class="icon-skype"></i>
                                    <i class="icon-skype"></i>
                                </a>

                            </div>
                        </div>
                    </div>

<!--
                    <div class="panel panel-default my_panel-default  margin-bottom-10">
                        <div class="panel-heading">
                            <h3 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                       href="#ar_info_pnl_share"><i class="fa fa-share-square-o"
                                                                                    aria-hidden="true"></i> شارك</a>
                            </h3>
                        </div>
                        <div id="ar_info_pnl_share" class="panel-collapse collapse">
                            <div class="panel-body ar_info_pnl padding-10 text-center">
                                <a id="share_facebook"
                                   href="https://www.facebook.com/sharer.php?u=https://jces.journals.ekb.eg/article_268901.html"
                                   target="_blank" class="social-icon social-icon-sm  social-facebook"
                                   data-toggle="tooltip" data-placement="top" title="Facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a id="share_linkedin"
                                   href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://jces.journals.ekb.eg/article_268901.html"
                                   target="_blank" class="social-icon social-icon-sm  social-linkedin"
                                   data-toggle="tooltip" data-placement="top" title="Linkedin">
                                    <i class="icon-linkedin"></i>
                                    <i class="icon-linkedin"></i>
                                </a>
                                <a id="share_mendeley"
                                   href="https://www.mendeley.com/import/?url=https://jces.journals.ekb.eg/article_268901.html"
                                   target="_blank" class="social-icon social-icon-sm  social-youtube"
                                   data-toggle="tooltip" data-placement="top" title="Mendeley">
                                    <i class="icon-mendeley"></i>
                                    <i class="icon-mendeley"></i>
                                </a>
                                <a id="share_refworks"
                                   href="https://www.refworks.com/express/ExpressImport.asp?url=https://jces.journals.ekb.eg/article_268901.html"
                                   target="_blank" class="social-icon social-icon-sm  social-disqus"
                                   data-toggle="tooltip" data-placement="top" title="Refworks">
                                    <i class="icon-refworks"><span class="path1"></span><span class="path2"></span><span
                                            class="path3"></span><span class="path4"></span><span
                                            class="path5"></span><span class="path6"></span><span
                                            class="path7"></span><span class="path8"></span><span
                                            class="path9"></span><span class="path10"></span></i>
                                    <i class="icon-refworks"><span class="path1"></span><span class="path2"></span><span
                                            class="path3"></span><span class="path4"></span><span
                                            class="path5"></span><span class="path6"></span><span
                                            class="path7"></span><span class="path8"></span><span
                                            class="path9"></span><span class="path10"></span></i>
                                </a>
                                <a id="share_instagram"
                                   href="https://www.instagram.com/?url=https://jces.journals.ekb.eg/article_268901.html"
                                   target="_blank" class="social-icon social-icon-sm  social-instagram"
                                   data-toggle="tooltip" data-placement="top" title="Instagram">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </a>
                                <a id="share_twitter"
                                   href="https://twitter.com/share?url=https://jces.journals.ekb.eg/article_268901.html&amp;text=رؤية مصر لمكافحة الإرهاب وتأثيرها على سياستها الخارجية خلال الفترة(2011-2019)"
                                   target="_blank" class="social-icon social-icon-sm  social-twitter"
                                   data-toggle="tooltip" data-placement="top" title="Twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a id="share_email" href="javascript:act('email')"
                                   class="social-icon social-icon-sm  social-email3 " data-toggle="tooltip"
                                   data-placement="top" title="Email">
                                    <i class="icon-email3"></i>
                                    <i class="icon-email3"></i>
                                </a>
                                <a id="share_print" href="javascript:printDiv('dv_artcl')"
                                   class="social-icon social-icon-sm  social-print" data-toggle="tooltip"
                                   data-placement="top" title="Print">
                                    <i class="icon-print"></i>
                                    <i class="icon-print"></i>
                                </a>
                                <a id="share_stumble"
                                   href="https://mix.com/mixit?su=submit&url=https://jces.journals.ekb.eg/article_268901.html"
                                   target="_blank" class="social-icon social-icon-sm  social-stumbleupon"
                                   data-toggle="tooltip" data-placement="top" title="StumbleUpon">
                                    <i class="icon-stumbleupon"></i>
                                    <i class="icon-stumbleupon"></i>
                                </a>
                                <a id="share_acedemia" href="https://www.academia.edu/" target="_blank"
                                   class="social-icon social-icon-sm  social-academia" data-toggle="tooltip"
                                   data-placement="top" title="Academia">
                                    <i class="ai ai-academia"></i>
                                    <i class="ai ai-academia"></i>
                                </a>
                                <a id="share_sems" href="https://www.semanticscholar.org/" target="_blank"
                                   class="social-icon social-icon-sm  social-forrst" data-toggle="tooltip"
                                   data-placement="top" title="Semantic scholar">
                                    <i class="ai ai-semantic-scholar"></i>
                                    <i class="ai ai-semantic-scholar"></i>
                                </a>
                                <a id="share_reddit"
                                   href="https://www.reddit.com/submit?url=https://jces.journals.ekb.eg/article_268901.html"
                                   target="_blank" class="social-icon social-icon-sm  social-dwolla"
                                   data-toggle="tooltip" data-placement="top" title="Reddit">
                                    <i class="icon-reddit"></i>
                                    <i class="icon-reddit"></i>
                                </a>
                                <a id="share_rg" href="https://www.researchgate.net/" target="_blank"
                                   class="social-icon social-icon-sm  social-researchgate" data-toggle="tooltip"
                                   data-placement="top" title="Research Gate">
                                    <i class="ai ai-researchgate"></i>
                                    <i class="ai ai-researchgate"></i>
                                </a>
                                <a id="share_blogger"
                                   href="https://www.blogger.com/blog-this.g?u=https://jces.journals.ekb.eg/article_268901.html"
                                   target="_blank" class="social-icon social-icon-sm  social-blogger"
                                   data-toggle="tooltip" data-placement="top" title="Blogger">
                                    <i class="icon-blogger"></i>
                                    <i class="icon-blogger"></i>
                                </a>
                                <a id="share_pinterest"
                                   href="https://pinterest.com/pin/create/bookmarklet/?media=&url=https://jces.journals.ekb.eg/article_268901.html"
                                   target="_blank" class="social-icon social-icon-sm  social-pinterest"
                                   data-toggle="tooltip" data-placement="top" title="Pinterest">
                                    <i class="icon-pinterest"></i>
                                    <i class="icon-pinterest"></i>
                                </a>
                                <a id="share_digg"
                                   href="https://www.digg.com/submit?https://jces.journals.ekb.eg/article_268901.html&title=رؤية مصر لمكافحة الإرهاب وتأثيرها على سياستها الخارجية خلال الفترة(2011-2019)"
                                   target="_blank" class="social-icon social-icon-sm  social-digg" data-toggle="tooltip"
                                   data-placement="top" title="Digg">
                                    <i class="icon-digg"></i>
                                    <i class="icon-digg"></i>
                                </a>
                                <a id="share_delicious"
                                   href="https://del.icio.us/post?url=https://jces.journals.ekb.eg/article_268901.html"
                                   target="_blank" class="social-icon social-icon-sm  social-delicious"
                                   data-toggle="tooltip" data-placement="top" title="Delicious">
                                    <i class="icon-delicious"></i>
                                    <i class="icon-delicious"></i>
                                </a>
                                <a id="share_skype"
                                   href="https://web.skype.com/share?url=https://jces.journals.ekb.eg/article_268901.html"
                                   target="_blank" class="social-icon social-icon-sm  social-skype"
                                   data-toggle="tooltip" data-placement="top" title="Skype">
                                    <i class="icon-skype"></i>
                                    <i class="icon-skype"></i>
                                </a>

                            </div>
                        </div>
                    </div>
-->
                    <!-- Cite This Article -->
<!--
                    <div class="panel panel-default my_panel-default  margin-bottom-10 panel-lists">
                        <div class="panel-heading">
                            <h3 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                       href="#ar_info_pnl_cite"><i class=" fa fa-external-link"></i>
                                    إرسال الاستشهاد إلى</a></h3>
                        </div>
                        <div id="ar_info_pnl_cite" class="panel-collapse collapse ">
                            <div class="panel-body ar_info_pnl">
                                <ul class="list-group list-group-bordered list-group-noicon"
                                    style="display:block !important;max-height:9999px">
                                    <li class="list-group-item ltr"><a class="tag_a"
                                                                       href="./?_action=export&rf=ris&rc=268901">RIS</a>
                                    </li>
                                    <li class="list-group-item ltr"><a class="tag_a"
                                                                       href="./?_action=export&rf=enw&rc=268901">EndNote</a>
                                    </li>
                                    <li class="list-group-item ltr"><a class="tag_a"
                                                                       href="./?_action=export&rf=ris&rc=268901">Mendeley</a>
                                    </li>
                                    <li class="list-group-item ltr"><a class="tag_a"
                                                                       href="./?_action=export&rf=bibtex&rc=268901">BibTeX</a>
                                    </li>
                                    <li class="list-group-item ltr"><a class="tag_a" href="javascript:void(0)"
                                                                       data-toggle="modal"
                                                                       data-target="#cite-apa">APA</a></li>
                                    <li class="list-group-item ltr"><a class="tag_a" href="javascript:void(0)"
                                                                       data-toggle="modal"
                                                                       data-target="#cite-mla">MLA</a></li>
                                    <li class="list-group-item ltr"><a class="tag_a" href="javascript:void(0)"
                                                                       data-toggle="modal" data-target="#cite-harvard">HARVARD</a>
                                    </li>
                                    <li class="list-group-item ltr"><a class="tag_a" href="javascript:void(0)"
                                                                       data-toggle="modal"
                                                                       data-target="#cite-vancouver">VANCOUVER</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
-->

                    <!-- Article Statastic -->
                    <div class="panel panel-default my_panel-default  panel-lists">
                        <div class="panel-heading">
                            <h3 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                       href="#ar_info_pnl_st"><i class="fa fa-bar-chart"
                                                                                 aria-hidden="true"></i> الإحصائيات</a>
                            </h3>
                        </div>
                        <div id="ar_info_pnl_st" class="panel-collapse collapse in">
                            <div class="panel-body ar_info_pnl">
                                <ul class="list-group list-group-bordered list-group-noicon"
                                    style="display:block !important;max-height:9999px">
                                    <li class="list-group-item"><a class="tag_a">عدد المشاهدات للمقالة: <i>134</i></a>
                                    </li>
<!--
                                    <li class="list-group-item"><a class="tag_a">تنزیل PDF: <i>36</i></a></li>
-->
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /LEFT -->

            </div>

        </section>

        <div id="cite-apa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">APA</h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <p>سعد حسين محمد شريف, رانيا, & عبد الرحمن الديربي, عبد العال. (2022). رؤية مصر لمكافحة الإرهاب
                            وتأثيرها على سياستها الخارجية خلال الفترة(2011-2019). <em>المجلة العلمية للدراسات التجارية
                                والبيئية</em>, <em>13</em>(3), 90-139. doi: 10.21608/jces.2022.268901</p>
                    </div>
                </div>
            </div>
        </div>@endsection
