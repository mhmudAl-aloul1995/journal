@extends('main/semantic')

@section('content')

    <div id="dv_main_cnt">


        <div class="row">
            <div class="col-md-3 ">
                <!-- Cover -->
                <div class="item-box nomargin-top">
                    <a href="javascript:loadModal('مجلة جامعة غزة للأبحاث والدراسات', '{{url('logo.jpeg')}}')">
                        <img src="{{url('logo.jpeg')}}"
                             alt="مجلة جامعة غزة للأبحاث والدراسات"
                             style="width: 100%;">
                    </a>
                </div>
{{--
                <div class="margin-top-10">
                    <ul class="list-group list-group-bordered list-group-noicon">
                        <li class="list-group-item"><a
                                href="https://jces.journals.ekb.eg/?_action=press&amp;issue=-1&amp;_is= المقالات يناير 2023 ">
                                المقالات الجاهزة
                                للنشر</a></li>
                        <li class="list-group-item"><a
                                href="https://jces.journals.ekb.eg/?_action=current&amp;_is= العدد الحالي"> العدد
                                الحالي</a>
                        </li>
                    </ul>
                </div>
--}}
                <div style=" border-color:  #4295c9;" class="panel panel-default my_panel-default ">
                    <div  class="panel-heading">
                        <h3 class="panel-title">أرشيف الدورية</h3>
                    </div>
                    <div class="panel-body padding-3">

                        <div class="accordion padding-10" id="accordion_arch">

                            @foreach($folders as $value)
                                <div class="card">
                                    <div class="card-header bold" id="heading33213">
                                        <a style=" color: #4295c9; "
                                           class="btn btn-link line-height-10 height-30 padding-0 padding-top-5 "
                                           data-toggle="collapse" data-target="#dvIss_33213"
                                           onclick="loadIssues({{$value->id}})"
                                           id="al_33213"><i class="fa fa-minus"></i></a>
                                        <a style=" color: #4295c9; "
                                           href="{{url('category/2/'.$value->id)}}">
                                            المجلد {{$value->fldr_no}} ({{$value->fldr_year}})</a>
                                    </div>
                                    <div id="dvIss_33213" class="collapse card-cnt in" aria-labelledby="heading33213"
                                         data-parent="#accordion_arch">
                                        @foreach($value->versions as $value1)

                                            <div class="issue_dv">
                                                <a style=" color: #4295c9; " href="{{url('category/3/'.$value1->id)}}">
                                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                    العدد {{$value1->vr_no}}</a>
                                            </div>
                                            <small></small>

                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div>
                    <p dir="rtl" style="text-align: justify;" align="center">&nbsp;<strong><span
                                style="font-size: medium; font-family: arial, helvetica, sans-serif;">يسر هيئة تحرير المجلة العلمية للدراسات التجارية و البيئية من تقديم إصدارات المجلة للسادة الباحثين و المتخصصين في مختلف المجالات التجارية و تهدف هذه الإصدارات فيرفع مستوى البحث العلمي و تطبيقاته ذات العائد المباشر على خطط التنمية و خدمة المجتمع من خلال مساهمة البحث العلمي في حل مشکلات التطبيق العملي بما يساهم في تدنية الفجوة بين النظرية و التطبيق</span></strong>
                    </p></div>
                <!-- Top Articles -->
                <div style=" border-color:  #4295c9;" class="panel panel-default my_panel-default  panel-shadow">
                    <div  class="panel-heading">
                        <b class="panel-title"><i class="fa fa-file"></i> أكثر المقالات مشاهدة</b>
                    </div>
                    <div class="panel-body">
                        @foreach($researches as $value)
                            <div>
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                <a href="{{url('article').'/'.$value->id}}" class="tag_a">
                                      {{$value->res_title}}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>


                <!-- Current Issue -->
                <div>
                    <b class="page-header  margin-top-50 " style="">
                        <i class="et-layers"></i> <span
                            class=""> العدد الحالي:  <span>المجلد {{$last_folder}}، العدد {{$last_version}}، يناير 2023 </span>&nbsp;<a
                                href="https://jces.journals.ekb.eg/?_action=xml&amp;issue=37369" title="XML"
                                target="_blank"> <i
                                    class="fa fa-file-code-o fa-md" aria-hidden="true"></i></a></span>
                    </b>
                    <h4></h4>
                    <div>

                        <div style=" border-color:  #4295c9;" class="panel panel-default my_panel-default panel-shadow">
                            <div  class="panel-heading">
                                <b class="panel-title"><i class="fa fa-file"></i> الموضوعات الرئيسية</b>
                            </div>
                            <div class="panel-body">
                                @foreach($category as $value)
                                    <div>
                                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                        <a href="{{url('searchCategory?category_id='.$value->id.'&version_id='.$version_id)}}"
                                           class="tag_a"> {{$value->ctg_name}}
                                            <span class="badge">{{$value->pending_researches_count}}</span>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>


                        @foreach( $researches as $value )
                            <div class=''>
                                <h5 class="margin-bottom-6 list-article-title rtl">
                                    <a class="tag_a" href="{{url('article').'/'.$value->id}}">{{$value->res_title}}</a>
                                </h5>


                                <!--
                                                            <p class="margin-bottom-3"> الصفحة <span>90-139</span></p>
                                -->


                                <p class="margin-bottom-3 rtl"></p>


                                <ul class="list-inline size-12 margin-top-10 margin-bottom-3 size-14">
                                    <li style="display: inline;padding:5px"><a
                                            href="{{url('article').'/'.$value->id}}">عرض المقالة</a>
                                    </li>
                                    <li>
                                        <a href="{{asset($value->res_link)}}"
                                           target="_blank"
                                           class="pdf_link"><i class="fa fa-file-pdf-o text-red"></i> PDF 747.32 K</a>
                                    </li>
                                </ul>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Current Issue -->


            </div>
            <!-- RIGHT -->
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div style=" border-color:  #4295c9;" class="panel panel-default my_panel-default ">
                    <div  class="panel-heading">
                        <h3 class="panel-title">معلومات عن المنشور</h3>
                    </div>
                    <div class="panel-body" style="padding: 15px;">
                        <strong><i class="fa fa-cube"></i> الناشر</strong><br/>
                        <div style="margin-right:20px">
                            جامعة غزة
                        </div>
                        <hr>
                        <strong class="block margin-top-10"><i class="fa fa-cube"></i> المشرف العام</strong>
                        <div style="margin-right:20px">
                            <a class="edbb_59 block pub_owner tag_a" href="{{url('browse_users').'/'.\App\Models\User::where('role_id',2)->first()['id']}}">
                           {{\App\Models\User::where('role_id',2)->first()['title']}} {{\App\Models\User::where('role_id',2)->first()['name']}}
                            </a>
                        </div>
                        <strong class="block margin-top-10"><i class="fa fa-cube"></i> رئيس التحرير</strong>
                        <div style="margin-right:20px">
                            <a class="edbb_2 block pub_owner tag_a" href="{{url('browse_users').'/'.\App\Models\User::where('role_id',3)->first()['id']}}">
                               {{\App\Models\User::where('role_id',3)->first()['title']}} {{\App\Models\User::where('role_id',3)->first()['name']}}
                                  </a>
                        </div>

                        <strong class="block margin-top-10"><i class="fa fa-cube"></i> هيئة التحرير</strong>
                        <div style="margin-right:20px">
                            @foreach(\App\Models\User::where('role_id',5)->get() as $value)
                                <a class="edbb_5 block pub_owner tag_a"
                                   href="{{url('browse_users').'/'.\App\Models\User::where('role_id',5)->first()['id']}}">{{$value->title}}{{$value->name}}</a>
                            @endforeach
                        </div>
					 <strong class="block margin-top-10"><i class="fa fa-cube"></i>  سكرتير المجلة</strong>
                        <div style="margin-right:20px">
                            <a class="edbb_2 block pub_owner tag_a" href="{{url('browse_users').'/'.\App\Models\User::where('role_id',6)->first()['id']}}">
                               {{\App\Models\User::where('role_id',6)->first()['title']}} {{\App\Models\User::where('role_id',6)->first()['name']}}
                                  </a>
                        </div>

						<strong class="block margin-top-10"><i class="fa fa-cube"></i>  مدقق لغوي</strong>
                        <div style="margin-right:20px">
                            <a class="edbb_2 block pub_owner tag_a" href="{{url('browse_users').'/'.\App\Models\User::where('role_id',7)->first()['id']}}">
                               {{\App\Models\User::where('role_id',7)->first()['title']}} {{\App\Models\User::where('role_id',7)->first()['name']}}
                                  </a>
                        </div>

                        <hr>
                        <div class="row margin-bottom-10" id="dv_ju_frq"><strong class="col-md-7"><i
                                    class="fa fa-cube"></i> حجم الإصدار </strong>
                            <div class="col-md-5">نصف سنوية</div>
                        </div>
                    {{--    <div class="row"><strong class="col-md-7"><i class="fa fa-cube"></i> الترقيم الدولي الموحد
                                للطباعة </strong>
                            <div class="col-md-5" dir="ltr"><a href="https://portal.issn.org/resource/ISSN/2090-3782"
                                                               target="_blank">2090-3782</a></div>
                        </div>
                    --}}</div>
                </div>
                <div style=" border-color:  #4295c9;" class="panel panel-default my_panel-default ">
                    <div  class="panel-heading">
                        <h3 class="panel-title"> البحث</h3>
                    </div>
                    <div class="panel-body" style="padding: 15px;">

                        <div class="searchBox">
                            <form action="{{url('search')}}" method="get">
                                <input type="hidden" name="_action" value="article">
                                <input type="text" class="form-control" name="keywords" placeholder="">
                                <button type="submit" class="btn">
                                    <span class="fa fa-search " aria-hidden="true"></span>
                                </button>
                            </form>
                        </div>
                       {{-- <div class="text-left"><small><a href="{{url('catgeory')}}/?_action=advSearch"> بحث
                                    متقدم</a></small></div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>
@endsection
