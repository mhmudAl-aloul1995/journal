<?php

namespace App\Http\Controllers;

use App\AllocationDonor;
use App\Models\ResearchApplication;
use App\research;
use App\Models\Category;
use App\Journal;
use App\Models\Researcher;
use App\Models\User;
use App\Donor;
use App\Municipality;
use App\Product;
use App\Stage;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Project;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Enginges\EloquentEngine;
use Illuminate\Support\Facades\DB;
use View;
use Illuminate\Support\Facades\Auth;
use App\Models\EvaluationsUser;

class researchApplicationController extends Controller
{


 function __construct()
    {
         $this->middleware('permission:researchApplication-list|researchApplication-create|researchApplication-edit|researchApplication-delete', ['only' => ['index','show']]);
         $this->middleware('permission:researchApplication-create', ['only' => ['create','store']]);
         $this->middleware('permission:researchApplication-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:researchApplication-delete', ['only' => ['destroy']]);

    }

    public function index()
    {


        $researchApplication = ResearchApplication::all();
        $user = User::where('id', '!=', 1)->get();

        return View::make('researchApplication', compact('researchApplication', 'user'));

    }


    public function publicationManagementView()
    {
        $evaluations = User::where('role_id', '8')->get();
        $user = User::where('id', '!=', 1)->get();

        $data['user'] = $user;
        $data['evaluations'] = $evaluations;
        return View::make('publicationManagement', $data);
    }


    public function show(Request $request)
    {
        $data = $request->all();
        $users = ResearchApplication::query()->with('user')->select('research_applications.*');

        $status = ['', 'info', 'warning', 'danger', 'primary'];
        $status1 = ['', 'ارفاق الطلب', 'تحكيم البحث', 'تدقيق لغوي', 'الموافقة على النشر'];
        $changeStatus = [1 => 'الموافقة على الطلب', 2 => 'لحنة تحكيم', 3 => 'تدقيق لغوي', 4 => 'جاهز للنشر'];
        if (Auth::id() != 1) {
            $users->where('user_id', Auth::id());
        }

        $users->orderBy('research_applications.id', 'desc');
        return Datatables::of($users)
            ->addColumn('is_pay', function ($ctr) {

                if ($ctr->is_pay == 1) {
                    return ' <span ondblclick="showResearchApplicationPayModal(' . $ctr->id . ',' . $ctr->is_pay . ')"  class="label label-sm label-info">قيد الفحص</span>';
                } else if ($ctr->is_pay == 2) {

                    return ' <span ondblclick="showResearchApplicationPayModal(' . $ctr->id . ',' . $ctr->is_pay . ')" class="label label-sm label-success"> مدفوع</span>';
                } else if ($ctr->is_pay == 0) {

                    return ' <span ondblclick="showResearchApplicationPayModal(' . $ctr->id . ',' . $ctr->is_pay . ')" class="label label-sm label-danger">غير مدفوع</span>';
                }

            })
            ->addColumn('res_file', function ($ctr) {
                return '<a target="_blank" href="' . $ctr->res_file . '">الرابط</a>';
            })
            ->addColumn('res_money', function ($ctr) {
                return '<a target="_blank" href="' . $ctr->res_money . '">الرابط</a>';

            })
            ->addColumn('app_status', function ($ctr) use ($status, $status1) {

                return ' <span ondblclick="showResearchApplicationStatusModal(' . $ctr->id . ',' . $ctr->app_status . ')" class="label label-sm label-' . $status[$ctr->app_status] . '">' . $status1[$ctr->app_status] . '</span>';

            })
            ->addColumn('action', function ($ctr) use ($changeStatus) {

                return '<div class="btn-group">
                                                        <button  class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> إجراء
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul  class="dropdown-menu" role="menu">

                                                            <li>
                                                                <a onclick="showResearchApplicationPayModal(' . $ctr->id . ',' . $ctr->is_pay . ')" href="javascript:;">
                                                                    <i class="icon-puzzle"></i> حالة الدفع </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="showModal(`researchApplication`,' . $ctr->id . ')" href="javascript:;">
                                                                    <i class="icon-pencil"></i> تعديل </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="deleteThis(`researchApplication`,' . $ctr->id . ')"  href="javascript:;">
                                                                    <i class="icon-trash"></i> حذف  </a>
                                                            </li>
                                                            </ul>
                                                    </div>';
            })
            ->rawColumns(['action' => 'action', 'res_file' => 'res_file', 'res_money' => 'res_money', 'app_status' => 'app_status', 'is_pay' => 'is_pay'])
            ->make(true);
    }

