@extends('app')
@section('content')
<a href="{{ route('works.show', $work) }}">Back</a>
<h1>{{ $work->job_name }} #{{ $work->id }}</h1>
<h2>Warranties</h2>
<a href="{{ route('warranties.create',$work) }}">Create</a>
<ul>
    @foreach($work->warranties->sortByDesc('id') as $warranty)
    <li>
        <span>{{ $warranty->title }}</span> 
        <span>({{ $warranty->expires }})</span>
        <br>
        <a href="{{ route('warranties.edit',$warranty) }}">Edit</a>
        <button type="button" data-delete="{{ $warranty->id }}">Delete</button>
    </li>
    @endforeach
</ul>
<form action="#!" method="post" id="formWarrantyDelete">
    @csrf
    @method('delete')
</form>

@push('scripts')
<script>
const deleteTriggers = {
    elements: document.querySelectorAll('button[data-delete]'),
    listening: function () {
        this.elements.forEach( function (button) {
            button.addEventListener('click', function () {
                deleteForm.send(this.dataset.delete)
            })
        })
    }
}

const deleteForm = {
    element: document.getElementById('formWarrantyDelete'),
    base_route: "<?= route('warranties.index') ?>",
    send: function (warranty_id) {
        if( isNaN(warranty_id) )
            return false;
            
        this.element.action = this.base_route + '/' + warranty_id
        this.element.submit()
    }
}

deleteTriggers.listening()
</script>
@endpush
@endsection
