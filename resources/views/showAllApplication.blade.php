@extends('semantic')
@section('title',@$user->name)
@section('pageName',@$user->name)


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>بيانات الباحث الأساسية
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title=""
                           title=""> </a>
                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form class="form-horizontal" role="form">
                        <div class="form-body">
                            <h2 class="margin-bottom-20"> معلومات الباحث - {{$user->name}} </h2>
                            <h3 class="form-section">المعلومات الشخصية</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الإسم كاملاً:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->name}} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">البريد الإلكترني:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->email}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الجنس:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->gender_updated}} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">رقم الهاتف/الجوال:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->phone}}  </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">المدينة</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->city}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">رقم الفاكس:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->fax}} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الرمز البريدي :</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->zip_code}} </p>
                                        </div>
                                    </div>
                                </div>

                                <!--/span-->
                            </div>
                            <!--/row-->
                            <h3 class="form-section">التخصص الدراسي</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">التخصص الدراسي:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->sp_code_updated}} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">اللقب:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->cn_title_updated}} </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">التخصص الدقيق:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->speciality}} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">المستوى التعليمي:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->contact_type_updated}} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الدرجة العلمية:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->degree_updated}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>طلب النشر
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
                                <th> المحكمين</th>
                                <th> مرفق الدفع</th>
                                <th> التأكد من الدفع</th>
                                <th> الحالة</th>
                                <th> تاريخ الطلب</th>

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

    <div class="row">
        <div class="col-md-12">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>رأي المحكمين
                    </div>
                    <div class="tools">

                    </div>
                </div>
                @foreach($evaluations->researcher_evaluations as $value)

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">

                                        <h3>{{$value->user->title.$value->user->name}}<h2>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="table-container">

                            <table style="border-collapse: collapse;" class="table table-striped  " id="">
                                <thead>
                                <tr>
                                    <th class="col-lg-3"> عناصر التقييم</th>
                                    <th class="col-lg-1">ضعيف</th>
                                    <th class="col-lg-1">مقبول</th>
                                    <th class="col-lg-1">جيد</th>
                                    <th class="col-lg-1">جيد جدأ</th>
                                    <th class="col-lg-1">ممتاز</th>
                                    <th class="col-lg-4"> ملاحظات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>أصالة البحث و أهمية موضوعه</td>
                                    <td>{!!  $value->answer_evaluation_1==1?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_1==2?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_1==3?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_1==4?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_1==5?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{{$value->note_evaluation_1}}</td>

                                </tr>
                                <tr>
                                    <td>منهجية البحث</td>
                                    <td>{!!  $value->answer_evaluation_2==1?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_2==2?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_2==3?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_2==4?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_2==5?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{{$value->note_evaluation_2}}</td>

                                </tr>
                                <tr>
                                    <td>أسلوب العرض واللغة في مادة البحث</td>
                                    <td>{!!  $value->answer_evaluation_3==1?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_3==2?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_3==3?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_3==4?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_3==5?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{{$value->note_evaluation_3}}</td>

                                </tr>
                                <tr>
                                    <td>قيمة نتائج البحث</td>
                                    <td>{!! $value->answer_evaluation_4==1?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':'' !!}</td>
                                    <td>{!! $value->answer_evaluation_4==2?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':'' !!}</td>
                                    <td>{!!  $value->answer_evaluation_4==3?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_4==4?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_4==5?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{{$value->note_evaluation_4}}</td>

                                </tr>
                                <tr>
                                    <td>التقدير العام للبحث</td>
                                    <td>{!!  $value->answer_evaluation_5==1?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_5==2?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_5==3?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_5==4?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td>{!!  $value->answer_evaluation_5==5?'<i style=" color:green;  font-size: 150%;" class="fa fa-check"></i>':''  !!}</td>
                                    <td></td>

                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>محصلة الرأي بخصوص نشر البحث</td>
                                    <td colspan="3">{{$value->answer_evaluation_6==null?'':$answer_evaluation_6[$value->answer_evaluation_6]}}</td>


                                </tr>
                                <tr>
                                    <td>إعتماد نهائي</td>
                                    <td>{{$value->finel_response==1?'نعم':'لا'}}</td>


                                </tr>

                                </tfoot>

                            </table>
                            <table class="table table-striped  "
                                   id="">
                                <thead class="alert-danger">
                                <tr>
                                    <th>الملاحظة</th>
                                    <th>المرفق</th>
                                    <th>تم تنفيذها؟</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Models\ResearchApplicationNote::where(['research_application_id'=>$value->research_application->id,'evaluator_id'=>$value->user->id])->get() as $not)
                                    <tr>
                                        <td>{{$not->note}}</td>
                                        <td> <?php
                                            if ($not->note_file_updated) {
                                                echo "<a href='$not->note_file_updated'>الرابط</a>";
                                    } else {
                                                echo "";
                                            }

                                            ?> </td>
                                        <td>{{$not->note}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-md-12">
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

                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection





@section('myScript')

    <script>

        var publicationManagementTable = $('#publicationManagementTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{url('publicationManagement')}}/publicationManagement",
                data: function (d) {
                    d.id = '{{$id}}'

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
                {className: 'text-center', data: 'evaluators', name: 'evaluators', searchable: true},
                {className: 'text-center', data: 'res_money', name: 'research_title', searchable: true},
                {className: 'text-center', data: 'app_status', name: 'app_status', searchable: true},
                {className: 'text-center', data: 'is_pay', name: 'is_pay', searchable: true},
                {className: 'text-center', data: 'created_at', name: 'created_at', searchable: true},
            ],
        });
        var publicationManagementEvaluatorNoteTable = $('#publicationManagementEvaluatorNoteTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{url('researchAppNoteShow')}}",
                data: function (d) {
                    d.research_application_id = {{$id}}
                        d.show_all = 1
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


        $('#public_search').on('click', function (e) {
            publicationManagementTable.draw();
            e.preventDefault();
        });
    </script>
@endsection