    public function edit(Request $request, $id)
    {

        $researchApplication = ResearchApplication::where('id', $id)->first();

        if ($researchApplication) {
            return response()->json([
                'researchApplication' => $researchApplication,
                'success' => TRUE,
            ]);
        }
        return response(['message' => 'فشلت العملية'], 500);

    }

    public function researchApplicationPay(Request $request)
    {
        $data = $request->all();

        $data['user_id'] = Auth::id();

        $request->validate([
            "is_pay" => "required",
            "app_id" => "required",

        ]);

        $pay = ResearchApplication::find($data['app_id']);
        if ($data['is_pay'] == 2) {
            $data['app_status'] = 2;
            $pay->update(['is_pay' => $data['is_pay'], 'app_status' => $data['app_status']]);

        } else {
            $data['app_status'] = 1;

            $pay->update(['is_pay' => $data['is_pay'], 'app_status' => $data['app_status']]);

        }

        if (!$pay) {

            return response()->json([
                'success' => FALSE,
                'message' => "حدث حطأ أثناء الإدخال"
            ]);
        }

        return response()->json([
            'success' => TRUE,
            'message' => "تم الإدخال بنجاح",
            'research' => $pay


        ]);
    }

    public function researchApplicationStatus(Request $request)
    {
        $data = $request->all();


        //  $data['user_id'] = Auth::id();
        if ($data['app_status'] == 2) {


            $EvaluationsUser = null;
            foreach ($data['user_id'] as $value) {
                $user = User::find($value)->update(['password' => Hash::make('123456')]);
                $EvaluationsUser = EvaluationsUser::updateOrCreate(['evaluator_id' => $value, 'researcha_application_id' => $data['research_id']]);

            }


            if (!$EvaluationsUser) {

                return response()->json([
                    'success' => FALSE,
                    'message' => "حدث حطأ أثناء الإدخال"
                ]);
            }

            return response()->json([
                'success' => TRUE,
                'message' => "تم الإدخال بنجاح",
                'research' => $EvaluationsUser


            ]);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['user_id'] = Auth::id();
        $data['is_pay'] = 1;
        if (isset($data['is_commitment']) && $data['is_commitment'] == 1) {
            $request->validate([
                "research_money_file" => "required",

            ]);
        } else {
            $request->validate([
                "research_money_file" => "required",
                "research_file" => "required",//|mimetypes:application/pdf
                "research_title" => "required",//|mimetypes:application/pdf
            ]);
        }

        if ($request->research_money_file && $request->file()) {

            $fileName = time() . '_' . $request->research_money_file->getClientOriginalName();
            $filePath = $request->file('research_money_file')->storeAs('research_money_file', $fileName);
            $data['research_money_file'] = $fileName;

        }
        if ($request->research_file && $request->file()) {

            $fileName = time() . '_' . $request->research_file->getClientOriginalName();
            $filePath = $request->file('research_file')->storeAs('research_file', $fileName);
            $data['research_file'] = $fileName;

        }
        $data['app_status'] = 1;

        $research = ResearchApplication::updateOrCreate(['id' => $data['id']], $data);

        if (!$research) {

            return response()->json([
                'success' => FALSE,
                'message' => "حدث حطأ أثناء الإدخال"
            ]);
        }

        return response()->json([
            'success' => TRUE,
            'message' => "تم الإدخال بنجاح",
            'research' => $research


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
            $fileName = time() . '_' . $request->res_link->getClientOriginalName();
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
