@extends('main/semantic')

@section('content')

    <div id="dv_main_cnt">


        <section class="no-box">

            <div class="heading-title heading-dotted">
                <h3>بالمؤلف</h3>
            </div>


            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="search margin-bottom-60 heading-title heading-border-bottom heading-color">
                        <label for="find-item" class="size-18 weight-700" style="margin: 0 10px;display:inline"><i>
                                البحث</i></label>
                        <input name="find-item" id="find-item" type="text"
                               style="border: none;height: 32px;width: calc(100% - 100px);">
                    </div>
                </div>
            </div>




            <div id="portfolio" class="clearfix portfolio-isotope portfolio-isotope-3 portfolio-right"
                 style="width: 1140px; position: relative; height: 15984px;">


                @foreach($chars as $value)
                    <div class="portfolio-item ا" style="width: 380px; position: absolute; right: 0px; top: 0px;">
                        <!-- item -->
                        <div class="item-box">
                            <div class="item-box-desc">

                                <div class="heading-title heading-border-bottom heading-color margin-bottom-10">
                                    <h3>{{$value}}</h3>
                                </div>

                                <ul class="list-inline categories nomargin">
                                    <?php
                                    $users=\App\Models\User::withCount('researchers')->where('name', 'LIKE', $value.'%')->orderBy('name','asc')->get();
                                    //dd($users);
                                    ?>
                                    @foreach($users as $user)

                                        <li class="atomic-item padding-3" style="display:block">

                                            <a class="atomic-title text-dark block size-14"
                                               href="{{url('category').'/0'.'/'.$user->id}}">{{$user->name}}<strong>[{{$user->researchers_count}}]</strong></a>

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

            <script type="text/javascript">

                document.addEventListener("DOMContentLoaded", function (event) {

                    document.getElementById("find-item").focus();

                    jQuery("#find-item").on("keyup", function () {

                        jQuery(".atomic-item").show();
                        jQuery(".portfolio-item").show();

                        var hasResult = true;
                        var value = jQuery(this).val().toLowerCase().trim();

                        if (value != '') {
                            hasResult = false;

                            jQuery(".atomic-item").each(function (index) {
                                var state = jQuery(this).find('.atomic-title').text().toLowerCase().indexOf(value) > -1
                                hasResult = hasResult || state;

                                jQuery(this).toggle(state)
                            });

                            jQuery(".portfolio-item").each(function (index) {
                                var state = jQuery(this).find('.atomic-item:visible').length > 0

                                jQuery(this).toggle(state)
                            });

                        }

                        jQuery('#noresult').toggle(!hasResult);

                        jQuery('#portfolio').isotope({
                            filter: '*',
                            animationOptions: {
                                duration: 750,
                                easing: 'linear',
                                queue: false
                            }
                        });
                    });


                });

            </script>

        </section>
    </div>
@endsection
