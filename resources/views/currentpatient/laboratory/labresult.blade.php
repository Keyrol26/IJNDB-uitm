@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Patient</a></li>
                    <li class="breadcrumb-item"><a href="/currentpatient">Current InPatient</a></li>
                    <li class="breadcrumb-item active"><a href onClick="window.location.reload()">Lab Result</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Current InPatient Details </h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">MRN</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Episode No</th>
                                        <th scope="col">Episode Status</th>
                                        <th scope="col">Admission Date</th>
                                        <th scope="col">Admission Time</th>
                                        <th scope="col">Est. Discharge Date</th>
                                        <th scope="col">Est. Discharge Time</th>
                                        <th scope="col">Episode Department</th>
                                        <th scope="col">Episode Doctor</th>
                                        <th scope="col">Ward Status</th>
                                        <th scope="col">Bed</th>
                                        <th scope="col">Discipline</th>
                                        <th scope="col">Admission Category</th>
                                        <th scope="col">GL Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a class="text-gray-800 text-hover-primary mb-1"
                                            href="/profile/{{ $data->patient->id }}">{{ $data->patient->mrn }}</td>
                                        <td>{{ $data->patient->name }}</td>
                                        <td>{{ $data->episode_no }}</td>
                                        <td>{{ $data->episode_status }}</td>
                                        <td>{{ $data->episode_date }}</td>
                                        <td>{{ $data->episode_time }}</td>
                                        <td>{{ $data->estdischargedate }}</td>
                                        <td>{{ $data->estdischargetime }}</td>
                                        <td>{{ $data->department }}</td>
                                        <td>{{ $data->doctor }}</td>
                                        <td>{{ $data->ward }}</td>
                                        <td>{{ $data->bed }}</td>
                                        <td>{{ $data->discipline }}</td>
                                        <td>{{ $data->admissioncategory }}</td>
                                        <td>{{ $data->gl_type }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <section class="section">
                                <div class="row">
                                    <div class="col-lg overflow-auto">
                                        <div class="card recent-sales overflow-auto">
                                            <div class="card-body">
                                                <h5 class="card-title">Lab Result</h5>
                                                <table id="empTable" class="table table-hover datatable">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Episode No</th>
                                                            <th scope="col">Episode Date</th>
                                                            <th scope="col">Lab Number</th>
                                                            <th scope="col">Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($lab as $data)
                                                            <tr>
                                                                <td>{{ $data->episode_no }}</td>
                                                                <td>{{ $data->episode_date }}</td>
                                                                <td><a class="text-gray-800 text-hover-primary mb-1"
                                                                        href="{{ route('labreport', ['id' => $data->lab_no, 'epsid' => $data->episode_id]) }}">{{ $data->lab_no }}</a>
                                                                <td>{{ $data->order_date }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal Dialog Scrollable -->
    </main>
@endsection
