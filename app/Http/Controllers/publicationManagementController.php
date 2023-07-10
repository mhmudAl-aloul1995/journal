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

class publicationManagementController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:publicationManagement-list|publicationManagement-create|publicationManagement-edit|publicationManagement-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:publicationManagement-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:publicationManagement-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:publicationManagement-delete', ['only' => ['destroy']]);

    }


    public function index()
    {
        $evaluations = User::all();
        $user = User::where('id', '!=', 1)->get();

        $data['user'] = $user;
        $data['evaluations'] = $evaluations;
        return View::make('publicationManagement', $data);
    }

    public function showAllApplication($id)
    {


        $data['id'] = $id;
        $data['user'] = ResearchApplication::find($id)->user;
        $data['evaluations'] = ResearchApplication::with('researcher_notes')->find($id);
        $data['answer_evaluation_6'] = ['', 'صالح للنشر كما هو', 'صالح للنشر بعد إجراءات مرفقة', 'صالح للنشر بعد إجراءات تعديلات جوهرية مرفقة', ' غير صالح للنشر'];

        return View::make('showAllApplication', $data);

    }

    public function show(Request $request)
    {
        $data = $request->all();

        $users = ResearchApplication::query()->with(['user', 'evaluations_users.evaluators']);

        if (isset($data['id']) && $data['id'] != null) {
            $users->where('id', $data['id']);

        }
        $status = ['', 'info', 'warning', 'danger', 'primary'];
        $status1 = ['', 'ارفاق الطلب', 'تحكيم البحث', 'تدقيق لغوي', 'الموافقة على النشر'];
        $changeStatus = [1 => 'الموافقة على الطلب', 2 => 'لحنة تحكيم', 3 => 'تدقيق لغوي', 4 => 'جاهز للنشر'];


        $users->orderBy('research_applications.id', 'desc');
        return Datatables::of($users->get())
            ->addColumn('evaluators', function ($ctr) {

                if ($ctr->evaluations_users->count() == 0) {
                    return null;
                }

                $evaluators = '';
                $color = ['#e91e63', '#4caf50', '#00bcd4', '#ff5722', '#9c27b0', '#cddc39', '#4caf50', '#009688', '#673ab7', '#4caf50',];

                foreach ($ctr->evaluations_users as $key => $value) {

                    $evaluators .= '<span  style=" font-size:70%;  margin:1px; color:white;background-color:' . $color[$key] . '" class=" btn  btn-group-red">' . $value->evaluators->name . '</span>';
                }
                return $evaluators;


                return '<a target="_blank" href="' . $ctr->res_file . '">الرابط</a>';
            })
            ->addColumn('prf_file', function ($ctr) {
                if ($ctr->proofreader_file == null) {
                    return null;
                }
                return '<a target="_blank" href="' . $ctr->prf_file . '">الرابط</a>';


            })
            ->addColumn('res_file_new', function ($ctr) {
                if ($ctr->res_file_new_updated == null) {
                    return null;
                }

                return '<a target="_blank" href="' . $ctr->res_file_new_updated . '">الرابط</a>';
            })
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
                if ($ctr->research_file == null) {
                    return null;
                }
                return '<a target="_blank" href="' . $ctr->res_file . '">الرابط</a>';
            })
            ->addColumn('res_money', function ($ctr) {
                if ($ctr->research_money_file == null) {
                    return null;
                }
                return '<a target="_blank" href="' . $ctr->res_money . '">الرابط</a>';

            })
            ->addColumn('app_status', function ($ctr) use ($status, $status1) {
                return ' <span ondblclick="showResearchApplicationStatusModal(' . $ctr->id . ',' . $ctr->app_status . ',' . $ctr->evaluations_users->pluck('evaluator_id') . ')" class="label label-sm label-' . $status[$ctr->app_status] . '">' . $status1[$ctr->app_status] . '</span>';

            })
            ->addColumn('action', function ($ctr) use ($changeStatus) {
                $pay = $ctr->app_status == 1 ? '<li><a onclick="showResearchApplicationPayModal(' . $ctr->id . ',' . $ctr->is_pay . ')" href="javascript:;">
                                                                    <i class="icon-puzzle"></i> حالة الدفع </a>
                                                            </li>' : '';
                return '<div class="btn-group">
                                                        <button  class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> إجراء
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul  class="dropdown-menu" role="menu">
' . $pay . '
                                                            <li>
                                                                <a target="_blank"  href="' . url('') . '/showAllApplication/' . $ctr->id . '">
                                                                    <i class="icon-eye"></i>  الطلب  </a>
                                                            </li>
                                                                  <li>
                                                                <a onclick="showModal(`researchApplication`,' . $ctr->id . ')" href="javascript:;" >
                                                                    <i class="icon-eye"></i>  ملف البحث  </a>
                                                            </li>
                                                            </ul>
                                                    </div>';
            })
            ->rawColumns(['res_file_new', 'prf_file' => 'prf_file', 'action' => 'action', 'res_file' => 'res_file', 'res_money' => 'res_money', 'app_status' => 'app_status', 'is_pay' => 'is_pay', 'evaluators' => 'evaluators'])
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

    /*    public function researchApplicationStatus(Request $request)
        {
            $data = $request->all();


            //  $data['user_id'] = Auth::id();
            if ($data['app_status'] == 2) {


                $EvaluationsUser = null;
                foreach ($data['user_id'] as $value) {
                    $user = User::find($value)->update(['password' => Hash::make('123456')]);
                    $EvaluationsUser = EvaluationsUser::updateOrCreate(['evaluator_id' => $value, 'research_application_id' => $data['research_id']]);

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
        }*/

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

            $fileName = time() . '_research_money_file';
            $filePath = $request->file('research_money_file')->storeAs('research_money_file', $fileName);
            $data['research_money_file'] = $fileName;

        }
        if ($request->research_file && $request->file()) {

            $fileName = time() . '_research_file';
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
            $fileName = time() . '_res_link';
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


        $research = ResearchApplication::find($id)->delete();
        if ($research) {
            return response()->json([
                'message' => 'تمت العملية بنجاح',
                'success' => TRUE,
            ]);
        }

        return response(['message' => 'فشلت العملية'], 500);
    }


}
