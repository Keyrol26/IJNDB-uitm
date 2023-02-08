@extends('layouts.master')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="{{ asset('multiple/css/child-table.css') }}" rel="stylesheet">
<script src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
{{-- <script src="{{ asset('multiple/js/custom/child-table.js') }}"></script> --}}

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active"><a href="/icl">ICL</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">


            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">ICL Listing</h5>
                        {{-- <p>Last Data Extracted on {{ $update->updatetime }}</p> --}}
                        <div class="search-bar">
                            <form class="search-form d-flex" method="get">
                                <input class="form-control float-end max-2" style="width :340px" type="text"
                                    id="filterinbill" name="filterinbill" placeholder="Search ...."
                                    title="Enter search keyword">
                                &nbsp;
                                <button type="submit" class="btn btn-info"><i class="bi bi-search"></i></button>
                                &nbsp;
                                <button type="reset" class="btn btn-danger"><a href="/icl" style="color: white">Clear
                                        Filter</a></button>
                            </form>
                        </div><!-- End Search Bar -->
                        <br>
                        {{-- <button id="btn-show-all-children" type="button">Expand All</button>
                            <button id="btn-hide-all-children" type="button">Collapse All</button> --}}
                        <table id="icltable" class="table display table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">@sortablelink('patient.mrn', 'MRN')</th>
                                    <th scope="col">@sortablelink('patient.name','Name')</th>
                                    <th scope="col">Sex</th>
                                    <th scope="col">@sortablelink('episode.episode_no', 'Eps.No')</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Procedure Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Waiting Days</th>
                                    <th scope="col">Consultant</th>
                                    <th scope="col">Clinical Specialist</th>
                                    <th class="none">Operator 1</th>
                                    <th class="none">Operator 2</th>
                                    <th class="none">Diagnosis</th>
                                    <th class="none">Anaesthesia Status</th>
                                    <th class="none">Consent Status</th>
                                    <th class="none">Financial Status</th>
                                    <th class="none">Investigation</th>
                                    <th class="none">Cath Registration No</th>
                                    <th class="none">Initial Procedure</th>
                                    <th class="none">1st Final Procedure</th>
                                    <th class="none">2nd Final Procedure</th>
                                    <th class="none">3rd Final Procedure</th>
                                    <th class="none">Lab</th>
                                    <th class="none">Overall Remarks</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td><a class="text-gray-800 text-hover-primary mb-1"
                                            href="/profile/{{ $item->patient_id }}">{{ $item->patient->mrn }}</td>
                                    <td>{{ $item->patient->name }}</td>
                                    <td>{{ $item->patient->sex }}</td>
                                    <td>{{ $item->episode->episode_no }}</td>
                                    <td>{{ \Carbon\Carbon::parse(\Date::createFromFormat('Y-m-d', $item->patient->dob)->format('Y/m/d'))->diff(\Carbon\Carbon::now())->format('%y years') }}
                                    </td>
                                    <td>@if(!empty($item->procedure_date))
                                        {{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->procedure_date)->format('Y/m/d') }}}
                                        @endif
                                    </td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->waiting_days }}</td>
                                    <td>{{ $item->consultant }}</td>
                                    <td>{{ $item->clinical_specialist }}</td>
                                    <td>{{ $item->operator_1 }}</td>
                                    <td>{{ $item->operator_2 }}</td>
                                    <td>{{ $item->diagnosis }}</td>
                                    <td>{{ $item->anaesthesia_status }}</td>
                                    <td>{{ $item->consent }}</td>
                                    <td>{{ $item->financial_status }}</td>
                                    <td>{{ $item->investigation }}</td>
                                    <td>{{ $item->cath_registration }}</td>
                                    <td>{{ $item->initial_procedure }}</td>
                                    <td>{{ $item->final_proc_1st }}</td>
                                    <td>{{ $item->final_proc_2nd }}</td>
                                    <td>{{ $item->final_proc_3rd }}</td>
                                    <td>{{ $item->lab }}</td>
                                    <td>{{ $item->overall_remarks }}</td>
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
        @include('layouts.multiple.child_printscript')
    </section>
    <script>
        $(document).ready(function () {
            var table = $('#icltable').DataTable({
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
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
            });


        });

    </script>


</main>
@endsection
