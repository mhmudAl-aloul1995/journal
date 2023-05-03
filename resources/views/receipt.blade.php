@extends('semantic')
@section('title','فواتير الشراء')
@section('pageName','فواتير الشراء')

@section('content')
<div class="modal container  fadeIn" id="receiptModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->

                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="icon-settings font-green-haze"></i>
                        <span class="caption-subject bold uppercase"></span>سند قبض</div>
                </div>


                <form method="POST" action="" data-toggle="validator" id="receiptForm" accept-charset="UTF-8" class=" form" role="form" enctype="multipart/form-data">

                    <input name="pk_id" type="hidden" id="receipt_pk_id">
                    <input name="t_credit" type="hidden" id="t_credit">

                    {{ csrf_field() }}
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-12">
                                <div id="inpt_name" class="form-group  col-md-2">
                                    <label for="fk_user" class="control-label">الإسم</label>
                                    <select required style="width:100%" data-placeholder="إسم الزبون" id="fk_user"  name="fk_user[]" class="form-control select2  ">
                                        @foreach ($users  as $cus)


                                        <option value="{{ $cus->pk_id }}">{{ $cus->cs_name }}</option>


                                        @endforeach



                                    </select>                                </div>
                                <div class="form-group  col-md-2">
                                    <label for="r_amount_paid" class="control-label"> المبلغ المدفوع</label>
                                    <input type="number" name="r_amount_paid[]" value='' class="form-control" id="r_amount_paid" placeholder="المبلغ المدفوع">
                                </div>
                                <div class="form-group  col-md-2">
                                    <label for="r_recp_book_no" class="control-label">وذلك عن</label>
                                    <input id="r_date" type="text" name="r_date[]" class="form-control date-picker" data-date-format="yyyy-mm-dd"  placeholder="وذلك عن">
                                </div>
                            {{--    <div class="form-group  col-md-2">
                                    <label for="r_statement" class="control-label">ملاحظة</label>
                                    <input type="text" name="r_statement[]" class="form-control" id="r_statement" placeholder="ملاحظة">
                                </div>--}}
                                <div class="form-group  col-md-2">
                                    <label for="r_recp_no" class="control-label">رقم السند</label>
                                    <input type="number" name="r_recp_no[]" class="form-control" id="r_recp_no" placeholder="رقم السند">
                                </div>
                                <div class="form-group  col-md-2">
                                    <label for="r_recp_book_no" class="control-label">رقم الدفتر</label>
                                    <input type="number" name="r_recp_book_no[]" class="form-control" id="r_recp_book_no" placeholder="رقم الدفتر">
                                </div>

                                <div id="btn_add" class="form-group  col-md-1 ">
                                    <label class="control-label">إضافة</label>
                                    <a href="javascript:;"  class="btn btn-default addButton">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>

                            </div>

                            <div class="hide col-md-12 form-groupp " id="receiptTemplate">
                                <div id="xx" class="form-group .voca   col-md-2">
                                    <label for="fk_user"  class="control-label">الإسم</label>
                                    <select name="fk_user[]"class="form-control" ></select>
                                </div>
                                <div class="form-group  col-md-2">
                                    <label for="r_amount_paid" class="control-label"> المبلغ المدفوع</label>
                                    <input type="number" name="r_amount_paid[]" value='' class="form-control"  placeholder="المبلغ المدفوع">
                                </div>
                                <div class="form-group  col-md-2">
                                    <label for="r_recp_book_no" class="control-label">وذلك عن</label>
                                    <input type="text" name="r_date[]" class="form-control date-picker" data-date-format="yyyy-mm-dd"  placeholder="وذلك عن">
                                </div>
{{--
                                <div class="form-group  col-md-2">
                                    <label for="r_statement" class="control-label">ملاحظة</label>
                                    <input type="text" name="r_statement[]" class="form-control"  placeholder="ملاحظة">
                                </div>--}}
                                <div class="form-group  col-md-2">
                                    <label for="r_recp_no" class="control-label">رقم السند</label>
                                    <input type="number" name="r_recp_no[]" class="form-control"  placeholder="رقم السند">
                                </div>
                                <div class="form-group  col-md-2">
                                    <label for="r_recp_book_no" class="control-label">رقم الدفتر</label>
                                    <input type="number" name="r_recp_book_no[]" class="form-control"  placeholder="رقم الدفتر">
                                </div>
                                <div class="form-group  col-md-1 ">
                                    <label class="control-label">إضافة</label>
                                    <a href="javascript:;"  class="btn cc btn-default removeButton">
                                        <i class="fa fa-minus"></i>
                                    </a>
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
        <button type="button" id="sbmt_receipt" class="btn green ok">حفظ التغييرات</button>
        <button type="button" data-dismiss="modal" class="btn btn-default">اغلاق</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>سندات القبض </div>
                <div class="tools">

                </div>
            </div>
            <div class="portlet-body flip-scroll">
                <div class="table-toolbar">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="btn-group">
                                <button onclick="BillDetailsModal()" class="btn sbold red"> إضافة جديد
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group  date-picker input-daterange"  data-date-format="yyyy-mm-dd">
                                <input id="from" placeholder="التاريخ" type="text" class="form-control" name="from">
                                <span class="input-group-addon"> إلى </span>
                                <input id="to" placeholder="التاريخ" type="text" class="form-control" name="to"> </div>
                        </div>
                        <div  class="col-md-2">

                            <select id="date" required="" data-placeholder="التاريخ" class="select2 form-control">

                                <option value="created_at">تاريخ الإنشاء</option>
                                <option value="r_date">تاريخ الإستحقاق</option>

                            </select>

                        </div>
                        <div class="col-md-1">
                            <div class="btn-group">
                                <button id="serach" class="btn  blue">  موافق
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                <table class="table table-bordered table-condensed " id="receiptTable">

                    <thead>
                        <tr>
                            <th>الإسم</th>
                            <th>المبلغ المدفوع</th>
                            <th>تاريخ الإستحقاق</th>
                            <th>ملاحظة</th>
                            <th>رقم السند</th>
                            <th>رقم الدفتر</th>
                            <th>أنشئ بتاريخ</th>
                            <th>الإجراء</th>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection



