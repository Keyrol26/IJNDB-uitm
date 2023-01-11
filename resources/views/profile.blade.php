 @extends('layouts.profile-master')

 @section('content')
     <main id="main" class="main">
         <div class="pagetitle">
             <h1>Patient Information</h1>
             <nav>
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item">Home</li>
                     <li class="breadcrumb-item"><a href="/home">Patient List</a></li>
                     <li class="breadcrumb-item active"><a href onClick="window.location.reload()">Patient Information</a></li>
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
                         </div>
                         <div class="card-body pt-3">
                             <div class="tab-content pt-1">
                                 <!-- Info -->
                                 <div class="card" style="border-color: #6776F4; border-style: dashed;">
                                     <div class="card-body">
                                         <h5 class="card-title">Allergy</h5>
                                         <table class="table table-striped datatable">
                                             <thead>
                                                 <tr>
                                                     <th scope="col">Date</th>
                                                     <th scope="col">Allergen</th>
                                                     <th scope="col">Note</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 @foreach ($profile->allergy as $item)
                                                     <tr>
                                                         <td>{{ $item->update_date }}</td>
                                                         <td>{{ $item->allergen }}</td>
                                                         <td>{{ $item->allergen_text }}</td>
                                                     </tr>
                                                 @endforeach
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                                 <div class="card" >
                                     <div class="card-body " style="position:relative; left:100px;">
                                         <h5 class="card-title">Patient Details</h5>
                                         <div class="row mb-2">
                                             <label for="name" class="col-sm-2 col-form-label">Name</label>
                                             <div class="col-sm-8 ">
                                                 <input type="text"value="{{ $profile->name }}" class="form-control"
                                                     disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="sex" class="col-sm-2 col-form-label">Sex</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->sex }}" class="form-control"
                                                     disabled>
                                             </div>
                                             <label for="hospital" class="col-sm-2 col-form-label">Hospital</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->hospital }}" class="form-control"
                                                     disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="mrn" class="col-sm-2 col-form-label">MRN</label>
                                             <div class="col-sm-3">
                                                 <input type="text"value="{{ $profile->mrn }}" class="form-control"
                                                     disabled>
                                             </div>
                                             <label for="mrnp" class="col-sm-2 col-form-label">MRNP</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->mrnp }}" class="form-control"
                                                     disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="dob" class="col-sm-2 col-form-label">DOB</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->dob }}" class="form-control"
                                                     disabled>
                                             </div>
                                             <label for="idtype" class="col-sm-2 col-form-label">MRN Type</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->mrntype }}" class="form-control"
                                                     disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="newic" class="col-sm-2 col-form-label">New IC</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->newic }}" class="form-control"
                                                     disabled>
                                             </div>
                                             <label for="oldic" class="col-sm-2 col-form-label">Old
                                                 IC</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->oldic }}" class="form-control"
                                                     disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="pdpa" class="col-sm-2 col-form-label">PDPA</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->pdpa }}" class="form-control"
                                                     disabled>
                                             </div>
                                             <label for="pchc" class="col-sm-2 col-form-label">PCHC</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->pchc }}" class="form-control"
                                                     disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="passportno" class="col-sm-2 col-form-label">Passport No</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->passportno }}"
                                                     class="form-control" disabled>
                                             </div>
                                             <label for="maritalstat" class="col-sm-2 col-form-label">Marital
                                                 Status</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->maritalstat }}"
                                                     class="form-control" disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="race" class="col-sm-2 col-form-label">Race</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->race }}" class="form-control"
                                                     disabled>
                                             </div>
                                             <label for="ctzenship" class="col-sm-2 col-form-label">Citizenship</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->ctzenship }}"
                                                     class="form-control" disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="residential" class="col-sm-2 col-form-label">Residential
                                                 Status</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->residential }}"
                                                     class="form-control" disabled>
                                             </div>
                                             <label for="religion" class="col-sm-2 col-form-label">Religion</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->religion }}"
                                                     class="form-control" disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="occupation" class="col-sm-2 col-form-label">Occupation</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->occupation }}"
                                                     class="form-control" disabled>
                                             </div>
                                             <label for="bluelistflag" class="col-sm-2 col-form-label">Blue List
                                                 Flag</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->bluelistflag }}"
                                                     class="form-control" disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="homeno" class="col-sm-2 col-form-label">Home Number </label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->homeno }}"
                                                     class="form-control" disabled>
                                             </div>
                                             <label for="phoneno" class="col-sm-2 col-form-label">Mobile
                                                 Number</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->phoneno }}"
                                                     class="form-control" disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                             <div class="col-sm-3">
                                                 <input type="email" value="{{ $profile->email }}"
                                                     class="form-control" disabled>
                                             </div>
                                             <label for="fax" class="col-sm-2  col-form-label">Fax</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->fax }}" class="form-control"
                                                     disabled>
                                             </div>
                                         </div>

                                         <div class="row mb-2">
                                             <label for="address" class="col-sm-2 col-form-label">Address</label>
                                             <div class="col-sm-8">
                                                 <input type="text" class="form-control"
                                                     value="{{ $profile->address }}" disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="postcode" class="col-sm-2 col-form-label">Postcode</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->postcode }}"
                                                     class="form-control" disabled>
                                             </div>
                                             <label for="city" class="col-sm-2 col-form-label">City</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->city }}" class="form-control"
                                                     disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="state" class="col-sm-2 col-form-label">State</label>
                                             <div class="col-sm-3">
                                                 <input type="text" value="{{ $profile->state }}"
                                                     class="form-control" disabled>
                                             </div>
                                             <label for="country" class="col-sm-2 col-form-label">Country</label>
                                             <div class="col-sm-3">
                                                 <input type="text" name="country" id="country"
                                                     value="{{ $profile->country }}" class="form-control" disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="state" class="col-sm-3 col-form-label">Medical Record
                                                 Location</label>
                                             <div class="col-sm-3">
                                                 <input type="text" name="medrecordlocation"
                                                     id="medrecordlocation"value="{{ $profile->medrecordlocation }}"
                                                     class="form-control" disabled>
                                             </div>
                                         </div>
                                         <div class="row mb-2">
                                             <label for="language" class="col-sm-3 col-form-label">Pref. Language</label>
                                             <div class="col-sm-3">
                                                 <input type="text" name="language"
                                                     id="language"value="{{ $profile->language }}" class="form-control"
                                                     disabled>
                                             </div>
                                         </div>
                                         <br>
                                     </div>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
         </section>
     </main><!-- End #main -->
 @endsection
