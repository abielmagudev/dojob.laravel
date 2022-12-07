@extends('app')
@section('content')
<x-heading>Works</x-heading>
<div class='d-flex justify-content-end align-items-middle'>
    <div class='me-3'>
        <form action="{{ route('works.index') }}" method="get">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputDate">Scheduled</label>
                <input type="date" class="form-control" id='inputDate' name='date' value="{{ $date }}" onchange='this.form.submit()'>
            </div>
        </form>
    </div>
    <div>
        <a href="{{ route('works.create', mt_rand(1,50)) }}" class='btn btn-primary'>New work</a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <span>Works</span>
        <span class="badge bg-primary">{{ $works->total() }}</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class='table table-hover align-middle shadow-none'>
                <thead>
                    <tr>
                        <th>Job</th>
                        <th>Client</th>
                        <th>Scheduled</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($works as $work)
                    <tr>
                        <td class='text-nowrap d-none'>{{ $work->scheduled_date }}</td>
                        <td>{{ $work->job->name }}</td>
                        <td>
                            <span class="d-block">{{ $work->client->residence }}</span>
                            <span class="d-block">{{ $work->client->fullname }}</span>
                        </td>
                        <td>{{ $work->scheduled_date }}</td>
                        <td class='text-nowrap text-end'>
                            <a href="{{ route('works.show', $work) }}" class='btn btn-outline-primary'>Show</a>
                            <a href="{{ route('works.edit', $work) }}" class='btn btn-outline-warning'>Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<x-pagination :collection=$works></x-pagination>
@endsection
