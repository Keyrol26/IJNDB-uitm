<?php

namespace App\Http\Controllers;

use App\Models\Icl;
use App\Models\Ot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Storage;
use PHPExcel_IOFactory;

class SingleMethodCotroller extends Controller
{
    public function icl(Request $request)
    {
        $filterinbill = $request->query('filterinbill');
        $update = DB::table('updates')
            ->first();
        $req = $request->all();

        if ((!empty($filterinbill))) {
            $data = Icl::with("patient")->with("episode")
                ->whereHas('patient', function ($query) use ($filterinbill) {
                    $query->where('mrn', 'like', '%' . $filterinbill . '%')
                        ->orwhere('name', 'like', '%' . $filterinbill . '%');
                })
                ->OrwhereRelation('episode', 'episode_no', 'like', '%'.$filterinbill.'%')
                // ->whereHas('episode', function ($query) use ($filterinbill) {
                //     $query->where('episode_no', 'like', '%' . $filterinbill . '%');
                // })
                ->sortable()
                ->paginate(10);
        } else {
            $data = Icl::with('patient', 'episode')
                // join('patients', 'icls.patient_id', '=', 'patients.id')
                //     ->join('episodes', 'icls.episode_id', '=', 'episodes.id')
                ->sortable()
                ->paginate(10);
        }
        return view('icl', compact('data', 'req', 'update'));
    }
}
