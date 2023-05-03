@extends('main/semantic')

@section('content')

    <div id="dv_main_cnt">



        <section class="no-box">

            <div class="heading-title heading-dotted">
                <h3>بالموضوع</h3>
            </div>

            <div class="lead size-15">لمشاهدة المقالات ذات الصلة بالموضوع اضغط على اسم الموضوع.</div>
            <div class="divider divider-center divider-color"><!-- divider -->
                <i class="fa fa-chevron-down"></i>
            </div>

            <div class="toggle toggle-transparent-body toggle-accordion">

                @foreach($category as $value)

                <div>
                    <a href="{{url('category').'/1/'.$value->id}}" class="block margin-bottom-10"> <i class="fa fa-cube size-12"></i> {{$value->ctg_name}}</a>

                </div>
                @endforeach





            </div>

        </section>
    </div>@endsection
