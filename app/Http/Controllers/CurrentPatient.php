<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Laboratory;
use App\Models\Medication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrentPatient extends Controller
{
    public function currentpatient(Request $request)
    {
        $update = DB::table('updates')
            ->first();
        $req = $request->all();
        // $counts = Episode::where('episodes.episode_status', 'like', 'current')
        //     ->count();

        $ward = Episode::with('patient')
            ->where('episodes.episode_status', 'like', 'current')
            ->where('episodes.episode_type', 'like', 'inpatient')
            ->groupBy('episodes.ward')
            ->whereNotnull('episodes.ward')
            ->get('episodes.ward');
        //  dd($data);

        $filterward = $request->query('filterward');

        if (!empty($filterward)) {
            $data = Episode::with('patient')
                ->select('episodes.*', 'medications.episode_id as med_id', 'laboratorys.episode_id as lab_id')
                ->leftjoin('medications', 'episodes.id', '=', 'medications.episode_id')
                ->leftJoin('laboratorys', 'episodes.id', '=', 'laboratorys.episode_id')
                ->where('episodes.episode_status', 'like', 'current')
                ->where('episodes.episode_type', 'like', 'inpatient')
                ->where('episodes.ward', 'like', '%' . $filterward . '%')
                ->orderby('episodes.ward', 'asc')
                ->orderby('episodes.bed', 'asc') 
                ->groupBy('id')
                // ->sortable()
                ->paginate(10);
        } else {
            $data = Episode::with('patient')
                ->select('episodes.*', 'medications.episode_id as med_id', 'laboratorys.episode_id as lab_id')
                ->leftjoin('medications', 'episodes.id', '=', 'medications.episode_id')
                ->leftJoin('laboratorys', 'episodes.id', '=', 'laboratorys.episode_id')
                ->where('episodes.episode_status', 'like', 'current')
                ->where('episodes.episode_type', 'like', 'inpatient')
                ->orderby('episodes.ward', 'asc')
                ->orderby('episodes.bed', 'asc')
                ->groupBy('id')
                // ->sortable()
                ->paginate(10);
        }

        return view('currentpatient/currentpatient', compact('data', 'ward', 'filterward', 'req', 'update'));
    }

    public function medic($id)
    {
        $data = Episode::with('medic', 'patient')
            ->where('id', $id)
            ->first();

        //    dd($data->medication);
        return view('currentpatient/medications', compact('data'));
    }

    public function lab($id)
    {
        $data = Episode::
            // ->join('laboratorys', 'laboratorys.episode_id', '=', 'episodes.id')
            where('id', $id)
            ->with('laboratory', 'patient')
            ->first();

        $lab = Laboratory::where('episode_id', $id)
            ->select('episodes.episode_no', 'episodes.episode_date', 'lab_no', 'order_date', 'episode_id')
            ->leftJoin('episodes', 'episodes.id', '=', 'laboratorys.episode_id')
            ->groupBy('lab_no1')
            ->orderBy('order_date', 'desc')
            ->get();
        //   dd($id);

        // dd($lab);
        return view('currentpatient/laboratory/labresult', compact('data', 'lab'));
    }
}
