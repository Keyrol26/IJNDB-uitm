@extends('layouts.master')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Patient</a></li>
                    <li class="breadcrumb-item active"><a href="/billoutpatient">Bill OutPatient</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Current Bill OutPatient List</h5>
                            <p>Last Data Extracted on {{ $update->updatetime }}</p>
                            <div class="search-bar">
                                <form class="search-form d-flex" method="get">
                                    <input class="form-control float-end max-2" style="width :340px"type="text"
                                        id="filteroutbill" name="filteroutbill" placeholder="Search ...."
                                        title="Enter search keyword">
                                        &nbsp;
                                        <button type="submit" class="btn btn-info"><i class="bi bi-search"></i></button>
                                        &nbsp;
                                        <button type="reset" class="btn btn-danger"><a href="/billoutpatient"
                                                style="color: white">Clear Filter</a></button>
                                </form>
                            </div><!-- End Search Bar -->
                            <br>
                            <!--table Start-->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">@sortablelink('mrn', 'MRN')</th>
                                        <th scope="col">@sortablelink('name','Name')</th>
                                        <th scope="col">@sortablelink('episode_no', 'Eps. No')</th>
                                        <th scope="col">Payor</th>
                                        <th scope="col">Payor Office</th>
                                        <th scope="col">Payor Type</th>
                                        <th scope="col">Bill Number</th>
                                        <th scope="col">Bill Date</th>
                                        <th scope="col">Bill Amount</th>
                                        <th scope="col">Deposit Amount</th>
                                        <th scope="col">Payment Amount</th>
                                        <th scope="col">Letter</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->mrn }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->episode_no }}</td>
                                            <td>{{ $item->payor }}</td>
                                            <td>{{ $item->payor_office }}</td>
                                            <td>{{ $item->payor_type }}</td>
                                            <td>{{ $item->bill_number }}</td>
                                            <td>
                                                @if(!empty($item->bill_date))
                                                {{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->bill_date)->format('Y/m/d') }}}
                                            @endif</td>
                                            <td>{{ $item->bill_amount }}</td>
                                            <td>{{ $item->deposit_amount }}</td>
                                            <td>{{ $item->payment_amount }}</td>
                                            <td>{{ $item->letter }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--table End-->
                            <!--Start Pagination-->
                            @include('layouts.pagination')
                            <!--End Pagination-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
