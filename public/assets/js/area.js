
$('#areaForm').bootstrapValidator({
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
        area_name: {
            validators: {
                stringLength: {
                    min: 2,
                    message: 'هذا الحقل يجب أن يكون حرفين على الأقل'
                },
            }
        },

    }
});

$('#sbmt_area').click(function (e) {


    var message;
    if ($('#area_pk_id').val() == 0)
    {
        message = 'تمت الإضافة بنجاح';
    } else {
        message = 'تم التعديل بنجاح';
    }

    $('#areaForm').data('bootstrapValidator').validate();
    if (!$('#areaForm').data('bootstrapValidator').isValid()) {

        return false;
    } else {

        var $form = $('#areaForm'),
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

                    $('#areaForm').bootstrapValidator('resetForm', true);

                    $('#areaTable').DataTable().ajax.reload();
                    $('#areaModal').modal('hide');

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


function areaModal(id) {


    $("html, body").animate({scrollTop: 0}, 600);
    $('#areaForm').bootstrapValidator('resetForm', true);


    if (id == null) {
        $('#cs_fk_area').select2('val', 'All');
        $('#areaForm').bootstrapValidator('resetForm', true);

        $('#areaModal').modal('show', {backdrop: 'static'});

        $('#areaForm').attr('action', addAreaUrl);
        $("#cus_pk_id").val(0);

    } else {
        $('#areaForm').attr('action', editAreaUrl);

        $.post(showAreaUrl, {
            '_token': token, 'pk_id': id,
        }, function (data) {
            if (data.success) {
                $('#areaModal').modal('show', {backdrop: 'static'});
                $('#cusForm').bootstrapValidator('resetForm', true);

                $("[name='area_name']").val(data.area.area_name);

                $("#area_pk_id").val(data.area.pk_id);

            } else {


                showAlertMessage('alert-danger', 'ط®ط·ط£ !', 'ط®ط·ط£ ظپظٹ ط§ظ„طµظپط­ط©');
            }
        }, 'json').error(function (error) {
            showAlertMessage('alert-danger', 'Fatal error !', 'An unknown error occured !');
        });
    }

}


function deleteArea(pk_id) {
    if (!confirm('هل انت متاكد؟')) {
        return false;
    } else {
        $.ajax({
            url: deleteAreaUrl,
            data: {pk_id: pk_id, _token: token},
            type: "POST",
            success: function (data, textStatus, jqXHR) {
                if (data.is_delete == false)
                {


                    showAlertMessage('alert-danger', 'المتابعة اليومية للجرحى/ ', 'لا يمكنك الحذف');
                }
                if (data.success == true)

                {
                    $('#areaTable').DataTable().ajax.reload();


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
