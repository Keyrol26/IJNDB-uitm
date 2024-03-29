<?php

namespace App\Http\Controllers;

use \Yajra\Datatables\Datatables;
use App\Models\Patient;
use App\Models\Hospital;
use App\Models\Allergy;
use Illuminate\Http\Request;
use Illuminate\Support\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Episode;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guest()) {
            return redirect()->route('/');
        }
        $count = Patient::count();
        $req = $request->all();
        $filterpatient = $request->query('filterpatient');
        $update = DB::table('updates')
            ->first();

        // $hospital = Hospital::groupby('hospital');
        $hospital = Hospital::all()->pluck('hospital');

        // dd($hospital);
        // dd($sex);

        if ((!empty($filterpatient)) or (!empty($filter))) {
            // $data = Patient::sortable()
            $data = Patient::leftJoin("episodes", 'patient_id', '=', 'patients.id')
                ->select('patients.*', 'episodes.patient_id')
                ->groupby('patients.id')
                // ->sortable()
                // ->Orwhere('name',Input::get('filterpatient'))
                ->Orwhere('mrn', 'like', '%' . $filterpatient . '%')
                ->orwhere('name', 'like', '%' . $filterpatient . '%')
                ->orwhere('newic', 'like', '%' . $filterpatient . '%')
                ->orderBy('patients.id', 'asc')
                // ->latest();
                ->paginate(10);
        } else {
            // $data = Patient::sortable()
            $data = Patient::leftJoin("episodes", 'patient_id', '=', 'patients.id')
                ->select('patients.*', 'episodes.patient_id')
                ->groupby('patients.id')
                ->orderBy('patients.id', 'asc')
                // ->first();
                // ->sortable()
                // ->latest();
                ->paginate(10);
            // ->get();
        }

        // return Datatables::eloquent($data);
        // dd($data);
        return view('index', compact('data', 'req', 'update', 'count', 'hospital'));
    }

    public function getpatient(Request $request)
    {
        if ($request->ajax()) {
            // $data = Student::latest()->get();
            // $data = DB::table('patients')->orderBy('id','asc');
            $data = $data = Patient::leftJoin("episodes", 'patient_id', '=', 'patients.id')
                ->select('patients.*', 'episodes.patient_id')
                ->groupby('patients.id')
                ->orderBy('patients.id', 'asc');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'layouts.action')
                ->addColumn('agefunction', 'layouts.agefunction')
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function profile($id)
    {
        if (Auth::guest()) {
            return redirect()->route('/');
        }
        $profile = Patient::with('allergy')
            ->where('id', $id)
            ->first();
        // $count = Patient::with('allergy')
        //     ->where('id', $id)
        //     ->count();
        $count =   DB::table('allergys')
            ->where('patient_id', $id)
            ->select("id")
            ->max("id");


        $hospital = Hospital::all()->pluck('hospital');
        // $data = Allergy::findOrFail($id);
        //   dd($data);
        // $date= now()->format('Y-m-d');


        return view('profile', compact('profile', 'hospital', 'count'));
    }


    public function update(Request $request, $id)
    {
        $data = Patient::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        return redirect("/profile/$id")->with('success', 'Patient Informations Have been Updated Succesfully');
    }
    public function allergyupdate(Request $request)
    {
        $id = $request->id;
        $patientid = $request->patientid;
        $data = Allergy::where('patient_id', $patientid)
            ->where('id', $id);
        $input = request()->except(['_token']);
        $data->update($input);
        return redirect("/profile/$patientid")->with('allergyupdate', 'Patient Allergy Have been Updated Succesfully');
    }

    public function delete($id)
    {
        $data = Patient::findOrFail($id);
        $data->delete();
        return redirect('home')->with('patientdelete', 'Patient Have been Deleted Succesfully');
        // return back();
    }
    public function allergydelete(Request $request)
    {
        $id = $request->id;
        $patientid = $request->patientid;
        $data = Allergy::where('patient_id', $patientid)
            ->where('id', $id);
        // dd($data);
        $data->delete();
        // return redirect('home');
        return redirect("/profile/$patientid")->with('allergydelete', 'Patient Allergy Have been Deleted Succesfully');
    }

    public function store(Request $request)
    {
        $currentmrn = Patient::select("mrn")->max('mrn');
        $mrn = str_pad($currentmrn + 1, 6, '0', STR_PAD_LEFT);

        if ($request->hospital == 0) {
            $hospital = "IJN";
            $mrnp = $mrn;
        } else ($request->hospital == 1);
        $hospital = "IJNPH";
        $mrnp = $mrn . 'P';

        if ($request->gender == 1)
            $sex = "Male";
        else
            $sex = "Female";
        // dd($request->gender,);
        $data = new Patient([
            "mrn" => $mrn,
            "mrnp" => $mrnp,
            "name" => $request->name,
            "hospital" => $hospital,
            "sex" => $sex,
            "dob" => $request->dob,
            "newic" => $request->newic,
            "address" => $request->address,
            "city" => $request->city,
            "postcode" => $request->postcode,
            "medrecordlocation" => $request->medrecordlocation,

        ]);
        $data->save();
        return redirect('/home')->with('patientadd', 'Patient Have been Add Succesfully');
    }
    public function episodestore(Request $request)
    {
        -$currentid = Episode::select("id")->max('id');
        // $mrn = str_pad($currentmrn + 1, 6, '0', STR_PAD_LEFT);
        $id = $currentid + 1;
        // dd($id);

        $patientid = $request->patient_id;
        if ($request->episodetype == 'Emergency') {
            $episode_no = 'EP' . $id;
        } else if ($request->episodetype == 'Outpatient') {
            $episode_no = 'OP' . $id;
        } else
            $episode_no = 'IP' . $id;

        $data = new Episode([
            "patient_id" => $patientid,
            "id" => $id,
            "episode_no" => $episode_no,
            "episode_type" => $request->episodetype,
            "episode_status" => $request->episode_status,
            "episode_date" => $request->episode_date,
            "episode_time" => $request->episode_time,
            "department" => $request->department,
            "doctor" => $request->doctor,
        ]);
        $data->save();
        return redirect("/episode/$patientid")->with('episodestore', 'Patient Episode Have been Add Succesfully');
    }
    public function allergystore(Request $request)
    {
        // $data = Allergy::Create($id);
        $id = $request->patient_id;
        // $check = Allergy::FindorFail($id)->count();
        // dd($check);
        // if ($check == 0 or $check == 'null')
        // if(!empty($check))
        //     $allergy_id = 1;
        // else
        //     $allergy_id = $check + 1;

        $data = new Allergy([
            "patient_id" => $id,
            "id" => $request->allergy_id,
            // "patient_id" => $request->patient_id,
            // "id" => $request->allergy_id,
            'update_date' => now()->format('Y-m-d'),
            "allergen" => $request->allergen,
            "allergen_text" => $request->text,
        ]);
        $data->save();
        return redirect("/profile/$id")->with('allergystore', 'Patient Allergy Have been Add Succesfully');
    }
}
