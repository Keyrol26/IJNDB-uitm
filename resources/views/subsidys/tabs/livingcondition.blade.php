<div class="card-body">
    <div class="container" style="align-items: center">
        <div class="row mb-2">
            <label class="col-sm-2 offset-md-1 col-form-label">Status Kediamann</label>
            {{-- <h5 class="offset-md-1 modal-title" id="staticBackdropLabel">Sebab :</h5> --}}
            {{-- <label class="col-sm-0 offset-md-1 col-form-label ">Sebab</label> --}}
            <div class=" col-sm-7">
                <textarea rows="3" cols="50" class="form-control" disabled>{{ $subinfo->subsidy[0]->status_kediaman }}</textarea>
            </div>
        </div>
        <div class="row mb-2">
            {{-- <h5 class="offset-md-2 modal-title" id="staticBackdropLabel">Sebab Lain :</h5> --}}
            <label class="col-sm-2 offset-md-1 col-form-label">Jenis Rumah</label>
            <div class=" col-sm-7">
                <textarea rows="3" cols="50" class="form-control" disabled>{{ $subinfo->subsidy[0]->jenis_rumah }}</textarea>
            </div>
        </div>
        <div class="row mb-2">
            <label class="col-sm-2 offset-md-1 col-form-label">Kemudahan Asas</label>
            {{-- <h5 class="offset-md-2 modal-title" id="staticBackdropLabel">Ringkasan :</h5> --}}
            <div class=" col-sm-7">
                <textarea rows="3" cols="50" class="form-control" disabled>{{ $subinfo->subsidy[0]->kemudahan_asas }}</textarea>
            </div>
        </div>
    </div>
</div>
