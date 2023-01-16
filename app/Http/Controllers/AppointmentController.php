<?php

namespace App\Http\Controllers;

use \Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function currentappt(Request $request)
    {
        $update = DB::table('updates')
            ->first();
        $req = $request->all();
        // $mydate = Appointment::join('patients', 'appointments.patient_id', '=', 'patients.id')
        //     ->join('episodes', 'appointments.episode_id', '=', 'episodes.id')
        //     ->select('appointments.appointment_date');

        // $date = Carbon::createFromFormat('d/m/Y', $mydate)->format('Y-m-d');

        // dd($date);

        $location = Appointment::join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->join('episodes', 'appointments.episode_id', '=', 'episodes.id')
            ->where('appointments.appointment_status', 'like', 'booked')
            ->groupBy('appointments.resource_location')
            ->get('appointments.resource_location');


        $resource = Appointment::join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->join('episodes', 'appointments.episode_id', '=', 'episodes.id')
            ->where('appointments.appointment_status', 'like', 'booked')
            ->groupBy('appointments.resource')
            ->get('appointments.resource');

        // $data = Appointment::join('patients', 'appointments.patient_id', '=', 'patients.id')
        //     ->join('episodes', 'appointments.episode_id', '=', 'episodes.id')
        //     ->where('appointments.appointment_status', 'like', 'booked')
        //     //  ->where('appointments.appointment_date','=>','Carbon::now()->subDays(3)')
        //     // ->where(Carbon::createFromFormat('d/m/Y', 'appointments.appointment_date')->format('Y/m/d'), '=>',  Carbon::now()->subDays(3)) 
        //     ->limit(500)
        //     ->get();

        $filterlocation = $request->query('filterlocation');
        $filterresource = $request->query('filterresource');
        $count = 0;
        $today =  now()->format('Y-m-d');

        if ((!empty($filterlocation)) or (!empty($filterresource))) {
            $data = Appointment::where('appointments.appointment_status', 'like', 'booked')
                ->where('appointments.appointment_date', '>=', $today)
                ->orderby('appointments.appointment_date', 'asc')
                ->where('appointments.resource_location', 'like', '%' . $filterlocation . '%')
                ->where('appointments.resource', 'like', '%' . $filterresource . '%')
                ->with('patient')
                ->with('episode')
                // ->orderby('appointments.res_rowid','ASC')
                ->sortable()
                ->paginate(10);
        } else {
            $data = Appointment::where('appointments.appointment_status', 'like', 'booked')
                ->where('appointments.appointment_date', '>=', $today)
                ->orderby('appointments.appointment_date', 'asc')
                ->with('patient')
                ->with('episode')
                ->sortable()
                ->orderby('appointments.res_rowid', 'ASC')
                ->paginate(10);
        }
        // dd($data);
        //  dd($location);
        // return view('currentappt')->with('data', $data)->with('filterlocation', $filterlocation)->with('location', $location);
        return view('currentappt', compact('data', 'filterlocation', 'location', 'filterresource', 'resource', 'count', 'req', 'update'));

        // return view('currentappt', compact('data', 'location'));
    }
    public function appointmentstore(Request $request)
    {
        //for ID
        $currentid = Appointment::select("id")->max('id');
        $id = $currentid + 1;
        // specific id relation;
        $patientid = $request->patient_id;
        $episodeid = $request->episode_id;
        // dd($episodeid);
        //res_rowid (1 patient same resrowid)
        $currentresrowid = Appointment::select("res_rowid")->max('res_rowid');
        // $resrowid = Appointment::find($patientid)
        //     ->where('episode_id', $episodeid)
        //     ->select('res_rowid');
        $resrowid = DB::table("appointments")
            ->where('episode_id', $episodeid)
            ->where("patient_id", $patientid)
            ->get('res_rowid');
        if (!empty($resrowid))
            $newrowid = $currentresrowid + 1;
        else
            $newrowid = $resrowid;

        //appt_rowid +1 if exist, 1 if new
        $curapptid =  DB::table("appointments")
            ->where('episode_id', $episodeid)
            ->where("patient_id", $patientid)
            ->select('appt_rowid')
            ->max('appt_rowid');
        
        $apptrowid = $curapptid + 1;
        


        $data = new Appointment([
            "patient_id" => $patientid,
            "episode_id" => $episodeid,
            "res_rowid"  => $newrowid,
            "id" => $id,
            "appt_rowid"  => $apptrowid,
            "appointment_date" => $request->appointment_date,
            "appointment_time" => $request->appointment_time,
            "appointment_status" => $request->appointment_status,
            "resource_location" => $request->resource_location,
            "resource" => $request->resource,
            "service" => $request->service,
        ]);
        $data->save();
        return redirect("epsappointment/$episodeid");
    }
    public function apptepisode(Request $request)
    {
        $id = $request->id;
        $patientid = $request->patientid;
        $data = Appointment::where('patient_id', $patientid)
            ->where('id', $id);
        // dd($data);
        $data->delete();
        // return redirect('home');
        return redirect("/episode/$patientid");
    }


    public function apptupdate(Request $request)
    {
        $id = $request->id;
        $patientid = $request->patientid;
        $episodeid = $request->episode_id;
        $data = Appointment::where('patient_id', $patientid)
            ->where('id', $id);
        $input = request()->except(['_token']);
        $data->update($input);
        return redirect("/epsappointment/$episodeid");
    }
}
