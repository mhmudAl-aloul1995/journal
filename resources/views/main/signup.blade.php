@extends('main/semantic')

@section('content')

    <div id="dv_main_cnt">


        <section class="no-box">

            <div class="heading-title heading-dotted">
                <h3>
                    التسجيل لأول مرة </h3>
            </div>

            <!--		<div class="heading-title heading-dotted">
                        <h3> التسجيل لأول مرة</h3>
                    </div>-->


            <div class="row">

                <div class="col-sm-12">
                    <!-- ALERT -->

                </div>


                <form id="signup" role="form" data-toggle="validator" method="POST" action="{{url('signup')}}"
                      data-toggle="validator" accept-charset="UTF-8"
                      class="nomargin sky-form validate" role="form" enctype="multipart/form-data">

                    <!-- REGISTER -->
                    <div class="col-md-12 col-sm-7">

                        <div class="box-static box-transparent box-bordered padding-30">

                            <div class="box-title margin-bottom-20">
                                <h2 class="size-20">أدخل بياناتك الشخصية</h2>
                            </div>

                            <fieldset style="margin: 0;padding: 0 !important;">

                                <div class="row">
                                    <div class="form-group">

                                        <div class="col-md-6 col-sm-6">
                                            <!-- Title -->
                                            <label>اللقب <span class="requird"></span></label>

                                            <div class="fancy-form fancy-form-select">
                                                <select required name="cn_title" class="form-control  select2">
                                                    <option value="" disabled="" selected="">-- حدد --</option>
                                                    <option value="1"> الدكتور</option>
                                                    <option value="2">السيد</option>
                                                    <option value="3">السيدة</option>
                                                </select>
                                                <i class="fancy-arrow"></i>

                                            </div>
                                            <!-- /Title -->
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <!-- Gender -->
                                            <div class="">

                                                <label>النوع <span class="requird"></span></label>

                                                <div class="fancy-form fancy-form-select">
                                                    <select name="gender" class="form-control radius-0">
                                                        <option value="1">ذكر</option>
                                                        <option value="2">أنثى</option>
                                                    </select>

                                                    <i class="fancy-arrow"></i>
                                                </div>

                                            </div>
                                            <!-- /Gender -->
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">

                                        <!-- First Name -->
                                        <div class="col-md-6 col-sm-6">
                                            <label> الإسم كاملاً <span class="requird">*</span></label>
                                            <label class="input margin-bottom-10">
                                                <i class="ico-append fa fa-user"></i>
                                                <input type="text" name="name" value="" required="required">
                                            </label>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label> البريد الإلكتروني <span class="requird">*</span></label>
                                            <label class="input margin-bottom-10">
                                                <i class="ico-append fa fa-envelope"></i>
                                                <input type="email" name="email" value=""
                                                       required="required">
                                            </label>
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group">

                                        <div class="col-md-6 col-sm-6">
                                            <!-- Degree -->
                                            <label>المستوى التعليمي <span class="requird">*</span></label>

                                            <div class="fancy-form fancy-form-select">
                                                <select name="contact_type" class="form-control radius-0 select2"
                                                        required="required">
                                                    <option value="" disabled="" selected="">-- حدد --</option>
                                                    <option value="1"> دكتوراه</option>
                                                    <option value="7">طبیب</option>
                                                    <option value="2">مرشح للدكتوراه</option>
                                                    <option value="3"> ماجستير</option>
                                                    <option value="4"> طالب ماجستير</option>
                                                    <option value="5"> بكالوريوس</option>
                                                    <option value="6">غير ذلك</option>
                                                </select>

                                                <i class="fancy-arrow"></i>
                                            </div>
                                            <!-- /Degree -->
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <!-- Position -->
                                            <label> الدرجة العلمية <span class="requird">*</span></label>

                                            <div class="fancy-form fancy-form-select">
                                                <select name="degree" class="form-control radius-0 select2"
                                                        required="required">
                                                    <option value="" disabled="" selected="">-- حدد --</option>
                                                    <option value="1">أستاذ</option>
                                                    <option value="2">أستاذ مشارك</option>
                                                    <option value="3">أستاذ مساعد</option>
                                                    <option value="4">مدرس</option>
                                                    <option value="5"> غير ذلك</option>
                                                </select>

                                                <i class="fancy-arrow"></i>
                                            </div>

                                            <!-- /Position -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">

                                        <div class="col-md-6 col-sm-6">
                                            <!-- Subject -->
                                            <label> التخصص الدراسي <span class="requird"></span></label>

                                            <div class="fancy-form fancy-form-select">
                                                <select name="sp_code" class="form-control select2 radius" tabindex="-1"
                                                        style="display: none;">
                                                    <option value="" disabled="" selected="">-- حدد --</option>
                                                    <option value="1">إدارة الأعمال</option>
                                                    <option value="2">الأقتصاد</option>
                                                    <option value="3">العلوم السياسية</option>
                                                    <option value="4">المحاسبة</option>
                                                </select>

                                                <i class="fancy-arrow"></i>
                                            </div>
                                            <!-- /Degree -->
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <!-- Speciality -->
                                            <label>التخصص الدقيق <span class="requird"></span></label>
                                            <label class="input margin-bottom-10">
                                                <i class="ico-append fa fa-graduation-cap"></i>
                                                <input type="text" name="speciality" value="">
                                            </label>
                                            <!-- /Speciality -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">

                                        <div class="col-md-6 col-sm-6">
                                            <!-- Mobile -->
                                            <label>رقم الهاتف الجوال <span class="requird"></span></label>
                                            <label class="input margin-bottom-10">
                                                <i class="ico-append fa fa-phone-phone"></i>
                                                <input type="text" name="phone" value="">
                                            </label>
                                            <!-- /Mobile -->
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <!-- city -->
                                            <label>المدينة <span class="requird"></span></label>
                                            <label class="input margin-bottom-10">
                                                <i class="ico-append fa fa-map-o"></i>
                                                <input type="text" name="city" value="">
                                            </label>
                                            <!-- /city -->
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">

                                        <div class="col-md-6 col-sm-6">
                                            <!-- Fax -->
                                            <label>رقم الفاكس <span class="requird"></span></label>
                                            <label class="input margin-bottom-10">
                                                <i class="ico-append fa fa-fax"></i>
                                                <input type="text" name="fax" value="">
                                            </label>
                                            <!-- /Fax -->
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <!-- Zip code -->
                                            <label> الرمز البريدي <span class="requird"></span></label>
                                            <label class="input margin-bottom-10">
                                                <i class="ico-append fa fa-map-marker"></i>
                                                <input type="text" name="zip_code" value="">
                                            </label>
                                            <!-- /Zip code -->
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group">


                                        <div class="col-md-6 col-sm-6">
                                            <div>


                                                <input type="hidden" name="g-recaptcha-response"
                                                       id="g-recaptcha-response" value="">

                                                <a id="submit"
                                                   class="btn btn-block btn-social btn-primary margin-top-10 margin-right-0 margin-left-0">
                                                    <i class="fa fa-user-plus"></i>
                                                    <button id="submit_btn" style="display:block;width:100%"
                                                            class="margin-0 ok weight-700" onclick="register()"
                                                            type="button"> حفظ
                                                    </button>
                                                </a>

                                            </div>

                                        </div>

                                    </div>
                                </div>


                            </fieldset>


                        </div>

                    </div>
                    <!-- /REGISTER -->


                    <!-- LOGIN -->
                    <!-- /LOGIN -->


            </div>


        </section>

        <script type="text/javascript">


            function register() {
                $("#submit").css('background-color', '#f44336')
                $("#signup").prop('disabled', true)

                var $form = $("#signup"),
                    formData = new FormData(),
                    params = $form.serializeArray();
                $.each(params, function (i, obj) {
                    formData.append(obj.name, obj.value);
                });
                formData.append('email', $('[name="email"]').val());

                formData.append('_token', '{{csrf_token()}}');

                $.ajax({
                    url: $form.attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (data) {
                        $("#submit").css('background-color', '#337ab7')
                        $("#signup").prop('disabled', false)
                        if (data.success == true) {

                            window.location.href = data.url;
                        } else {
                            console.log(data.errors);

                            var errors = "<ul  style='width: auto; text-align: right; margin-right: 500px;' >";
                            $.each(data.errors, function (i, currProgram) {
                                $.each(currProgram, function (key, val) {
                                    errors += "<li>" + val + "</li>";
                                });
                            });
                            errors += "</ul>"
                            showAlertMessage('alert-danger', null, errors);

                        }

                    },
                    error: function (data) {

                    },
                    statusCode: {
                        500: function (data) {
                            console.log(data);
                        }
                    }
                });

            }

        </script>


    </div>

@endsection
