<?php

namespace App\Http\Controllers\main;

use App\Models\Category;
use App\Models\Folder;
use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\Version;
use Illuminate\Database\Eloquent\Builder;
use View;
use Yajra\Datatables\Enginges\EloquentEngine;

class homeController extends Controller
{


    public function index()
    {

        $folders=Folder::with('versions')->get();
        $researches=Research::latest()->take(5)->get();
        $last_folder=Folder::latest()->first()['fldr_no'];
        $last_version=Version::latest()->first()['vr_no'];
        $version_count=Version::count();
        $folder_count=Folder::count();
        $version_id=Version::latest()->first()['id'];

        $category = Category::withCount([
            'researches',
            'researches as pending_researches_count' => function (Builder $query)use($version_id)  {
                $query->where('version_id', $version_id);
            },
        ])->get();

        return View::make('main/home',compact('version_id','folders','category','researches','last_folder','last_version'));

    }


}
