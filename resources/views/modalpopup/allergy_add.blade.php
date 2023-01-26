<link href="{{ asset('multiple/css/action-modal.css') }}" rel="stylesheet">
<!-- Add Modal -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewModalLabel">Add New Ellergy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- {!! Form::open(['url' => 'allergystore/{id}']) !!} --}}
                {!! Form::open(['url' => 'allergystore']) !!}
                    <div class="mb-3">
                        {!! Form::label('allergen', 'Allergen Name') !!}
                        {!! Form::text('allergen', '', ['class' => 'form-control', 'placeholder' => 'Enter Allergen Name', 'required']) !!}
                        {!! Form::text('patient_id',$profile->id, ['class' => 'form-control', 'placeholder' => 'Allergen', 'hidden']) !!}
                        {!! Form::text('allergy_id',$count + 1, ['class' => 'form-control', 'placeholder' => 'allergy_id', 'hidden']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('text', 'Allergen Text') !!}
                        {!! Form::text('text', ' ', ['class' => 'form-control', 'placeholder' => 'Enter Allergen Text', 'required']) !!}
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                    Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
