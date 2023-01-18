@extends('layouts.master')
@section('content')


    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/home">Patient</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Patient Listing </h5>
                            @if ($message = Session::get('patientadd'))
                                <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                                {{ $message }}
                                 <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($message = Session::get('patientdelete'))
                                <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                                {{ $message }}
                                 <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <p>Last Data Extracted on {{ $update->updatetime }}</p>
                            <div class='dataTable-search' class="pull-left">
                                <form class="search-form d-flex" method="get">
                                    <input class="form-control float-end max-2" style="width :340px"type="text"
                                        id="filterpatient" name="filterpatient" placeholder="Search ...."
                                        title="Enter search keyword">
                                    &nbsp;
                                    <button type="submit" class="btn btn-info"><i class="bi bi-search"></i></button>
                                    &nbsp;
                                    <button type="reset" class="btn btn-danger"><a href="/home"
                                            style="color: white">Clear Filter</a></button>
                                </form>
                                <br>
                                <div class="col-md-12 col-md-offset-1">
                                    <h2>
                                        <button type="button" id="click-me"data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Add Patient</button>
                                    </h2>
                                </div>
                            </div><!-- End Search Bar -->
                           
                            <br>
                            
                            <table class="table table-hover" id="patienttable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="rounded-start">@sortablelink('hospital','Hospital')</th>
                                        <th scope="col">@sortablelink('mrn','MRN')</th>
                                        <th scope="col">@sortablelink('name','Name')</th>
                                        <th scope="col">@sortablelink('sex','Sex')</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">New Ic</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Postcode</th>
                                        <th scope="col">@sortablelink('medrecordlocation','Medical Record Location')</th>
                                        <th scope="col" class="rounded-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->hospital }}</td>
                                            <td><a class="text-gray-800 text-hover-primary mb-1" href="/profile/{{ $item->id }}">{{ $item->mrn }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->sex }}</td>
                                            <td>
                                            {{-- {{ $item->dob }} --}}
                                                @if (!empty($item->dob))
                                                {{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->dob)->format('Y/m/d') }}}
                                                @endif
                                            </td>
                                            <td>@if (!empty($item->dob))
                                                {{-- {{-- @if ($item->dob != '') --}}
                                                    {{{ \Carbon\Carbon::parse($item->dob)->diff(\Carbon\Carbon::now())->format('%y years and %m months') }}}
                                                @endif 
                                            </td>
                                            <td>{{ $item->newic }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->city }}</td>
                                            <td>{{ $item->postcode }}</td>
                                            <td>{{ $item->medrecordlocation }}</td>
                                            <td>
                                                <div class="d-grid gap-2">
                                                @if (!empty($item->patient_id))
                                                    <a type="button" class="btn btn-primary btn-sm"href="/episode/{{ $item->id }}">Episode</a>
                                                @else
                                                <button type="button" class="btn btn-primary btn-sm" disabled>Episode</button>
                                                @endif
                                                @if ($item->id > 0)
                                                <a href="#delete{{$item->id}}" data-bs-toggle="modal" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i> Delete</a>
                                                @include('modalpopup.action')
                                                </div>
                                                @endif
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
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script> --}}
        @include('layouts.multiple.printscript')
        <script>
            $(document).ready(function() {
                $('#patienttable').DataTable({
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
        <!-- Large Modal -->
        
@include('modalpopup.addpatient')

    </main>
@endsection
