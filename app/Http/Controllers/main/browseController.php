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

class browseController extends Controller
{


    public function browse_users($id)
    {
        $users = User::wherein('role_id', ['2', '3', '4', '5'])->orderBy('role_id', 'asc')->get();

        if ($id > 0) {
            $users = User::where('id',$id)->get();
        }
        $role_id = ['', 'باحث', 'رئيس مجلس ادارة المجلة', ' رئيس التحرير', ' مدير التحرير', ' هيئة التحرير'];


        return View::make('main/user', compact('users', 'role_id'));

    }

    public function browse_version()
    {

        $folder = Folder::with('versions')->orderBy('fldr_no', 'desc')->get();


        return View::make('main/browse_version', compact('folder'));

    }
    public function browse_authors_nots()
    {



        return View::make('main/browse_authors_nots');

    }
    public function browse_scope()
    {



        return View::make('main/browse_scope');

    }
    public function browse_about()
    {



        return View::make('main/browse_about');

    }
    public function browse_ethics()
    {



        return View::make('main/browse_ethics');

    }
    public function browse_condition()
    {



        return View::make('main/browse_condition');

    }

    public function browse_researcher()
    {

        $chars = array(
            'ا',
            'أ',
            'ب',
            'پ',
            'ت',
            'ث',
            'ج',
            'چ',
            'ح',
            'خ',
            'د',
            'ذ',
            'ر',
            'ز',
            'ژ',
            'س',
            'ش',
            'ص',
            'ض',
            'ط',
            'ظ',
            'ع',
            'غ',
            'ف',
            'ق',
            'ک',
            'گ',
            'ل',
            'م',
            'ن',
            'و',
            'ه',
            'ی',

        );

        return View::make('main/browse_researcher', compact('chars'));

    }

    public function browse_index_researcher($is_keyword=null,$folder_id = null)
    {

        $chars = array(
            'ا',
            'أ',
            'ب',
            'ت',
            'ث',
            'ج',
            'ح',
            'خ',
            'د',
            'ذ',
            'ر',
            'ز',
            'س',
            'ش',
            'ص',
            'ض',
            'ط',
            'ظ',
            'ع',
            'غ',
            'ف',
            'ق',
            'ك',
            'ل',
            'م',
            'ن',
            'ه',
            'و',
            'ي',

        );
        $folders = Folder::with('versions')->orderBy('fldr_no', 'desc')->get();

        return View::make('main/browse_index_researcher', compact('is_keyword','chars', 'folders', 'folder_id'));

    }


    public function browse_category()
    {

        $category = Category::all();


        return View::make('main/browse_category', compact('category'));

    }
}
