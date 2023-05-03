<?php

namespace App\Http\Controllers\main;

use App\Category;
use App\Folder;
use App\Http\Controllers\Controller;
use App\Research;
use App\User;
use App\Version;
use View;
use Yajra\Datatables\Enginges\EloquentEngine;
use Illuminate\Http\Request;
use Mail;
use App\Mail\JournalMail;
use Illuminate\Support\Facades\Hash;
use Auth;
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


        $request->validate([
            'cn_title' => 'required',
            'name' => 'required',
            'contact_type' => 'required',
            'sb_code' => 'required',
            'speciality' => 'required',
            'mobile' => 'required',
            'fax' => 'required',
            'zip_code' => 'required',
            'email' => 'required|email|unique:users',
            'city' => 'required',
        ]);

        $data['role_id'] = 1;
        $data['password'] = Hash::make($data['name']);
        $data['email'] = $data['email_1'];
        unset($data['email_1']);

        $user = User::create($data);

        if (!$user) {
            return response(['success' => false]);

        }



        if (Auth::attempt(['email'=>$data['email'],'password'=>$data['name']])) {

            return response(['success' => true, 'url' => url('research')]);
        }


    }


}
