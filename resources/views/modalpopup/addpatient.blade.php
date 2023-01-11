<!-- Add Modal -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewModalLabel">Add New Patient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'store']) !!}
                <div class="mb-3">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('hospital', 'Hospital') !!}
                    {!! Form::select('hospital', $hospital,null, ['class' => 'form-select', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('gender', 'Gender') !!}
                    {!! Form::select('gender', [ 1 => 'Male', 2 => 'Female' ],null, ['class' => 'form-select', 'required']) !!}
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
