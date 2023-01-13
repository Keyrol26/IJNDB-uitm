@extends('layouts.master')


@section('content')
    <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</a></li>
                    <li class="breadcrumb-item"><a href="/home">Patient</a></li>
                    <li class="breadcrumb-item active"><a href onClick="window.location.reload()">Episode</a></li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Episode List </h5>
                            <button type="button" id="click-me"data-bs-toggle="modal" data-bs-target="#addepisode"
                                class="btn btn-primary pull-right" style="float:right"><i class="fa fa-plus"></i>
                                Episode</button>
                            @include('modalpopup.Episode.add')
                            <br>
                            <br>
                            <br>
                            {{-- <p>Last Data Extracted on {{ $update->updatetime }}</p> --}}
                            {{-- <h2>{{ $episode->name }}</h2> --}}
                            {{-- <h2>{{ $episode->mrn }}</h2> --}}
                            <table class="table table-hover datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Config</th>
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
                                        <th scope="col" colspan="3" style="text-align: center;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($episodes as $item)
                                        <tr>
                                            <td>
                                                @if ($item->patient_id > 20)
                                                    <div class="d-grid gap-2">
                                                        <a href="#delete{{ $item->id }}{{ $item->patient_id }}"
                                                            data-bs-toggle="modal" class="btn btn-danger btn-sm"><i
                                                                class='fa fa-trash'></i> Delete</a>
                                                        <a href="#edit{{ $item->id }}{{ $item->patient_id }}"
                                                            data-bs-toggle="modal" class="btn btn-primary btn-sm"><i
                                                                class='fa fa-edit'></i> Update</a>
                                                    </div>
                                                    @include('modalpopup.Episode.episodeaction')
                                                @endif
                                            </td>
                                            <td>{{ $item->episode_no }}</td>
                                            <td>{{ $item->episode_status }}</td>
                                            <td>
                                                @if (!empty($item->episode_date))
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->episode_date)->format('Y/m/d') }}
                                                @endif
                                            </td>
                                            <td>{{ $item->episode_time }}</td>
                                            <td>
                                                @if (!empty($item->dischargedate))
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->dischargedate)->format('Y/m/d') }}
                                                @endif
                                            </td>
                                            <td>{{ $item->dischargetime }}</td>
                                            <td>{{ $item->department }}</td>
                                            <td>{{ $item->doctor }}</td>
                                            <td>{{ $item->ward }}</td>
                                            <td>{{ $item->bed }}</td>
                                            <td>{{ $item->subtype }}</td>
                                            <td>{{ $item->visittype }}</td>
                                            <td>{{ $item->discipline }}</td>
                                            <td>{{ $item->admissioncategory }}</td>
                                            <td>{{ $item->gl_type }}</td>
                                            <!----Medication Icon--->
                                            <td>
                                                <div class="d-grid gap-2">
                                                    @if (!empty($countsmedic))
                                                        @foreach ($countsmedic as $data)
                                                            @if ($data->episode_id == $item->id)
                                                                {{-- <a href="/epsmedication/{{ $item->id }}"> <img
                                                                    src="{{ asset('multiple/img/icon/Episode/medicine.png') }}"></a> --}}
                                                                <a type="button"
                                                                    class="btn btn-primary btn-sm"href="/epsmedication/{{ $item->id }}">Medication</a>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    <!----Appointment Icon--->
                                                    @if (!empty($countsappoinment))
                                                        @foreach ($countsappoinment as $data)
                                                            @if ($data->episode_id == $item->id)
                                                                {{-- <a href="/epsappointment/{{ $item->id }}"> <img
                                                                    src="{{ asset('multiple/img/icon/Episode/appt.png') }}"></a> --}}
                                                                <a type="button"
                                                                    class="btn btn-primary btn-sm"href="/epsappointment/{{ $item->id }}">Appointment</a>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    <!----Elab Icon--->
                                                    @if (!empty($countselab))
                                                        @foreach ($countselab as $data)
                                                            @if ($data->episode_id == $item->id)
                                                                {{-- <a href="/elab/{{ $item->id }}"> <img
                                                                        src="{{ asset('multiple/img/icon/Episode/lab.png') }}"></a> --}}
                                                                <a type="button" class="btn btn-primary btn-sm"
                                                                    href="/elab/{{ $item->id }}">eLab</a>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- End Recent Sales -->
            </div>
            </div><!-- End Left side columns -->
            </div>
        </section>

    </main>
@endsection
