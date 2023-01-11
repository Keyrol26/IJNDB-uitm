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
                    <li class="breadcrumb-item active"><a href="/ot">OT</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">OT Listing</h5>
                            <p>Last Data Extracted on {{ $update->updatetime }}</p>
                            <div class="search-bar">
                                <form class="search-form d-flex" method="get">
                                    <input class="form-control float-end max-2" style="width :340px"type="text"
                                        id="filterinbill" name="filterinbill" placeholder="Search ...."
                                        title="Enter search keyword">
                                    &nbsp;
                                    <button type="submit" class="btn btn-info"><i class="bi bi-search"></i></button>
                                    &nbsp;
                                    <button type="reset" class="btn btn-danger"><a href="/ot"
                                            style="color: white">Clear Filter</a></button>
                                </form>
                            </div><!-- End Search Bar -->
                            <br>
                            <table id="OtTable" class="table display table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">@sortablelink('patient.mrn', 'MRN')</th>
                                        <th scope="col">@sortablelink('patient.name','Name')</th>
                                        <th scope="col">@sortablelink('episode.episode_no', 'Eps.No')</th>
                                        <th scope="col">Episode Date</th>
                                        <th scope="col">Episode Type</th>
                                        <th scope="col">Op Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Operating Theatre</th>
                                        <th scope="col">Op Code</th>
                                        <th scope="col">Op Type</th>
                                        <th scope="col">Diagnosis</th>
                                        <th scope="col">Surgeon</th>
                                        <th class="none">1st Remarks</th>
                                        <th class="none">2nd Remarks</th>
                                        <th class="none">Cancel</th>
                                        <th class="none">Anaesthetist</th>
                                        <th class="none">Referral Date</th>
                                        <th class="none">Waiting List/Surgical Recommendation</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td><a class="text-gray-800 text-hover-primary mb-1"
                                                    href="/profile/{{ $item->patient_id }}">{{ $item->patient->mrn }}</td>
                                            <td>{{ $item->patient->name }}</td>
                                            <td>{{ $item->episode->episode_no }}</td>
                                            <td>
                                                @if(!empty($item->episode->episode_date))
                                                {{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->episode->episode_date)->format('Y/m/d') }}}
                                            @endif
                                            </td>
                                            <td>{{ $item->episode->episode_type }}</td>
                                            <td>
                                                @if(!empty($item->op_date))
                                                {{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->op_date)->format('Y/m/d') }}}
                                            @endif
                                            </td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->operating_theatre }}</td>
                                            <td>{{ $item->op_code }}</td>
                                            <td>{{ $item->op_type }}</td>
                                            <td>{{ $item->diagnosis }}</td>
                                            <td>{{ $item->surgeon }}</td>
                                            <td>{{ $item->remarks }}</td>
                                            <td>{{ $item->remarks_1 }}</td>
                                            <td>{{ $item->cancel_reason }}</td>
                                            <td>{{ $item->anaestheatist }}</td>
                                            <td>{{ $item->referral_date }}</td>
                                            <td>{{ $item->waiting_list }}</td>
                                            <td><a class="btn btn-info btn-sm" href="/episode/{{ $item->patient_id }}"
                                                    title="Patient Episode">Episode</a>
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
    </main>
    <script>
        $(document).ready(function() {
            var table = $('#OtTable').DataTable({
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
