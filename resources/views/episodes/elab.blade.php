@extends('layouts.master')

@section('content')
    
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Patient</a></li>
                    <li class="breadcrumb-item"><a href="javascript:history.back()">Episode</a></li>
                    <li class="breadcrumb-item active"><a href onClick="window.location.reload()">eLab</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <!--Episode Details-->
                            <h5 class="card-title">Episode Details </h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Episode No</th>
                                        <th scope="col">Episode Status</th>
                                        <th scope="col">Admission Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Discharge Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Episode Department</th>
                                        <th scope="col">Episode Doctor</th>
                                        <th scope="col">Ward Status</th>
                                        <th scope="col">Bed</th>
                                        <th scope="col">Episode Subtype</th>
                                        <th scope="col">Visit Type</th>
                                        <th scope="col">Discipline</th>
                                        <th scope="col">Admission Category</th>
                                        <th scope="col">GL Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $data->episode_no }}</td>
                                        <td>{{ $data->episode_status }}</td>
                                        <td>{{ $data->episode_date }}</td>
                                        <td>{{ $data->episode_time }}</td>
                                        <td>{{ $data->dischargedate }}</td>
                                        <td>{{ $data->dischargetime }}</td>
                                        <td>{{ $data->department }}</td>
                                        <td>{{ $data->doctor }}</td>
                                        <td>{{ $data->ward }}</td>
                                        <td>{{ $data->bed }}</td>
                                        <td>{{ $data->subtype }}</td>
                                        <td>{{ $data->visittype }}</td>
                                        <td>{{ $data->discipline }}</td>
                                        <td>{{ $data->admissioncategory }}</td>
                                        <td>{{ $data->gl_type }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <section class="section">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="card recent-sales overflow-auto">
                                            <div class="card-body">
                                                <!--patient Details-->
                                                <form>
                                                    <h5 class="card-title">Patient Details</h5>
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-5">MRN</div>
                                                        <div class="col-lg-7 col-md-5">Name</div>
                                                        <div class="col-lg-1 col-md-5">Sex</div>
                                                        <div class="col-lg-2 col-md-5">Date Of Birth</div>
                                                    </div>
                                                    <div class="row">
                                                        <a class="col-lg-2 col-md-5" style="font-weight: bold;"
                                                            href="/profile/{{ $data->patient->id }}">
                                                            {{ $data->patient->mrn }}</a>
                                                        <div class="col-lg-7 col-md-5" style="font-weight: bold;">
                                                            {{ $data->patient->name }}</div>
                                                        <div class="col-lg-1 col-md-5" style="font-weight: bold;">
                                                            {{ $data->patient->sex }}</div>
                                                        <div class="col-lg-2 col-md-5" style="font-weight: bold;">
                                                            {{ $data->patient->dob }}</div>
                                                        <hr>
                                                    </div>
                                                </form>
                                                <!--elab Start-->
                                                @if ($data->elab->isNotEmpty())
                                                    <h5 class="card-title">eLab</h5>
                                                    <form>
                                                        <div class="row mb-3">
                                                            <legend class="col-form-label col-sm-3 pt-0">Fasting Required?
                                                            </legend>
                                                            @if ($data->elab[0]['fasting'] == -1)
                                                                <div class="col-sm-2">
                                                                    <div class="form-check">
                                                                        <input
                                                                            class="form-check-input"type="radio"name="gridRadios"
                                                                            id="gridRadios1"checked disabled='disabled'>
                                                                        <label
                                                                            class="form-check-label"for="gridRadios1">Yes</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input
                                                                            class="form-check-input"type="radio"name="gridRadios"
                                                                            id="gridRadios2"disabled='disabled'>
                                                                        <label
                                                                            class="form-check-label"for="gridRadios2">No</label>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-sm-2">
                                                                    <div class="form-check">
                                                                        <input
                                                                            class="form-check-input"type="radio"name="gridRadios"
                                                                            id="gridRadios1" disabled='disabled'>
                                                                        <label
                                                                            class="form-check-label"for="gridRadios1">Yes</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input
                                                                            class="form-check-input"type="radio"name="gridRadios"id="gridRadios2"checked
                                                                            disabled='disabled'>
                                                                        <label
                                                                            class="form-check-label"for="gridRadios2">No</label>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            <legend class="col-form-label col-sm-3 pt-0">Expected
                                                                Appointment?</legend>
                                                            <div class="col-sm-3">
                                                                <input
                                                                    type="text"name="expected_appointment"id="expected_appointment"value="{{ $data->elab[0]['expected_appointment'] }}"class="form-control"
                                                                    disabled>
                                                            </div>
                                                            <table class="table table-borderless">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            @if ($data->elab[0]['rp'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @elseif ($data->elab[0]['rp'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">RP</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['fbc'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">FBC</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['tft'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label
                                                                                class="form-check-label">TFT(TSH+FT4)</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['cardiac_marker'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label
                                                                                class="form-check-label">CardiacMarkers</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['cea'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">CEA</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            @if ($data->elab[0]['lft'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">LFT</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['hba1c'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">HbA1C</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['ft3'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">FT3</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['mircroalbumin'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label
                                                                                class="form-check-label">Microalbumin</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['psa'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label
                                                                                class="form-check-label">PSA(Total)</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            @if ($data->elab[0]['fsl'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">FSL</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['inr'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">INR</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['sero'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">SERO</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['probnp'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">proBNP</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['afp'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">AFP</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            @if ($data->elab[0]['fbs_rbs'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">FBS/RBS</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['ufeme'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">UFEME</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['hscrp'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">hsCRP</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['iron_studies'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label
                                                                                class="form-check-label">IronStudies</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['ca125'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">CA125</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            @if ($data->elab[0]['vit_b12'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">Vit
                                                                                B12+Folate</label>
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            @if ($data->elab[0]['other'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">Others</label>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </form>
                                                    <hr>
                                                    <h5 class="card-title">Pre MRI/MSCT lab Test</h5>
                                                    <form>
                                                        <div class="row mb-3">
                                                            <legend class="col-form-label col-sm-3 pt-0">Fasting Required?
                                                            </legend>
                                                            @if ($data->elab[0]['fasting_1'] == -1)
                                                                <div class="col-sm-2">
                                                                    <div class="form-check">
                                                                        <input
                                                                            class="form-check-input"type="radio"name="gridRadios"
                                                                            id="gridRadios1"checked disabled='disabled'>
                                                                        <label
                                                                            class="form-check-label"for="gridRadios1">Yes</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input
                                                                            class="form-check-input"type="radio"name="gridRadios"
                                                                            id="gridRadios2"disabled='disabled'>
                                                                        <label
                                                                            class="form-check-label"for="gridRadios2">No</label>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-sm-2">
                                                                    <div class="form-check">
                                                                        <input
                                                                            class="form-check-input"type="radio"name="gridRadios"
                                                                            id="gridRadios1" disabled='disabled'>
                                                                        <label
                                                                            class="form-check-label"for="gridRadios1">Yes</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input
                                                                            class="form-check-input"type="radio"name="gridRadios"id="gridRadios2"checked
                                                                            disabled='disabled'>
                                                                        <label
                                                                            class="form-check-label"for="gridRadios2">No</label>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            <legend class="col-form-label col-sm-3 pt-0">Expected
                                                                Appointment?</legend>
                                                            <div class="col-sm-3">
                                                                <input
                                                                    type="text"name="expected_appointment"id="expected_appointment"value="{{ $data->elab[0]['expected_appointment_1'] }}"class="form-control"
                                                                    disabled>
                                                            </div>
                                                            <table class="table table-borderless">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            @if ($data->elab[0]['rp_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @elseif ($data->elab[0]['rp_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">RP</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['fbc_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">FBC</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['tft_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label
                                                                                class="form-check-label">TFT(TSH+FT4)</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['cardiac_marker_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label
                                                                                class="form-check-label">CardiacMarkers</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['cea_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">CEA</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            @if ($data->elab[0]['lft_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">LFT</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['hba1c_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">HbA1C</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['ft3_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">FT3</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['mircroalbumin_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label
                                                                                class="form-check-label">Microalbumin</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['psa_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label
                                                                                class="form-check-label">PSA(Total)</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            @if ($data->elab[0]['fsl_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">FSL</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['inr_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">INR</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['sero_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">SERO</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['probnp_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">proBNP</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['afp_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">AFP</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            @if ($data->elab[0]['fbs_rbs_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">FBS/RBS</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['ufeme_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">UFEME</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['hscrp_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">hsCRP</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['iron_studies_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label
                                                                                class="form-check-label">IronStudies</label>
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->elab[0]['ca125_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">CA125</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            @if ($data->elab[0]['vit_b12_1'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">Vit
                                                                                B12+Folate</label>
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            @if ($data->elab[0]['other_2'] == -1)
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" checked
                                                                                    disabled='disabled'>
                                                                            @else
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"id="inlineCheckbox3"
                                                                                    value="option3" disabled='disabled'>
                                                                            @endif
                                                                            <label class="form-check-label">Others</label>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div><!-- End Recent Sales -->
            </div>
        </section>
    </main>
@endsection
