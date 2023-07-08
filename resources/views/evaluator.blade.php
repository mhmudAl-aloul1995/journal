@extends('semantic')
@section('title','المجلات')
@section('pageName','المجلات')


@section('content')
    <style>
        tr:hover, td.sorting_1 {
            cursor: pointer !important;
        }


    </style>
    <div class="modal container fadeIn" id="addEvaluatorNotesModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->

                    <div class="portlet-title">
                        <div class="caption font-green-haze">
                            <i class="icon-wallet font-green-haze"></i>
                            <span class="caption-subject bold uppercase"></span>التقييم
                        </div>
                    </div>


                    <form method="POST" action="" data-toggle="validator" id="addEvaluatorNotesForm"
                          accept-charset="UTF-8"
                          class="form-horizontal form" role="form" enctype="multipart/form-data">

                        <input name="id" type="hidden" value="">
                        <input type="hidden" name="research_application_id" id="research_application_id" value="">

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="res_title" class="col-md-2  control-label">
                                                الملاحظة
                                            </label>
                                            <div class="col-md-10">
                                                    <textarea type="text" name="note" value=""
                                                              class="form-control" placeholder="الملاحظة">
                                                    </textarea>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="res_title" class="col-md-2  control-label">
                                                المرفق
                                            </label>
                                            <div class="col-md-10">
                                                    <input type="file" name="note_file" value=""
                                                              class="form-control" placeholder="الملاحظة">
                                                    />
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>

                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="submitForm('addEvaluatorNotes')" class="btn green ok">حفظ التغييرات</button>
            <button type="button" data-dismiss="modal" class="btn btn-default">اغلاق</button>
        </div>
    </div>
    <div class="modal container fadeIn" id="evaluatorModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->

                    <div class="portlet-title">
                        <div class="caption font-green-haze">
                            <i class="icon-wallet font-green-haze"></i>
                            <span class="caption-subject bold uppercase"></span>التقييم
                        </div>
                    </div>


                    <form method="POST" action="" data-toggle="validator" id="evaluatorForm"
                          accept-charset="UTF-8"
                          class="form-horizontal form" role="form" enctype="multipart/form-data">

                        <input name="id" type="hidden" value="">
                        <input type="hidden" name="research_application_id" id="research_application" value="">

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="answer_evaluation_1" class="col-md-6  control-label">أصالة البحث
                                                و أهمية
                                                موضوعه

                                            </label>
                                            <div class="col-md-6">
                                                <select required
                                                        data-placeholder="أصالة البحث و أهمية موضوعه"
                                                        id="answer_evaluation_1" name="answer_evaluation_1"
                                                        class="form-control select2  ">

                                                    <option value=""></option>
                                                    <option value="1">ضعيف</option>
                                                    <option value="2">مقبول</option>
                                                    <option value="3">جيد</option>
                                                    <option value="4">جيد جدا</option>
                                                    <option value="5"> ممتاز</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="note_evaluation_1" class="col-md-2  control-label">
                                                الملاحظة
                                            </label>
                                            <div class="col-md-10">
                                                    <textarea type="text" name="note_evaluation_1" value=""
                                                              class="form-control" placeholder="الملاحظة">
                                                    </textarea>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="answer_evaluation_2" class="col-md-6  control-label">منهجية
                                                البحث

                                            </label>
                                            <div class="col-md-6">
                                                <select required
                                                        data-placeholder="منهجية البحث"
                                                        id="answer_evaluation_2" name="answer_evaluation_2"
                                                        class="form-control select2  ">

                                                    <option value=""></option>
                                                    <option value="1">ضعيف</option>
                                                    <option value="2">مقبول</option>
                                                    <option value="3">جيد</option>
                                                    <option value="4">جيد جدا</option>
                                                    <option value="5"> ممتاز</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="note_evaluation_2" class="col-md-2  control-label">
                                                الملاحظة
                                            </label>
                                            <div class="col-md-10">
                                                    <textarea type="text" name="note_evaluation_2" value=""
                                                              class="form-control" placeholder="الملاحظة">
                                                    </textarea>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="answer_evaluation_3" class="col-md-6  control-label">أسلوب العرض
                                                واللغة في مادة البحث

                                            </label>
                                            <div class="col-md-6">
                                                <select required
                                                        data-placeholder="أسلوب العرض واللغة في مادة البحث"
                                                        id="answer_evaluation_3" name="answer_evaluation_3"
                                                        class="form-control select2  ">

                                                    <option value=""></option>
                                                    <option value="1">ضعيف</option>
                                                    <option value="2">مقبول</option>
                                                    <option value="3">جيد</option>
                                                    <option value="4">جيد جدا</option>
                                                    <option value="5"> ممتاز</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="note_evaluation_3" class="col-md-2  control-label">
                                                الملاحظة
                                            </label>
                                            <div class="col-md-10">
                                                    <textarea type="text" name="note_evaluation_3" value=""
                                                              class="form-control" placeholder="الملاحظة">
                                                    </textarea>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="answer_evaluation_4" class="col-md-6  control-label">قيمة نتائج
                                                البحث

                                            </label>
                                            <div class="col-md-6">
                                                <select required
                                                        data-placeholder="قيمة نتائج البحث"
                                                        id="answer_evaluation_4" name="answer_evaluation_4"
                                                        class="form-control select2  ">

                                                    <option value=""></option>
                                                    <option value="1">ضعيف</option>
                                                    <option value="2">مقبول</option>
                                                    <option value="3">جيد</option>
                                                    <option value="4">جيد جدا</option>
                                                    <option value="5"> ممتاز</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="note_evaluation_4" class="col-md-2  control-label">
                                                الملاحظة
                                            </label>
                                            <div class="col-md-10">
                                                    <textarea type="text" name="note_evaluation_4" value=""
                                                              class="form-control" placeholder="الملاحظة">
                                                    </textarea>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="answer_evaluation_5" class="col-md-6  control-label">التقدير
                                                العام للبحث

                                            </label>
                                            <div class="col-md-6">
                                                <select required
                                                        data-placeholder="التقدير العام للبحث"
                                                        id="answer_evaluation_5" name="answer_evaluation_5"
                                                        class="form-control select2  ">

                                                    <option value=""></option>
                                                    <option value="1">ضعيف</option>
                                                    <option value="2">مقبول</option>
                                                    <option value="3">جيد</option>
                                                    <option value="4">جيد جدا</option>
                                                    <option value="5"> ممتاز</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="note_evaluation_5" class="col-md-2  control-label">
                                                الملاحظة
                                            </label>
                                            <div class="col-md-10">
                                                    <textarea type="text" name="note_evaluation_5" value=""
                                                              class="form-control" placeholder="الملاحظة">
                                                    </textarea>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="answer_evaluation_6" style=" color: green; "
                                                   class="col-md-6  control-label">محصلة الرأي بخصوص نشر البحث

                                            </label>
                                            <div class="col-md-6">
                                                <select required
                                                        data-placeholder="محصلة الرأي بخصوص نشر البحث"
                                                        id="answer_evaluation_6" name="answer_evaluation_6"
                                                        class="form-control select2  ">

                                                    <option value=""></option>
                                                    <option value="1">صالح للنشر كما هو</option>
                                                    <option value="2">صالح للنشر بعد إجراءات مرفقة</option>
                                                    <option value="3">صالح للنشر بعد إجراءات تعديلات جوهرية مرفقة
                                                    </option>
                                                    <option value="4"> غير صالح للنشر</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="finel_response" style=" color: green; "
                                                   class="col-md-6  control-label">إعتماد نهائي

                                            </label>
                                            <div class="col-md-6">
                                                <select
                                                        data-placeholder="إعتماد نهائي"
                                                        id="finel_response" name="finel_response"
                                                        class="form-control select2  ">

                                                    <option value=""></option>
                                                    <option value="1">نعم</option>
                                                    <option value="0">لا</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>

                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="submitForm('evaluator')" class="btn  green ok">حفظ التغييرات
            </button>
            <button type="button" data-dismiss="modal" class="btn btn-default">اغلاق</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>تحكييم البحث
                    </div>
                    <div class="tools">

                    </div>
                </div>

                <div class="portlet-body">
                                    <div class="table-toolbar">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="table-container">

                        <table class="table table-striped  " id="publicationManagementEvaluatorTable">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th> عنوان البحث</th>
                                <th> مرفق البحث</th>
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

        <div class="col-md-6">
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>ملاحظات البحث
                    </div>
                    <div class="tools">

                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <button style="display: none;" id="addEvaluatorNotes"
                                                onclick="showModal('addEvaluatorNotes',null)"
                                                class="btn sbold red"> إضافة مجلد
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="table-container">

                        <table class="table table-striped  " id="publicationManagementEvaluatorNoteTable">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th>الملاحظة</th>
                                <th>المرفق</th>
                                <th>تم تنفيذها؟</th>
{{--
                                <th> إجراء</th>
--}}

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
@endsection





