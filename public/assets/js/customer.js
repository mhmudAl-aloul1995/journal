$('#cusForm').bootstrapValidator({
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
        cs_name: {
            validators: {
                stringLength: {
                    min: 2,
                    message: 'هذا الحقل يجب أن يكون حرفين على الأقل'
                },
            }
        },
        cs_mobile: {
            validators: {
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'هذا الحقل يجب أن يحتوي على أرقام فقط'
                },
                stringLength: {
                    min: 10,
                    max: 10,
                    message: 'هذا الحقل يجب أن يتكون من 10 أرقام'
                },
            }
        },
        cs_fk_area: {
            validators: {
            }
        },
        cs_subscripe_date: {
            validators: {
            }
        },
    }
});
$("[name='cs_subscripe_date']")
        .datepicker({
            format: 'yyyy-mm-dd'
        })
        .on('changeDate', function (e) {
            $('#cusForm').bootstrapValidator('revalidateField', 'cs_subscripe_date');
        });

$('#sbmt_cus').click(function (e) {


    var message;
    if ($('#cus_pk_id').val() == 0)
    {
        message = 'تمت الإضافة بنجاح';
    } else {
        message = 'تم التعديل بنجاح';
    }

    $('#cusForm').data('bootstrapValidator').validate();
    if (!$('#cusForm').data('bootstrapValidator').isValid()) {

        return false;
    } else {

        var $form = $('#cusForm'),
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

                    $('#cusForm').bootstrapValidator('resetForm', true);
                    $('#cus_tabel').DataTable().ajax.reload();
                    $('#cusModal').modal('hide');

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



function cusModal(id) {


    $("html, body").animate({scrollTop: 0}, 600);
    $('#cusForm').bootstrapValidator('resetForm', true);


    if (id == null) {
        $('#cs_fk_area').select2('val', 'All');
        $('#cusForm').bootstrapValidator('resetForm', true);

        $('#cusModal').modal('show', {backdrop: 'static'});

        $('#cusForm').attr('action', addCusUrl);
        $("#cus_pk_id").val(0);

    } else {
        $('#cusForm').attr('action', editCusUrl);

        $.post(showCusurl, {
            '_token': token, 'pk_id': id,
        }, function (data) {
            if (data.success) {

                $("[name='cs_name']").val(data.cstmr.cs_name);
                $("[name='cs_mobile']").val(data.cstmr.cs_mobile);

                $("[name='cs_subscripe_date']").val(data.cstmr.cs_subscripe_date);
                $("#cus_pk_id").val(data.cstmr.pk_id);
                $.ajax({
                    type: 'GET',
                    url: area_one_search,
                    data: {pk_id: data.cstmr.cs_fk_area, _token: token},
                }).then(function (data) {
                    // create the option and append to Select2
                    var option = new Option(data.area_name, data.pk_id, true, true);
                    $('#cs_fk_area').append(option).trigger('change');

                    // manually trigger the `select2:select` event
                    $('#cs_fk_area').trigger({
                        type: 'select2:select',
                        params: {
                            data: data
                        }
                    });
                    $('#cusModal').modal('show', {backdrop: 'static'});

                });
            } else {


                showAlertMessage('alert-danger', 'ط®ط·ط£ !', 'ط®ط·ط£ ظپظٹ ط§ظ„طµظپط­ط©');
            }
        }, 'json').error(function (error) {
            showAlertMessage('alert-danger', 'Fatal error !', 'An unknown error occured !');
        });
    }

}


function deleteCstmr(pk_id) {
    if (!confirm('هل انت متاكد؟')) {
        return false;
    } else {
        $.ajax({
            url: deleteCusUrl,
            data: {pk_id: pk_id, _token: token},
            type: "POST",
            success: function (data, textStatus, jqXHR) {
                if (data.is_delete == false)
                {


                    showAlertMessage('alert-danger', 'المتابعة اليومية للجرحى/ ', 'لا يمكنك الحذف');
                }
                if (data.success == true)

                {
                    $('#cus_tabel').DataTable().ajax.reload();


                    showAlertMessage('alert-success', 'المتابعة اليومية للجرحى / ', 'تم الحذف بنجاح');
                    //setTimeout(function(){location.reload()},1000);
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