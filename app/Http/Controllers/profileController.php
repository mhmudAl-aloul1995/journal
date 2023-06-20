<?php

namespace App\Http\Controllers;

use App\category;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Project;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Enginges\EloquentEngine;
use Illuminate\Support\Facades\DB;
use View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class categoryController extends Controller
{


    public function index()
    {


        return View::make('category');

    }


    public function show(Request $request)
    {
        $data = $request->all();


        $users = Category::query();

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
                                                                <a onclick="showModal(`category`,' . $ctr->id . ')" href="javascript:;">
                                                                    <i class="icon-pencil"></i> تعديل </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="deleteThis(`category`,' . $ctr->id . ')"  href="javascript:;">
                                                                    <i class="icon-trash"></i> حذف  </a>
                                                            </li>
                                                            </ul>
                                                    </div>';
            })
            ->rawColumns(['action' => 'action', 'category_img' => 'category_img'])
            ->make(true);
    }

    public function edit(Request $request, $id)
    {

        $category = Category::find($id);
        if ($category) {
            return response()->json([
                'category' => $category
            ]);
        }
        return response(['message' => 'فشلت العملية'], 500);

    }

    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['id']);
        $data['user_id'] = Auth::id();
        $category = Category::create($data);

        if (!$category) {

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
        $category = Category::find($data['id']);
        $category->update($data);


        if (!$category) {
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


        if (Category::find($id)->delete()) {
            return response()->json([
                'success' => TRUE,
                'message' => "تم الحذف بنجاح"
            ]);
        }

        return response(['message' => 'فشلت العملية'], 500);
    }


}
