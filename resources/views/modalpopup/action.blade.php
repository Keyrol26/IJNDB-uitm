{{-- <!-- Edit Modal -->
<div class="modal fade" id="edit{{$item->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Edit item</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                  {!! Form::model($item, [ 'method' => 'patch','route' => ['item.update', $item->id] ]) !!}
                      <div class="mb-3">
                          {!! Form::label('firstname', 'Firstname') !!}
                          {!! Form::text('firstname', $item->firstname, ['class' => 'form-control']) !!}
                      </div>
                      <div class="mb-3">
                          {!! Form::label('lastname', 'Lastname') !!}
                          {!! Form::text('lastname', $item->lastname, ['class' => 'form-control']) !!}
                      </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              {{Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit'])}}
              {!! Form::close() !!}
          </div>
      </div>
    </div>
  </div> --}}
   
  <!-- Delete Modal -->
  <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Delete item</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              {!! Form::model($item, [ 'method' => 'delete','route' => ['item.delete', $item->id] ]) !!}
                  <h4 class="text-center">Are you sure you want to delete item?</h4>
                  <h5 class="text-center">Name: {{$item->name}}</h5>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              {{Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
              {!! Form::close() !!}
          </div>
      </div>
    </div>
  </div>