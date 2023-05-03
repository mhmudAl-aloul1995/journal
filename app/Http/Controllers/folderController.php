<?php

namespace App\Http\Controllers;

use App\Bill;
use App\folder;

use App\Version;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Project;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Enginges\EloquentEngine;
use Illuminate\Support\Facades\DB;
use View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class folderController extends Controller
{


    public function index()
    {


        return View::make('folder');

    }


    public function show(Request $request)
    {
        $data = $request->all();


        $users = folder::query();

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
                                                                <a onclick="showModal(`folder`,' . $ctr->id . ')" href="javascript:;">
                                                                    <i class="icon-pencil"></i> تعديل </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="deleteThis(`folder`,' . $ctr->id . ')"  href="javascript:;">
                                                                    <i class="icon-trash"></i> حذف  </a>
                                                            </li>
                                                            </ul>
                                                    </div>';
            })
            ->rawColumns(['action' => 'action', 'folder_img' => 'folder_img'])
            ->make(true);
    }

    public function edit(Request $request, $id)
    {

        $folder = Folder::find($id);
        if ($folder) {
            return response()->json([
                'folder' => $folder
            ]);
        }
        return response(['message' => 'فشلت العملية'], 500);

    }

    public function store(Request $request)
    {
        $data = $request->all();


        $lastFolder = Folder::latest('id')->first();

        if ($lastFolder != null) {
            $fldr_no = $lastFolder['fldr_no'] + 1;

        } else {
            $fldr_no = 1;

        }
        $folder = Folder::create(array(
            'fldr_no' => $fldr_no,
            'fldr_year' => date('Y'),
            'user_id' => Auth::id()
        ));

        $version = Version::create(array(
            'vr_no' => 1,
            'folder_id' => $folder['id'],
            'user_id' => Auth::id()
        ));

        if (!$folder) {

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
        $folder = Folder::find($data['id']);
        $folder->update($data);


        if (!$folder) {
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

        $check = Folder::find($id)->where('id', '>', $id)->first();
        if ($check) {
            return response()->json([
                'message' => 'لا يمكنك الحذف',
                'success' => false,
            ]);
        }

        if (Folder::find($id)->delete()) {
            return response()->json([
                'success' => TRUE,
                'message' => "تم الحذف بنجاح"
            ]);
        }

        return response(['message' => 'فشلت العملية'], 500);
    }


}
