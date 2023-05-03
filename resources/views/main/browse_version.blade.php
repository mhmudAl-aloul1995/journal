@extends('main/semantic')

@section('content')

    <div id="dv_main_cnt">


        <section class="no-box">

            <div class="heading-title heading-dotted">
                <h3>بالعدد</h3>
            </div>

            <div class="lead size-15"> لمشاهدة المقالات ذات الصلة بأي عدد اضغط على العدد المطلوب.</div>
            <div class="divider divider-center divider-color"><!-- divider -->
                <i class="fa fa-chevron-down"></i>
            </div>

            <div class="toggle toggle-transparent-body toggle-accordion">

                @foreach($folder as $value)
                    <div class="toggle ">
                        <label>المجلد {{$value->fldr_no}} ({{$value->fldr_year}})</label>

                            <div class="toggle-content">
                                <div class="row">
                                    @foreach($value->versions as $vr)

                                    <div class="item-box col-md-3 col-lg-2 col-sm-4 col-xs-12">
                                        <figure>
									<span class="item-hover">
										<span class="overlay dark-5"></span>
										<span class="inner">

											<!-- lightbox -->
											<a class="ico-rounded lightbox" href="{{url('public/logo.jpeg')}}"
                                               data-plugin-options="{&quot;type&quot;:&quot;image&quot;}">
												<span class="fa fa-search-plus size-18"></span>
											</a>

                                            <!-- details -->
											<a class="ico-rounded" href="{{url('category/3/'.$vr->id)}}">
												<span class="fa fa-link size-18"></span>
											</a>

										</span>
									</span>

                                            <img class="img-responsive" src="{{url('public/logo.jpeg')}}" alt=""
                                                 height="600">
                                        </figure>

                                        <div class="item-box-desc padding-6">
                                            <h3 class="text-center"><a
                                                    href="{{url('category/3/'.$vr->id)}}">العدد {{$vr->vr_no}}</a></h3>
                                            <ul class="list-inline categories nomargin text-center">
                                            </ul>
                                        </div>

                                    </div>

                                    @endforeach

                                </div>
                            </div>

                    </div>
                @endforeach


            </div>

        </section>
    </div>
@endsection
