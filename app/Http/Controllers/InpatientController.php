<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Episode;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class InpatientController extends Controller
{
  public function showinpatient(Request $request)
  {
    if (Auth::guest()) {
      return redirect()->route('/');
  }
    $inpatientfilter = $request->query('inpatientfilter');
    $yesterday = date('Y-m-d', strtotime("-30 days"));
    $count = Episode::with('patient')
      ->where('episodes.episode_type', 'like', 'Inpatient')
      ->where('episodes.episode_status', 'like', 'Pre-Admission')
      ->having('episodes.episode_date', '>=', $yesterday)
      ->orderby('episodes.episode_date', 'Asc')
      ->count();
    $filterinbill = $request->query('filterinbill');
    $update = DB::table('updates_1')
      ->first();
    $req = $request->all();


    if ((!empty($inpatientfilter))) {
      if (is_numeric($inpatientfilter)) {
        $data = Episode::with('patient')
          ->where('episodes.episode_type', 'like', 'Inpatient')
          ->where('episodes.episode_status', 'like', 'Pre-Admission')
          ->having('episodes.episode_date', '>=', $yesterday)
          ->orderby('episodes.episode_date', 'Asc')
          ->whereRelation('patient', 'mrn', 'like', '%' . $inpatientfilter . '%')
          // ->where('episode_no', 'like', '%' . $inpatientfilter . '%' )
          ->sortable()
          ->paginate(10);
      } 
      // elseif($inpatientfilter){}

      else {
        $data = Episode::with('patient')
          ->where('episodes.episode_type', 'like', 'Inpatient')
          ->where('episodes.episode_status', 'like', 'Pre-Admission')
          ->having('episodes.episode_date', '>=', $yesterday)
          ->orderby('episodes.episode_date', 'Asc')
          ->whereRelation('patient', 'name', 'like', '%' . $inpatientfilter . '%')
          // ->where('episode_no', 'like', '%' . $inpatientfilter . '%' )
          ->sortable()
          ->paginate(10);
      }

      // ->OrwhereHas('patient', function ($query) use ($inpatientfilter) {
      //   $query
      //     ->where('episodes.episode_type', 'like', 'Inpatient')
      //     ->where('episodes.episode_status', 'like', 'Pre-Admission')
      //     ->where('mrn', 'like', '%' . $inpatientfilter . '%')
      //     ->Orwhere('name', 'like', '%' . $inpatientfilter . '%');
      // })



      // $data = $predata::where('mrn', 'like', '%' . $inpatientfilter . '%')
      //   ->Orwhere('name', 'like', '%' . $inpatientfilter . '%')
      //   ->sortable()
      //   ->paginate(10);


    } else {
      $data = Episode::with('patient')
        ->where('episodes.episode_type', 'like', 'Inpatient')
        ->where('episodes.episode_status', 'like', 'Pre-Admission')
        ->having('episodes.episode_date', '>=', $yesterday)
        ->orderby('episodes.episode_date', 'Asc')
        ->sortable()
        ->paginate(10);
    }




    return view('inpatient', compact('data', 'req', 'update', 'count'));
  }

  // public function showinpatient(Request $request)
  // {
  //   $filterinbill = $request->query('filterinbill');
  //   $update = DB::table('updates')
  //     ->first();
  //   $req = $request->all();

  //   $data = Episode::with('patient')
  //     ->where('episodes.episode_type', 'like', 'Inpatient')
  //     ->where('episodes.episode_status', 'like', 'Pre-Admission')
  //     ->paginate(10);

  //   return view('inpatient', compact('data', 'req', 'update'));
  // }

  public function getEpsDetails($empid = 0)
  {
    $employee = Episode::with('patient')
      ->where('id', $empid)
      ->first();

    $html = "
        ";
    if (!empty($employee)) {
      $bed = $employee->bed;
      if (($employee->bed) == '')
        $bed = "No Informations";

      $ward = $employee->ward;
      if (($employee->ward) == '')
        $ward = "No Informations";

      $referralhospital = $employee->referralhospital;
      if (($employee->referralhospital) == '')
        $referralhospital = "No Informations";

      $provosionaldiagnosis = $employee->provosionaldiagnosis;
      if (($employee->provosionaldiagnosis) == '')
        $provosionaldiagnosis = "No Informations";

      $referralsource = $employee->referralsource;
      if (($employee->referralsource) == '')
        $referralsource = "No Informations";

      $dischargedate = $employee->dischargedate;
      if (($employee->dischargedate) == '')
        $dischargedate = "No Informations";

      $estdischargedate = $employee->estdischargedate;
      if (($employee->estdischargedate) == '')
        $estdischargedate = "No Informations";
      $html = "
        <div class='row g-0'>
        <div class='col-md-8 border-right' style='border-right:2px solid #aeaeae'>
         <div class='status p-3'>
             <table class='table table-borderless'>
               <tbody>
                 <tr>
                   <td>
                       <div class='d-flex flex-column'>
                         <span class='heading d-block'>Episode No</span>
                         <span class='subheadings'>" . $employee->episode_no . "</span>
                       </div>
                   </td>
                  <tr>
                  </tr>
                   <td>
                        <div class='d-flex flex-column'>
                         <span class='heading d-block'>Episode Date</span>
                         <span class='subheadings'>" . $employee->episode_date . "</span>
                       </div>
                   </td>
                   <td>
                        <div class='d-flex flex-column'>
                         <span class='heading d-block'>Discharge Date</span>
                         <span class='subheadings'>" . $dischargedate . "</span>
                       </div>
                   </td>
                   <td>
                        <div class='d-flex flex-column'>
                         <span class='heading d-block'>Est.Disc.Date</span>
                         <span class='subheadings'>" . $estdischargedate . "</span>
                       </div>
                   </td>
                </tr>
                <tr>
                   <td>
                       <div class='d-flex flex-column'>
                         <span class='heading d-block'>Episode Time</span>
                         <span class='subheadings'>" . $employee->episode_time . "</span>
                       </div>
                   </td>
                   <td>
                        <div class='d-flex flex-column'>
                         <span class='heading d-block'>Discharge Time</span>
                         <span class='subheadings'>" . $employee->dischargetime . "</span>
                       </div>
                   </td>
                   <td>
                        <div class='d-flex flex-column'>
                         <span class='heading d-block'>Est.Disc.Time</span>
                         <span class='subheadings'>" . $employee->estdischargetime . "</span>
                       </div>
                   </td>
                </tr>
                <tr>
                    <td>
                       <div class='d-flex flex-column'>
                         <span class='heading d-block'>Episode Type</span>
                         <span class='subheadings'>" . $employee->episode_type . "</span>
                       </div>
                   </td>
                   <td >
                        <div class='d-flex flex-column'>
                         <span class='heading d-block'>Episode Subtype</span>
                         <span class='subheadings'>" . $employee->subtype . "</span>
                       </div>
                   </td>
                 </tr>
                 <tr>
                    <td>
                       <div class='d-flex flex-column'>
                         <span class='heading d-block'>Status</span>
                         <span class='subheadings'>" . $employee->episode_status . "</span>
                       </div>
                   </td>
                   <td >
                        <div class='d-flex flex-column'>
                         <span class='heading d-block'>Admission Category</span>
                         <span class='subheadings'>" . $employee->admissioncategory . "</span>
                       </div>
                   </td>
                 </tr>
                 <tr>
                    <td>
                       <div class='d-flex flex-column'>
                         <span class='heading d-block'>Visit Type</span>
                         <span class='subheadings'>" . $employee->visittype . "</span>
                       </div>
                   </td>
                   <td >
                        <div class='d-flex flex-column'>
                         <span class='heading d-block'>GL Type</span>
                         <span class='subheadings'>" . $employee->gl_type . "</span>
                       </div>
                   </td>
                   <td>
                       <div class='d-flex flex-column'>
                         <span class='heading d-block'>Discipline</span>
                         <span class='subheadings'>" . $employee->discipline . "</span>
                       </div>
                   </td>
                 </tr>
                 <tr>
                   <td >
                        <div class='d-flex flex-column'>
                         <span class='heading d-block'>Department</span>
                         <span class='subheadings'>" . $employee->department . "</span>
                       </div>
                   </td>
                   <td colspan='2'>
                       <div class='d-flex flex-column'>
                         <span class='heading d-block'>Episode Doctor</span>
                         <span class='subheadings'>" . $employee->doctor . "</span>
                       </div>
                   </td>
                 </tr>
                 <tr>
                   <td >
                        <div class='d-flex flex-column'>
                         <span class='heading d-block'>Ward Status</span>
                         <span class='subheadings'>" . $ward . "</span>
                       </div>
                   </td>
                   <td>
                       <div class='d-flex flex-column'>
                         <span class='heading d-block'>Bed</span>
                         <span class='subheadings'>" . $bed . "</span>
                       </div>
                   </td>
                 </tr>
                 
                   <tr>
                   <td>
                       <div class='d-flex flex-column'>
                         <span class='heading d-block'>Referral Source</span>
                         <span class='subheadings'>" . $referralsource . "</span>
                       </div>
                   </td>
                   <td>
                       <div class='d-flex flex-column'>
                         <span class='heading d-block'>Referral Hospital</span>
                         <span class='subheadings'>" . $referralhospital . "</span>
                       </div>
                   </td>
                 </tr>
                 <tr>
                 <td colspan='2'>
                        <div class='d-flex flex-column'>
                         <span class='heading d-block'>Provisinal Diagnosis</span>
                         <span class='subheadings'>" . $provosionaldiagnosis . "</span>
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
                             <span class='heading d-block'>DOB</span>
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
