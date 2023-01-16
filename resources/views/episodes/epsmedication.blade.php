@extends('layouts.master')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Patient</a></li>
                    <li class="breadcrumb-item" ><a href="/episode/{{ $data->patient_id }}">Episode</a></li>
                    <li class="breadcrumb-item active"><a href onClick="window.location.reload()">Medication</a></li>
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
                                                <h5 class="card-title">Medication</h5>
                                                <table class="table datatable" id="medic">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Item Code</th>
                                                            <th scope="col">Item Description</th>
                                                            <th scope="col">Dose Quantity</th>
                                                            <th scope="col">UOM</th>
                                                            <th scope="col">Frequency</th>
                                                            <th scope="col">Duration</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Order Status</th>
                                                            <th scope="col">Order Priority</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Order Time</th>
                                                            <th scope="col">Receiving Location</th>
                                                          </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach($data->medic as $item)
                                                      <tr>
                                                        <td>{{ $item->order_item_code }}</td>
                                                        <td>{{ $item->order_item_decs }}</td>
                                                        <td>{{ $item->dose_qtt }}</td>
                                                        <td>{{ $item->uom }}</td>
                                                        <td>{{ $item->frequency }}</td>
                                                        <td>{{ $item->duration }}</td>
                                                        <td>{{ $item->qtt }}</td>
                                                        <td>{{ $item->order_status }}</td>
                                                        <td>{{ $item->order_priority }}</td>
                                                        <td>{{ $item->order_date }}</td>
                                                        <td>{{ $item->order_time }}</td>
                                                        <td>{{ $item->receiving_location }}</td>
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
        @include('layouts.multiple.printscript')
        <script>
            $(document).ready(function() {
                $('#medic').DataTable({
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
