@extends('layouts.master')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Patient</a></li>
                    <li class="breadcrumb-item active"><a href="/currentappt">Appointment</a></li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">
            <div class="row">

                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Current Appointment List</h5>
                            {{-- <p>Last Data Extracted on {{ $update->updatetime }}</p> --}}
                            <!-- seach filter -->
                            {{-- <div class="row">
                                <div class="form-group"> --}}
                            <!-- location -->
                            <div class="search-bar">
                                <form class="search-form d-flex" method="get">
                                    <select class="form-control float-end max-2" style="width :400px"type="text"
                                        id="filterlocation" name="filterlocation" placeholder="Search ...."
                                        title="Enter search keyword" value="{{ $filterlocation }}">
                                        @if (!empty($filterlocation))
                                            <option selected> {{ $filterlocation }}</option>
                                        @else
                                        <option selected value="">Default</option>
                                        @endif
                                        @foreach ($location as $item)
                                            <option value='{{ $item->resource_location }}'>
                                                {{ $item->resource_location }}</option>
                                        @endforeach>
                                    </select>
                                    &nbsp;
                                    <select class="form-control float-end max-2" style="width :400px"type="text"
                                        id="filterresource" name="filterresource" placeholder="Search ...."
                                        title="Enter search keyword" value="{{ $filterresource }}">
                                        @if (!empty($filterresource))
                                            <option selected> {{ $filterresource }}</option>
                                        @else
                                        <option selected value="">Default</option>
                                        @endif
                                        @foreach ($resource as $item)
                                            <option value='{{ $item->resource }}'>
                                                {{ $item->resource }}</option>
                                        @endforeach>
                                    </select>
                                    &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-info"><i class="bi bi-search"></i></button>
                                    &nbsp;
                                    <button type="reset" class="btn btn-danger"><a href="/currentappt"
                                            style="color: white">Clear Filter</a></button>
                                </form>
                            </div>
                            <br>
                            <!-- end -->
                            <table class="table table-hover" id="appt">
                                <thead>
                                    <tr>
                                        <th scope="col">@sortablelink('patient.mrn','MRN')</th>
                                        <th scope="col">@sortablelink('patient.name','Name')</th>
                                        <th scope="col">@sortablelink('episode_no', 'Eps. No')</th>
                                        <th scope="col">Episode Date</th>
                                        <th scope="col">Appointment Date</th>
                                        <th scope="col">Appointment Time</th>
                                        <th scope="col">Appointment Status</th>
                                        <th scope="col">Resource</th>
                                        <th scope="col">Resource Location</th>
                                        <th scope="col">Service</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($data as $item)
                                        <tr>
                                            <td><a class="text-gray-800 text-hover-primary mb-1"
                                                    href="/profile/{{ $item->patient->id }}">{{ $item->patient->mrn }}</td>
                                            <td>{{ $item->patient->name }}</td>
                                            <td>{{ $item->episode->episode_no }}</td>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->episode->episode_date)->format('Y/m/d') }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->appointment_date)->format('Y/m/d') }}
                                            </td>
                                            <td>{{ $item->appointment_time }}</td>
                                            <td>{{ $item->appointment_status }}</td>
                                            <td>{{ $item->resource }}</td>
                                            <td>{{ $item->resource_location }}</td>
                                            <td>{{ $item->service }}</td>
                                            <td><a class="nav-link" href="/episode/{{ $item->patient_id }}"
                                                    title="Patient Episode"><button class="btn btn-info btn-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i> Episode</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @include('layouts.pagination')
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
