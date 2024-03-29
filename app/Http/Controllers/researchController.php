<?php

namespace App\Http\Controllers;

use App\AllocationDonor;
use App\Models\Research;
use App\Models\Category;
use App\Models\Researcher;
use App\Models\User;
use App\Models\Version;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Project;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Enginges\EloquentEngine;
use Illuminate\Support\Facades\DB;
use View;
use Illuminate\Support\Facades\Auth;


class researchController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:research-list|research-create|research-edit|research-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:research-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:research-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:research-delete', ['only' => ['destroy']]);
    }
    public function index()
    {


        $category = Category::all();
        $user = User::where('id', '!=', 1)->get();

        return View::make('research', compact('category', 'user'));

    }


    public function show(Request $request)
    {
        $data = $request->all();
        $users = Research::query()->with('user');

        if (isset($data['researchers'])) {
            $researchers = $data['researchers'];

            $users->whereHas('researchers', function ($q) use ($researchers) {
                $q->whereIn('user_id', $researchers);

            });
        }
        if (isset($data['page_from']) &&!isset($data['page_to'])) {
            $users->where('page_from', $data['page_from']);

        }
        if (isset($data['page_to']) &&!isset($data['page_from'])) {
            $users->where('page_to', $data['page_to']);

        }
        if (isset($data['page_from']) && isset($data['page_to'])) {

            $users->where(function ($query) use ($data) {
            $from=$data['page_from'];
            $to=$data['page_to'];
                $query->where('page_from', '>=',$from);
                $query->where('page_to', '<=',$to);

            });
        }


       $users ->orderBy('page_from', 'asc');
        return Datatables::of($users)
            ->editColumn('user', function ($ctr) {

                foreach ($ctr->user as $value) {
                    return $value->name . '--' . $value->id . '--';
                }
            })
            ->editColumn('res_link', function ($ctr) {

                return '<a target="_blank" href="' . asset($ctr->res_link) . '">الرابط</a>';
            })
            ->addColumn('action', function ($ctr) {

                return '<div class="btn-group">
                                                        <button  class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> إجراء
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul  class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a onclick="showModal(`research`,' . $ctr->id . ')" href="javascript:;">
                                                                    <i class="icon-pencil"></i> تعديل </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="deleteThis(`research`,' . $ctr->id . ')"  href="javascript:;">
                                                                    <i class="icon-trash"></i> حذف  </a>
                                                            </li>
                                                            </ul>
                                                    </div>';
            })
            ->rawColumns(['action' => 'action', 'res_link' => 'res_link'])
            ->make(true);
    }

    public function edit(Request $request, $id)
    {

        $research = Research::with('researchers')->where('id', $id)->first();

        if ($research) {
            return response()->json([
                'research' => $research
            ]);
        }
        return response(['message' => 'فشلت العملية'], 500);

    }

    public function store(Request $request)
    {
        $data = $request->all();

        unset($data['id']);
        $data['user_id'] = Auth::id();

        $get_last_version = 1;// Version::latest()->first()['id'];
        if (!$get_last_version) {
            return response()->json([
                'success' => FALSE,
                'message' => "لا يوجد إصدار لإضافة البحث عليه"

            ]);
        }
        if ($request->file()) {
            if (!$request->validate([
                "res_link" => "required|mimetypes:application/pdf"
            ])) {
                return response()->json([
                    'success' => FALSE,
                    'message' => "يجب أن يكون الملف pdf"

                ]);
            }
            $fileName = time() . '_file.' . $request->res_link->getClientOriginalExtension();
            $filePath = $request->file('res_link')->storeAs('researches', $fileName);
            $data['res_link'] = '/storage/app/' . $filePath;

        }


        $data['version_id'] = $get_last_version;
        /*      if ($data['keywords']) {
                  $data['keywords'] = explode('-',$data['keywords']);

                  $data['keywords']= json_encode($data['keywords']);

              }*/

        $research = Research::create($data);

        if (!$research) {

            return response()->json([
                'success' => FALSE,
                'message' => "حدث حطأ أثناء الإدخال"

            ]);
        }
        if ($data['researchers']) {

            foreach ($data['researchers'] as $value) {
                Researcher::create(['user_id' => $value, 'research_id' => $research->id]);
            }
        }
        return response()->json([
            'success' => TRUE,
            'message' => "تم الإدخال بنجاح"

        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();


        $research = research::find($data['id']);
        if ($request->file()) {
            if (!$request->validate([
                "res_link" => "required|mimetypes:application/pdf"
            ])) {
                return response()->json([
                    'success' => FALSE,
                    'message' => "يجب أن يكون الملف pdf"

                ]);
            }
            $fileName = time() . '_file.' . $request->res_link->getClientOriginalExtension();
            $filePath = $request->file('res_link')->storeAs('researches', $fileName);
            $data['res_link'] = '/storage/app/' . $filePath;

        }

        $research->update($data);


        if (!$research) {
            return response()->json([
                'success' => TRUE,
                'message' => "حدث حطأ أثناء التعديل"

            ]);
        }
        if ($data['researchers']) {
            Researcher::where('research_id', $research->id)->delete();

            foreach ($data['researchers'] as $value) {
                Researcher::create(['user_id' => $value, 'research_id' => $research->id]);
            }

        }
        return response()->json([
            'success' => TRUE,
            'message' => "تم التعديل بنجاح"
        ]);
    }

    public function destroy(Request $request, $id)
    {

        $researchers = Researcher::where('research_id', $id)->delete();

        $research = Research::find($id)->delete();
        if ($research) {
            return response()->json([
                'message' => 'تمت العملية بنجاح',
                'success' => TRUE,
            ]);
        }

        return response(['message' => 'فشلت العملية'], 500);
    }


}
