@extends('layouts.master')
@section('content')
    @include('layouts.multiple.mhdscript')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/inpatient">Inpatient Pre-Admission</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Inpatient Listing </h5>
                            <p>Last Data Extracted on {{ $update->updatetime }}</p>
                            <div class="search-bar">
                                <form class="search-form d-flex" method="get">
                                    <input class="form-control float-end max-2" style="width :340px"type="text"
                                        id="inpatientfilter" name="inpatientfilter" placeholder="Search ...."
                                        title="Enter search keyword">
                                    &nbsp;
                                    <button type="submit" class="btn btn-info"><i class="bi bi-search"></i></button>
                                    &nbsp;
                                    <button type="reset" class="btn btn-danger"><a href="/inpatient"
                                            style="color: white">Clear Filter</a></button>
                                </form>
                            </div><!-- End Search Bar -->
                            <br>
                            {{-- <p>Total InPatient : {{ $count }}</p> --}}
                            <table id="inpatient" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">@sortablelink('episode_no', 'Eps. No')</th>
                                        <th scope="col">@sortablelink('patient.mrn', 'MRN')</th>
                                        <th scope="col">@sortablelink('patient.name', 'Name')</th>
                                        <th scope="col">Episode Date</th>
                                        <th scope="col">Episode Type</th>
                                        <th scope="col">Episode Department</th>
                                        <th scope="col">Episode Doctor</th>
                                        <th scope="col">Episode Subtype</th>
                                        <th scope="col">Visit Type</th>
                                        <th scope="col">Admission Category</th>
                                        <th scope="col">Discipline</th>
                                        <th scope="col">GL Type</th>
                                        <th scope="col">Discharge Date</th>
                                        <th scope="col">Discharge Time</th>
                                        <th scope="col">Medical Record Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            {{-- <td><a type=button class="text-gray-800 text-hover-primary mb-1 viewdetails"
                                                    data-id='{{ $item->id }}'>{{ $item->episode_no }}</a></td> --}}
                                            <td>{{ $item->episode_no }}</td>
                                            <td><a class="text-gray-800 text-hover-primary mb-1"
                                                    href="/profile/{{ $item->patient_id }}">{{ $item->patient->mrn }}</td>
                                            <td>{{ $item->patient->name }}</td>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->episode_date)->format('Y/m/d') }}
                                            </td>
                                            <td>{{ $item->episode_type }}</td>
                                            <td>{{ $item->department }}</td>
                                            <td>{{ $item->doctor }}</td>
                                            <td>{{ $item->subtype }}</td>
                                            <td>{{ $item->visittype }}</td>
                                            <td>{{ $item->admissioncategory }}</td>
                                            <td>{{ $item->discipline }}</td>
                                            <td>{{ $item->gl_type }}</td>
                                            <td>{{ $item->dischargedate }}</td>
                                            <td>{{ $item->dischargetime }}</td>
                                            <td>{{ $item->medicallocation }}</td>
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

        <div class="modal fade" id="empModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!--header-->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Episode Informations</h5>
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
        @include('layouts.multiple.printscript')
        <script>
            $(document).ready(function() {
                $('#inpatient').DataTable({
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

    <script type='text/javascript'>
        $(document).ready(function() {

            $('#epstable').on('click', '.viewdetails', function() {
                var empid = $(this).attr('data-id');

                if (empid > 0) {

                    // AJAX request
                    var url = "{{ route('getEpsDetails', [':empid']) }}";
                    url = url.replace(':empid', empid);

                    // Empty modal data
                    $('#tblempinfo').empty();

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