@section('level_plug_scr')
<script src="<?php echo url('resources/assets/global/plugins/jquery-repeater/jquery.repeater.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('resources/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>" type="text/javascript"></script>

<script src="<?php echo url('resources/assets/global/scripts/datatable.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('resources/assets/global/plugins/datatables/datatables.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('resources/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('resources/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('resources/assets/global/plugins/select2/js/select2.full.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('resources/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('resources/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('resources/assets/bootstrapValidator.js'); ?>"></script>
<script src="<?php echo url('resources/assets/jquery.validate.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('resources/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>" type="text/javascript"></script>

@endsection



@section('level_scr_scr')

<script src="<?php echo url('resources/assets/pages/scripts/form-repeater.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('resources/assets/pages/scripts/components-date-time-pickers.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('resources/assets/pages/scripts/components-select2.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('resources/assets/pages/scripts/ui-extended-modals.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('resources/assets/js/receipt.js'); ?>" type="text/javascript"></script>

<script src="<?php echo url('resources/assets/pages/scripts/components-date-time-pickers.min.js'); ?>" type="text/javascript"></script>

@endsection

@section('level_plug_css')


<link href="<?php echo url('resources/assets/global/plugins/datatables/datatables.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo url('resources/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo url('resources/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo url('resources/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo url('resources/assets/validation.css'); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo url('resources/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo url('resources/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo url('resources/assets/global/plugins/select2/css/select2.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo url('resources/assets/global/plugins/select2/css/select2-bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
@endsection

