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
                            <!--Start InPatient details-->
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
                            <!--end InPatient details-->

                            <!--Start Labresult table-->
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
                                                        @foreach ($lab as $item)
                                                            <tr>
                                                                <td>{{ $item->episode_no }}</td>
                                                                <td>{{ $item->episode_date }}</td>
                                                                <td><a class="text-gray-800 text-hover-primary mb-1"
                                                                        href="{{ route('labreport', ['id' => $item->lab_no, 'epsid' => $item->episode_id]) }}">{{ $item->lab_no }}</a>
                                                                </td>
                                                                <td>{{ $item->episode_date }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!--end Labresult table-->
                        </div>
                    </div>
                </div><!-- End Recent Sales -->
            </div>
        </section>

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="false">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Lab Result</h5>
                        <a type="button" class="btn-close" href="/labresult/{{$lab[0]->episode_id}}"
                        {{-- data-bs-dismiss="modal"  --}}
                        aria-label="Close"></a>
                    </div>
                    @include('currentpatient.laboratory.labreportbody')
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" href="/labresult/{{$lab[0]->episode_id}}"
                        {{-- data-bs-dismiss="modal" --}}
                        >Close</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(window).on('load', function() {
            $('#staticBackdrop').modal('show');
        });
    </script>
@endsection
