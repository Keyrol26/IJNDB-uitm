<?php

namespace App\Http\Controllers;

use App\Models\Subsidy;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubsidysController extends Controller
{


    public function showsubsidy(Request $request)
    {
        $subfilter = $request->query('subfilter');
        $update = DB::table('updates')
            ->first();
        $req = $request->all();
        // $data = Subsidy::with('patient')
        //     ->paginate(10);

        if ((!empty($subfilter))) {
            $data = Subsidy::with('patient')
                ->whereHas('patient', function ($query) use ($subfilter) {
                    $query->where('mrn', 'like', '%' . $subfilter . '%')
                        ->Orwhere('newic', 'like', '%' . $subfilter . '%')
                        ->Orwhere('name', 'like', '%' . $subfilter . '%');
                })
                ->sortable()
                ->paginate(10);
        } else {
            $data = Subsidy::with('patient')
                ->OrwhereHas('patient', function ($query) {
                    $query->whereNOtnull('id');
                })
                ->whereNOtnull('patient_id')
                ->Where('patient_id', '!=', '0')
                ->sortable()
                ->paginate(10);
        }

        // dd($data);
        return view('subsidys/subsidy', compact('data', 'req', 'update'));
    }

    public function subinfo(Request $request)
    {
        $req = $request->all();
        $id = $request->id;
        $update = DB::table('updates')
            ->first();
        $data = Subsidy::with('patient')
            ->OrwhereHas('patient', function ($query) {
                $query->whereNOtnull('id');
            })
            ->whereNOtnull('patient_id')
            ->Where('patient_id', '!=', '0')
            ->sortable()
            ->paginate(10);
        $subinfo = Patient::with('subsidy', 'subsidydpd', 'subsidydocs','subsidydata')
            ->where('id', $id)
            // ->where('id', 2)
            ->first();

        //  dd($subinfo->subsidydata);
        return view('subsidys/subsidyinfo', compact('data', 'req', 'subinfo', 'update'));
    }
}
