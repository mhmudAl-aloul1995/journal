<?php

namespace App\Http\Controllers;

use App\AllocationDonor;
use App\Models\Folder;
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
use App\Models\ResearcherEvaluation;
use App\Models\ResearchApplicationNote;

class evaluatorController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:evaluator-list|evaluator-create|evaluator-edit|evaluator-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:evaluator-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:evaluator-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:evaluator-delete', ['only' => ['destroy']]);

    }

    public function index()
    {


        return View::make('evaluator');


    }

    public function edit(Request $request, $id)
    {

        $researchEvaluation = ResearcherEvaluation::where('id', $id)->first();

        if ($researchEvaluation) {
            return response()->json([
                'evaluator' => $researchEvaluation,
                'success' => TRUE,
            ]);
        }
        return response(['message' => 'فشلت العملية'], 500);

    }


    public function show(Request $request)
    {
        $data = $request->all();

        $users = ResearchApplication::query();
        $users->where('app_status', '2');
        $users->whereHas('evaluations_users', function ($q) {
            $q->where('evaluator_id', Auth::id());
        });

        $users->withCount(['user', 'evaluator_evaluations', 'evaluator_evaluations as evaluator_count' => function ($query) {
            $query->where('evaluator_id', Auth::id());
        }]);

        $users->orderBy('research_applications.id', 'desc');

        return Datatables::of($users)
            ->addColumn('res_file', function ($ctr) {
                return '<a target="_blank" href="' . $ctr->res_file . '">الرابط</a>';
            })
            ->addColumn('res_money', function ($ctr) {
                return '<a target="_blank" href="' . $ctr->res_money . '">الرابط</a>';

            })
            ->addColumn('showNotes', function ($ctr) {
                return '<span onclick="showNotes(this,' . $ctr->id . ')" >' . $ctr->id . '</span>';

            })
            ->addColumn('action', function ($ctr) {
                //  $researcherEvaluation = ResearcherEvaluation::where(['evalautor_id' => Auth::id(), 'research_applications' => $ctr->id])->first();


                $action = $ctr->evaluator_count > 0 ? '<span style="color: white;"  class="btn btn-danger" onclick="showModal(`evaluator`,' . $ctr->evaluator_evaluations->id . ')" >' : '<span style="color: white;"  class="btn btn-danger" onclick="resercherEvaluation(' . $ctr->id . ')">';

                return $action . '<i class="icon-badge"></i> تقييم</span>

                                                        ';
            })
            ->rawColumns(['showNotes' => 'showNotes', 'action' => 'action', 'res_file' => 'res_file', 'res_money' => 'res_money', 'app_status' => 'app_status', 'is_pay' => 'is_pay'])
            ->setRowId(function ($user) {
                return "app_" . $user->id;
            })
            ->make(true);
    }

    public function researchAppNoteShow(Request $request)
    {
        $data = $request->all();

        $is_researcher = Auth::user()->hasAnyRole(['باحث']);
        $users = ResearchApplicationNote::query();
        $research_application_id = isset($data['research_application_id']) && $data['research_application_id'] != null ? $data['research_application_id'] : '';

        if (isset($data['show_all']) && $data['show_all']==0) {
            $users->whereHas('evaluator', function ($q) {
                $q->where('evaluator_id', Auth::id());
            });

        }

        $users->whereHas('research_application', function ($q) use ($research_application_id) {
            $q->where('research_application_id', $research_application_id);
        });


        return Datatables::of($users)
            ->addColumn('is_done', function ($ctr) {
                $is_done = $ctr->is_done == 1 ? "نعم" : "لا";
                $is_done_class = $ctr->is_done == 0 ? "label-danger" : "label-success";
                return "<span style='width: 500px;' class=' label label-large {$is_done_class}'>{$is_done}</span>";

            })
            ->addColumn('note_file', function ($ctr) {
                return '<a target="_blank" href="' . $ctr->note_file_updated . '">الرابط</a>';
            })
            ->addColumn('action', function ($ctr) use ($is_researcher) {
                $action = '';
                if ($is_researcher == true) {
                    $action = ' <li>
                                                                <a onclick="setIsDone(`1`,' . $ctr->id . ')" href="javascript:;">
                                                                    <i class="fa fa-check-square"></i> تم التنفيذ </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="setIsDone(`0`,' . $ctr->id . ')"  href="javascript:;">
                                                                    <i class="fa fa-times"></i> لم يتم التنفيذ  </a>
                                                            </li>';
                } else {
                    $action = '
                                                            <li>
                                                                <a onclick="deleteThis(`researchAppNoteDelete`,' . $ctr->id . ')"  href="javascript:;">
                                                                    <i class="icon-trash"></i> حذف  </a>
                                                            </li>';
                }
                return '<div class="btn-group">
                                                        <button  class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> إجراء
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul  class="dropdown-menu" role="menu">
                                                           ' . $action . '
                                                            </ul>
                                                    </div>';
            })
            ->rawColumns(['note_file' => 'note_file', 'action' => 'action', 'is_done' => 'is_done', 'res_money' => 'res_money', 'app_status' => 'app_status', 'is_pay' => 'is_pay'])
            ->make(true);
    }

    public function addEvaluatorNotes(Request $request)
    {
        $data = $request->all();
        $data['is_done'] = 0;
        $data['evaluator_id'] = Auth::id();
        if ($request->note_file && $request->file()) {

            $fileName = time() . '_note_file' . $request->note_file->getClientOriginalExtension();
            $filePath = $request->file('note_file')->storeAs('note_file', $fileName);
            $data['note_file'] = $fileName;

        }

        $research = ResearchApplicationNote::create($data);

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

    public function store(Request $request)
    {
        $data = $request->all();

        $data['evaluator_id'] = Auth::id();
        $research = ResearcherEvaluation::create($data);

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

        $ResearcherEvaluation = ResearcherEvaluation::find($data['id']);

        $ResearcherEvaluation->update($data);


        if (!$ResearcherEvaluation) {
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

    public function researchAppNoteDelete(Request $request, $id)
    {

        $researchAppNoteDelete = ResearchApplicationNote::find($id)->delete();

        if ($researchAppNoteDelete) {
            return response()->json([
                'message' => 'تمت العملية بنجاح',
                'success' => TRUE,
            ]);
        }

        return response(['message' => 'فشلت العملية'], 500);
    }

}
