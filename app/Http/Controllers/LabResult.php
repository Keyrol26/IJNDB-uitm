<?php

namespace App\Http\Controllers;
use App\Models\Episode;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class LabResult extends Controller
{
    public function labreport(Request $request)
   {
      $id = $request->id;
      $epsid = $request->epsid;
      $date =  now()->format('d F Y');

      // $getepisodeid = $request->query('getepisodeno');
      $data = Episode::
         // ->join('laboratorys', 'laboratorys.episode_id', '=', 'episodes.id')
         where('id', $epsid)
         ->with('laboratory', 'patient')
         ->first();

      $lab = Laboratory::where('episode_id', $epsid)
         ->select('episodes.episode_no', 'episodes.episode_date', 'lab_no', 'order_date', 'episode_id')
         ->leftJoin('episodes', 'episodes.id', '=', 'laboratorys.episode_id')
         ->groupBy('lab_no1')
         ->orderBy('order_date', 'desc')
         ->get();

      $labresult = Laboratory::
         // with('patient')
         leftJoin('patients', 'patients.id', '=', 'laboratorys.patient_id')
         ->leftJoin('episodes', 'episodes.id', '=', 'laboratorys.episode_id')
         ->where('lab_no', $id)
         ->get();

      $testset = Laboratory::
         // with('patient')
         leftJoin('patients', 'patients.id', '=', 'laboratorys.patient_id')
         ->leftJoin('episodes', 'episodes.id', '=', 'laboratorys.episode_id')
         ->where('lab_no', $id)
         ->select('laboratorys.test_set')
         ->groupby('laboratorys.test_set')
         ->get();

      //  dd($testset);
      return view('currentpatient/laboratory/labreport',compact('data', 'lab', 'labresult', 'date','testset')
      );
   }
}
