@extends('layouts.master')
@section('content')

@if ($message = Session::get('success'))
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
<div class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Basic Modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>{{ $message }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div><!-- End Basic Modal-->
    @endif
@if ($message = Session::get('Deleted'))
<script>
    $(document).ready(function(){
        $("#deletemodal").modal('show');
    });
</script>
<div class="modal fade"id="deletemodal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Basic Modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>{{ $message }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div><!-- End Basic Modal-->
    @endif
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
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Patient</button>
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
                                                @if (!empty($item->patient_id))
                                                    <a type="button" class="btn btn-primary btn-sm"href="/episode/{{ $item->id }}">Episode</a>
                                                @else
                                                <button type="button" class="btn btn-primary btn-sm" disabled>Episode</button>
                                                @endif
                                                @if ($item->id > 20)
                                                <a href="#delete{{$item->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-trash'></i> Delete</a>
                                                @include('modalpopup.action')
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
        <!-- Large Modal -->
        
@include('modalpopup.addpatient')


    </main>
@endsection