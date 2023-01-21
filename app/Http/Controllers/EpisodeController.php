<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Episode;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class EpisodeController extends Controller
{
    public function showEpisode($id, Request $request)
    {
        if (Auth::guest()) {
            return redirect()->route('/');
        }
        $episodes = Patient::findOrfail($id)->episode()
            ->orderBy('episodes.id', 'desc')
            ->limit(3)
            ->get();

        $countselab = Patient::find($id)->episode()
            ->select('elabs.episode_id', 'elabs.id')
            ->join('elabs', 'episodes.id', '=', 'elabs.episode_id')
            ->where('episodes.patient_id', '=', $id)
            ->get();

        $countsappoinment = Patient::find($id)->episode()
            ->select('appointments.episode_id')
            ->join('appointments', 'episodes.id', '=', 'appointments.episode_id')
            ->where('episodes.patient_id', '=', $id)
            ->groupby('appointments.episode_id')
            ->get();

        $countsmedic = DB::table('episodes')
            ->select('medications.oeord_rowid', DB::raw('COUNT(*) as aggregate'), 'medications.episode_id')
            ->join('medications', 'episodes.id', '=', 'medications.episode_id')
            ->where('episodes.patient_id', '=', $id)
            ->whereNotNull('episodes.patient_id')
            ->groupBy('medications.oeord_rowid')
            ->get();

        $episodeno = Patient::findorfail($id)->episode()->pluck('episode_no');
        // dd($episodeno);
        return view('episodes/episode', compact('episodes', 'countselab', 'countsappoinment', 'countsmedic', 'episodeno'));
    }

    public function elab($id)
    {
        if (Auth::guest()) {
            return redirect()->route('/');
        }
        $data = Episode::with('elab', 'patient')
            ->where('id', $id)
            ->first();
        //    dd($data->elab);
        return view('episodes/elab', compact('data'));
    }

    public function epsappointment($id)
    {
        if (Auth::guest()) {
            return redirect()->route('/');
        }
        $data = Episode::with('appt', 'patient')
            ->where('id', $id)
            ->first();
        // dd($data->patient_id);
        return view('episodes/epsappointment', compact('data'));
    }

    public function medication($id)
    {
        if (Auth::guest()) {
            return redirect()->route('/');
        }
        $data = Episode::with('medic', 'patient')
            ->where('id', $id)
            ->first();

        //    dd($data->medication);
        return view('episodes/epsmedication', compact('data'));
    }

    public function destroyepisode(Request $request)
    {
        $id = $request->id;
        $patientid = $request->patientid;
        $data = Episode::where('patient_id', $patientid)
            ->where('id', $id);
        // dd($data);
        $data->delete();
        // return redirect('home');
        return redirect("/episode/$patientid")->with('episodedelete', 'Patient Episode Have been Deleted Succesfully');
    }


    public function episodeupdate(Request $request)
    {
        $id = $request->id;
        $patientid = $request->patientid;
        $data = Episode::where('patient_id', $patientid)
            ->where('id', $id);
        $input = request()->except(['_token']);
        $data->update($input);
        return redirect("/episode/$patientid")->with('episodeupdate', 'Patient Episode Details Have been Updated Succesfully');
    }




    // public function storeepisode(Request $request)
    // {
    //     $episode = new Episode([


    //         "status" => $request->status,
    //         "admissiondate" => $request->admissiondate,
    //         "admissiontime" => $request->admissiontime,
    //         "dischargedate" => $request->dischargedate,
    //         "dischargetime" => $request->dischargetime,
    //         "department" => $request->department,
    //         "doctor" => $request->doctor,
    //         "ward" => $request->ward,
    //         "bed" => $request->bed,
    //         "subtype" => $request->subtype,
    //         "visittype" => $request->visittype,
    //         "discipline" => $request->discipline,
    //         "admissionctgry" => $request->admissionctgry,
    //         "gltype" => $request->gltype,
    //     ]);
    //     $episode->save();
    //     //return redirect("/home");
    //     return back();
    // }

}
