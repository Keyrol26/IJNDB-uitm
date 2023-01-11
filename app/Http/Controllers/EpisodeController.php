<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Episode;
use App\Models\Patient;

class EpisodeController extends Controller
{
    public function showEpisode($id, Request $request)
    {
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

        return view('episodes/episode', compact('episodes', 'countselab', 'countsappoinment', 'countsmedic'));
    }

    public function elab($id)
    {
        $data = Episode::with('elab', 'patient')
            ->where('id', $id)
            ->first();
        //    dd($data->elab);
        return view('episodes/elab', compact('data'));
    }

    public function epsappointment($id)
    {
        $data = Episode::with('appt', 'patient')
            ->where('id', $id)
            ->first();
        //    dd($data->epsappointment);
        return view('episodes/epsappointment', compact('data'));
    }

    public function medication($id)
    {
        $data = Episode::with('medic', 'patient')
            ->where('id', $id)
            ->first();

        //    dd($data->medication);
        return view('episodes/epsmedication', compact('data'));
    }







    public function storeepisode(Request $request)
    {
        $episode = new Episode([


            "status" => $request->status,
            "admissiondate" => $request->admissiondate,
            "admissiontime" => $request->admissiontime,
            "dischargedate" => $request->dischargedate,
            "dischargetime" => $request->dischargetime,
            "department" => $request->department,
            "doctor" => $request->doctor,
            "ward" => $request->ward,
            "bed" => $request->bed,
            "subtype" => $request->subtype,
            "visittype" => $request->visittype,
            "discipline" => $request->discipline,
            "admissionctgry" => $request->admissionctgry,
            "gltype" => $request->gltype,
        ]);
        $episode->save();
        //return redirect("/home");
        return back();
    }

    public function destroyepisode($id)
    {
        $datas = Episode::findOrFail($id);
        $datas->delete();
        return back();
    }
}
