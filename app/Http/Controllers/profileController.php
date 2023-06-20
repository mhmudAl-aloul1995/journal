<?php

namespace App\Http\Controllers;


use App\Models\Research;
use App\Models\ResearchApplication;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Project;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Enginges\EloquentEngine;
use Illuminate\Support\Facades\DB;
use View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Hash;
use Validator;
use App\Models\Researcher;

class profileController extends Controller
{


    public function index()
    {


        $data['researcher_no'] = Researcher::where('user_id', Auth::id())->whereHas('research')->count();
        $data['count_status_2'] = $researcher_no = ResearchApplication::where(['user_id' => Auth::id(), 'app_status' => 2])->count();
        $data['count_status_3'] = $researcher_no = ResearchApplication::where(['user_id' => Auth::id(), 'app_status' => 3])->count();

        $color = ['', '#e91e63', '#4caf50', '#00bcd4', '#ff5722', '#9c27b0', '#cddc39', '#4caf50', '#009688', '#673ab7', '#4caf50',];
        $contact_type = ['', '#e91e63', '#4caf50', '#00bcd4', '#ff5722', '#9c27b0', '#cddc39', '#4caf50', '#009688', '#673ab7', '#4caf50',];

        $data['color'] = $color;
        $data['user'] = Auth::user();
        $data['contact_type'] = $contact_type;
        return View::make('profile', $data);

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

    public function changePasswordSave(Request $request)
    {
        $messages = array(
            'current_password.required' => 'يجب عليك إدخال كلمة المرور الحالية',
            'new_password.required' => 'يجب عليك إدخال كلمة المرور الجديدة,',
            'contact_type.required' => 'يجب عليك إدخال المستوى التعليمي',
            'new_password.confirmed' => 'كلمة المرور الجديدة غير متطابقتان',
            'new_password.min' => 'يجب ألا يقل حقل كلمة المرور الجديدة عن 6 أحرف',

        );
        $validator = Validator::make($request->all(), ([
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:6|string'
        ]), $messages);
        if ($validator->fails()) {
            return response(['success' => false, 'errors' => $validator->messages()]);
        }

        $auth = Auth::user();

        // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password)) {

            return response()->json([
                'success' => false,
                'message' => "كلمة المرور الحالية غير صحيحة"

            ]);

        }

// Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0) {
            return response()->json([
                'success' => false,
                'message' => "لا يمكن أن تكون كلمة المرور الجديدة هي نفسها كلمة مرورك الحالية."

            ]);
        }

        $user = User::find($auth->id);
        $user->password = Hash::make($request->new_password);
        $user->save();
        return response()->json([
            'success' => true,
            'message' => "تم تغيير كلمة المرور بنجاح"

        ]);
    }

}