@section('myScript')

    <script>
        function BillDetailsModal(id) {


            $("html, body").animate({scrollTop: 0}, 600);
            $('#BillDetailsForm').bootstrapValidator('resetForm', true);
            $('.removeFields').remove();

            if (id == null) {

                $('[name="product_id[]"]').trigger('change');

                $('#BillDetailsForm').bootstrapValidator('resetForm', true);
                $('#BillDetailsForm').attr('action', 'addBillDetailsUrl');

                $('#BillDetailsModal').modal('show', {backdrop: 'static'});
                $("#cus_pk_id").val(0);
                $("#btn_add").show();
                $("#inpt_name").show();
            } else {

                $.post(showBillDetailsUrl, {
                    '_token': token, 'pk_id': id,
                }, function (data) {
                    if (data.success) {
                        $('#BillDetailsForm').attr('action', editBillDetailsUrl);

                        $("#btn_add").hide();
                        $("#inpt_name").hide();
                        $('#BillDetailsModal').modal('show', {backdrop: 'static'});
                        $('#BillDetailsForm').bootstrapValidator('resetForm', true);
                        $("#price_sale_defult").val(data.transaction);
                        $("#price_purch").val(data.ctr.price_purch);
                        $("#price_sale").val(data.ctr.price_sale);


                        var option = new Option(data.user.cs_name, data.user.pk_id, true, true);
                        $('[name="product_id[]"]').append(option);

                    } else {


                        showAlertMessage('alert-danger', 'فاتورة شراء/ ', ' حدث خطا ! حاول مجددا');
                    }
                }, 'json').error(function (error) {
                    showAlertMessage('alert-danger', 'Fatal error !', 'An unknown error occured !');
                });
            }

        }

        $('#sbmt_receipt').click(function (e) {


            var message;
            if ($('#receipt_pk_id').val() == 0)
            {
                message = 'تمت الإضافة بنجاح';
            } else {
                message = 'تم التعديل بنجاح';
            }

            $('#receiptForm').data('bootstrapValidator').validate();
            if (!$('#receiptForm').data('bootstrapValidator').isValid()) {

                return false;
            } else {

                var $form = $('#receiptForm'),
                    formData = new FormData(),
                    params = $form.serializeArray();

                $.each(params, function (i, obj) {
                    formData.append(obj.name, obj.value);

                });
                $.ajax({
                    url: $form.attr('action'),
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (data) {

                        if (data.success) {

                            $('#receiptForm').bootstrapValidator('resetForm', true);
                            $('#receiptTable').DataTable().ajax.reload();
                            $('#receiptModal').modal('hide');

                            showAlertMessage('alert-success', 'سندات القبض/ ', message);

                        } else {

                            showAlertMessage('alert-danger', 'سندات القبض/ ', ' ');
                        }
                    },
                    error: function (data) {
                        console.log(data);
                        showAlertMessage('alert-danger', 'سندات القبض/ ', data.message);

                    },
                    statusCode: {
                        500: function (data) {
                            console.log(data);
                        }
                    }

                });

            }


        });
        $('#receiptForm').bootstrapValidator({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'fk_user[]': {
                    // The receipt is placed inside a .col-xs-6 element
                    row: '.col-xs-6',
                    validators: {
                        notEmpty: {
                            message: 'هذا الحقل مطلوب'
                        }
                    }
                },
                'r_statement[]': {
                    // The receipt is placed inside a .col-xs-6 element
                    row: '.col-xs-6',
                    validators: {
                        notEmpty: {
                            message: 'هذا الحقل مطلوب'
                        }
                    }
                },
                'r_amount_paid[]': {
                    // The receipt is placed inside a .col-xs-6 element
                    row: '.col-xs-6',
                    validators: {
                        notEmpty: {
                            message: 'هذا الحقل مطلوب'
                        }
                    }
                },
                'r_statement[]': {
                    // The receipt is placed inside a .col-xs-6 element
                    row: '.col-xs-6',
                    validators: {
                        notEmpty: {
                            message: 'هذا الحقل مطلوب'
                        }
                    }
                },
                'r_recp_no[]': {
                    // The receipt is placed inside a .col-xs-6 element
                    row: '.col-xs-6',
                    validators: {
                        notEmpty: {
                            message: 'هذا الحقل مطلوب'
                        }
                    }
                },
                'r_recp_book_no[]': {
                    // The receipt is placed inside a .col-xs-6 element
                    row: '.col-xs-6',
                    validators: {
                        notEmpty: {
                            message: 'هذا الحقل مطلوب'
                        }
                    }
                },
                'r_date[]': {
                    // The receipt is placed inside a .col-xs-6 element
                    row: '.col-xs-6',
                    validators: {
                        notEmpty: {
                            message: 'هذا الحقل مطلوب'
                        }
                    }
                },
            }
        })

            .on('added.field.bv', function (e, data) {

                if (data.field === 'fk_user[]') {

                    data.element.select2({
                        placeholder: 'الإسم',
                        minimumInputLength: 3,
                        allowClear: true,
                        ajax: {
                            url: cus_search,
                            dataType: 'json',
                            delay: 250,
                            processResults: function (data) {
                                return {
                                    results: $.map(data, function (item) {
                                        return {
                                            text: item.cs_name,
                                            id: item.pk_id
                                        }
                                    })
                                };
                            },
                            cache: true
                        }
                    });

                }
            })

            // Add button click handler
            .on('click', '.addButton', function () {
                var $template = $('#receiptTemplate'),
                    $clone = $template
                        .clone()
                        .removeClass('hide')
                        .removeAttr('id')
                        .addClass('removeFields')
                        .insertBefore($template)
                $clone.find('.date-picker').datepicker();
                // Add new fields
                // Note that we DO NOT need to pass the set of validators
                // because the new field has the same name with the original one
                // which its validators are already set
                $('#receiptForm')
                    .bootstrapValidator('addField', $clone.find('[name="r_amount_paid[]"]'))
                    .bootstrapValidator('addField', $clone.find('[name="r_statement[]"]'))
                    .bootstrapValidator('addField', $clone.find('[name="r_recp_no[]"]'))
                    .bootstrapValidator('addField', $clone.find('[name="r_recp_book_no[]"]'))
                    .bootstrapValidator('addField', $clone.find('[name="fk_user[]"]'))
                    .bootstrapValidator('addField', $clone.find('[name="r_date[]"]'))

            })

            // Remove button click handler
            .on('click', '.removeButton', function () {
                var $row = $(this).closest('.form-groupp');

                // Remove fields
                $('#receiptForm')

                    .bootstrapValidator('removeField', $row.find('[name="r_amount_paid[]"]'))
                    .bootstrapValidator('removeField', $row.find('[name="r_statement[]"]'))
                    .bootstrapValidator('removeField', $row.find('[name="r_recp_no[]"]'))
                    .bootstrapValidator('removeField', $row.find('[name="r_recp_book_no[]"]'))
                    .bootstrapValidator('removeField', $row.find('[name="fk_user[]"]'))
                    .bootstrapValidator('removeField', $row.find('[name="r_date[]"]'))

                // Remove element containing the fields
                $row.remove();
            });

        function receiptModal(id) {


            $("html, body").animate({scrollTop: 0}, 600);
            $('#receiptForm').bootstrapValidator('resetForm', true);
            $('.removeFields').remove();

            if (id == null) {

                $('#fk_user').trigger('change');

                $('#receiptForm').bootstrapValidator('resetForm', true);
                $('#receiptForm').attr('action', addReceiptUrl);

                $('#receiptModal').modal('show', {backdrop: 'static'});
                $("#cus_pk_id").val(0);
                $("#btn_add").show();
                $("#inpt_name").show();
            } else {

                $.post(showReceiptUrl, {
                    '_token': token, 'pk_id': id,
                }, function (data) {
                    if (data.success) {
                        $('#receiptForm').attr('action', editReceiptUrl);

                        $("#btn_add").hide();
                        $("#inpt_name").hide();
                        $('#receiptModal').modal('show', {backdrop: 'static'});
                        $('#receiptForm').bootstrapValidator('resetForm', true);
                        $("#r_amount_paid").val(data.transaction);
                        $("#r_statement").val(data.ctr.r_statement);
                        $("#r_recp_no").val(data.ctr.r_recp_no);
                        $("#r_recp_book_no").val(data.ctr.r_recp_book_no);
                        $("#receipt_pk_id").val(data.ctr.pk_id);
                        $("#t_credit").val(data.ctr.fk_transaction);
                        $("#r_date").val(data.ctr.r_date);



                        var option = new Option(data.user.cs_name, data.user.pk_id, true, true);
                        $('#fk_user').append(option);

                    } else {


                        showAlertMessage('alert-danger', 'سندات القبض/ ', ' حدث خطا ! حاول مجددا');
                    }
                }, 'json').error(function (error) {
                    showAlertMessage('alert-danger', 'Fatal error !', 'An unknown error occured !');
                });
            }

        }

        $('#receiptModal').on('shown', function () {
            $('.removeFields').remove();
            $("#ctr_user_rec").select2({
                placeholder: 'الإسم',
                minimumInputLength: 3,
                allowClear: true,
                ajax: {
                    url: cus_search,
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.cs_name,
                                    id: item.pk_id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });



        });

        function deleteRecipt(pk_id, fk_transaction) {
            if (!confirm('ظ‡ظ„ ط§ظ†طھ ظ…طھط§ظƒط¯طں')) {
                return false;
            } else {
                $.ajax({
                    url: deleteReceiptUrl,
                    data: {pk_id: pk_id, _token: token, fk_transaction: fk_transaction},
                    type: "POST",
                    success: function (data, textStatus, jqXHR) {
                        if (data.is_delete == false)
                        {


                            showAlertMessage('alert-danger', 'سندات القبض/ ', 'لا يمكنك الحذف');
                        }
                        if (data.success == true)

                        {
                            $('#receiptTable').DataTable().ajax.reload();


                            showAlertMessage('alert-success', 'سندات القبض / ', 'تم حذف الحقل بنجاح');
                            //                    setTimeout(function(){location.reload()},1000);
                        } else {
                            showAlertMessage('alert-danger', 'سندات القبض/ ', 'حدث خطأ أثناء الحذف');

                        }
                    },
                    error: function (data, textStatus, jqXHR) {
                        console.log(data);
                    },
                    statusCode: {
                        500: function (data) {
                            console.log(data);
                        }
                    }
                });
            }
        }
        addReceiptUrl
        $(document).ready(function ()
        {
            $('#serach').on('click', function (e) {
                dataTable.draw();
                e.preventDefault();
            });

            dataTable = $('#receiptTable').DataTable({
                processing: false,
                serverSide: true,
                ajax: {
                    url: "{{url('datatableBillPurch')}}",
                    data: function (d) {

                        d.from = $("#from").val();
                        d.to = $("#to").val();
                        d.date = $('#date').val();
                    }
                },
                columns: [
                    {className: 'text-center', data: 'cs_name', name: 'cs_name'},
                    {className: 'text-center', data: 'r_amount_paid', name: 'r_amount_paid'},
                    {className: 'text-center', data: 'r_date', name: 'r_date'},
                    {className: 'text-center', data: 'r_statement', name: 'r_statement'},
                    {className: 'text-center', data: 'r_recp_no', name: 'r_recp_no'},
                    {className: 'text-center', data: 'r_recp_book_no', name: 'r_recp_book_no'},
                    {className: 'text-center', data: 'created_at', name: 'created_at'},
                    {className: 'text-center', data: 'action', name: 'action', searchable: false},
                ],
            });

        });
    </script>
@endsection
