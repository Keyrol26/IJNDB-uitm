@extends('layouts.master')

@section('content')
    @include('layouts.multiple.mhdscript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="{{ asset('multiple/css/child-table.css') }}" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/subsidy">Subsidy</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">


                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Subsidy Listing </h5>
                            <p>Last Data Extracted on {{ $update->updatetime }}</p>
                            <div class="search-bar">
                                <form class="search-form d-flex" method="get">
                                    <input class="form-control float-end max-2" style="width :340px"type="text"
                                        id="subfilter" name="subfilter" placeholder="Search ...."
                                        title="Enter search keyword">
                                        &nbsp;
                                        <button type="submit" class="btn btn-info"><i class="bi bi-search"></i></button>
                                        &nbsp;
                                        <button type="reset" class="btn btn-danger"><a href="/subsidy"
                                                style="color: white">Clear Filter</a></button>
                                </form>
                            </div><!-- End Search Bar -->
                            <br>
                            <table id='subtable' class="table display table-borderless"width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col">@sortablelink('patient.mrn','MRN')</th>
                                        <th scope="col">@sortablelink('patient.name','Name')</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Postcode</th>
                                        <th class="none">Occupation</th>
                                        <th scope="col">Marital Status</th>
                                        <th scope="col">Sex</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">Home Number</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">New IC</th>
                                        <th class="none">Residential Status</th>
                                        <th class="none">Religion</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td><a class="text-gray-800 text-hover-primary mb-1"
                                                    href="/profile/{{ $item->patient_id }}">
                                                    {{ $item->patient->mrn}}</td>
                                            <td>{{ $item->patient->name }}</td>
                                            <td>{{ $item->patient->address }}</td>
                                            <td>{{ $item->patient->postcode }}</td>
                                            <td>{{ $item->patient->occupation }}</td>
                                            <td>{{ $item->patient->maritalstat }}</td>
                                            <td>{{ $item->patient->sex }}</td>
                                            <td>@if (!empty($item->patient->dob))
                                                {{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->patient->dob)->format('Y/m/d') }}}
                                                @endif
                                            </td>
                                            <td>{{ $item->patient->homeno }}</td>
                                            <td>{{ $item->patient->phoneno }}</td>
                                            <td>{{ $item->patient->newic }}</td>
                                            <td>{{ $item->patient->residential }}</td>
                                            <td>{{ $item->patient->religion }}</td>
                                            <td>
                                                @if (!empty($item->patient->dob))
                                                {{-- {{-- @if ($item->dob != '') --}}
                                                    {{{ \Carbon\Carbon::parse($item->patient->dob)->diff(\Carbon\Carbon::now())->format('%yY, %mM and %dD') }}}
                                                @endif 
                                            </td>
                                            <td><a class='btn btn-info' href="/subsidyinfo/{{ $item->patient_id }}">
                                                Info </button></td>
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
    </main>
    <script>
        $(document).ready(function() {
            var table = $('#subtable').DataTable({
                'responsive': true,
                "ordering": false,
                "paging": false,
                "bProcessing": true,
                "sAutoWidth": false,
                "bDestroy": true,
                "sPaginationType": "bootstrap", // full_numbers
                "iDisplayStart ": 10,
                "iDisplayLength": 10,
                "bPaginate": false, //hide pagination
                "bFilter": false, //hide Search bar
                "bInfo": false, // hide showing entries
                // 'sort' : false
            });
        });
    </script>
@endsection
