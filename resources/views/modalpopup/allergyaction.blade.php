<link href="{{ asset('multiple/css/action-modal.css') }}" rel="stylesheet">
<!-- Delete Modal -->
<div class="modal fade" id="delete{{ $item->id }}{{$item->patient_id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($item, ['method' => 'delete', 'route' => ['allergy.delete', 'patientid' => $item->patient_id, 'id' =>$item->id]]) !!}
                <h4 class="text-center">Are you sure you want to delete item?</h4>
                <h5 class="text-center">Name: {{ $item->allergen }}</h5>
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
<div class="modal fade" id="edit{{ $item->id }}{{$item->patient_id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($item, ['method' => 'post' ,'route' => ['allergy.update', 'patientid' => $item->patient_id, 'id' =>$item->id]]) !!}
                @csrf
                <div class="mb-3">
                    {!! Form::label('allergen', 'Allergen') !!}
                    {!! Form::text('allergen', $item->allergen, ['class' => 'form-control','required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('allergen_text', 'Note') !!}
                    {!! Form::text('allergen_text', $item->allergen_text, ['class' => 'form-control']) !!}
                    {!! Form::text('update_date', Carbon\Carbon::now(), ['class' => 'form-control','hidden']) !!}
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