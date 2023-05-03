
$('#counterForm').bootstrapValidator({
    framework: 'bootstrap',
    message: '',
    live: true,
    excluded: ':disabled',
    icon: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh',
    },
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-times',
        validating: 'fa fa-refresh',
    },
    fields: {
        ctr_date: {
            validators: {
            }

        },
        ctr_previous: {
            validators: {
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'هذا الحقل يجب أن يحتوي على أرقام فقط'
                },
            }

        },
        ctr_current: {
            validators: {
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'هذا الحقل يجب أن يحتوي على أرقام فقط'
                },
            }
        },
        hour_qy: {
            validators: {
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'هذا الحقل يجب أن يحتوي على أرقام فقط'
                },
            }
        },
        ctr_price: {
            validators: {
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'هذا الحقل يجب أن يحتوي على أرقام فقط'
                },
            }
        },
        ctr_ampair: {
            validators: {
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'هذا الحقل يجب أن يحتوي على أرقام فقط'
                },
            }
        },
        ctr_minimum: {
            validators: {
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'هذا الحقل يجب أن يحتوي على أرقام فقط'
                },
            }
        },
    }
});
$("[name='ctr_date']")
        .datepicker({
            format: 'yyyy-mm'
        })
        .on('changeDate', function (e) {
            $('#counterForm').bootstrapValidator('revalidateField', 'ctr_date');
        });
$('#sbmt_counter').click(function (e) {


    var message;
    if ($('#counter_pk_id').val() == 0)
    {
        message = 'تمت الإضافة بنجاح';
    } else {
        message = 'تم التعديل بنجاح';
    }

    $('#counterForm').data('bootstrapValidator').validate();
    if (!$('#counterForm').data('bootstrapValidator').isValid()) {

        return false;
    } else {

        var $form = $('#counterForm'),
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

                    $('#counterForm').bootstrapValidator('resetForm', true);
                    $('#counterTable').DataTable().ajax.reload();
                    $('#counterModal').modal('hide');

                    showAlertMessage('alert-success', 'حساب الزبائن/ ', message);

                } else {

                    showAlertMessage('alert-danger', 'حساب الزبائن/ ', ' ');
                }
            },
            error: function (data) {
                console.log(data);
                showAlertMessage('alert-danger', 'حساب الزبائن/ ', ' ');

            },
            statusCode: {
                500: function (data) {
                    console.log(data);
                }
            }

        });

    }


});
function counterModal(id) {


    $("html, body").animate({scrollTop: 0}, 600);
    $('#counterForm').bootstrapValidator('resetForm', true);


    if (id == null) {

      $('#ctr_user_id').trigger('change');

        $('#counterForm').bootstrapValidator('resetForm', true);

        $('#counterModal').modal('show', {backdrop: 'static'});

        $('#counterForm').attr('action', addCounterUrl);
        $("#cus_pk_id").val(0);
$('#ctr_user').show();
    } else {
        $('#counterForm').attr('action', editCounterUrl);

        $.post(showCounterUrl, {
            '_token': token, 'pk_id': id,
        }, function (data) {
            if (data.success) {
                $('#counterModal').modal('show', {backdrop: 'static'});
                $('#ctr_user').hide();

                $('#cusForm').bootstrapValidator('resetForm', true);
                $("[name='ctr_current']").val(data.ctr.ctr_current);
                $("[name='ctr_previous']").val(data.ctr.ctr_previous);
                $("[name='ctr_price']").val(data.ctr.ctr_price);
                $("[name='ctr_minimum']").val(data.ctr.ctr_minimum);
                $("[name='ctr_ampair']").val(data.ctr.ctr_ampair);
                $("[name='ctr_date']").val(data.ctr.ctr_date);
                $("#counter_pk_id").val(data.ctr.pk_id);
                $("#ctr_fk_debit").val(data.ctr.ctr_fk_debit)

                var option = new Option(data.user.cs_name, data.user.pk_id, true, true);
                $('#ctr_user_id').append(option);

            } else {


                showAlertMessage('alert-danger', 'ط®ط·ط£ !', 'ط®ط·ط£ ظپظٹ ط§ظ„طµظپط­ط©');
            }
        }, 'json').error(function (error) {
            showAlertMessage('alert-danger', 'Fatal error !', 'An unknown error occured !');
        });
    }

}
function deleteCounter(pk_id,ctr_fk_debit) {
    if (!confirm('هل انت متاكد؟')) {
        return false;
    } else {
        $.ajax({
            url: deleteCounterUrl,
            data: {pk_id: pk_id, _token: token,ctr_fk_debit:ctr_fk_debit},
            type: "POST",
            success: function (data, textStatus, jqXHR) {
                if (data.is_delete == false)
                {


                    showAlertMessage('alert-danger', 'المتابعة اليومية للجرحى/ ', 'لا يمكنك الحذف');
                }
                if (data.success == true)

                {
                    $('#counterTable').DataTable().ajax.reload();


                    showAlertMessage('alert-success', 'المتابعة اليومية للجرحى / ', 'تم الحذف بنجاح');
                    //                    setTimeout(function(){location.reload()},1000);
                } else {
                    showAlertMessage('alert-danger', 'المتابعة اليومية للجرحى/ ', 'لا يمكنك الحذف');

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
$("#ctr_user_id").on('change', function (e) {
    var id = $(this).val();

    if (id == null)
    {
        return false;
    } else {
        $.get(showPreviousMonth, {
            '_token': token, 'ctr_user_id': id,
        }, function (data) {
            if (data.success) {

                $("[name='ctr_previous']").val(data.ctr.ctr_current);
                $("[name='ctr_price']").val(data.ctr.ctr_price);
                $("[name='ctr_amount']").val(data.ctr.ctr_amount);
                $("[name='ctr_minimum']").val(data.ctr.ctr_minimum);
                $("[name='ctr_ampair']").val(data.ctr.ctr_ampair);
                $("#counter_pk_id").val(data.ctr.pk_id);

            } else {

                $('input').empty();

                showAlertMessage('alert-danger', 'ط®ط·ط£ !', 'ط®ط·ط£ ظپظٹ ط§ظ„طµظپط­ط©');
            }
        }, 'json').error(function (error) {
            showAlertMessage('alert-danger', 'Fatal error !', 'An unknown error occured !');
        });
    }
});
