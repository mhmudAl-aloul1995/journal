<?php

namespace App\Http\Controllers\main;

use App\Category;
use App\Folder;
use App\Http\Controllers\Controller;
use App\Research;
use App\Version;
use View;
use Yajra\Datatables\Enginges\EloquentEngine;
use Illuminate\Http\Request;

class semanticController extends Controller
{


    public function index(Request $request, $id)
    {

        $lastVersion = Version::latest('id')->first();


        return View::make('main/article', compact('lastVersion'));

    }


}
