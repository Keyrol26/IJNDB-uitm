 @extends('layouts.profile-master')

 @section('content')
     <main id="main" class="main">
         <div class="pagetitle">
             <h1>Patient Information</h1>
             <nav>
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item">Home</li>
                     <li class="breadcrumb-item"><a href="/home">Patient List</a></li>
                     <li class="breadcrumb-item active"><a href onClick="window.location.reload()">Patient Information</a>
                     </li>
                 </ol>
             </nav>
         </div><!-- End Page Title -->
         <section class="section profile">
             <div class="row">
                 <div class="col-lg-10 ">
                     <div class="card">

                         <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                             <h2>{{ $profile->name }}</h2>
                             <h2>{{ $profile->mrn }}</h2>

                             <div class="card-body profile-card pt-2  align-items-center">
                                 <button type="button" id="click-me"data-bs-toggle="modal"
                                     data-bs-target="#addepisodeprofile" class="btn btn-primary pull-right"
                                     style="align-items:center"><i class="fa fa-plus"></i>
                                     Episode</button>
                                 {{-- <button type="button" id="click-me"data-bs-toggle="modal"
                                     data-bs-target="#addepisodeprofile" class="btn btn-primary pull-right"
                                     style="align-items:center"><i class="fa fa-plus"></i>
                                     MHD</button> --}}
                             </div>
                             @include('modalpopup.episodeadd')

                         </div>
                         {{-- <div class="card-body pt-2 " style="align-content: center">

                             <button type="button" id="click-me"data-bs-toggle="modal" data-bs-target="#addnew"
                                 class="btn btn-primary pull-right" style="align-items:center"><i class="fa fa-plus"></i>
                                 Episode</button>
                             <button type="button" id="click-me"data-bs-toggle="modal" data-bs-target="#addnew"
                                 class="btn btn-primary pull-right" style="align-items:center"><i class="fa fa-plus"></i>
                                 Episode</button>
                         </div> --}}
                         <div class="card-body pt-3">
                             <div class="tab-content pt-1">
                                 <!-- Info -->
                                 <div class="card" style="border-color: #6776F4; border-style: dashed;">
                                     <div class="card-body">
                                         @if ($message = Session::get('allergystore'))
                                             <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                                 role="alert">
                                                 {{ $message }}
                                                 <button type="button" class="btn-close btn-close-white"
                                                     data-bs-dismiss="alert" aria-label="Close"></button>
                                             </div>
                                         @endif
                                         @if ($message = Session::get('allergyupdate'))
                                             <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                                 role="alert">
                                                 {{ $message }}
                                                 <button type="button" class="btn-close btn-close-white"
                                                     data-bs-dismiss="alert" aria-label="Close"></button>
                                             </div>
                                         @endif
                                         @if ($message = Session::get('allergydelete'))
                                             <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                                 role="alert">
                                                 {{ $message }}
                                                 <button type="button" class="btn-close btn-close-white"
                                                     data-bs-dismiss="alert" aria-label="Close"></button>
                                             </div>
                                         @endif

                                         <h5 class="card-title" style="float: left">Allergy</h5>
                                         <button type="button" id="click-me"data-bs-toggle="modal"
                                             data-bs-target="#addnew" class="btn btn-primary pull-right"
                                             style="float:right"><i class="fa fa-plus"></i> Allergy</button>
                                         @include('modalpopup.allergy_add')
                                         <br><br>
                                         <table class="table table-striped datatable">
                                             <thead>
                                                 <tr>
                                                     <th style="min-width:20%">Actions</th>
                                                     <th style="min-width:20%">Date</th>
                                                     <th style="min-width:30%">Allergen</th>
                                                     <th style="min-width:30%">Note</th>

                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 @foreach ($profile->allergy as $item)
                                                     <tr>
                                                         <td>
                                                             {{-- @if ($item->patient_id > 20) --}}
                                                             <a href="#delete{{ $item->id }}{{ $item->patient_id }}"
                                                                 data-bs-toggle="modal" class="btn btn-danger btn-sm"><i
                                                                     class='fa fa-trash'></i> Delete</a>
                                                             <a href="#edit{{ $item->id }}{{ $item->patient_id }}"
                                                                 data-bs-toggle="modal" class="btn btn-primary btn-sm"><i
                                                                     class='fa fa-edit'></i> Update</a>
                                                             @include('modalpopup.allergyaction')
                                                             {{-- @endif --}}
                                                         </td>
                                                         <td>{{ $item->update_date }}</td>
                                                         <td>{{ $item->allergen }}</td>
                                                         <td>{{ $item->allergen_text }}</td>

                                                     </tr>
                                                 @endforeach
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                                 <div class="card">
                                     <div class="card-body pt-3">
                                         <!-- Bordered Tabs -->
                                         <ul class="nav nav-tabs nav-tabs-bordered">
                                             <li class="nav-item">
                                                 <button class="nav-link active" data-bs-toggle="tab"
                                                     data-bs-target="#profile-overview">Overview</button>
                                             </li>
                                             <li class="nav-item">
                                                 <button class="nav-link" data-bs-toggle="tab"
                                                     data-bs-target="#profile-edit">Edit Profile</button>
                                             </li>
                                         </ul>
                                         <div class="tab-content pt-2">
                                             @if ($message = Session::get('success'))
                                                 <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                                     role="alert">
                                                     {{ $message }}
                                                     <button type="button" class="btn-close btn-close-white"
                                                         data-bs-dismiss="alert" aria-label="Close"></button>
                                                 </div>
                                             @endif
                                             <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                                 <div class="card-body " style="position:relative; left:100px;">
                                                     <h5 class="card-title">Patient Details</h5>
                                                     @include('profile.details')
                                                 </div>
                                             </div>

                                             <div class="tab-pane fade  profile-edit pt-3" id="profile-edit">
                                                 <!-- Profile Edit Form -->
                                                 <div class="card-body " style="position:relative; left:100px;">

                                                     <h5 class="card-title">Patient Details</h5>
                                                     <form action="/update/{{ $profile->id }}" method="post"
                                                         enctype="multipart/form-data">
                                                         @csrf
                                                         @method('put')

                                                         <div class="row mb-2">
                                                             <label for="name"
                                                                 class="col-sm-2 col-form-label">Name</label>
                                                             <div class="col-sm-8 ">
                                                                 <input type="text"value="{{ $profile->name }}"
                                                                     class="form-control" name="name" id="name">
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="sex"
                                                                 class="col-sm-2 col-form-label">Sex</label>
                                                             <div class="col-sm-3">
                                                                 {!! Form::select(
                                                                     'sex',
                                                                     ['Male' => 'Male', 'Female' => 'Female'],
                                                                     ['value' => $profile->sex],
                                                                     ['class' => 'form-select', 'required'],
                                                                 ) !!}
                                                             </div>
                                                             <label for="hospital"
                                                                 class="col-sm-2 col-form-label">Hospital</label>
                                                             {{-- <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->hospital }}"
                                                                     class="form-control" disabled>
                                                             </div> --}}
                                                             <div class="col-sm-3">
                                                                 {!! Form::select(
                                                                     'hospital',
                                                                     ['IJN' => 'IJN', 'IJNPH' => 'IJNPH'],
                                                                     ['value' => $profile->hospital],
                                                                     ['class' => 'form-select', 'disabled'],
                                                                 ) !!}
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="mrn"
                                                                 class="col-sm-2 col-form-label">MRN</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text"value="{{ $profile->mrn }}"
                                                                     class="form-control" disabled>
                                                             </div>
                                                             <label for="mrnp"
                                                                 class="col-sm-2 col-form-label">MRNP</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->mrnp }}"
                                                                     class="form-control" disabled>
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="dob"
                                                                 class="col-sm-2 col-form-label">DOB</label>
                                                             <div class="col-sm-3">
                                                                 <input type="date" value="{{ $profile->dob }}"
                                                                     class="form-control" id='dob' name="dob">
                                                             </div>
                                                             <label for="idtype" class="col-sm-2 col-form-label">MRN
                                                                 Type</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->mrntype }}"
                                                                     class="form-control" id='mrntype' name="mrntype">
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="newic" class="col-sm-2 col-form-label">New
                                                                 IC</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->newic }}"
                                                                     class="form-control" id='newic' name="newic">
                                                             </div>
                                                             <label for="oldic" class="col-sm-2 col-form-label">Old
                                                                 IC</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->oldic }}"
                                                                     class="form-control" id='oldic' name="oldic">
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="pdpa"
                                                                 class="col-sm-2 col-form-label">PDPA</label>
                                                             <div class="col-sm-3">
                                                                 {!! Form::select(
                                                                     'pdpa',
                                                                     ['No' => 'No', 'Yes' => 'Yes'],
                                                                     ['value' => $profile->pdpa],
                                                                     ['class' => 'form-select', 'required'],
                                                                 ) !!}
                                                             </div>
                                                             <label for="pchc"
                                                                 class="col-sm-2 col-form-label">PCHC</label>
                                                             <div class="col-sm-3">
                                                                 {!! Form::select(
                                                                     'pchc',
                                                                     ['No' => 'No', 'Yes' => 'Yes'],
                                                                     ['value' => $profile->pchc],
                                                                     ['class' => 'form-select', 'required'],
                                                                 ) !!}
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="passportno"
                                                                 class="col-sm-2 col-form-label">Passport
                                                                 No</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->passportno }}"
                                                                     class="form-control" id='passportno'
                                                                     name="passportno">
                                                             </div>
                                                             <label for="maritalstat"
                                                                 class="col-sm-2 col-form-label">Marital
                                                                 Status</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text"
                                                                     value="{{ $profile->maritalstat }}"
                                                                     class="form-control" id='maritalstat'
                                                                     name="maritalstat">
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="race"
                                                                 class="col-sm-2 col-form-label">Race</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->race }}"
                                                                     class="form-control" id='race' name="race">
                                                             </div>
                                                             <label for="ctzenship"
                                                                 class="col-sm-2 col-form-label">Citizenship</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->ctzenship }}"
                                                                     class="form-control" id='ctzenship'
                                                                     name="ctzenship">
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="occupation"
                                                                 class="col-sm-2 col-form-label">Occupation</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->occupation }}"
                                                                     class="form-control" name="occupation"
                                                                     id="occupation">
                                                             </div>
                                                             <label for="bluelistflag"
                                                                 class="col-sm-2 col-form-label">Blue
                                                                 List
                                                                 Flag</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text"
                                                                     value="{{ $profile->bluelistflag }}"
                                                                     class="form-control" name="bluelistflag"
                                                                     id="bluelistflag">
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="homeno" class="col-sm-2 col-form-label">Home
                                                                 Number
                                                             </label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->homeno }}"
                                                                     class="form-control" name="homeno" id="homeno">
                                                             </div>
                                                             <label for="phoneno" class="col-sm-2 col-form-label">Mobile
                                                                 Number</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->phoneno }}"
                                                                     class="form-control" name="phoneno" id="phoneno">
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="email"
                                                                 class="col-sm-2 col-form-label">E-mail</label>
                                                             <div class="col-sm-3">
                                                                 <input type="email" value="{{ $profile->email }}"
                                                                     class="form-control" name="email" id="email">
                                                             </div>
                                                             <label for="fax"
                                                                 class="col-sm-2  col-form-label">Fax</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->fax }}"
                                                                     class="form-control" name="fax" id="fax">
                                                             </div>
                                                         </div>

                                                         <div class="row mb-2">
                                                             <label for="address"
                                                                 class="col-sm-2 col-form-label">Address</label>
                                                             <div class="col-sm-8">
                                                                 <input type="text" class="form-control"
                                                                     value="{{ $profile->address }}" name="address"
                                                                     id="address">
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="postcode"
                                                                 class="col-sm-2 col-form-label">Postcode</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->postcode }}"
                                                                     class="form-control" name="postcode" id="postcode">
                                                             </div>
                                                             <label for="city"
                                                                 class="col-sm-2 col-form-label">City</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->city }}"
                                                                     class="form-control" name="city" id="city">
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="state"
                                                                 class="col-sm-2 col-form-label">State</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" value="{{ $profile->state }}"
                                                                     class="form-control" name="state" id="state">
                                                             </div>
                                                             <label for="country"
                                                                 class="col-sm-2 col-form-label">Country</label>
                                                             <div class="col-sm-3">
                                                                 <input type="text" name="country" id="country"
                                                                     value="{{ $profile->country }}"
                                                                     class="form-control">
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="state" class="col-sm-3 col-form-label">Medical
                                                                 Record
                                                                 Location</label>
                                                             <div class="col-sm-5">
                                                                 <input type="text" name="medrecordlocation"
                                                                     id="medrecordlocation"value="{{ $profile->medrecordlocation }}"
                                                                     class="form-control">
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="language" class="col-sm-3 col-form-label">Pref.
                                                                 Language</label>
                                                             <div class="col-sm-5">
                                                                 <input type="text" name="language"
                                                                     id="language"value="{{ $profile->language }}"
                                                                     class="form-control">
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="language"
                                                                 class="col-sm-3 col-form-label">Residential
                                                                 Status</label>
                                                             <div class="col-sm-5">
                                                                 <input type="text" name="residential"
                                                                     id="residential"value="{{ $profile->residential }}"
                                                                     class="form-control">
                                                             </div>
                                                         </div>
                                                         <div class="row mb-2">
                                                             <label for="language"
                                                                 class="col-sm-3 col-form-label">Religion</label>
                                                             <div class="col-sm-5">
                                                                 <input type="text" name="religion"
                                                                     id="religion"value="{{ $profile->religion }}"
                                                                     class="form-control">
                                                             </div>
                                                         </div>
                                                         <br>
                                                         {{-- @if ($profile->patient_id > 0) --}}
                                                         <div class="text-center">
                                                             <button type="submit"
                                                                 class="btn btn-danger mt-3 ">Submit</button>
                                                         </div>
                                                         {{-- @endif --}}
                                                 </div>
                                             </div>
                                         </div><!-- End Bordered Tabs -->
                                     </div>
                                 </div>

                             </div>
                         </div>
                     </div>
         </section>

     </main><!-- End #main -->
 @endsection
