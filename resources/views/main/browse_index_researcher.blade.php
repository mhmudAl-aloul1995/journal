@extends('main/semantic')

@section('content')
    <div id="dv_main_cnt">


        <section class=" no-box">


            <div class="heading-title heading-dotted">
                <h3>فهرس المؤلفين</h3>
            </div>


            <!-- page tabs -->
            <ul class="nav nav-tabs margin-bottom-30">
                <li {{($folder_id==null) ? " class=active":null}} ><a href="{{url('browse_index_researcher')}}">كل
                        السنوات</a></li>
                @foreach($folders as $value)
                    <li {{($value->id== $folder_id) ? " class=active":null}} >
                        <a href="{{url('browse_index_researcher_by_folder').'/'.$value->id}}">المجلد {{$value->fldr_no}}</a>
                    </li>
                @endforeach
            </ul>
            <!-- /page tabs -->


        </section>

        <section class="no-box">


            <div class="text-center">
                <ul id="portfolio_filter" class="nav nav-pills margin-bottom-60">
                    <li class="filter active"><a data-filter="*" href="#" style="background-color: #f8f8f8;">الكل</a>
                    </li>
                    @foreach($chars as $value)
                        <li class="filter">
                            <span class="badge badge-dark btn-xs badge-corner radius-3"
                                  style="transform:scale(0.75);z-index:99"></span>
                            <a class="padding-6" style="background-color: #f8f8f8;"
                               data-filter=".{{$value}}">{{$value}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>


            <div id="portfolio" class="clearfix portfolio-isotope portfolio-isotope-3 portfolio-right"
                 style="width: 1140px; position: relative; height: 64780px;">

                @foreach($chars as $value)

                    <div class="portfolio-item {{$value}}"
                         style="width: 380px; position: absolute; right: 0px; top: 0px;">
                        <!-- item -->
                        <div class="item-box">
                            <div class="item-box-desc">

                                <div class="heading-title heading-border-bottom heading-color margin-bottom-10">
                                    <h3>{{$value}}</h3>
                                </div>

                                <ul class="list-inline categories nomargin">
                                    <?php $researchers = \App\Models\Researcher::with('user', 'research')
                                        ->wherehas('user', function ($q) use ($value) {
                                            $q->where('name', 'LIKE', $value . '%')->orderBy('name', 'asc');
                                        });
                                    if ($folder_id != null) {
                                        $researchers->whereHas('research', function ($q) use ($folder_id) {
                                            $q->wherehas('version', function ($q) use ($folder_id) {

                                                $q->where('folder_id', $folder_id);
                                            });
                                        });
                                    }

                                    ?>

                                    @foreach($researchers->wherehas('research')->get() as $res)
                                        {{ $res->id}}



                                            <li class="atomic-item padding-3" style="display:block">


                                                <a class="atomic-title text-dark block size-14"
                                                   href="{{url('article').'/'.$res->research->id}}">
                                                    @foreach($res->user as $user)
                                                        {{$user->name.','}}
                                                    @endforeach
                                                </a>
                                                <span class="wight-300 size-12 block"
                                                      style="color:#999;padding:4px 8px 10px 8px">
                                                {{$res->research->res_title}}

                                                <strong>
                                                    [المجلد {{$res->research->version->folder->fldr_no}}، العدد {{$res->research->version->vr_no}} ، الصفحة {{$res->research->page_from.'-'.$res->research->page_to}} ]</strong>
                                            </span>
                                            </li>
                                    @endforeach


                                </ul>
                            </div>

                        </div>
                    </div><!-- /item -->

                @endforeach


            </div>

            <!-- No reasult -->
            <div id="noresult" class="alert alert-default margin-bottom-30 fullwidth" style="display:none">
                لا يطابق الاستعلام الخاص بك مع أي بند
            </div>


        </section>
    </div>
@endsection
