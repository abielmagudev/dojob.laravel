@extends('app')
@section('content')
<a href="{{ route('works.show', $work) }}">Back</a>
<h1>{{ $work->job_name }} #{{ $work->id }}</h1>
<h2>Warranties</h2>
<a href="{{ route('warranties.create',$work) }}">Create</a>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Expires</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($work->warranties->sortByDesc('id') as $warranty)
        <tr>
            <td>{{ $warranty->about }}</td> 
            <td>{{ $warranty->expires }}</td>
            <td>
                <a href="{{ route('warranties.edit',$warranty) }}">Edit</a>
                <button type="button" data-delete="{{ $warranty->id }}">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
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
