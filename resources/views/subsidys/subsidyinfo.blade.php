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
                                                    href="/profile/{{ $item->patient_id }}">{{ $item->patient->mrn }}</td>
                                            <td>{{ $item->patient->name }}</td>
                                            <td>{{ $item->patient->address }}</td>
                                            <td>{{ $item->patient->postcode }}</td>
                                            <td>{{ $item->patient->occupation }}</td>
                                            <td>{{ $item->patient->maritalstat }}</td>
                                            <td>{{ $item->patient->sex }}</td>
                                            <td>@if (!empty($item->patient->dob))
                                                {{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->patient->dob)->format('d/m/Y') }}}
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
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="false">
            <div class="modal-dialog modal-dialog-scrollable modal-xl ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Subsidy View</h5>
                        <a type="button" class="btn-close"  aria-label="Close" 
                        {{-- href="/subsidy" --}}href="javascript:history.back()"
                        ></a>
                    </div>
                    @include('subsidys.submodelbody')
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary"  
                        {{-- href="/subsidy" --}}href="javascript:history.back()"
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
