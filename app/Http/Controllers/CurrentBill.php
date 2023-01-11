<?php

namespace App\Http\Controllers;
use App\Models\billInpatient;
use App\Models\billOutpatient;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\DB;

class CurrentBill extends Controller
{
    public function billinpatient(Request $request)
    {
        $filterinbill = $request->query('filterinbill');
        $update = DB::table('updates_1')
            ->first();
        $req = $request->all();
        
        if ((!empty($filterinbill))) {
            $data = billInpatient::sortable()
            ->where('mrn', 'like', '%' . $filterinbill. '%')
            ->orwhere('name', 'like', '%' . $filterinbill. '%')
            ->orwhere('episode_no', 'like', '%' . $filterinbill. '%')
            ->paginate(10);
        } else {
            $data = billInpatient::sortable()->paginate(10);
        }
        return view('currentbills/billinpatient',compact('data','req','update'));
    }
    public function billoutpatient(Request $request)
    {
        $filteroutbill = $request->query('filteroutbill');
        $update = DB::table('updates_1')
            ->first();
        $req = $request->all();
        
        if ((!empty($filteroutbill))) {
            $data = billOutpatient::sortable()
            ->where('mrn', 'like', '%' . $filteroutbill. '%')
            ->orwhere('name', 'like', '%' . $filteroutbill. '%')
            ->orwhere('episode_no', 'like', '%' . $filteroutbill. '%')
            ->paginate(10);
        } else {
            $data = billOutpatient::sortable()->paginate(10);
        }
        return view('currentbills/billoutpatient',compact('data','req','update'));
    }
    

    

}
