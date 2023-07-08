@extends('semantic')
@section('title','إجراءات البحث')
@section('pageName','إجراءات البحث')


@section('content')

    <style>
        #sideMenu .active > a {
            color: #fff !important;
            background-color: #F1C40F !important;
            border-color: #337ab7;
        }

        #title:hover {
            background-color: #0a6aa1;
            color: white;
        }

        #title_parent {
            border: 1px solid #0a6aa1;
        }

        .desc, .number {
            font-size: 15px !important;
        }

    </style>
    <div class="modal container fadeIn" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->

                    <div class="portlet-title">
                        <div class="caption font-green-haze">
                            <i class="icon-wallet font-green-haze"></i>
                            <span class="caption-subject bold uppercase"></span>المدقق اللغوي
                        </div>
                    </div>


                    <form method="POST" action="" data-toggle="validator" id="userForm" accept-charset="UTF-8"
                          class="form-horizontal form" role="form" enctype="multipart/form-data">

                        <input name="id" type="hidden" value="">
                        <input name="roles[]" type="hidden" value="7">
                        <input name="research_application_id" type="hidden" value="">

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label for="name" class="col-md-4  control-label">الإسم
                                                </label>
                                                <div class="col-md-8">
                                                    <input required="" type="text" name="name" value=""
                                                           class="form-control" placeholder="الإسم">
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label for="address" class="col-md-4  control-label">العنوان
                                                </label>
                                                <div class="col-md-8">
                                                    <input required="" type="text" name="address" value=""
                                                           class="form-control" placeholder="العنوان">
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label for="email" class="col-md-4  control-label">الإيميل
                                                </label>
                                                <div class="col-md-8">
                                                    <input required="" type="text" name="email" value=""
                                                           class="form-control" placeholder="الإيميل">
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="mobile" class="col-md-4  control-label">بادئة الإسم
                                            </label>
                                            <div class="col-md-8">
                                                <input required="" type="text" name="degree" value=""
                                                       class="form-control" placeholder="بادئة الإسم">
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="mobile" class="col-md-4  control-label">رقم الجوال
                                            </label>
                                            <div class="col-md-8">
                                                <input required="" type="text" name="mobile" value=""
                                                       class="form-control" placeholder="رقم الجوال">
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group form-md-line-input ">
                                                                                <label class="col-md-4 control-label" for="orph_degre">
                                                                                    النوع</label>

                                                                                <div class="col-md-8">
                                                                                    <select required name="cust_type"
                                                                                            data-placeholder="النوع" data-allow-clear="true"
                                                                                            class="form-control select2 ">
                                                                                        <option value=""></option>
                                                                                        <option value="0">مورد</option>
                                                                                        <option value="1">زبون</option>

                                                                                    </select>
                                                                                    <div class="form-control-focus"></div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                -->
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>

                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="submitForm('user')" class="btn green ok">حفظ التغييرات</button>
            <button type="button" data-dismiss="modal" class="btn btn-default">اغلاق</button>
        </div>
    </div>

    <div class="row">
        <div class="row-md-4">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>إجراءات البحث
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title=""
                           title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button id="new_app" onclick="new_app(null)" class="btn sbold red"> إضافة جديد
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">


                        @if($researchApplication->count())

                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <ul style="background-color:#0a6aa1; color:white;" id="title_parent" class="nav  ">
                                    <li onclick="" class="">
                                        <a id="title" style="  text-align: center; color:white" href=""
                                           data-toggle="tab" aria-expanded="false">
                                            اسم البحث </a>
                                    </li>

                                </ul>
                                <ul style="border: 1px solid #337ab7;" id="sideMenu" class="nav nav-tabs tabs-left">
                                    @foreach($researchApplication as $key=>$val)
                                        <li onclick="openMyApllication({{$val->id}})" class="">
                                            <a href="#tab_6_{{$val->id}}" data-toggle="tab" aria-expanded="false">
                                                {{$val->research_title}} </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        @endif
                        <div class="col-md-10">
                            <div class="portlet light " id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red bold uppercase"> إجراءات تحكيم البحث -
                                            <span class="step-title"> خطوة 1 من 4 </span>
                                        </span>
                                    </div>
                                    {{--
                                                                        <div class="actions">
                                                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                                <i class="icon-cloud-upload"></i>
                                                                            </a>
                                                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                                <i class="icon-wrench"></i>
                                                                            </a>
                                                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                                <i class="icon-trash"></i>
                                                                            </a>
                                                                        </div>
                                    --}}
                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="#" id="submit_form" method="POST">
                                        <input type="hidden" id="app_status" name="app_status"/>
                                        <input type="hidden" id="is_commitment" name="is_commitment"/>
                                        <input type="hidden" id="app_id" value="0" name="id"/>
                                        <div class="form-wizard">
                                            <div class="form-body">
                                                <ul class="nav nav-pills nav-justified steps">
                                                    <li>
                                                        <a id="step1" href="#tab1" data-toggle="tab" class="step">
                                                            <span class="number"> 1 </span>
                                                            <span class="desc">
                                            <i class="fa fa-check"></i> ارفاق الطلب </span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a id="step2" href="#tab2" data-toggle="tab"
                                                           class="step active">
                                                            <span class="number"> 2 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> نحكيم البحث </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a id="step3" href="#tab3" data-toggle="tab" class="step">
                                                            <span class="number"> 3 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> تدقيق لغوي </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a id="step4" href="#tab4" data-toggle="tab" class="step">
                                                            <span class="number"> 4 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> الموافقة على النشر </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div id="bar" class="progress progress-striped" role="progressbar">
                                                    <div class="progress-bar progress-bar-success"></div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="alert alert-danger display-none">
                                                        <button class="close" data-dismiss="alert"></button>
                                                        لديك بعد الأخطاء , يرجى ملئ كافة الحقول المطلوبة
                                                    </div>
                                                    <div class="alert alert-success display-none">
                                                        <button class="close" data-dismiss="alert"></button>
                                                        Your form validation is successful!
                                                    </div>
                                                    <div class="tab-pane active" id="tab1">
                                                        <h3 class="block">تقديم طلب تحكيم البحث</h3>
                                                        <div id="ribbon-commitment" class="form-group">
                                                            <label class="control-label col-md-3">التعهد
                                                            </label>
                                                            <div class="col-md-6">
                                                                <div class="mt-element-ribbon bg-grey-steel">
                                                                    <div
                                                                        class="ribbon ribbon-vertical-left ribbon-border-vert ribbon-color-warning uppercase">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <p class="ribbon-content">أتعهد أنا مقدم البحث أنه
                                                                        منسوب كاملا لي و
                                                                        أنه تبع معايير البحث العلمي ومنهجيته ويتسم
                                                                        بالأصالة , وقد تم
                                                                        توثيق اللإقتباسات بدقةأتعهد أنا مقدم البحث أنه
                                                                        منسوب كاملا لي و
                                                                        أنه تبع معايير البحث العلمي ومنهجيته ويتسم
                                                                        بالأصالة , وقد تم
                                                                        توثيق اللإقتباسات بدقة</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div style=" display: none;" id="ribbon-waitting"
                                                             class="form-group">
                                                            <label class="control-label col-md-3">
                                                            </label>
                                                            <div class="col-md-6">
                                                                <div class="mt-element-ribbon bg-grey-steel">
                                                                    <div
                                                                        class="ribbon ribbon-shadow ribbon-color-success uppercase">
                                                                        تنويه
                                                                    </div>
                                                                    <p class="ribbon-content">
                                                                        بإنتظار رد إدارة المجلة للتأكد من الحوالة
                                                                        البنكية
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">عنوان البحث
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       name="research_title"
                                                                       id="research_title"/>
                                                                {{--
                                                                                                                <span class="help-block"> Provide your password. </span>
                                                                --}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">البحث
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <input type="file" class="form-control"
                                                                       name="research_file"
                                                                       id="research_file"/>

                                                                <span class="help-block">  </span>

                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div id="ribbon-pay" class="form-group">
                                                            <label class="control-label col-md-3">
                                                                <span class="required"> </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <div class="mt-element-ribbon bg-grey-steel">
                                                                    <div
                                                                        class="ribbon ribbon-border-hor ribbon-clip ribbon-color-danger uppercase">
                                                                        <div class="ribbon-sub ribbon-clip"></div>
                                                                        تنويه
                                                                    </div>
                                                                    <p class="ribbon-content">مبلغ طلب الايداع 100$ على
                                                                        حساب بنك فلسطين
                                                                        جامعة غزة</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">صورة عن مبلغ الإيداع
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="file" class="form-control"
                                                                       id="research_money_file"
                                                                       name="research_money_file"/>

                                                                <span id="research_money_file_help"
                                                                      class="help-block">  </span>

                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="tab-pane" id="tab2">
                                                        <h3 class="block">تحكيم البحث</h3>
                                                        <div style=" color: red !important; " class="form-group">
                                                            <label class="control-label col-md-3">رفع التعديلات
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <input type="file" class="form-control"
                                                                       name="research_file_updated"
                                                                       id="research_file_updated"/>

                                                                <span id="research_file_updated_help"
                                                                      class="help-block">  </span>

                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div id="ribbon_evaluation" class="form-group">

                                                            <div class="col-md-6">
                                                                <div class="mt-element-ribbon bg-grey-steel">
                                                                    <div
                                                                        class="ribbon ribbon-shadow ribbon-color-success uppercase">
                                                                        تنويه
                                                                    </div>
                                                                    <p class="ribbon-content">
                                                                        بإنتظار رد لجنة التحكيم
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="notes" class="col-md-12">
                                                            <div class="portlet box green">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-globe"></i>ملاحظات البحث
                                                                    </div>
                                                                    <div class="tools">

                                                                    </div>
                                                                </div>
                                                                <input type="hidden" value=""
                                                                       id="research_application_id"
                                                                       name="research_application_id">
                                                                <div class="portlet-body">
                                                                    <div class="table-toolbar">
                                                                        <div class="table-toolbar">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="btn-group">
                                                                                        <button style="display: none;"
                                                                                                id="addEvaluatorNotes"
                                                                                                onclick="showModal('addEvaluatorNotes',null)"
                                                                                                class="btn sbold red">
                                                                                            إضافة مجلد
                                                                                            <i class="fa fa-plus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="table-container">

                                                                        <table class="table table-striped  "
                                                                               id="publicationManagementEvaluatorNoteTable">
                                                                            <thead>
                                                                            <tr>
                                                                                <th> #</th>
                                                                                <th>الملاحظة</th>
                                                                                <th>المرفق</th>
                                                                                <th>تم تنفيذها؟</th>
                                                                                <th> إجراء</th>

                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane" id="tab3">
                                                        <h3 class="block">التدقيق اللغوي</h3>
                                                        <div style=" color: red !important; " class="form-group">
                                                            <label class="control-label col-md-3">رفع ملف التدقيق
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <input type="file" class="form-control"
                                                                       name="proofreader_file"
                                                                       id="proofreader_file"/>

                                                                <span id="proofreader_file_help"
                                                                      class="help-block">  </span>

                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="portlet box green">
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            <i class="fa fa-globe"></i>المدقق اللغوي
                                                                        </div>
                                                                        <div class="tools">

                                                                        </div>
                                                                    </div>

                                                                    <div class="portlet-body">
                                                                        <div class="table-toolbar">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div
                                                                                        class="btn-group">
                                                                                        <span id=""
                                                                                              onclick="showModal('user',null)"

                                                                                              class="btn sbold red"> إضافة
                                                                                            جديد
                                                                                            <i class="fa fa-plus"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="table-container">

                                                                            <table
                                                                                class="table table-striped  table-hover"
                                                                                id="userTable">
                                                                                <thead>
                                                                                <tr>

                                                                                    <th> إسم المدقق</th>
                                                                                    <th>الإيميل</th>
                                                                                    <th>الجوال</th>
                                                                                    <th>العنوان</th>

                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane" id="tab4">
                                                        <h3 class="block">الموافقة على النشر</h3>
                                                        <div id="ribbon-congratualations" class="form-group">
                                                            <label class="control-label col-md-3">تهانينا
                                                            </label>
                                                            <div class="col-md-6">
                                                                <div class="mt-element-ribbon bg-grey-steel">
                                                                    <div
                                                                        class="ribbon ribbon-vertical-left ribbon-border-vert ribbon-color-success uppercase">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <p class="ribbon-content">تم الموافقة على نشر بحثك في مجلة جامعة غزة</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="javascript:;" class="btn default button-previous">
                                                            <i class="fa fa-angle-right"></i> الرجوع </a>
                                                        <a href="javascript:;"
                                                           class="btn btn-outline green button-next"> التالي
                                                            <i class="fa fa-angle-left"></i>
                                                        </a>
                                                        <a href="javascript:;" class="btn green button-submit"> Submit
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection





@section('myScript')
    <script src="{{url('')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
            type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/jquery-validation/js/additional-methods.min.js"
            type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"
            type="text/javascript"></script>


    <script>
        $("#new_app").click()


        function new_app() {

            $("#research_file").closest('.form-group').show()
            $("#research_money_file").closest('.form-group').show()
            $("#research_title").closest('.form-group').show()
            $("#ribbon-waitting").closest('.form-group').hide()
            $("#ribbon-commitment").closest('.form-group').show()
            $("#ribbon-pay").closest('.form-group').show()
            var error = $('.alert-danger', $('#submit_form'))
            error.hide()
            $("#form_wizard_1").find('input').val(null)
            $('.help-block-error').remove()
            $("#form_wizard_1").removeClass('help-block-error')
            $('.help-block').hide();
            $('.has-error , .form-control').css('border-color', '#36c6d3')
            $('.control-label').css('color', '#36c6d3')
            $("#app_status").val(0);
            $('#form_wizard_1').find('.button-next').text('موافق').show();
            $("#step1").click();
        }

        var publicationManagementEvaluatorNoteTable = $('#publicationManagementEvaluatorNoteTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{url('researchAppNoteShow')}}",
                data: function (d) {
                    d.research_application_id = $('#research_application_id').val();
                    d.show_all = null

                }
            },
            dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
            buttons: [
                {
                    text: 'تحديث',
                    className: 'btn green reload publicationManagementEvaluatorNoteTable',
                    action: function (e, dt, node, config) {
                        dt.ajax.reload();
                    }
                },
                /*{
                    text: 'الحملة',
                    className: 'btn red reload offer',

                },*/
            ],
            columns: [
                {className: 'text-center', data: 'id', name: 'id', searchable: true},
                {className: 'text-center', data: 'note', name: 'note', searchable: true},
                {className: 'text-center', data: 'note_file', name: 'note_file', searchable: true},
                {className: 'text-center', data: 'is_done', name: 'is_done', searchable: true},
                {className: 'text-left', data: 'action', name: 'action', searchable: false},
            ],
        });
        var user = $('#userTable').DataTable({
            processing: true,
            serverSide: true,
            order: [[1, 'asc']],

            ajax: {
                url: "{{url('user/{user}')}}",

                data: function (d) {
                    d.research_application_id = $('#research_application_id').val() > 0 ? $('#research_application_id').val() : 0;

                }
            },
            dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
            buttons: [
                {
                    text: 'تحديث',
                    className: 'btn green reload userTable',
                    action: function (e, dt, node, config) {
                        dt.ajax.reload();
                    }
                },
                /*{
                    text: 'الحملة',
                    className: 'btn red reload offer',

                },*/
            ],
            columns: [
                {className: 'text-center', data: 'name', name: 'name', searchable: true},
                {className: 'text-center', data: 'email', name: 'email', searchable: true},
                {className: 'text-center', data: 'mobile', name: 'mobile', searchable: true},
                {className: 'text-center', data: 'address', name: 'address', searchable: true},
            ],
        });

        function openMyApllication(id) {
            var error = $('.alert-danger', $('#submit_form'))


            $(".publicationManagementEvaluatorNoteTable").click()

            $("#research_application_id").val(id)
            $.ajax({
                url: '{{url('researchApplication')}}' + '/' + id + '/edit',
                type: 'GET',
                data: null,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.researcher_notes_count > 0) {

                        $("#ribbon_evaluation").hide()
                        $("#notes").show()
                    } else {
                        $("#ribbon_evaluation").show()
                        $("#notes").hide()


                    }
                    if (response.success == true) {

                        $("#ribbon-commitment").hide()
                        $('#research_file_updated_help').html("<a target='_blank' href='" + response.researchApplication.res_file + "'>الرابط<a>").hide()
                        $('#proofreader_file_help').html("<a target='_blank' href='" + response.researchApplication.prf_file + "'>الرابط<a>").hide()
                        $('#research_money_file_help').html("<a target='_blank' href='" + response.researchApplication.res_money + "'>الرابط<a>").hide()

                        var is_pay = response.researchApplication.is_pay
                        $("#app_id").val(response.researchApplication.id)
                        $("#research_title").val(response.researchApplication.research_title)
                        $("#is_commitment").val(response.researchApplication.is_commitment)
                        $("#app_status").val(response.researchApplication.app_status)

                        if ($("#app_status").val() == 1 && is_pay == 0) {

                            $("#research_file").closest('.form-group').hide()
                            $("#research_title").closest('.form-group').hide()
                            $("#research_money_file").closest('.form-group').show()
                            $("#ribbon-waitting").hide()
                            $("#ribbon-pay").show()
                            $('.alert-danger').text("هناك خطأ في الحوالة البنكية").show();
                            $("#step1").click()
                            $('#form_wizard_1').find('.button-next').show();

                        }
                        if ($("#app_status").val() == 1 && is_pay == 1) {

                            $("#research_file").closest('.form-group').hide()
                            $("#research_title").closest('.form-group').hide()
                            $("#research_money_file").closest('.form-group').hide()
                            $("#ribbon-commitment").hide()
                            $("#ribbon-waitting").show()
                            $("#ribbon-pay").hide()
                            $('.alert-danger').hide()
                            $("#step1").click()
                            $('#form_wizard_1').find('.button-next').hide();
                        }
                        if ($("#app_status").val() == 2) {
                            response.researchApplication.res_file_updated != null ? $('#research_file_updated_help').html("<a target='_blank' href='" + response.researchApplication.res_file_updated + "'>الرابط<a>").show() : null

                            $('.alert-danger').hide()
                            $("#step2").click()
                        }
                        if ($("#app_status").val() == 3) {
                            response.researchApplication.proofreader_file != null ? $('#proofreader_file_help').html("<a target='_blank' href='" + response.researchApplication.proofreader_file + "'>الرابط<a>").show() : null

                            $("#userForm").find('[name="research_application_id"]').val(id)
                            if (response.researchApplication.proofreader_id == null) {
                                $("#proofreader").show()
                            } else {
                                $("#proofreader").hide()

                            }
                            user.ajax.reload(null); // user paging is not reset on reload

                            $("#step3").click()
                        }
                        if ($("#app_status").val() == 4) {

                            $("#step4").click()
                        }
                        if (response.researchApplication.research_file != null) {
                            $("#research_file").parent().find('.help-block').html("<a href='" + response.researchApplication.res_file + "'>الرابط<a>")

                        }
                        if (response.researchApplication.research_file != null) {
                            $("#research_money_file").parent().find('.help-block').html("<a href='" + response.researchApplication.res_money + "'>الرابط<a>")
                        }
                        publicationManagementEvaluatorNoteTable.ajax.reload(null); // user paging is not reset on reload

                    } else {
                        showAlertMessage('alert-danger', null, "يوجد خطا فني");
                        return false;
                        publicationManagementEvaluatorNoteTable.ajax.reload(null); // user paging is not reset on reload

                    }
                },
            });


        }

        function setIsDone(is_done, id) {
            var data = {
                is_done: is_done,
                id: id,
                _token: '{{csrf_token()}}'
            };
            $.post("{{url('is_done_notes')}}", data, function (data, response) {
                if (data.success == true) {
                    publicationManagementEvaluatorNoteTable.ajax.reload(); // user paging is not reset on reload

                }

            });


        }
    </script>
    <script src="{{url('')}}/assets/pages/scripts/form-wizard.js" type="text/javascript"></script>

@endsection
