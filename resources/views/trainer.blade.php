@extends('layouts.mainlayout')

@section('title', 'Trainer')

@section('content')

<div class="p-2">
    <button type="button" class="btn btn-info text-white">New Trainer</button>
</div>


<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trainers as $i => $trainer)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $trainer->train_name }}</td>
            <td>
                <a href="" role="button" class="btn btn-primary">Edit</a>
                <button type="button" class="btn btn-danger">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection