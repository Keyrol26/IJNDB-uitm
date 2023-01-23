<!-- Add Appointment -->
<link href="{{ asset('multiple/css/action-modal.css') }}" rel="stylesheet">
<div class="modal fade" id="addappointment{{ $data->id }}" tabindex="-1" aria-labelledby="addnewModalLabel"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewModalLabel">Add Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'appointmentstore']) !!}
                {!! Form::text('patient_id', $data->patient_id, [
                    'class' => 'form-control',
                    'placeholder' => 'Department',
                    'hidden',
                ]) !!}
                {!! Form::text('episode_id', $data->id, ['class' => 'form-control', 'placeholder' => 'Department', 'hidden']) !!}
                <div class="mb-3">
                    {!! Form::label('appointment_status', 'Appointment Status') !!}
                    {!! Form::select(
                        'appointment_status',
                        ['Booked' => 'Booked', 'Arrived' => 'Arrived', 'Canceled' => 'Canceled'],
                        null,
                        ['class' => 'form-select'],
                    ) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('appointment_date', 'Appointment Date') !!}
                    {!! Form::date('appointment_date', '', ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('appointment_time', 'Appointment Time') !!}
                    {!! Form::time('appointment_time', '', ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('resource_location', 'Resource Location') !!}
                    {!! Form::text('resource_location', '', [
                        'class' => 'form-control',
                        'placeholder' => 'Enter Appointment Resource Location',
                        'required',
                    ]) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('resource', 'Resource') !!}
                    {!! Form::text('resource', '', ['class' => 'form-control', 'placeholder' => 'Enter Appointment Resource', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('service', 'Service') !!}
                    {!! Form::text('service', '', ['class' => 'form-control', 'placeholder' => 'Enter Appointment Service', 'required']) !!}
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