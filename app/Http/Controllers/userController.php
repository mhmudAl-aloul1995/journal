<?php

namespace App\Http\Controllers;

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
use Spatie\Permission\Models\Role;

class userController extends Controller
{
    /*
        function __construct()
        {
            $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'show']]);
            $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        }*/

    public function index()
    {


        $data['user'] = User::all();
        $data['roles'] = Role::all();
        return View::make('user', $data);

    }


    public function show(Request $request)
    {
        $data = $request->all();
        $users = User::query()->with('roles')->where('id', '!=', Auth::id());
        if (isset($data['research_application_id'])) {
            $research_application_id = $data['research_application_id'];

            $users->whereHas('proofreader', function ($q) use ($research_application_id) {
                $q->where('id', $research_application_id);
            });
        }

        return Datatables::of($users->get())
            ->addColumn('roles', function ($ctr) {
                $roles = '';
                $color = ['', '#e91e63', '#4caf50', '#00bcd4', '#ff5722', '#9c27b0', '#cddc39', '#4caf50', '#009688', '#673ab7', '#4caf50',];
                foreach ($ctr->roles as $key => $value) {
                    $roles .= '<span  style=" font-size:70%;  margin:1px; color:white;background-color:' . $color[$value->id] . '" class=" btn  btn-group-red">' . $value->name . '</span>';
                }
                return $roles;

            })
            ->addColumn('action', function ($ctr) {

                return '<div class="btn-group">
                                                        <button  class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> إجراء
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul  class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a onclick="showModal(`user`,' . $ctr->id . ')" href="javascript:;">
                                                                    <i class="icon-pencil"></i> تعديل </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="deleteThis(`user`,' . $ctr->id . ')"  href="javascript:;">
                                                                    <i class="icon-trash"></i> حذف  </a>
                                                            </li>
                                                            </ul>
                                                    </div>';
            })
            ->rawColumns(['action' => 'action', 'roles' => 'roles'])
            ->make(true);
    }

    public function edit(Request $request, $id)
    {

        $user = User::with('roles')->find($id);


        if ($user) {
            return response()->json([
                'user' => $user,
            ]);
        }
        return response(['message' => 'فشلت العملية'], 500);

    }

    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'roles' => 'required'
        ]);
        unset($data['id']);

        $data['password'] = Hash::make($data['name']);
        $user = null;
        // DB::transaction(function () use ($data, $request) {

        $user = User::create($data);
        if (isset($data['research_application_id']) && $data['research_application_id']) {

            ResearchApplication::find($data['research_application_id'])->update(['proofreader_id' => $user->id]);
        }
        $user->assignRole($request->input('roles'));

        if ($user) {
            return response()->json([
                'success' => TRUE,
                'message' => "تم الإدخال بنجاح"

            ]);
        }
        //  });

        return response()->json([
            'success' => FALSE,
            'message' => "حدث حطأ أثناء الإدخال"

        ]);

    }

    public function update(Request $request)
    {
        $data = $request->all();
        $data = array_filter($data);

        if ($request->file()) {
            if (!$request->validate([
                "avatar" => "required"
            ])) {
                return response()->json([
                    'success' => FALSE,
                    // 'message' => "يجب أن يكون الملف pdf"

                ]);
            }
            $fileName = time() . '_file.' . $request->avatar->getClientOriginalExtension();
            $filePath = $request->file('avatar')->storeAs('avatar', $fileName);
            $data['img'] = $fileName;//'/storage/app/' . $filePath;

        }

        $user = user::find($data['id']);
        $user->update($data);

        if (isset($data['roles']) && $data['roles'] != null) {

            DB::table('model_has_roles')->where('model_id', $data['id'])->delete();
            $user->assignRole($data['roles']);
        }
        if (!$user) {
            return response()->json([
                'success' => TRUE,
                'message' => "حدث حطأ أثناء التعديل"

            ]);
        }
        return response()->json([
            'success' => TRUE,
            'avatar' => $user->avatar,
            'message' => "تم التعديل بنجاح"
        ]);
    }

    public function destroy(Request $request, $id)
    {

        if (user::find($id)->delete()) {
            return response()->json([
                'message' => 'تمت العملية بنجاح',
                'success' => true
            ]);
        }

        return response(['message' => 'فشلت العملية'], 500);
    }


}
