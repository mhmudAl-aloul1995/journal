@extends('semantic')
@section('title','حساب الملف الشخصي')
@section('pageName','حساب الملف الشخصي')


@section('content')
    <link href="{{url('')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{$user->avatar}}"  class="img-responsive"
                             alt=""></div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{$user->name}}</div>
                        <div style="text-transform:lowercase; font-size:17px; "
                             class="profile-usertitle-job"> {{$user->email}}</div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        @foreach($user->roles as  $value)

                            <button
                                style=" font-size:70%;  margin:1px; color:white;background-color:{{$color[$value->id]}}"
                                type="button" class="btn btn-circle pink btn-sm">{{$value->name}}</button>

                        @endforeach
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            {{--<li>
                                <a href="page_user_profile_1.html">
                                    <i class="icon-home"></i> Overview </a>
                            </li>
                            <li class="active">
                                <a href="page_user_profile_1_account.html">
                                    <i class="icon-settings"></i> Account Settings </a>
                            </li>
                            <li>
                                <a href="page_user_profile_1_help.html">
                                    <i class="icon-info"></i> Help </a>
                            </li>--}}
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->
                <div class="portlet light ">
                    <!-- STAT -->
                    <div class="row list-separated profile-stat">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> {{$researcher_no}}</div>
                            <div class="uppercase profile-stat-text"> منشورة</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> {{$count_status_2}}</div>
                            <div class="uppercase profile-stat-text"> قيد التحكيم</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> {{$count_status_3}}</div>
                            <div class="uppercase profile-stat-text"> قيد التدقيق</div>
                        </div>
                    </div>
                    <!-- END STAT -->
                    {{--
                                        <div>
                                            <h4 class="profile-desc-title">About Marcus Doe</h4>
                                            <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                                            <div class="margin-top-20 profile-desc-link">
                                                <i class="fa fa-globe"></i>
                                                <a href="http://www.keenthemes.com">www.keenthemes.com</a>
                                            </div>
                                            <div class="margin-top-20 profile-desc-link">
                                                <i class="fa fa-twitter"></i>
                                                <a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
                                            </div>
                                            <div class="margin-top-20 profile-desc-link">
                                                <i class="fa fa-facebook"></i>
                                                <a href="http://www.facebook.com/keenthemes/">keenthemes</a>
                                            </div>
                                        </div>
                    --}}
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span
                                        class="caption-subject font-blue-madison bold uppercase">حساب الملف الشخصي</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab" aria-expanded="true">معلومات الحساب </a>
                                    </li>
                                    <li class="">
                                        <a href="#tab_1_2" data-toggle="tab" aria-expanded="false">تغيير الصورة</a>
                                    </li>
                                    <li class="">
                                        <a href="#tab_1_3" data-toggle="tab" aria-expanded="false">تغيير كلمة المرور</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">


                                        <form role="form" data-toggle="validator" method="POST" data-toggle="validator"
                                              id="userForm" accept-charset="UTF-8"
                                              class="form-horizontal form" role="form" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <div class="form-group">
                                                <label class="control-label">الإسم كاملأ</label>
                                                <input name="name" type="text" placeholder="{{$user->name}}"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">البريد الإلكتروني</label>
                                                <input type="text" name="email" placeholder="{{$user->email}}"
                                                       class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label"> الدرجة العلمية</label>
                                                <select name="degree" class="form-control  select2">
                                                    <option {{$user->degree==1?'selected':''}} value="1">أستاذ</option>
                                                    <option {{$user->degree==2?'selected':''}}value="2">أستاذ مشارك
                                                    </option>
                                                    <option {{$user->degree==3?'selected':''}}value="3">أستاذ مساعد
                                                    </option>
                                                    <option {{$user->degree==4?'selected':''}}value="4">مدرس</option>
                                                    <option {{$user->degree==5?'selected':''}}value="5"> غير ذلك
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"> اللقب</label>
                                                <select name="cn_title" class="form-control select2">
                                                    <option {{$user->cn_title==1?'selected':''}} value="1"> الدكتور
                                                    </option>
                                                    <option {{$user->cn_title==2?'selected':''}} value="2">السيد
                                                    </option>
                                                    <option {{$user->cn_title==3?'selected':''}}value="3">السيدة
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"> التخصص الدراسي</label>
                                                <select name="sp_code" class="form-control select2">
                                                    <option {{$user->sp_code==1?'selected':''}} value="1"> إدارة الأعمال
                                                    </option>
                                                    <option {{$user->sp_code==2?'selected':''}} value="2">الإقتصاد
                                                    </option>
                                                    <option {{$user->sp_code==3?'selected':''}}value="3">العلوم السياسية
                                                    </option>
                                                    <option {{$user->sp_code==4?'selected':''}}value="4">إدارة الأعمال
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">المستوى العلمي</label>
                                                <select name="contact_type" class="form-control radius-0 select2"
                                                        tabindex="-1" style="display: none;">
                                                    <option {{$user->contact_type==1?'selected':''}} value="1">
                                                        دكتوراه
                                                    </option>
                                                    <option {{$user->contact_type==7?'selected':''}} value="7">طبیب
                                                    </option>
                                                    <option {{$user->contact_type==2?'selected':''}} value="2">مرشح
                                                        للدكتوراه
                                                    </option>
                                                    <option {{$user->contact_type==3?'selected':''}} value="3">
                                                        ماجستير
                                                    </option>
                                                    <option {{$user->contact_type==4?'selected':''}} value="4"> طالب
                                                        ماجستير
                                                    </option>
                                                    <option {{$user->contact_type==5?'selected':''}} value="5">
                                                        بكالوريوس
                                                    </option>
                                                    <option {{$user->contact_type==6?'selected':''}} value="6">غير
                                                        ذلك
                                                    </option>
                                                </select></div>
                                            <div class="form-group">
                                                <label class="control-label">الجنس </label>
                                                <select name="gender" class="form-control select2"
                                                >
                                                    <option {{$user->gender==1?'selected':''}} value="1"> ذكر
                                                    </option>
                                                    <option {{$user->gender==2?'selected':''}} value="2">أنثى
                                                    </option>
                                                </select></div>
                                            <div class="form-group">
                                                <label class="control-label">رقم الهاتف</label>
                                                <input name="phone" type="text" placeholder="{{$user->phone}}"
                                                       class="form-control"></div>
                                            <div class="form-group">
                                                <label class="control-label">رقم الفاكس</label>
                                                <input name="fax" type="text" placeholder="{{$user->fax}}"
                                                       class="form-control"></div>
                                            <div class="form-group">
                                                <label class="control-label"> التخصص الدقيق</label>
                                                <input name="speciality" type="text" placeholder="{{$user->speciality}}"
                                                       class="form-control"></div>
                                            <div class="form-group">
                                                <label class="control-label"> الرمز البريدي</label>
                                                <input name="zip_code" type="text" placeholder="{{$user->zip_code}}"
                                                       class="form-control"></div>
                                            <div class="margiv-top-10">
                                                <a onclick="submitForm('user',null)" href="javascript:;"
                                                   class="btn green ok"> حفظ التغييرات </a>
                                                <a href="javascript:;" class="btn default"> إلغاء </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">

                                        <form id="updateAvatarForm" action="#" role="form">
                                            <input type="hidden" name="id" value="{{$user->id}}"/>
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail"
                                                         style="width: 200px; height: 150px;">
                                                        <img
                                                            src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                            alt=""></div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                                         style="max-width: 200px; max-height: 150px;"></div>
                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span
                                                                                class="fileinput-new"> تحديد الصورة </span>
                                                                            <span
                                                                                class="fileinput-exists"> تغيير </span>
                                                                            <input type="file" name="avatar"> </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists"
                                                           data-dismiss="fileinput"> إزالة </a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="margin-top-10">
                                                <a onclick="submitForm('updateAvatar')" href="javascript:;"
                                                   class="btn green ok"> موافق </a>
                                                <a href="javascript:;" class="btn default"> إلغاء </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE AVATAR TAB -->
                                    <!-- CHANGE PASSWORD TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                        <form id="changePasswordSaveForm" action="#">
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <div class="form-group">
                                                <label class="control-label">كلمة المرور الحالية</label>
                                                <input name="current_password" type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">كلمة المرور الجديدة</label>
                                                <input name="new_password" type="password" class="form-control"></div>
                                            <div class="form-group">
                                                <label class="control-label">إعادة كتابة كلمة المرور الجديدة</label>
                                                <input name="new_password_confirmation" type="password"
                                                       class="form-control"></div>
                                            <div class="margin-top-10">
                                                <a onclick="submitForm('changePasswordSave')" href="javascript:;"
                                                   class="btn green ok"> تغيير كلمة المرور </a>
                                                <a href="javascript:;" class="btn ok default"> إلغاء </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE PASSWORD TAB -->
                                    <!-- PRIVACY SETTINGS TAB -->
                                    <!-- END PRIVACY SETTINGS TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>


@endsection





@section('myScript')
    <script src="{{url('')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
            type="text/javascript"></script>

    <script>

        /*
                $('#userForm').validator().on('submit', function (e) {
                    if (e.isDefaultPrevented()) {
                        alert(5)

                    } else {
                        // everything looks good!
                    }
                })*/
    </script>
@endsection
