<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Models\Folder;
use App\Models\version;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Project;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Enginges\EloquentEngine;
use Illuminate\Support\Facades\DB;
use View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class versionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:version-list|version-create|version-edit|version-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:version-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:version-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:version-delete', ['only' => ['destroy']]);
    }

    public function index()
    {


        return View::make('version');

    }


    public function show(Request $request)
    {
        $data = $request->all();


        $users = Version::query()->with('folder');

        return Datatables::of($users)
            /*            ->addColumn('total', function ($ctr) use ($date_from, $date_to) {
                            $total = 0;
                            if (isset($date_from) && $date_from != null) {

                                $total = $ctr->bills->whereBetween('bill_date', [$date_from, $date_to])->sum('bill_value');

                            } else {
                                $total = $ctr->bills->sum('bill_value');

                            }
                            return $total;


                        })*/
            ->addColumn('action', function ($ctr) {

                return '<div class="btn-group">
                                                        <button  class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> إجراء
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul  class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a onclick="showModal(`version`,' . $ctr->id . ')" href="javascript:;">
                                                                    <i class="icon-pencil"></i> تعديل </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="deleteThis(`version`,' . $ctr->id . ')"  href="javascript:;">
                                                                    <i class="icon-trash"></i> حذف  </a>
                                                            </li>
                                                            </ul>
                                                    </div>';
            })
            ->rawColumns(['action' => 'action', 'version_img' => 'version_img'])
            ->make(true);
    }

    public function edit(Request $request, $id)
    {

        $version = Version::find($id);
        if ($version) {
            return response()->json([
                'version' => $version
            ]);
        }
        return response(['message' => 'فشلت العملية'], 500);

    }

    public function store(Request $request)
    {
        $data = $request->all();


        $lastversion = version::latest('id')->first();
        $lastFolder= Folder::latest('id')->first();

        if ($lastversion != null || $lastversion !="") {
            $vr_no = $lastversion['vr_no'] + 1;

        } else {
            $vr_no = 1;

        }

        $version = Version::create(array(
            'vr_no' => $vr_no,
            'folder_id' => $lastFolder['id'],
            'user_id' => Auth::id()
        ));

        if (!$version) {

            return response()->json([
                'success' => FALSE,
                'message' => "حدث حطأ أثناء الإدخال"

            ]);
        }
        return response()->json([
            'success' => TRUE,
            'message' => "تم الإدخال بنجاح"

        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $version = Version::find($data['id']);
        $version->update($data);


        if (!$version) {
            return response()->json([
                'success' => TRUE,
                'message' => "حدث حطأ أثناء التعديل"

            ]);
        }
        return response()->json([
            'success' => TRUE,
            'message' => "تم التعديل بنجاح"
        ]);
    }

    public function destroy(Request $request, $id)
    {

        $check = Version::find($id)->where('id', '>', $id)->first();
        if ($check) {
            return response()->json([
                'message' => 'لا يمكنك الحذف',
                'success' => false,
            ]);
        }

        if (Version::find($id)->delete()) {
            return response()->json([
                'success' => TRUE,
                'message' => "تم الحذف بنجاح"
            ]);
        }

        return response(['message' => 'فشلت العملية'], 500);
    }


}
