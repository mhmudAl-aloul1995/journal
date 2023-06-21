@extends('main/semantic')

@section('content')

    <div id="dv_main_cnt">
        <section class="no-info-box">

            <div class="row">

                <!-- CENTER -->
                <div class="col-lg-9 col-md-9 col-sm-8 col-lg-push-3 col-md-push-3 col-sm-push-4">

                    <!-- Current Issue -->
                    <div>
                        @if($type !=0)

                        <div class="weight-200 nomargin-top">
                            <i class="et-layers"></i> <span class="">المجلد والعدد:  <span>المجلد {{$lastVersion->folder->fldr_no}}، العدد {{$lastVersion->vr_no}}، يناير 2023 </span>&nbsp;<a
                                    href="./?_action=xml&amp;issue=37369" title="XML" target="_blank"> <i
                                        class="fa fa-file-code-o fa-md" aria-hidden="true"></i></a></span>
                        </div>
                        @endif
                        <div class="page-header margin-top-3"> عدد المقالات: <span
                                class="badge badge-light">{{$researches->count()}}</span></div>

                        <div class="margin-top-10">
                            @if($type >1)
                                <div style=" border-color:  #4295c9;"
                                     class="panel panel-default my_panel-default panel-shadow">
                                    <div style=" background-color:  #4295c9;" class="panel-heading">
                                        <b class="panel-title"><i class="fa fa-file"></i> الموضوعات الرئيسية</b>
                                    </div>
                                    <div class="panel-body">


                                        @foreach($category as $value)

                                            <div>
                                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                <a href="{{url('searchCategory?category_id='.$value->id.'&version_id='.$lastVersion['id'])}}"
                                                   class="tag_a"> {{$value->ctg_name}}
                                                    <span class="badge">{{$value->pending_researches_count}}</span>
                                                </a>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                            @endif


                            @foreach($researches as $value)
                                -
                                <div class=''>
                                    <h5 class="margin-bottom-6 list-article-title ltr">
                                        <a class="tag_a" href="{{url('article/'.$value->id)}}">{{$value->res_title}}</a>
                                    </h5>



                                                                    <p class="margin-bottom-3"> الصفحة  <span >{{$value->page_from}}-{{$value->page_to}}</span></p>



                                    <p class="margin-bottom-3 ltr">
                                        @foreach($value->user as $value1)
                                    {{' , '.$value1->name}}
                                        @endforeach
                                    </p>

                                    <ul class="list-inline size-12 margin-top-10 margin-bottom-3 size-14">
                                        <li style="display: inline;padding:5px"><a
                                                href="{{url('article/'.$value->id)}}">عرض المقالة</a></li>
                                        <li><a href="{{asset($value->res_link)}}" target="_blank" class="pdf_link"><i
                                                    class="fa fa-file-pdf-o text-red"></i> تحميل</a></li>
                                    </ul>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
                <!-- /CENTER -->

                <!-- LEFT -->
                <div class="col-lg-3 col-md-3 col-sm-4 col-lg-pull-9 col-md-pull-9 col-sm-pull-8">

                    <!-- Cover -->
                    <div class="item-box nomargin-top">
                        <a href="javascript:loadModal('مجلة جامعة غزة للأبحاث والدراسات', '{{url('logo.jpeg')}}')">
                            <img src="{{url('logo.jpeg')}}" alt="مجلة جامعة غزة للأبحاث والدراسات"
                                 style="width: 100%;">
                        </a>
                    </div>
{{--
                    <div class="margin-top-10">
                        <ul class="list-group list-group-bordered list-group-noicon">
                            <li class="list-group-item"><a
                                    href="./?_action=press&amp;issue=-1&amp;_is= المقالات "> المقالات
                                    </a></li>
                            <li class="list-group-item"><a href="./?_action=current&amp;_is= العدد الحالي"> العدد
                                    الحالي</a></li>
                        </ul>
                    </div>
--}}
                    <div style=" border-color:  #4295c9;" class="panel panel-default my_panel-default ">
                        <div style=" background-color:  #4295c9;" class="panel-heading">
                            <h3 class="panel-title">أرشيف الدورية</h3>
                        </div>
                        <div class="panel-body padding-3">

                            <div class="accordion  padding-10" id="accordion_arch">
                                @foreach($folders_archive as $value)
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
                                        <div id="dvIss_33213" class="collapse card-cnt in"
                                             aria-labelledby="heading33213"
                                             data-parent="#accordion_arch">
                                            @foreach($value->versions as $value1)

                                                <div class="issue_dv"><a style=" color: #4295c9; "
                                                                         href="{{url('category/3/'.$value1->id)}}"><i
                                                            class="fa fa-file-text-o"
                                                            aria-hidden="true"></i>
                                                        العدد {{$value1->vr_no}}</a></div>
                                                <small></small>

                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /LEFT -->

            </div>

        </section>
    </div>

@endsection
