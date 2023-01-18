<!-- Add Modal -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewModalLabel">Add New Patient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'store']) !!}
                <div class="mb-3">
                    {!! Form::label('name', 'Enter Name') !!}
                    {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Patient Name', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('hospital', 'Hospital') !!}
                    {!! Form::select('hospital', $hospital, null, ['class' => 'form-select', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('gender', 'Gender') !!}
                    {!! Form::select('gender', [1 => 'Male', 2 => 'Female'], null, ['class' => 'form-select', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('dob', 'Date OF Birth') !!}
                    {!! Form::date('dob', '', ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('newic', 'New IC Number') !!}
                    {!! Form::text('newic', '', ['class' => 'form-control', 'placeholder' => 'Enter Patient IC Number', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('address', 'Address') !!}
                    {!! Form::textarea('address', '', [
                        'class' => 'form-control',
                        'placeholder' => 'Enter Patient Address',
                        'style' => 'height: 100px',
                        'required',
                    ]) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('city', 'City') !!}
                    {!! Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'Enter Patient City', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('postcode', 'Postcode') !!}
                    {!! Form::text('postcode', '', ['class' => 'form-control', 'placeholder' => 'Enter Patient Postcode', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('medrecordlocation', 'Medical Record Location') !!}
                    {!! Form::text('medrecordlocation', '', ['class' => 'form-control', 'placeholder' => 'Enter Patient Medical Record Location', 'required']) !!}
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
