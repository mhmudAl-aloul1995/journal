<?php

namespace App\Http\Controllers\main;

use App\Models\Category;
use App\Models\Folder;
use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\Version;
use View;
use Yajra\Datatables\Enginges\EloquentEngine;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class categoryController extends Controller
{


    public function index(Request $request, $type = null, $id = null)
    {


        $lastVersion = Version::latest('id')->first();
        $allcategory = Category::withCount('researches')->get();

		if ($type == 0) {
            $researches = Research::wherehas('researchers', function ($q)use($id) {

                $q->where('user_id', $id);
            })->get();

            $category = $allcategory;
        }
        if ($type == 1) {
            $researches = Research::where(['category_id' => $id])->get();
            $category = $allcategory;
        }
        if ($type == 2) {
            $lastVersion = Version::latest('id')->where('folder_id', $id)->first();
            $researches = Research::wherehas('version', function ($q) use ($id) {
                $q->wherehas('folder', function ($q) use ($id) {
                    $q->where('folder_id', $id);
                });
            });
            if ($lastVersion != null) {
                $version_id = $lastVersion['id'];
                $category = Category::wherehas('researches', function ($q) use ($version_id) {
                    $q->where('version_id', $version_id);
                })->withCount('researches')->get();
            } else {
                $category = $allcategory;
            }
        }
        if ($type == 3) {
            $researches = Research::where(['version_id' => $id])->get();

            $lastVersion = Version::find($id);

            $category = Category::withCount([
                'researches',
                'researches as pending_researches_count' => function (Builder $query) use($id) {
                    $query->where('version_id', $id);
                },
            ])->get();


        }
        if (isset($request->category_id) && isset($request->version_id)) {

            $version_id=$request->version_id;
            $category_id=$request->category_id;
            $researches = Research::where(['category_id'=>$request->category_id,'version_id' => $version_id])->get();

            $lastVersion = Version::find($version_id);

        }

        if ($request->has('keywords')) {
            $search = $request->keywords;

            $researches = Research::where('res_title', 'LIKE', '%' . $search . '%')
                ->orWhere('res_summary', 'LIKE', '%' . $search . '%')->get();
        }
        $folders_archive = Folder::with('versions')->get();

        return View::make('main/category', compact('category', 'researches', 'lastVersion', 'folders_archive', 'type', 'allcategory'));

    }


}
