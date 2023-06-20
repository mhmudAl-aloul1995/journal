<?php

namespace App\Http\Controllers\main;

use App\Models\Category;
use App\Models\Folder;
use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\User;
use App\Models\Version;
use View;
use Yajra\Datatables\Enginges\EloquentEngine;
use Illuminate\Http\Request;
use Mail;
use App\Mail\JournalMail;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;

class signupController extends Controller
{


    public function index()
    {


        return View::make('main/signup');

    }

    public function store(Request $request)
    {
        /*$name = 'Journal Gaza University';
        $password = 'Journal Gaza University';
        dd(Mail::to('mhmudaloul@gmail.com')->send(new JournalMail ($name,$password)));*/
        $data = $request->all();

        $messages = array(
            'cn_title.required' => 'يجب عليك إدخال اللقب',
            'name.required' => 'يجب على إدخال الإسم كاملا',
            'contact_type.required' => 'يجب عليك إدخال المستوى التعليمي',
            'sp_code.required' => 'يجب عليك إدخال التخصص الدراسي',
            'speciality.required' => 'يجب عليك إدخال التخصص الدقيق',
            'phone.required' => 'يجب عليك إدخال رقم الجوال',
            'zip_code.required' => 'يجب عليك إدخال الرمز البريدي',
            'email.required' => 'يجب عليك إدخال الإيميل',
            'email.unique' => 'هذه الإيميل مدخل مسبقاً',
            'city.required' => 'يجب عليك إدخال المدينة',
            'email.email' => 'يجب أن يكون حقل البريد الإلكتروني صالحًا.',
        );
        $validator = Validator::make($request->all(), ([
            'cn_title' => 'required',
            'name' => 'required',
            'contact_type' => 'required',
            'sp_code' => 'required',
            'speciality' => 'required',
            'phone' => 'required',
            'zip_code' => 'required',
            'email' => 'required|email|unique:users',
            'city' => 'required',
        ]), $messages);
        if ($validator->fails()) {
            return response(['success' => false, 'errors' => $validator->messages()]);
        }
        $data['role_id'] = 1;
        $data['password'] = Hash::make($data['name']);


        $user = User::create($data);
        $user->assignRole([1]);

        if (!$user) {
            return response(['success' => false]);

        }


        if (Auth::attempt(['email' => $data['email'], 'password' => $data['name']])) {

            return response(['success' => true, 'url' => url('profile')]);
        }


    }


}
