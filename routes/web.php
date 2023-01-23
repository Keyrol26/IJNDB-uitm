<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\MhdController;
use App\Http\Controllers\SingleMethodCotroller;
use App\Http\Controllers\CurrentPatient;
use App\Http\Controllers\CurrentBill;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\InpatientController;
use App\Http\Controllers\SubsidysController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\OtController;
use App\Http\Controllers\LabResult;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
})->name('/');

//Patient
Route::get('/home', [PatientController::class, 'index'])->name('home');
Route::post('/store', 'PatientController@store');
//profile
Route::get('/profile/{id}', [PatientController::class, 'profile'])->name('profile');
Route::delete('/delete/{id}', ['as' => 'item.delete', 'uses' => 'PatientController@delete']);
Route::put('/update/{id}', [PatientController::class, 'update']);

//allergy
Route::post('/allergystore', 'PatientController@allergystore');
Route::delete('/delete/{patientid}/{id}', ['as' => 'allergy.delete', 'uses' => 'PatientController@allergydelete']);
Route::post('/update/{patientid}/{id}', ['as' => 'allergy.update', 'uses' => 'PatientController@allergyupdate']);
//download
// Route::get('/exportPatientExcel', [PatientController::class, 'exportPatientExcel']);
// Route::get('/exportPatientCsv', [PatientController::class, 'exportPatientCsv']);
// Route::get('/patient/pdf', [PatientController::class, 'exportPatientPDF']);

//Episode
Route::post('/episodestore', 'PatientController@episodestore');
Route::get('/episode/{id}', [EpisodeController::class, 'showEpisode']);
Route::post('/Episodeupdate/{patientid}/{id}', ['as' => 'episode.update', 'uses' => 'EpisodeController@episodeupdate']);
Route::delete('/EpisodeDelete/{patientid}/{id}', ['as' => 'episode.delete', 'uses' => 'EpisodeController@destroyepisode']);

//episodeAppointment
Route::post('/appointmentstore', 'AppointmentController@appointmentstore');
Route::get('/epsappointment/{id}', [EpisodeController::class, 'epsappointment'])->name('epsappointment');
Route::post('/Appointmentupdate/{patientid}/{id}', ['as' => 'appt.update', 'uses' => 'AppointmentController@apptupdate']);
Route::delete('/AppointmentDelete/{patientid}/{id}/{episodeid}', ['as' => 'appt.delete', 'uses' => 'AppointmentController@apptdelete']);
//elab
Route::get('/elab/{id}', [EpisodeController::class, 'elab'])->name('elab');

//medication
Route::get('/epsmedication/{id}', [EpisodeController::class, 'medication'])->name('medication');

//Mhd
Route::get('/mhd', [MhdController::class, 'showmhd'])->name('showmhd');
Route::get('/getMhdDetails/{empid}', [MhdController::class, 'getMhdDetails'])->name('getMhdDetails');
Route::post('/mhdstore', 'MhdController@mhdstore');

//Inpatient
Route::get('/inpatient', [InpatientController::class, 'showinpatient'])->name('inpatient');
Route::get('/getEpsDetails/{empid}', [InpatientController::class, 'getEpsDetails'])->name('getEpsDetails');

//subsidy
Route::get('/subsidy', [SubsidysController::class, 'showsubsidy'])->name('subsidy');
Route::get('/subsidyinfo/{id}', [SubsidysController::class, 'subinfo'])->name('subsidyinfo');

//currentpatient
Route::get('/currentpatient', [CurrentPatient::class, 'currentpatient'])->name('currentpatient');

//medic
Route::get('/medication/{id}', [CurrentPatient::class, 'medic'])->name('medic');

//lab
Route::get('/labresult/{id}', [CurrentPatient::class, 'lab'])->name('lab');
Route::get('/labreport/{epsid}/{id}', [LabResult::class, 'labreport'])->name('labreport');


//billinpatient
Route::get('/billinpatient', [CurrentBill::class, 'billinpatient'])->name('billinpatient');

//billoutpatient
Route::get('/billoutpatient', [CurrentBill::class, 'billoutpatient'])->name('billoutpatient');

//icl
Route::get('/icl', [SingleMethodCotroller::class, 'icl'])->name('icl');

//OT
Route::get('/ot', [OtController::class, 'ot'])->name('ot');
Route::get('/getOtDetails/{empid}', [OtController::class, 'getOtDetails'])->name('getOtDetails');

//CurrentAppointment
Route::get('/currentappt', [AppointmentController::class, 'currentappt'])->name('currentappt');

Route::get('/cuba', [EmployeesController::class, 'cuba'])->name('cuba');

// Route::get('/getEmployeeDetails/{empid}', [EmployeesController::class, 'getEmployeeDetails'])->name('getEmployeeDetails');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('validate_login', [LoginController::class, 'validate_login'])->name('sample.validate_login');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
