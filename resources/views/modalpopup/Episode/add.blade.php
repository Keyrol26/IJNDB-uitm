<!-- Add Episode -->
<link href="{{ asset('multiple/css/action-modal.css') }}" rel="stylesheet">
<div class="modal fade" id="addepisode" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewModalLabel">Add Episode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'episodestore']) !!}
                {!! Form::text('patient_id', $episodes[0]->patient_id, ['class' => 'form-control', 'hidden']) !!}
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
                    {!! Form::text('department', '', ['class' => 'form-control', 'placeholder' => 'Enter Episode Department', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('doctor', 'Doctor') !!}
                    {!! Form::text('doctor', '', ['class' => 'form-control', 'placeholder' => 'Enter Episode Doctor', 'required']) !!}
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



<!-- Add MHD -->
<div class="modal fade" id="addmhd" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewModalLabel">Add MHD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'mhdstore']) !!}
                {!! Form::text('patient_id', $episodes[0]->patient_id, ['class' => 'form-control', 'placeholder' => 'Department', 'hidden']) !!}
                <div class="mb-3">
                    {!! Form::label('episode_no', 'Episode No') !!}
                    {!! Form::select('episode_no',$episodeno ,null, ['class' => 'form-select', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('source', 'Source') !!}
                    {!! Form::select('source', ['Online' => 'Online', 'Onsite' => 'Onsite'],null, ['class' => 'form-select', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', [ 'New' => 'New','On-Hold' => 'On-Hold','Cancelled' => 'Cancelled','Pickued-up' => 'Pickued-up','Prepared' => 'Prepared','Returned' => 'Returned'], null, ['class' => 'form-select', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('deliverqtt', 'Delivery Quantity') !!}
                    {!! Form::number('deliverqtt', '', ['class' => 'form-control', 'placeholder' => 'Delivery Quantity', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('recruitdate', 'Recruitment Date') !!}
                    {!! Form::date('recruitdate', '', ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('deliverydate', 'Delivery Due Date') !!}
                    {!! Form::date('deliverydate', '',['class' => 'form-control', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('trackingno', 'Tracking No') !!}
                    {!! Form::text('trackingno', '',['class' => 'form-control', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('remarks', 'Remarks') !!}
                    {!! Form::text('remarks', '',['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('address', 'Address') !!}
                    {!! Form::text('address', '',['class' => 'form-control', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('city', 'City') !!}
                    {!! Form::text('city', '',['class' => 'form-control', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('postcode', 'Postcode') !!}
                    {!! Form::text('postcode', '',['class' => 'form-control', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('state', 'State') !!}
                    {!! Form::text('state', '',['class' => 'form-control', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('phoneno', 'Phone No') !!}
                    {!! Form::text('phoneno', '',['class' => 'form-control', 'required']) !!}
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