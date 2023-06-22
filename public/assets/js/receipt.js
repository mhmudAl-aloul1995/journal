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
                    .insertBefore($template);


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



                  var option = new Option(data.user.cs_name, data.user.pk_id, true, true);
                  $('#fk_user').append(option);

              } else {


                  showAlertMessage('alert-danger', 'ط®ط·ط£ !', 'ط®ط·ط£ ظپظٹ ط§ظ„طµظپط­ط©');
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
