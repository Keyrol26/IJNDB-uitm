<?php

namespace App\Http\Controllers;

use App\Models\Mhd;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MhdController extends Controller
{

  public function showmhd(Request $request)
  {
    $count = Mhd::join('patients', 'mhds.patient_id', '=', 'patients.id')
      ->count();
    $req = $request->all();
    $update = DB::table('updates')
      ->first();
    $filtermhd = $request->query('filterpatient');


    if ((!empty($filtermhd))) {
      $data = Mhd::with("patient")
        // ->leftjoin('patients', 'mhds.patient_id', '=', 'patients.id')
        ->OrwhereHas('patient', function ($query) use ($filtermhd) {
          $query->where('mrn', 'like', '%' . $filtermhd . '%')
            ->orwhere('name', 'like', '%' . $filtermhd . '%');
        })
        ->Orwhere('mhds.episode_no', 'like', '%' . $filtermhd . '%')
        // ->orwhere('patients.mrn', 'like', '%' . $filtermhd . '%')
        // ->orwhere('patients.name', 'like', '%' . $filtermhd . '%')
        ->orderby(DB::raw("STR_TO_DATE(mhds.recruitdate, '%d/%m/%Y')"), 'DESC')
        ->sortable()
        ->paginate(10);
    } else {


      $data = Mhd::with("patient")
        // ->OrwhereHas('patient', function ($query)  {
        //   $query->sortable();
        // })
        // join('patients', 'mhds.patient_id', '=', 'patients.id')
        // ->orderby('mhds.recruitdate', 'desc')
        ->orderby(DB::raw("STR_TO_DATE(mhds.recruitdate, '%d/%m/%Y')"), 'DESC')
        // ->orderBy(DB::raw("DATE_FORMAT(mhds.recruitdate,'%d/%m/%Y')"), 'DESC')
        ->sortable()
        ->paginate(10);
    }

    return view('mhdlisting', compact('data', 'req', 'update', 'count'));
  }
  public function mhdstore(Request $request)
  {
    $data = new Mhd([
      "patient_id" => $request->patient_id,
      "episode_no" => $request->episode_no,
      "source" => $request->source,
      "status" => $request->status,
      "deliverqtt" => $request->deliverqtt,
      "recruitdate" => $request->recruitdate,
      "deliverydate" => $request->deliverydate,
      "trackingno" => $request->trackingno,
      "remarks" => $request->remarks,
      "address" => $request->address,
      "city" => $request->city,
      "postcode" => $request->postcode,
      "state" => $request->state,
      "phoneno" => $request->phoneno,

    ]);
    $data->save();
    return redirect("mhd")->with('mhdadd', 'MHD Have been Add Succesfully');;
  }


  public function getMhdDetails($empid = 0)
  {
    $employee = Mhd::with('patient')
      ->where('patient_id', $empid)
      ->first();


    $html = "test";
    if (!empty($employee)) {
      $html = "
         <div class='row g-0'>
         <div class='col-md-8 border-right' style='border-right:2px solid #aeaeae'>
         <div class='status p-3'>
             <table class='table table-borderless'>
               <tbody>
                 <tr>
                   <td>
                       <div class='d-flex flex-column'>
                         <span class='heading d-block'>Home Number</span>
                         <input type='text' class='form-control'  value=' $employee->homeno ' disabled>
                       </div>
                   </td>
                   <td>
                        <div class='d-flex flex-column'>
                         <span class='heading d-block'>Phone Number</span>
                         <input type='text' class='form-control'  value=' $employee->phoneno ' disabled>
                       </div>
                   </td>
                  <tr>
                  </tr>
                   <td colspan='2'>
                       <div class='d-flex flex-column'>
                         <span class='heading d-block'>Address</span>
                         <textarea rows='3' cols='50' class='form-control'style='width: 90%' disabled> $employee->address </textarea>
                       </div>
                   </td>
                 </tr>
                 <tr>
                   <td>
                       <div class='d-flex flex-column'>
                         <span class='heading d-block'>City</span>
                         <input type='text' class='form-control'  value=' $employee->city ' disabled>
                       </div>
                   </td>
                   <td>
                       <div class='d-flex flex-column'>
                           <span class='heading d-block'>Postcode</span>
                           <input type='text' class='form-control'  value=' $employee->postcode ' disabled>
                       </div>
                   </td>
                 </tr>
                 <tr>
                    <td>
                        <div class='d-flex flex-column'>
                           <span class='heading d-block'>State</span>
                           <input type='text' class='form-control'  value=' $employee->state ' disabled>
                       </div>
                    </td>
                 </tr>
               </tbody>
             </table>
         </div>
     </div>
     <div class='col-md-4'>
         <br><br>
         <div class='p-2 text-center'>
         <br>
         <br>
             <div class='profile'>
                  <span class='heading d-block'>MRN</span>
                  <span  class='subheadings '>" . $employee->patient->mrn . "</span>
                  <br>
                  <span class='heading d-block'>Name</span>
                 <span  class='subheadings '>" . $employee->patient->name . "</span>
             </div>
             <div class='about-doctor'>
                 <table class='table table-borderless'>
                   <tbody>
                      <tr>
                         <td>
                           <div class='d-flex flex-column'>
                              <span class='heading d-block'>Sex</span>
                              <span class='subheadings'>" . $employee->patient->sex . "</span>
                           </div>
                         </td>
                         <td>
                           <div class='d-flex flex-column'>
                             <span class='heading d-block offset-md-1'>DOB</span>
                             <span class='subheadings'>" . $employee->patient->dob . "</span>
                           </div>
                         </td>
                       </tr>
                   </tbody>
                </table>
             </div>
         </div>
     </div>
     </div>";
    }
    $response['html'] = $html;

    return response()->json($response);
  }
}
