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
        ->OrwhereHas('patient', function ($query) use($filtermhd) {
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


















  // public function getMhdDetails($empid = 0)
  // {
  //   $employee = Mhd::with('patient')
  //     ->where('patient_id', $empid)
  //     ->first();


  //   $html = "test";
  //   if (!empty($employee)) {
  //     $html = "
  //        <div class='row g-0'>
  //        <div class='col-md-8 border-right' style='border-right:2px solid #aeaeae'>
  //        <div class='status p-3'>
  //            <table class='table table-borderless'>
  //              <tbody>
  //                <tr>
  //                  <td>
  //                      <div class='d-flex flex-column'>
  //                        <span class='heading d-block'>Home Number</span>
  //                        <span class='subheadings'>" . $employee->homeno . "</span>
  //                        <input type='text' class='form-control'  value=' $employee->homeno ' disabled>
  //                      </div>
  //                  </td>
  //                  <td>
  //                       <div class='d-flex flex-column'>
  //                        <span class='heading d-block'>Phone Number</span>
  //                        <span class='subheadings'>" . $employee->phoneno . "</span>
  //                      </div>
  //                  </td>
  //                 <tr>
  //                 </tr>
  //                  <td colspan='2'>
  //                      <div class='d-flex flex-column'>
  //                        <span class='heading d-block'>Address</span>
  //                        <textarea rows='3' cols='50' class='form-control'style='width: 80%' disabled> $employee->address </textarea>
  //                        <input type='text' class='form-control'style='width: 100%' value=' $employee->address '>
  //                        <span class='subheadings'>" . $employee->address . "</span>
  //                      </div>
  //                  </td>
  //                </tr>
  //                <tr>
  //                  <td>
  //                      <div class='d-flex flex-column'>
  //                        <span class='heading d-block'>City</span>
  //                        <span class='subheadings'>" . $employee->city . "</span>
  //                      </div>
  //                  </td>
  //                  <td>
  //                      <div class='d-flex flex-column'>
  //                          <span class='heading d-block'>Postcode</span>
  //                          <span class='subheadings'>" . $employee->postcode . "</span>
  //                      </div>
  //                  </td>
  //                </tr>
  //                <tr>
  //                   <td>
  //                       <div class='d-flex flex-column'>
  //                          <span class='heading d-block'>State</span>
  //                          <span class='subheadings'>" . $employee->state . "</span>
  //                      </div>
  //                   </td>
  //                </tr>
  //              </tbody>
  //            </table>
  //        </div>
  //    </div>
  //    <div class='col-md-4'>
  //        <br><br>
  //        <div class='p-2 text-center'>
  //            <div class='profile'>
  //                 <span class='heading d-block'>MRN</span>
  //                 <span  class='subheadings '>" . $employee->patient->mrn . "</span>
  //                 <br>
  //                 <span class='heading d-block'>Name</span>
  //                <span  class='subheadings '>" . $employee->patient->name . "</span>
  //            </div>
  //            <div class='about-doctor'>
  //                <table class='table table-borderless'>
  //                  <tbody>
  //                     <tr>
  //                        <td>
  //                          <div class='d-flex flex-column'>
  //                             <span class='heading d-block'>Sex</span>
  //                             <span class='subheadings'>" . $employee->patient->sex . "</span>
  //                          </div>
  //                        </td>
  //                        <td>
  //                          <div class='d-flex flex-column'>
  //                            <span class='heading d-block'>DOB</span>
  //                            <span class='subheadings'>" . $employee->patient->dob . "</span>
  //                          </div>
  //                        </td>
  //                      </tr>
  //                  </tbody>
  //               </table>
  //            </div>
  //        </div>
  //    </div>
  //    </div>";
  //   }
  //   $response['html'] = $html;

  //   return response()->json($response);
  // }

  // public function getMhdDetails2($empid = 0)
  // {

  //    $employee = Patient::find($empid);

  //    $html = "";
  //    if (!empty($employee)) {
  //       $html =
  //          "<form >
  //          <h5 class='card-title'>Delivery Info</h5>
  //          <div class='row'>
  //              <div class='col-lg-2 col-md-5 fw-bolder' >MRN</div>
  //              <div class='col-lg-6 col-md-5 fw-bolder'>Name</div>
  //              <div class='col-lg-2 col-md-5 fw-bolder'>Sex</div>
  //              <div class='col-lg-2 col-md-5 fw-bolder'>Date Of Birth</div>
  //          </div>
  //          <div class='row'>
  //              <div class='col-lg-2 col-md-5'style='font-family:verdana'>" . $employee->mrn . "
  //              </div>
  //              <div class='col-lg-6 col-md-5'style='font-family:verdana'>" . $employee->name . "
  //              </div>
  //              <div class='col-lg-2 col-md-5' style='font-family:verdana'>" . $employee->sex . "
  //              </div>
  //              <div class='col-lg-2 col-md-5'style='font-family:verdana'>" . $employee->dob . "
  //              </div>
  //              <hr>
  //          </div>
  //      </form>
  //      <form> 
  //          <div class='row mb-2'>
  //             <label class='col-sm-3 col-form-label'><b>Home Number</b></label>
  //             <div class='col-sm-6'>
  //                <input type='text' value='" . $employee->homeno . "' class='form-control' style='font-family:verdana'>
  //             </div>
  //          </div>
  //          <div class='row mb-2'>
  //             <label class='col-sm-3 col-form-label'><b>Mobile Number</b></label>
  //             <div class='col-sm-6'>
  //                <input type='text' value='" . $employee->phoneno . "' class='form-control' style='font-family:verdana'>
  //             </div>
  //          </div>
  //          <div class='row mb-2'>
  //             <label class='col-sm-3 col-form-label'><b>Address</b></label>
  //             <div class='col-sm-6'>
  //                <input type='text' value='" . $employee->address . "' class='form-control' style='font-family:verdana'>
  //             </div>
  //          </div>
  //          <div class='row mb-2'>
  //             <label class='col-sm-3 col-form-label'><b>City</b></label>
  //             <div class='col-sm-6'>
  //                <input type='text' value='" . $employee->city . "' class='form-control' style='font-family:verdana'>
  //             </div>
  //          </div>
  //          <div class='row mb-2'>
  //             <label class='col-sm-3 col-form-label'><b>Postcode</b></label>
  //             <div class='col-sm-6'>
  //                <input type='text' value='" . $employee->postcode . "' class='form-control' style='font-family:verdana'>
  //             </div>
  //          </div>
  //          <div class='row mb-2'>
  //             <label class='col-sm-3 col-form-label'><b>State</b></label>
  //             <div class='col-sm-6'>
  //                <input type='text' value='" . $employee->state . "' class='form-control' style='font-family:verdana'>
  //             </div>
  //          </div>
  //      </form>
  //      ";
  //    }
  //    $response['html'] = $html;

  //    return response()->json($response);
  // }



  // public function storemhd(Request $request)
  // {
  //    $mhd = new Mhd([
  //       "patient_id" => $request->patientid,
  //       "episode_id" => $request->episodeid,
  //       "source" => $request->source,
  //       "status" => $request->status,
  //       "deliverqtt" => $request->deliverqtt,
  //       "recruitdate" => $request->recruitdate,
  //       "devilerydate" => $request->devilerydate,
  //       "approxdate" => $request->approxdate,
  //       "pickupdate" => $request->pickupdate,
  //       "trackingno" => $request->trackingno,
  //       "returndate" => $request->returndate,
  //       "canceldate" => $request->canceldate,
  //       "actiondate" => $request->actiondate,
  //       "holddate" => $request->holddate,
  //       "remarks" => $request->remarks,
  //       "slip" => $request->slip,
  //    ]);
  //    $mhd->save();
  //    return back();
  // }
}
