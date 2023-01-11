@extends('layouts.master')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Patient</a></li>
                    <li class="breadcrumb-item" ><a href="javascript:history.back()">Episode</a></li>
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
                                                <table class="table datatable">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">Appointment Date</th>
                                                        <th scope="col">Appointment Time</th>
                                                        <th scope="col">Appointment Status</th>
                                                        <th scope="col">Resource Location</th>
                                                        <th scope="col">Resource</th>
                                                        <th scope="col">Service</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach($data->appt as $item)
                                                      <tr>
                                                        <td>{{ $item->appointment_date}}</td>
                                                        <td>{{ $item->appointment_time}}</td>
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
    </main>
@endsection
