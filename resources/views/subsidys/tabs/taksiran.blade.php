<br>
<div class="container" style="align-items: center">
    <div class="row mb-2">
        <label class="col-sm-2 offset-md-1 col-form-label">Prosedur</label>
        <div class="col-sm-4">
            <input type="text" value="{{ $subinfo->subsidy[0]->prosedur }}" class="form-control" disabled>
        </div>
    </div>
    <div class="row mb-2">
        <label class="col-sm-2 offset-md-1 col-form-label">Kos Anggaran</label>
        <div class="col-sm-4">
            <input type="text" value="{{ $subinfo->subsidy[0]->mampu_dibayar }}" class="form-control" disabled>
        </div>
    </div>
    <div class="row mb-2">
        <label class="col-sm-2 offset-md-1 col-form-label">Mampu Dibayar</label>
        <div class="col-sm-4">
            <input type="text" value="{{ $subinfo->subsidy[0]->mampu_dibayar }}" class="form-control" disabled>
        </div>
    </div>
    <div class="row mb-2">
        <label class="col-sm-2 offset-md-1 col-form-label">Taksiran Tarikh</label>
        <div class="col-sm-4">
            <input type="text" value="{{ $subinfo->subsidy[0]->taksiran_tarikh }}" class="form-control" disabled>
        </div>
    </div>
    <div class="row mb-2">
        <label class="col-sm-2 offset-md-1 col-form-label">Surat Kpd Pesakit</label>
        <div class="col-sm-4">
            <input type="text" value="{{ $subinfo->subsidy[0]->surat_pesakit }}" class="form-control" disabled>
        </div>
    </div>
    <div class="row mb-2">
        <label class="col-sm-2 offset-md-1 col-form-label">Surat Penyemakan</label>
        <div class="col-sm-4">
            <input type="text" value="{{ $subinfo->subsidy[0]->surat_semakan }}" class="form-control" disabled>
        </div>
    </div>
</div>
