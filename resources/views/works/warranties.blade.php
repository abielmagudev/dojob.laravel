@extends('app')
@section('content')
<x-heading>{{ $work->job_name }}</x-heading>
<div class="d-flex justify-content-between">
    <div>
        <a href="{{ route('works.show', $work) }}" class='btn btn-primary'>Back to work</a>
    </div>
    <div>
        <a href="{{ route('warranties.create',$work) }}" class='btn btn-primary'>New warranty</a>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Warranties</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class='table table-hover align-middle shadow-none'>
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
                        <td>{{ $warranty->name }}</td> 
                        <td>{{ $warranty->expires }}</td>
                        <td class='text-nowrap text-end'>
                            <a href="{{ route('warranties.edit',$warranty) }}" class='btn btn-outline-warning'>Edit</a>
                            <button type="button" data-delete="{{ $warranty->id }}" class='btn btn-outline-danger'>Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
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
