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
                    <li class="breadcrumb-item active"><a href="/mhd">MHD Listing</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">MHD Listing </h5>
                            <p>Last Data Extracted on {{ $update->updatetime }}</p>
                            <div class="search-bar">
                                <form class="search-form d-flex" method="get">
                                    <input class="form-control float-end max-2" style="width :340px"type="text"
                                        id="filtermhd" name="filterpatient" placeholder="Search ...."
                                        title="Enter search keyword">
                                    &nbsp;
                                    <button type="submit" class="btn btn-info"><i class="bi bi-search"></i></button>
                                    &nbsp;
                                    <button type="reset" class="btn btn-danger"><a href="/mhd"
                                            style="color: white">Clear Filter</a></button>
                                </form>
                            </div><!-- End Search Bar -->

                            <br>
                            {{-- <p>Total MHD : {{ $count }}</p> --}}
                            <table id="empTable"class="table display table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">@sortablelink('patient.mrn', 'MRN')</th>
                                        <th scope="col">@sortablelink('patient.name', 'Name')</th>
                                        <th scope="col">@sortablelink('episode_no', 'Eps. No')</th>
                                        <th scope="col">@sortablelink('source', 'Source')</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">No of Delivery</th>
                                        <th scope="col">Recruitment Date</th>
                                        <th scope="col">Delivery Due Date</th>
                                        <th scope="col">Approx Prep Date</th>
                                        <th scope="col">Picked-up Date</th>
                                        <th scope="col">Tracking No</th>
                                        <th scope="col">Returned Date</th>
                                        <th class="none">Cancelled Date</th>
                                        <th class="none">Action Taken Date</th>
                                        <th class="none">On-Hold Date</th>
                                        <th class="none">Remarks</th>
                                        <th class="none">Presc Slip</th>
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
                                            <td>{{ $item->source }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->deliverqtt }}</td>
                                            <td>{{ $item->recruitdate }}</td>
                                            <td>{{ $item->deliverydate }}</td>
                                            <td>{{ $item->approxdate }}</td>
                                            <td>{{ $item->pickupdate }}</td>
                                            <td>{{ $item->trackingno }}</td>
                                            <td>{{ $item->returndate }}</td>
                                            <td>{{ $item->canceldate }}</td>
                                            <td>{{ $item->actiondate }}</td>
                                            <td>{{ $item->holddate }}</td>
                                            <td>{{ $item->remarks }}</td>
                                            <td>{{ $item->slip }}</td>
                                            <td><button class='btn btn-info viewdetails'
                                                    data-id='{{ $item->patient_id }}'>Info</button></td>
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

        <!-- Modal -->
        <div class="modal fade" id="empModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                {{-- <div class="modal-dialog modal-dialog-centered mw-650px"> --}}
                <div class="modal-content">
                    <!--header-->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delivery Informations</h5>
                    </div>
                    <!--body-->
                    <div class="modal-body" id="tblempinfo">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <script>
        $(document).ready(function() {
            var table = $('#empTable').DataTable({
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
    <script type='text/javascript'>
        $(document).ready(function() {

            $('#empTable').on('click', '.viewdetails', function() {
                var empid = $(this).attr('data-id');

                if (empid > 0) {

                    // AJAX request
                    var url = "{{ route('getMhdDetails', [':empid']) }}";
                    url = url.replace(':empid', empid);

                    // Empty modal data
                    $('#tblempinfo tbody').empty();

                    $.ajax({
                        url: url,
                        dataType: 'json',
                        success: function(response) {

                            // Add employee details
                            $('#tblempinfo').html(response.html);

                            // Display Modal
                            $('#empModal').modal('show');
                        }
                    });
                }
            });

        });
    </script>
@endsection
