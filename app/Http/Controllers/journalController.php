<?php

namespace App\Http\Controllers;

use App\Category;
use App\journal;

use App\JournalMembers;
use App\user;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Project;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Enginges\EloquentEngine;
use Illuminate\Support\Facades\DB;
use View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class journalController extends Controller
{


    public function index()
    {

        $categories = Category::all();
        $users = user::where('id', '!=', '1')->get();
        return View::make('journal', compact('categories', 'users'));


    }


    public function datatableJournal(Request $request)
    {
        $data = $request->all();


        $users = Journal::query()->with('editorial_board_vice','editorial_board');

        return Datatables::of($users)
            ->addColumn('action', function ($ctr) {

                return '<div class="btn-group">
                                                        <button  class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> إجراء
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul  class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a onclick="showModal(`journal`,' . $ctr->id . ')" href="javascript:;">
                                                                    <i class="icon-pencil"></i> تعديل </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="deleteThis(`journal`,' . $ctr->id . ')"  href="javascript:;">
                                                                    <i class="icon-trash"></i> حذف  </a>
                                                            </li>
                                                            </ul>
                                                    </div>';
            })
            ->rawColumns(['action' => 'action', 'journal_img' => 'journal_img'])
            ->make(true);
    }

    public function show(Request $request, $id)
    {

        $journal = Journal::find($id);
        if ($journal) {
            return response()->json([
                'journal' => $journal
            ]);
        }
        return response(['message' => 'فشلت العملية'], 500);

    }

    public function store(Request $request)
    {
        $data = $request->all();

        unset($data['id']);
        $data['user_id'] = Auth::id();
        $journal = Journal::create($data);
        if ($data['members']) {

            foreach ($data['members'] as $value) {
                if ($value != null) {
                    JournalMembers::create(['journal_id' => $journal->id, 'user_id' => $value, 'type' => 0]);
                }
            }
        }
        if ($data['consaltants']) {

            foreach ($data['consaltants'] as $value) {
                if ($value != null) {
                    JournalMembers::create(['journal_id' => $journal->id, 'user_id' => $value, 'type' => 1]);
                }
            }
        }
        if (!$journal) {

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

    public function update_journal(Request $request)
    {
        $data = $request->all();
        $journal = Journal::find($data['id']);
        $journal->update($data);


        if (!$journal) {
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


        if (Journal::find($id)->delete()) {
            return response()->json([
                'success' => TRUE,
                'message' => "تم الحذف بنجاح"
            ]);
        }

        return response(['message' => 'فشلت العملية'], 500);
    }


}
