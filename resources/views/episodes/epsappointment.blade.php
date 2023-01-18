@extends('layouts.master')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Patient</a></li>
                    <li class="breadcrumb-item"><a href="/episode/{{ $data->patient_id }}">Episode</a></li>
                    <li class="breadcrumb-item active"><a href onClick="window.location.reload()">Appointment</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Episode List </h5>
                            <button type="button" id="click-me"data-bs-toggle="modal"
                                data-bs-target="#addappointment{{ $data->id }}" class="btn btn-primary pull-right"
                                style="float:right"><i class="fa fa-plus"></i>
                                Add Appointment</button>
                            <br>
                            <br>
                            <br>
                            @include('modalpopup.Appointment.add')
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
                                        <td>
                                            @if (!empty($data->episode_date))
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->episode_date)->format('Y/m/d') }}
                                            @endif
                                        </td>
                                        <td>{{ $data->episode_time }}</td>
                                        <td>
                                            @if (!empty($data->dischargedate))
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->dischargedate)->format('Y/m/d') }}
                                            @endif
                                        </td>
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
                                    <div class="col-lg overflow-auto">
                                        <div class="card recent-sales overflow-auto">
                                            <div class="card-body">
                                                <h5 class="card-title">Appointment</h5>
                                                @if ($message = Session::get('apptadd'))
                                                    <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                                        role="alert">
                                                        {{ $message }}
                                                        <button type="button" class="btn-close btn-close-white"
                                                            data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                @endif
                                                @if ($message = Session::get('apptdelete'))
                                                    <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                                        role="alert">
                                                        {{ $message }}
                                                        <button type="button" class="btn-close btn-close-white"
                                                            data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                @endif
                                                @if ($message = Session::get('apptupdate'))
                                                    <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                                        role="alert">
                                                        {{ $message }}
                                                        <button type="button" class="btn-close btn-close-white"
                                                            data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                @endif
                                                <table class="table datatable" id="appt">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Actions</th>
                                                            <th scope="col">Appointment Date</th>
                                                            <th scope="col">Appointment Time</th>
                                                            <th scope="col">Appointment Status</th>
                                                            <th scope="col">Resource Location</th>
                                                            <th scope="col">Resource</th>
                                                            <th scope="col">Service</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data->appt as $item)
                                                            <tr>
                                                                <td>
                                                                    {{-- @if ($data->patient_id > 20) --}}
                                                                    <div class="d-grid gap-2">
                                                                    <a href="#delete{{ $item->id }}{{ $item->patient_id }}"
                                                                        data-bs-toggle="modal"
                                                                        class="btn btn-danger btn-sm"><i
                                                                            class='fa fa-trash'></i> Delete</a>
                                                                    <a href="#edit{{ $item->id }}{{ $item->patient_id }}"
                                                                        data-bs-toggle="modal"
                                                                        class="btn btn-primary btn-sm"><i
                                                                            class='fa fa-edit'></i> Update</a>
                                                                    @include('modalpopup.Appointment.appointmentaction')
                                                                    </div>      
                                                                    {{-- @endif --}}
                                                                </td>
                                                                <td>{{ $item->appointment_date }}</td>
                                                                <td>{{ $item->appointment_time }}</td>
                                                                <td>{{ $item->appointment_status }}</td>
                                                                <td>{{ $item->resource_location }}</td>
                                                                <td>{{ $item->resource }}</td>
                                                                <td>{{ $item->service }}</td>
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
                </div><!-- End Recent Sales -->
            </div>
        </section>
        @include('layouts.multiple.printscript')
        <script>
            $(document).ready(function() {
                $('#appt').DataTable({
                    "bPaginate": false, //hide pagination
                    "bFilter": false, //hide Search bar
                    "bInfo": false, // hide showing entries
                    'responsive': true,
                    "ordering": false,
                    "paging": false,
                    "bProcessing": true,
                    "sAutoWidth": false,
                    "bDestroy": true,
                    "iDisplayStart ": 10,
                    "iDisplayLength": 10,
                    "sPaginationType": "bootstrap", // full_numbers
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]

                });
            });
        </script>
    </main>
@endsection
