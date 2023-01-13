<!-- Add Modal -->
<div class="modal fade" id="addepisodeprofile" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewModalLabel">Add Episode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'episodestore']) !!}
                {!! Form::text('patient_id', $profile->id, ['class' => 'form-control', 'placeholder' => 'Department', 'hidden']) !!}
                <div class="mb-3">
                    {!! Form::label('episodetype', 'Episode Type') !!}
                    {!! Form::select('episodetype', ['Emergency' => 'Emergency', 'Inpatient' => 'Inpatient','Outpatient' => 'Outpatient'],null, ['class' => 'form-select', 'required']) !!}
                    {{-- {!! Form::select('episode_type', ['1' => 'Emergency', '2' => 'Inpatient','3' => 'Outpatient'],null, ['class' => 'form-select', 'required']) !!} --}}
                </div>
                <div class="mb-3">
                    {!! Form::label('episode_status', 'Episode Status') !!}
                    {!! Form::select('episode_status', ['Current' => 'Current', 'Discharged' => 'Discharged','Pre-Admission' => 'Pre-Admission'], null, ['class' => 'form-select', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('episode_date', 'Episode Date') !!}
                    {!! Form::date('episode_date', '', ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('episode_time', 'Episode Time') !!}
                    {!! Form::time('episode_time', '', ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('department', 'Department') !!}
                    {!! Form::text('department', '', ['class' => 'form-control', 'placeholder' => 'Department', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('doctor', 'Doctor') !!}
                    {!! Form::text('doctor', '', ['class' => 'form-control', 'placeholder' => 'Doctor', 'required']) !!}
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

