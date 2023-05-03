@extends('semantic')
@section('title','المجلدات')
@section('pageName','المجلدات')


@section('content')

    <div class="modal container fadeIn" id="folderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->

                    <div class="portlet-title">
                        <div class="caption font-green-haze">
                            <i class="icon-wallet font-green-haze"></i>
                            <span class="caption-subject bold uppercase"></span>المجلدات
                        </div>
                    </div>


                    <form method="POST" action="" data-toggle="validator" id="folderForm" accept-charset="UTF-8"
                          class="form-horizontal form" role="form" enctype="multipart/form-data">

                        <input name="id" type="hidden" value="">

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <label for="ctg_name" class="col-md-4  control-label">إسم المجلد
                                                </label>
                                                <div class="col-md-8">
                                                    <input required="" type="text" name="ctg_name" value=""
                                                           class="form-control" placeholder="إسم المجلد">
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
            <button type="button" onclick="submitForm('folder')" class="btn green ok">حفظ التغييرات</button>
            <button type="button" data-dismiss="modal" class="btn btn-default">اغلاق</button>
        </div>
    </div>

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
                        --}}
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
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>المجلدات
                    </div>
                    <div class="tools">

                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button onclick="addFolder('folder',null)" class="btn sbold red"> إضافة مجلد
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="table-container">

                        <table class="table table-striped  table-hover" id="folderTable">
                            <thead>
                            <tr>
                                <th> رقم المجلد</th>
                                <th> سنة المجلد</th>

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
@endsection





@section('myScript')

    <script>

        var folder = $('#folderTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{url('folder/{folder}')}}",
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
                    className: 'btn green reload folderTable',
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
                {className: 'text-center', data: 'fldr_no', name: 'fldr_no', searchable: true},
                {className: 'text-center', data: 'fldr_year', name: 'fldr_year', searchable: true},
                {className: 'text-left', data: 'action', name: 'action', searchable: false},
            ],
        });

        function addFolder() {

            $.post("{{url('folder/{folder}')}}", {_token: '{{csrf_token()}}'}, function(data){

                if(data.success==false){
                    showAlertMessage('alert-danger', null, data.message);

                }
                showAlertMessage('alert-success', null, data.message);

                $('.folderTable').click();

            });

        }


        $('#public_search').on('click', function (e) {
            folder.draw();
            e.preventDefault();
        });
    </script>
@endsection
