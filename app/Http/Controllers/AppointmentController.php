<?php

namespace App\Http\Controllers;
Use \Carbon\Carbon;
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
        $today =  now()->format('Y-m-d') ;

        if ((!empty($filterlocation)) or (!empty($filterresource))) {
            $data = Appointment::
                where('appointments.appointment_status', 'like', 'booked')
                ->where('appointments.appointment_date', '>=', $today)
                ->orderby('appointments.appointment_date','asc')
                ->where('appointments.resource_location', 'like', '%' . $filterlocation . '%')
                ->where('appointments.resource', 'like', '%' . $filterresource . '%')
                ->with('patient')
                ->with('episode')
                // ->orderby('appointments.res_rowid','ASC')
                ->sortable()
                ->paginate(10);

            
        } else {
            $data = Appointment::
                where('appointments.appointment_status', 'like', 'booked')
                ->where('appointments.appointment_date', '>=', $today)
                ->orderby('appointments.appointment_date','asc')
                ->with('patient')
                ->with('episode')
                ->sortable()
                ->orderby('appointments.res_rowid','ASC')
                ->paginate(10);
            
        }
        // dd($data);
        //  dd($location);
        // return view('currentappt')->with('data', $data)->with('filterlocation', $filterlocation)->with('location', $location);
        return view('currentappt', compact('data', 'filterlocation', 'location', 'filterresource', 'resource','count','req','update'));

        // return view('currentappt', compact('data', 'location'));
    }
}
