<!-- Delete Modal -->
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
                    'route' => ['appt.delete', 'patientid' => $item->patient_id, 'id' => $item->id, 'episodeid'=> $item->episode_id],
                ]) !!}
                <h4 class="text-center">Are you sure you want to delete item?</h4>
                <br>
                <h5 class="text-center">Status: {{ $item->appointment_status }}</h5>
                <h5 class="text-center">Date: {{ $item->appointment_date }}</h5>
                <h5 class="text-center">Time: {{ $item->appointment_time }}</h5>
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
                <div class="container" style="max-width: 100%;">
                    
                    {!! Form::model($item, [
                        'method' => 'post',
                        'route' => ['appt.update', 'patientid' => $item->patient_id, 'id' => $item->id],
                    ]) !!}
                    <div class="mb-3">
                        {!! Form::label('appointment_status', 'Appointment Status') !!}
                        {!! Form::select(
                            'appointment_status',
                            ['Booked' => 'Booked', 'Arrived' => 'Arrived', 'Canceled' => 'Canceled'],
                            $item->appointment_status,
                            ['class' => 'form-select'],
                        ) !!}
                    </div>
                    {!! Form::text('patient_id', $item->patient_id, [
                        'class' => 'form-control',
                        'placeholder' => 'Department',
                        'hidden',
                    ]) !!}
                    {!! Form::text('id', $item->id, [
                        'class' => 'form-control',
                        'placeholder' => 'Department',
                        'hidden',
                    ]) !!}
                    {!! Form::text('episode_id', $item->episode_id, [
                        'class' => 'form-control',
                        'placeholder' => 'Department',
                        'hidden',
                    ]) !!}
                    <div class="mb-3">
                        {!! Form::label('appointment_date', 'Appointment Date') !!}
                        {!! Form::date('appointment_date', $item->appointment_date, [
                            'class' => 'form-control',
                        ]) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('appointment_time', 'Appointment Time') !!}
                        {!! Form::time('appointment_time', $item->appointment_time, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('resource_location', 'Resource Location') !!}
                        {!! Form::text('resource_location', $item->resource_location, [
                            'class' => 'form-control',
                            'placeholder' => 'Enter Appointment Resource Location',
                            'required',
                        ]) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('resource', 'Resource') !!}
                        {!! Form::text('resource', $item->resource, [
                            'class' => 'form-control',
                            'placeholder' => 'Enter Appointment Resource',
                            'required',
                        ]) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('service', 'Service') !!}
                        {!! Form::text('service', $item->service, ['class' => 'form-control', 'placeholder' => 'Enter Appointment Service', 'required']) !!}
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
