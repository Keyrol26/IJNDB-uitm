<!-- Delete Modal -->
<link href="{{ asset('multiple/css/action-modal.css') }}" rel="stylesheet">
<div class="modal fade" id="delete{{ $item->id }}{{ $item->patient_id }}" tabindex="-1" aria-labelledby="myModalLabel"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($item, [
                    'method' => 'delete',
                    'route' => ['episode.delete', 'patientid' => $item->patient_id, 'id' => $item->id],
                ]) !!}
                <h4 class="text-center">Are you sure you want to delete item?</h4>
                <h5 class="text-center">Name: {{ $item->episode_no }}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                    Cancel</button>
                {{ Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit{{ $item->id }}{{ $item->patient_id }}" tabindex="-1"
    aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Episode :{{ $item->episode_no }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container" style="max-width: 50%; float:left">
                    {!! Form::model($item, [
                        'method' => 'post',
                        'route' => ['episode.update', 'patientid' => $item->patient_id, 'id' => $item->id],
                    ]) !!}
                    <div class="mb-3">
                        {!! Form::label('episode_status', 'Episode Status') !!}
                        {!! Form::select(
                            'episode_status',
                            ['Current' => 'Current', 'Discharged' => 'Discharged', 'Pre-Admission' => 'Pre-Admission'],
                            null,
                            ['class' => 'form-select'],
                        ) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('episode_date', 'Episode Date') !!}
                        {!! Form::date('episode_date', $item->episode_date, [
                            'class' => 'form-control',
                        ]) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('dischargedate', 'Discharge Date') !!}
                        {!! Form::date('dischargedate', $item->dischargedate, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('department', 'Department') !!}
                        {!! Form::text('department', $item->department, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('ward', 'Ward') !!}
                        {!! Form::text('ward', $item->ward, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('subtype', 'SubType') !!}
                        {!! Form::text('subtype', $item->subtype, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('discipline', 'Discipline') !!}
                        {!! Form::text('discipline', $item->discipline, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="container" style="max-width: 50%; float:right">
                    {!! Form::model($item, [
                        'method' => 'post',
                        'route' => ['episode.update', 'patientid' => $item->patient_id, 'id' => $item->id],
                    ]) !!}
                    <div class="mb-3">
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="mb-3">
                        {!! Form::label('episode_time', 'Episode Time') !!}
                        {!! Form::time('episode_time', $item->episode_time, [
                            'class' => 'form-control',
                            'required',
                        ]) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('dischargetime', 'Discharge Time') !!}
                        {!! Form::time('dischargetime', $item->dischargetime, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('doctor', 'Doctor') !!}
                        {!! Form::text('doctor', $item->doctor, ['class' => 'form-control', 'placeholder' => 'Doctor']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('bed', 'Bed') !!}
                        {!! Form::text('bed', $item->bed, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('visittype', 'Visit Type') !!}
                        {!! Form::text('visittype', $item->visittype, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('admissioncategory', 'Admission Category') !!}
                        {!! Form::text('admissioncategory', $item->admissioncategory, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                    Cancel</button>
                {{ Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- Add Appointment -->
<div class="modal fade" id="addappointment{{ $item->id }}" tabindex="-1" aria-labelledby="addnewModalLabel"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewModalLabel">Add Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'appointmentstore']) !!}
                {!! Form::text('patient_id', $item->patient_id, [
                    'class' => 'form-control',
                    'placeholder' => 'Department',
                    'hidden',
                ]) !!}
                {!! Form::text('episode_id', $item->id, ['class' => 'form-control', 'placeholder' => 'Department', 'hidden']) !!}
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
