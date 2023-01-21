<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class OtController extends Controller
{
  public function ot(Request $request)
  {
    if (Auth::guest()) {
      return redirect()->route('/');
  }
    $filterinbill = $request->query('filterinbill');
    $update = DB::table('updates')
      ->first();
    $req = $request->all();

    if ((!empty($filterinbill))) {
      $data = Ot::with('patient')
        ->with('episode')
        // leftjoin('episodes', 'ots.episode_id', '=', 'episodes.id')
        //   ->Orwhere('episodes.episode_no', 'like', '%' . $filterinbill . '%')
        ->whereHas('patient', function ($query) use ($filterinbill) {
          $query->where('mrn', 'like', '%' . $filterinbill . '%')
            ->Orwhere('name', 'like', '%' . $filterinbill . '%');
        })
        ->OrwhereRelation('episode', 'episode_no', 'like', '%'.$filterinbill.'%')
        ->sortable()
        ->paginate(10);
    } else {
      $data = Ot::with('patient')
        ->with('episode')
        ->whereHas('episode', function ($query)  {
          $query->whereNotNull('episode_no');
        })
        // ->whereNotNull('episode', 'episode_no')
        // ->join('episodes', 'ots.episode_id', '=', 'episodes.id')
        ->sortable()
        ->paginate(10);
    }
    // dd($data);
    return view('ot', compact('data', 'req', 'update'));
  }
  // public function getOtDetails($empid = 0)
  // {
  //   $employee = Ot::with('patient')
  //     ->where('patient_id', $empid)
  //     ->first();
  //   $html = "test";
  //   if (!empty($employee)) {
  //     $remarks = $employee->remarks;
  //     if (($employee->remarks) == '')
  //       $remarks = "No Informations";
  //     $remarks_1 = $employee->remarks_1;
  //     if (($employee->remarks_1) == '')
  //       $remarks_1 = "No Informations";
  //     $waiting_list = $employee->waiting_list;
  //     if (($employee->waiting_list) == '')
  //       $waiting_list = "No Informations";

  //     $html = "
  //        <div class='row g-0'>
  //        <div class='col-md-8' >
  //        <div class='status p-3'>
  //            <table class='table table-borderless'>
  //              <tbody>
  //                <tr>
  //                  <td>
  //                      <div class='d-flex flex-column'>
  //                        <span class='heading d-block'>First Remarks</span>
  //                        <span class='subheadings'>" . $remarks . "</span>
  //                      </div>
  //                  </td>
  //                 </tr>
  //                 <tr>
  //                  <td>
  //                      <div class='d-flex flex-column'>
  //                        <span class='heading d-block'>Second Remarks</span>
  //                        <span class='subheadings'>" . $remarks_1 . "</span>
  //                      </div>
  //                  </td>
  //                 </tr>
  //                 <tr>
  //                  <td>
  //                      <div class='d-flex flex-column'>
  //                        <span class='heading d-block'>Waiting List Or Surgical Recommendation</span>
  //                        <span class='subheadings'>" . $waiting_list . "</span>
  //                      </div>
  //                  </td>
  //                </tr>
  //              </tbody>
  //            </table>
  //        </div>
  //    </div>
  //    </div>
  //    </div>";
  //   }
  //   $response['html'] = $html;

  //   return response()->json($response);
  // }
}
