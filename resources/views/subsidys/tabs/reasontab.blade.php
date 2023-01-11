<div class="card-body">
    <div class="container" style="align-items: center">
        <div class="row mb-2">
            <label class="col-sm-2 offset-md-1 col-form-label">Sebab-Sebab</label>
            {{-- <h5 class="offset-md-1 modal-title" id="staticBackdropLabel">Sebab :</h5> --}}
            {{-- <label class="col-sm-0 offset-md-1 col-form-label ">Sebab</label> --}}
            <div class=" col-sm-7">
                <textarea rows="4" cols="50" class="form-control" disabled>{{ $subinfo->subsidy[0]->sebab }}</textarea>
            </div>
        </div>
        <div class="row mb-2">
            {{-- <h5 class="offset-md-2 modal-title" id="staticBackdropLabel">Sebab Lain :</h5> --}}
            <label class="col-sm-2 offset-md-1 col-form-label">Sebab Lain</label>
            <div class=" col-sm-7">
                <textarea rows="4" cols="50" class="form-control" disabled>{{ $subinfo->subsidy[0]->sebab_lain }}</textarea>
            </div>
        </div>
        <div class="row mb-2">
            <label class="col-sm-2 offset-md-1 col-form-label">Ringkasan</label>
            {{-- <h5 class="offset-md-2 modal-title" id="staticBackdropLabel">Ringkasan :</h5> --}}
            <div class=" col-sm-7">
                <textarea rows="6" cols="50" class="form-control" disabled>{{ $subinfo->subsidy[0]->summary }}</textarea>
            </div>
        </div>
    </div>
</div>