@section('myScript')
    <style>
        td:first-child {
            cursor: pointer !important;
        }

        .sorting_1, .alert-success_1, .alert-success_1:hover {
            background-color: #009688 !important;
            color: white !important;
        }

        .sorting_1, .alert-success_1:hover {
            background-color: #009688 !important;
            color: white !important;
        }


    </style>

    <script>

        var publicationManagementEvaluatorTable = $('#publicationManagementEvaluatorTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{url('evaluator/{evaluator}')}}",
                data: function (d) {
                    d.date_from = $('#date_from').val();
                    d.date_to = $('#date_to').val();
                    d.offer = $('#offer').val();
                }
            },
            dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
            buttons: [
                {
                    text: 'تحديث',
                    className: 'btn green reload evaluatorTable',
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
                {className: 'text-center', data: 'showNotes', name: 'showNotes', searchable: true},
                {className: 'text-center', data: 'research_title', name: 'research_title', searchable: true},
                {className: 'text-center', data: 'res_file', name: 'research_title', searchable: true},
                {className: 'text-left', data: 'action', name: 'action', searchable: false},
            ],
        });
        var publicationManagementEvaluatorNoteTable = $('#publicationManagementEvaluatorNoteTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{url('researchAppNoteShow')}}",
                data: function (d) {
                    d.research_application_id = $('#research_application_id').val();
                    d.show_all = 0;

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
/*
                {className: 'text-left', data: 'action', name: 'action', searchable: false},
*/
            ],
        });


        function resercherEvaluation(research_application_id) {

            $("#research_application").val(research_application_id)
            $('#evaluatorForm').bootstrapValidator('resetForm', true);
            $("#evaluatorModal").modal('show', {backdrop: 'static'});


        }

        function showNotes(thiss, research_application_id) {

        }

        $("#publicationManagementEvaluatorTable").not('.btn-group').on("click", "tr", function () {
            var research_application_id = $(this).attr('id').split('_')[1];
           // $(this).parent().find('a').css('color', 'blue');

            $("#addEvaluatorNotes").show()
            $("#research_application_id").val(research_application_id)
            $('.sorting_1').removeClass('sorting_1');
            $(this).addClass('alert-success_1')
            $(this).parent().find('a').not('.dropdown-menu > li >a').css('color', 'black');
            $(this).find('a').not('.dropdown-menu > li >a').css('color', 'white');
            $(this).css('cursor', 'pointer')
            $(this).parent().find('.alert-success_1').not(this).removeClass('alert-success_1')
            publicationManagementEvaluatorNoteTable.draw()
        });


    </script>
@endsection
