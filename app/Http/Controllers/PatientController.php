<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $count = Patient::count();
        $req = $request->all();
        $filterpatient = $request->query('filterpatient');
        $update = DB::table('updates')
            ->first();

        // $hospital = Hospital::groupby('hospital');
        $hospital = Hospital::all()->pluck('hospital');


        // dd($sex);

        if ((!empty($filterpatient)) or (!empty($filter))) {
            // $data = Patient::sortable()
            $data = Patient::leftJoin("episodes", 'patient_id', '=', 'patients.id')
                ->select('patients.*', 'episodes.patient_id')
                ->groupby('patients.id')
                ->sortable()
                // ->Orwhere('name',Input::get('filterpatient'))
                ->Orwhere('mrn', 'like', '%' . $filterpatient . '%')
                ->orwhere('name', 'like', '%' . $filterpatient . '%')
                ->orwhere('newic', 'like', '%' . $filterpatient . '%')
                ->paginate(10);
        } else {
            // $data = Patient::sortable()
            $data = Patient::leftJoin("episodes", 'patient_id', '=', 'patients.id')
                ->select('patients.*', 'episodes.patient_id')
                ->groupby('patients.id')
                ->sortable()
                ->paginate(10);
        }

        // dd($checkepisode);
        return view('index', compact('data', 'req', 'update', 'count', 'hospital'));
    }
    public function profile($id)
    {
        $profiles = Patient::with('allergy')
            ->where('id', $id)
            ->first();
        //   dd($profiles);

        return view('profile')->with('profile', $profiles);
    }


    // public function update(Request $request, $id)
    // {
    //     $data = Patient::findOrFail($id);
    //     $input = $request->all();
    //     $data->update($input);
    //     return redirect("/home");
    // }

    public function delete($id)
    {
        $data = Patient::findOrFail($id);
        $data->delete();
        // return redirect('home');
        return back();
    }

    public function store(Request $request)
    {

        // $request->validate([
        //     'name' => 'required',
        //     // 'email' => 'required',
        //     // 'address' => 'required',
        // ]);
        if ($request->hospital == 0)
            $hospital = "IJN";
        else
            $hospital = "IJNPH";

        if ($request->gender == 1)
            $sex = "Male";
        else
            $sex = "Female";
        // dd($request->gender,);
        $data = new Patient([
            "name" => $request->name,
            "hospital" => $hospital,
            "sex" => $sex,
            // "dob" => $request->dob,
            // "newic" => $request->newic,
            // "address" => $request->address,
            // "city" => $request->city,
            // "postcode" => $request->postcode,
            // "medrecordlocation" => $request->medrecordlocation,

        ]);
        $data->save();
        // Patient::create($request->save());
        // return redirect('home');
        return back();
    }
}
