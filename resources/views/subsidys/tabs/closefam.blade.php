<br>
<div class="container" style="align-items: center">
    <div class="row mb-2">
        <label class="col-sm-1 offset-md-1 col-form-label">Name</label>
        <div class="col-sm-9">
            <input type="text" value="{{ $subinfo->subsidy[0]->nama_keluarga }}" class="form-control" disabled>
        </div>
    </div>
    <div class="row mb-2">
        <label class="col-sm-1 offset-md-1 col-form-label">K/P</label>
        <div class="col-sm-4">
            <input type="text" value="{{ $subinfo->subsidy[0]->ic_keluarga }}" class="form-control" disabled>
        </div>
        <label class="col-sm-2  col-form-label">Perhubungan</label>
        <div class="col-sm-3">
            <input type="text" value="{{ $subinfo->subsidy[0]->hubungan_keluarga }}" class="form-control" disabled>
        </div>
    </div>
    <div class="row mb-2">
        <label class="col-sm-2 offset-sm-1 col-form-label">Tel Rumah</label>
        <div class="col-sm-3">
            <input type="text" value="{{ $subinfo->subsidy[0]->homeno_keluarga }}" class="form-control" disabled>
        </div>
        <label class="col-sm-2  col-form-label">Tel Bimbit</label>
        <div class="col-sm-3">
            <input type="text" value="{{ $subinfo->subsidy[0]->phoneno_keluarga }}" class="form-control" disabled>
        </div>
    </div>
    <div class="row mb-2">
        <label class="col-sm-2 offset-md-1 col-form-label">Tel Pejabat</label>
        <div class="col-sm-3">
            <input type="text" value="{{ $subinfo->subsidy[0]->office_keluarga }}" class="form-control" disabled>
        </div>
        <label class="col-sm-2  col-form-label">Pekerjaan</label>
        <div class="col-sm-3">
            <input type="text" value="{{ $subinfo->subsidy[0]->pekerjaan_keluarga }}" class="form-control" disabled>
        </div>
    </div>
    <div class="row mb-2">
        <label class="col-sm-2 offset-md-1 col-form-label">Alamat</label>
        <div class="col-sm-5">
            <textarea rows="4" cols="50" class="form-control" disabled>{{ $subinfo->subsidy[0]->alamat_keluarga }}</textarea>
        </div>
    </div>
</div>
<br>
<h5 class=" offset-md-1 modal-title" id="staticBackdropLabel">Nama orang yang di temuduga</h5>
<div class="card-body">
    <div class="container" style="align-items: center">
        <div class="row mb-2">
            <label class="col-sm-1 offset-md-1 col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" value="{{ $subinfo->subsidy[0]->nama_temuduga }}" class="form-control" disabled>
            </div>
        </div>
        <div class="row mb-2">
            <label class="col-sm-1 offset-md-1 col-form-label">K/P</label>
            <div class="col-sm-4">
                <input type="text" value="{{ $subinfo->subsidy[0]->ic_temuduga }}" class="form-control" disabled>
            </div>
            <label class="col-sm-2  col-form-label">Perhubungan</label>
            <div class="col-sm-3">
                <input type="text" value="{{ $subinfo->subsidy[0]->hubungan_temuduga }}" class="form-control"
                    disabled>
            </div>
        </div>
        <div class="row mb-2">
            <label class="col-sm-2 offset-sm-1 col-form-label">Tel Rumah</label>
            <div class="col-sm-3">
                <input type="text" value="{{ $subinfo->subsidy[0]->homeno_temuduga }}" class="form-control"
                    disabled>
            </div>
            <label class="col-sm-2  col-form-label">Tel Pejabat</label>
            <div class="col-sm-3">
                <input type="text" value="{{ $subinfo->subsidy[0]->office_temuduga }}" class="form-control"
                    disabled>
            </div>
        </div>
        <div class="row mb-2">
            <label class="col-sm-2 offset-md-1 col-form-label">Pekerjaan</label>
            <div class="col-sm-3">
                <input type="text" value="{{ $subinfo->subsidy[0]->pekerjaan_temuduga }}" class="form-control"
                    disabled>
            </div>
        </div>
        <div class="row mb-2">
            <label class="col-sm-2 offset-md-1 col-form-label">Alamat</label>
            <div class="col-sm-5">
                <textarea rows="4" cols="50" class="form-control" disabled>{{ $subinfo->subsidy[0]->alamat_temuduga }}</textarea>
            </div>
        </div>
    </div>
</div>

