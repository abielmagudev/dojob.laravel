@extends('app')
@section('content')
<x-heading>Warranties</x-heading>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle shadow-none">
                <thead>
                    <tr>
                        <th>Expire</th>
                        <th>Name</th>
                        <th>Job</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($warranties as $warranty)
                    <tr>
                        <td>{{ $warranty->expires }}</td>
                        <td>{{ $warranty->name }}</td>
                        <td>{{ $warranty->work->job_name }}</td>
                        <td class='text-end'>
                            <a href="{{ route('warranties.edit', $warranty) }}" class="btn btn-outline-warning">Edit</a>
                        </td>
                    </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
