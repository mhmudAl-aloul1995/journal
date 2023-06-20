@extends('semantic')
@section('title','الأبحاث')
@section('pageName','الأبحاث')


@section('content')

    <div class="modal container fadeIn" id="researchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->

                    <div class="portlet-title">
                        <div class="caption font-green-haze">
                            <i class="icon-wallet font-green-haze"></i>
                            <span class="caption-subject bold uppercase"></span>البحث
                        </div>
                    </div>


                    <form method="POST" action="" data-toggle="validator" id="researchForm" accept-charset="UTF-8"
                          class="form-horizontal form" role="form" enctype="multipart/form-data">

                        <input name="id" type="hidden" value="">

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <label for="category_id" class="col-md-2  control-label">تصنيف البحث

                                                </label>
                                                <div class="col-md-3">
                                                    <select required style="width:100%"
                                                            data-placeholder="تصنيف البحث"
                                                            id="category_id" name="category_id"
                                                            class="form-control select2  ">
                                                        <option value=""></option>

                                                        @foreach ($category as $ctg)

                                                            <option value="{{ $ctg->id }}">{{ $ctg->ctg_name }}</option>

                                                        @endforeach


                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <label for="researchers" class="col-md-2  control-label">المؤلفون

                                                </label>
                                                <div class="col-md-4">
                                                    <select multiple required
                                                            data-placeholder="المؤلفون"
                                                            name="researchers[]"
                                                            class="form-control select2  ">

                                                        @foreach ($user as $value)
                                                            <option
                                                                value="{{ $value->id }}">{{ $value->name.'-'.$value->id }}</option>

                                                        @endforeach


                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <label for="res_title" class="col-md-2  control-label">عنوان البحث
                                                </label>
                                                <div class="col-md-10">
                                                    <textarea required="" type="text" name="res_title" value=""
                                                              class="form-control" placeholder="عنوان البحث">
                                                    </textarea>
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <label for="res_summary" class="col-md-2  control-label">نبذة عن البحث
                                                </label>
                                                <div class="col-md-10">
                                                    <textarea required="" type="text" name="res_summary" value=""
                                                              class="form-control" placeholder="نبذة عن البحث">
                                                        </textarea>
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <label for="res_title" class="col-md-2  control-label">الكلمات المفتاحية
                                                </label>
                                                <div class="col-md-10">
                                                    <input required="" type="text" name="keywords" value=""
                                                           class="form-control" placeholder="الكلمات المفتاحية">
                                                    </input>
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <label for="res_link" class="col-md-2  control-label"> البحث كامل
                                                </label>
                                                <div class="col-md-10">
                                                    <input type="file" name="res_link" value=""
                                                           class="form-control" placeholder="البحث كامل">
                                                    </input>
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <label for="page_from" class="col-md-2  control-label"> الصفحة من
                                                </label>
                                                <div class="col-md-3">
                                                    <input required="" type="number" name="page_from" value=""
                                                           class="form-control" placeholder="الصفحة من">
                                                    </input>
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <label for="page_to" class="col-md-2  control-label"> الصفحة إلى
                                                </label>
                                                <div class="col-md-3">
                                                    <input required="" type="number" name="page_to" value=""
                                                           class="form-control" placeholder="الصفحة إلى">
                                                    </input>
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
            <button type="button" onclick="submitForm('research')" class="btn green ok">حفظ التغييرات</button>
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
                        <a style="color: white;" id="public_search" href="javascript:;" class="btn btn-default btn-sm">
                            <i style="color: white;" class="fa fa-search"></i> بحث </a>
                    </div>

                </div>
                <div class="portlet-body collapse1">
                    <div style=" " class="row">
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input">
                                <label for="researchers" class="col-md-4  control-label">المؤلفون

                                </label>
                                <div class="col-md-8">
                                    <select id="researchers" multiple required
                                            data-placeholder="المؤلفون"
                                            name="researchers[]"
                                            class="form-control select2  ">

                                        @foreach ($user as $value)
                                            <option value="{{ $value->id }}">{{ $value->name.'-'.$value->id }}</option>

                                        @endforeach


                                    </select>
                                </div>
                            </div>
                        </div>

                        {{--                    <div class="col-md-4" id="date">
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
                    </div>--}}
                        <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    <label for="page_from" class="col-md-4  control-label"> الصفحة من
                                    </label>
                                    <div class="col-md-8">
                                        <input required="" id="page_from" type="number" name="page_from" value=""
                                               class="form-control" placeholder="الصفحة من">
                                        </input>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>

                        </div>

                        <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    <label for="page_to" class="col-md-4  control-label"> الصفحة إلى
                                    </label>
                                    <div class="col-md-8">
                                        <input required="" id="page_to" type="number" name="page_to" value=""
                                               class="form-control" placeholder="الصفحة إلى">
                                        </input>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>

                        </div>
                    </div>


                </div>
            </div>
            <!-- END CONDENSED TABLE PORTLET-->
        </div>

        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>الأبحاث
                    </div>
                    <div class="tools">

                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button onclick="showModal('research',null)" class="btn sbold red"> إضافة جديد
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="table-container">

                        <table class="table table-striped  table-hover" id="researchTable">
                            <thead>
                            <tr>
                                <th>عنوان البحث</th>
                                <th>إسم الباحث</th>
                                <th> الكلمات المفتاحية</th>
                                <th> الصفحة من</th>
                                <th> الصفحة إلى</th>
                                <th>البحث كامل</th>

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

        var research = $('#researchTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{url('research/{research}')}}",
                data: function (d) {
                    d.researchers = $('#researchers').val();
                    d.page_from=$("#page_from").val();
                    d.page_to=$("#page_to").val();

                }
            },
            dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
            buttons: [
                {
                    text: 'تحديث',
                    className: 'btn green reload researchTable',
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
                /*
                                {className: 'text-center', data: 'category.ctg_name', name: 'category.ctg_name', searchable: true},
                */
                {className: 'text-center', data: 'res_title', name: 'res_title', searchable: true},
                {className: 'text-center', data: 'user', name: 'name', searchable: true},
                {className: 'text-center', data: 'keywords', name: 'keywords', searchable: true},
                {className: 'text-center', data: 'page_from', name: 'page_from', searchable: true},
                {className: 'text-center', data: 'page_to', name: 'page_to', searchable: true},
                {className: 'text-center', data: 'res_link', name: 'res_link', searchable: true},
                {className: 'text-left', data: 'action', name: 'action', searchable: false},
            ],
        });

        $('.offer').on('click', function (e) {
            $(this).toggleClass("yellow");

            var hiddenField = $('#offer'),
                val = hiddenField.val();

            hiddenField.val(val === "true" ? "false" : "true");
            research.draw();

        });

        $('#public_search').on('click', function (e) {
            research.draw();
            e.preventDefault();
        });
    </script>

@endsection
