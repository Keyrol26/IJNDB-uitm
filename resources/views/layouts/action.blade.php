@if (!empty($patient_id))
    
    <a type="button" class="btn btn-primary btn-sm" href="{{ route('episode.list', $id) }}">Episode</a>
@else
    <button type="button" class="btn btn-primary btn-sm" disabled>Episode</button>
@endif
