@extends('semantic')
@section('title','المجلات')
@section('pageName','المجلات')


@section('content')

    <div class="modal container fadeIn" id="researchApplicationPayModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->

                    <div class="portlet-title">
                        <div class="caption font-green-haze">
                            <i class="icon-wallet font-green-haze"></i>
                            <span class="caption-subject bold uppercase"></span>إدارة النشر
                        </div>
                    </div>


                    <form method="POST" action="" data-toggle="validator" id="researchApplicationPayForm"
                          accept-charset="UTF-8"
                          class="form-horizontal form" role="form" enctype="multipart/form-data">

                        <input name="id" type="hidden" value="">
                        <input name="app_id" type="hidden" value="">

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label for="ctg_name" class="col-md-4  control-label">الحالة
                                                </label>
                                                <div class="col-md-8">
                                                    <select id="is_pay" required name="is_pay"
                                                            class="form-control select2 select"
                                                            data-placeholdr="االحالة">
                                                        <option value=""></option>
                                                        <option value="1">قيد الفحص</option>
                                                        <option value="0">مرفوض</option>
                                                        <option value="2">مقبول</option>
                                                    </select>
                                                    <div class="form-control-focus"></div>
                                                </div>
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
            <button type="button" onclick="submitForm('researchApplicationPay')" class="btn green ok">حفظ التغييرات
            </button>
            <button type="button" data-dismiss="modal" class="btn btn-default">اغلاق</button>
        </div>
    </div>
    <div class="modal container fadeIn" id="researchApplicationStatusModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->

                    <div class="portlet-title">
                        <div class="caption font-green-haze">
                            <i class="icon-wallet font-green-haze"></i>
                            <span class="caption-subject bold uppercase"></span>إدارة النشر
                        </div>
                    </div>


                    <form method="POST" action="" data-toggle="validator" id="researchApplicationStatusForm"
                          accept-charset="UTF-8"
                          class="form-horizontal form" role="form" enctype="multipart/form-data">

                        <input name="id" type="hidden" value="">
                        <input name="app_id" type="hidden" value="">
                        <input name="research_application_id" type="hidden" value="">

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label for="ctg_name" class="col-md-4  control-label">الحالة
                                                </label>
                                                <div class="col-md-8">
                                                    <select required name="app_status"
                                                            class="form-control select2 select"
                                                            data-placeholder="االحالة">
                                                        <option value=""></option>
                                                        <option value="1">ارفاق الطلب</option>
                                                        <option value="2">تحكيم البحث</option>
                                                        <option value="3">تدقيق لغوي</option>
                                                        <option value="4"> الموافقة على النشر</option>
                                                    </select>
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label for="user_id" class="col-md-4  control-label">المحكمين
                                                </label>
                                                <div class="col-md-8">
                                                    <select multiple required name="user_id[]"
                                                            class="form-control select2 select"
                                                            data-placeholder="المحكمين">
                                                        @foreach($evaluations as $value)
                                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endforeach

                                                    </select>
                                                    <div class="form-control-focus"></div>
                                                </div>
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
            <button type="button" onclick="submitForm('researchApplicationStatus')" class="btn green ok">حفظ التغييرات
            </button>
            <button type="button" data-dismiss="modal" class="btn btn-default">اغلاق</button>
        </div>
    </div>

    {{--
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN CONDENSED TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">

                        <div class="caption">
                            <i class="fa fa-search"></i>فلاتر البحث
                        </div>
                        <div class="actions">
                            <a id="public_search" href="javascript:;" class="btn btn-default btn-sm">
                                <i class="fa fa-search"></i> بحث </a>
                        </div>

                    </div>
                    <div class="portlet-body collapse1">
                        <div style=" " class="row">
                            --}}
    {{--
                                                    <div class="col-md-4" id="date">
                                                        <div class="form-group form-md-line-input ">
                                                            <label class="col-md-4 control-label" for="dob_search">تاريخ الميلاد</label>
                                                            <div class="col-md-8">
                                                                <div id="datePicker1" class="input-group  date date-picker"
                                                                     data-date-format="yyyy-mm-dd">
                                                                    <input id="dob_search" placeholder="تاريخ الميلاد" type="text"
                                                                           class="form-control">
                                                                    <span class="input-group-btn">
                                                                    <button class="btn default" type="button"><i
                                                                            class="fa fa-calendar"></i></button>
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                            --}}{{--

                            <input type="hidden" value="false" name="offer" id="offer">

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input ">

                                    <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012"
                                         data-date-format="yyyy-mm-dd">
                                        <input id="date_from" placeholder="التاريخ من" type="text" class="form-control"
                                               name="from">
                                        <span class="input-group-addon"> إلى </span>
                                        <input id="date_to" placeholder="التاريخ إلى" type="text" class="form-control"
                                               name="to"></div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- END CONDENSED TABLE PORTLET-->
            </div>
        </div>
    --}}
    <div class="row">

        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>إدارة النشر
                    </div>
                    <div class="tools">

                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <span></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="table-container">

                        <table class="table table-striped  table-hover" id="publicationManagementTable">
                            <thead>
                            <tr>
                                <th> إسم الباحث</th>
                                <th> عنوان البحث</th>
                                <th> مرفق البحث</th>
                                <th> مرفق الدفع</th>
                                <th> مرفق التعديلات</th>
                                <th> المحكمين</th>
                                <th> الحالة</th>
                                <th> الإجراء</th>

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

    <script>

        var category = $('#publicationManagementTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{url('publicationManagement')}}/publicationManagement",
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
                    className: 'btn green reload publicationManagementTable',
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
                {className: 'text-center', data: 'user.name', name: 'user.name', searchable: true},
                {className: 'text-center', data: 'research_title', name: 'research_title', searchable: true},
                {className: 'text-center', data: 'res_file', name: 'research_title', searchable: true},
                {className: 'text-center', data: 'res_money', name: 'research_title', searchable: true},
                {className: 'text-center', data: 'prf_file', name: 'prf_file', searchable: true},
                {className: 'text-center', data: 'evaluators', name: 'evaluators', searchable: true},
                {className: 'text-center', data: 'app_status', name: 'app_status', searchable: true},
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
                    d.date_from = $('#date_from').val();
                    d.date_to = $('#date_to').val();
                    d.offer = $('#offer').val();
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
                {className: 'text-left', data: 'action', name: 'action', searchable: false},
                {className: 'text-center', data: 'id', name: '', searchable: true},
                {className: 'text-center', data: 'name', name: 'name', searchable: true},
                {className: 'text-center', data: 'roles', name: 'roles', searchable: true},
                {className: 'text-center', data: 'email', name: 'email', searchable: true},
                {className: 'text-center', data: 'mobile', name: 'mobile', searchable: true},
                {className: 'text-center', data: 'address', name: 'address', searchable: true},
            ],
        });

        function showResearchApplicationStatusModal(id, app_status, evaluator) {
            $('#researchApplicationStatusForm').bootstrapValidator('resetForm', true);
            $("[name='user_id[]']").parent().parent().hide()
            if (app_status == 2) {
                $("[name='user_id[]']").parent().parent().show()
                $('#researchApplicationStatusForm').find('[name="id"]').val(null)
                $('#researchApplicationStatusForm').find('[name="app_id"]').val(id)
                $('#researchApplicationStatusForm').find('[name="research_application_id"]').val(id)
                $('#researchApplicationStatusForm').find('[name="app_status"]').val(app_status).trigger('change')
                $('#researchApplicationStatusForm').find("[name='user_id[]']").val(evaluator).trigger('change');
                $("#researchApplicationStatusModal").modal('show', {backdrop: 'static'});

            }
            if (app_status == 3) {
                $("[name='user_id[]']").parent().parent().hide()
                $('#researchApplicationStatusForm').find('[name="id"]').val(null)
                $('#researchApplicationStatusForm').find('[name="app_id"]').val(id)
                $('#researchApplicationStatusForm').find('[name="research_application_id"]').val(id)
                $('#researchApplicationStatusForm').find('[name="app_status"]').val(app_status).trigger('change')
                // $('#researchApplicationStatusForm').find("[name='user_id[]']").val(evaluator).trigger('change');
                $("#researchApplicationStatusModal").modal('show', {backdrop: 'static'});

            }
        }

        function showResearchApplicationPayModal(id, is_pay) {
            $('#researchApplicationPayForm').bootstrapValidator();
            $('#researchApplicationPayForm').find('[name="id"]').val(null)
            $('#researchApplicationPayForm').find('[name="app_id"]').val(id)
            $('#is_pay').val(is_pay).trigger('change')
            $("#researchApplicationPayModal").modal('show', {backdrop: 'static'});
        }

        $('[name="app_status"]').on('change', function (e) {
            var value = $(this).val()
            $("[name='user_id[]']").parent().parent().hide()

            if (value == 2) {
                $("[name='user_id[]']").parent().parent().show()

            }

        });

        $('#public_search').on('click', function (e) {
            category.draw();
            e.preventDefault();
        });
    </script>
@endsection
