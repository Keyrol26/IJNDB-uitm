@extends('layouts.master')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/currentpatient">Current Inpatient</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Current Patient List</h5>
                            <p>Last Data Extracted on {{ $update->updatetime }}</p>

                            <!--Start Search-bar-->
                            <div class="search-bar">
                                <form class="search-form d-flex" method="get">
                                    <select class="form-control float-end max-2" style="width :340px"type="text"
                                        id="filterward" name="filterward" placeholder="Search ...."
                                        title="Enter search keyword" value="{{ $filterward }}">
                                        @if (!empty($filterward))
                                            <option selected> {{ $filterward }}</option>
                                        @else
                                            <option selected value="">Default</option>
                                        @endif
                                        @foreach ($ward as $item)
                                            <option value='{{ $item->ward }}'>
                                                {{ $item->ward }}</option>
                                        @endforeach>
                                    </select>
                                    <button type="submit" class="btn btn-info"><i class="bi bi-search"></i></button>
                                    &nbsp;
                                    <button type="reset" class="btn btn-danger"><a href="/currentpatient"
                                            style="color: white">Clear Filter</a></button>
                                </form>
                            </div>
                            <!--End Search-bar-->
                            <br>
                            <!--Start Table-->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">@sortablelink('patient.mrn','MRN')</th>
                                        <th scope="col">@sortablelink('patient.name','Name')</th>
                                        <th scope="col">@sortablelink('episode_no', 'Eps. No')</th> --}}
                                        <th scope="col">MRN</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Eps. No</th>
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
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td><a class="text-gray-800 text-hover-primary mb-1"
                                                    href="/profile/{{ $item->patient_id }}">{{ $item->patient->mrn }}</td>
                                            <td>{{ $item->patient->name }}</td>
                                            <td>{{ $item->episode_no }}</td>
                                            <td>{{ $item->episode_status }}</td>
                                            <td>
                                                {{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->episode_date)->format('Y/m/d') }}}</td>
                                            <td>{{ $item->episode_time }}</td>
                                            <td>{{ $item->estdischargedate }}</td>
                                            <td>{{ $item->estdischargetime }}</td>
                                            <td>{{ $item->department }}</td>
                                            <td>{{ $item->doctor }}</td>
                                            <td>{{ $item->ward }}</td>
                                            <td>{{ $item->bed }}</td>
                                            <td>{{ $item->discipline }}</td>
                                            <td>{{ $item->admissioncategory }}</td>
                                            <td>{{ $item->gl_type }}</td>
                                            <td>
                                                <div class="d-grid gap-2">
                                                    <!----Medications Icon--->
                                                    @if (!empty($item->med_id))
                                                        <a type="button"
                                                            class="btn btn-primary btn-sm"href="/medication/{{ $item->id }}">Medications</a>
                                                    @else
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            disabled>Medications</button>
                                                    @endif
                                                    <!----eLab Icon--->
                                                    @if (!empty($item->lab_id))
                                                        <a type="button"
                                                            class="btn btn-primary btn-sm"href="/labresult/{{ $item->id }}">Lab
                                                            Result</a>
                                                    @else
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            disabled>Lab Result</button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <!--End Table-->
                            <br>
                             <!--Start Pagination-->
                            @include('layouts.pagination')
                             <!--End Pagination-->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
