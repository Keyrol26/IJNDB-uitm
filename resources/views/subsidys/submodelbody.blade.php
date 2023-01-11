
<br><div class="modal-body">
    <div class="container">
        <div class="row mb-2">
            <label  class="col-sm-1 col-form-label">MRN</label>
            <div class="col-sm-3">
                <input type="text" value="{{ $subinfo->mrn }}" class="form-control" disabled>
            </div>
            <label for="name" class="col-sm-1 col-form-label">Name</label>
            <div class="col-sm-6 ">
                <input type="text"value="{{ $subinfo->name }}" class="form-control" disabled>
            </div>
        </div>
        <div class="row mb-2">
            <label  class="col-sm-1 col-form-label">Jantina</label>
            <div class="col-sm-2">
                <input type="text" value="{{ $subinfo->sex }}" class="form-control" disabled>
            </div>
            <label  class="col-sm-2 col-form-label">Taraf Kahwin</label>
            <div class="col-sm-2">
                <input type="text" value="{{ $subinfo->maritalstat }}" class="form-control" disabled>
            </div>
            <label  class="col-sm-2 col-form-label">K/P</label>
            <div class="col-sm-2">
                <input type="text" value="{{ $subinfo->newic }}" class="form-control" disabled>
            </div>
            
        </div>
        <div class="row mb-2">
            <label  class="col-sm-1 col-form-label">Umur</label>
            <div class="col-sm-2">
                @if ($subinfo->dob == ''){
                    <input type="text" class="form-control" disabled value="{{ $subinfo->dob }}">}
                @else 
                <input type="text" class="form-control" disabled value=" {{{ \Carbon\Carbon::parse($subinfo->dob)->diff(\Carbon\Carbon::now())->format('%yY %mM %dD') }}}">
                @endif
            </div>
            <label  class="col-sm-2 col-form-label">Tarikh Lahir</label>
            <div class="col-sm-2">
                <input type="text" value="{{ $subinfo->dob }}" class="form-control" disabled>
            </div>
            <label  class="col-sm-2 col-form-label">Warganegara</label>
            <div class="col-sm-2">
                <input type="text" value="{{ $subinfo->ctzenship }}" class="form-control" disabled>
            </div>
        </div>
        <div class="row mb-2">
            <label  class="col-sm-1 col-form-label">Tel No</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" disabled value="{{ $subinfo->homeno }}">
            </div>
            <label  class="col-sm-2 col-form-label">Tel Bimbit</label>
            <div class="col-sm-2">
                <input type="text" value="{{ $subinfo->phoneno }}" class="form-control" disabled>
            </div>
            <label  class="col-sm-2 col-form-label">Agama</label>
            <div class="col-sm-2">
                <input type="text" value="{{ $subinfo->religion }}" class="form-control" disabled>
            </div>
        </div>
        <div class="row mb-2">
            <label  class="col-sm-1 col-form-label">Alamat</label>
            <div class="col-sm-3">
                <textarea rows="3" cols="50" class="form-control" disabled>{{ $subinfo->address }}</textarea>
            </div>
            <label  class="col-sm-1 col-form-label">Poskod</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" disabled value="{{ $subinfo->postcode }}">
            </div>
            <label  class="col-sm-2 col-form-label">Pekerjaan</label>
            <div class="col-sm-2">
                <input type="text" value="{{ $subinfo->occupation }}" class="form-control" disabled>
            </div>
        </div>
    </div>
    <hr>
    <!-- Default Tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="closefam-tab" data-bs-toggle="tab" data-bs-target="#closefam" type="button" role="tab" aria-controls="closefam" aria-selected="true">Keluarga Terdekat</button>
        </li>
        @if(!empty( $subinfo->subsidydocs[0] ))
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="doc-tab" data-bs-toggle="tab" data-bs-target="#doc" type="button" role="tab" aria-controls="profile" aria-selected="false">Dokumen</button>
        </li>
        @endif
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="sebab-tab" data-bs-toggle="tab" data-bs-target="#sebab" type="button" role="tab" aria-controls="sebab" aria-selected="false">Sebab</button>
        </li>
        @if(!empty( $subinfo->subsidydpd[0] ))
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="waris-tab" data-bs-toggle="tab" data-bs-target="#waris" type="button" role="tab" aria-controls="waris" aria-selected="false">Tanggungan/Waris</button>
        </li>
        @endif  
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="livingcondition-tab" data-bs-toggle="tab" data-bs-target="#livingcondition" type="button" role="tab" aria-controls="livingcondition" aria-selected="false">Keadaan Tempat Tinggal</button>
        </li>
        @if(!empty( $subinfo->subsidydata[0] ))
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="subsidydata-tab" data-bs-toggle="tab" data-bs-target="#subsidydata" type="button" role="tab" aria-controls="subsidydata" aria-selected="false">Data Subsidi</button>
        </li>
        @endif
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="taksiran-tab" data-bs-toggle="tab" data-bs-target="#taksiran" type="button" role="tab" aria-controls="taksiran" aria-selected="false">Taksiran</button>
        </li>
    </ul>
    <div class="tab-content pt-2" id="myTabContent">
        <div class="tab-pane fade show active" id="closefam" role="tabpanel" aria-labelledby="closefam-tab">
        @include('subsidys.tabs.closefam')
        </div>
        <div class="tab-pane fade " id="doc" role="tabpanel" aria-labelledby="doc-tab">
        @include('subsidys.tabs.document')
        </div>
        <div class="tab-pane fade " id="sebab" role="tabpanel" aria-labelledby="sebab-tab">
        @include('subsidys.tabs.reasontab')
        </div>
        <div class="tab-pane fade " id="waris" role="tabpanel" aria-labelledby="waris-tab">
        @include('subsidys.tabs.waris')
        </div>
        <div class="tab-pane fade " id="livingcondition" role="tabpanel" aria-labelledby="livingcondition-tab">
        @include('subsidys.tabs.livingcondition')
        </div>
        <div class="tab-pane fade " id="subsidydata" role="tabpanel" aria-labelledby="subsidydata-tab">
        @include('subsidys.tabs.subsidydata')
        </div>
        <div class="tab-pane fade " id="taksiran" role="tabpanel" aria-labelledby="taksiran-tab">
        @include('subsidys.tabs.taksiran')
        </div>
      <!-- End Default Tabs -->
    </div>
    <br><br>
    <br>
   
</div>
