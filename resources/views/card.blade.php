@extends('layouts.mainlayout')

@section('title', 'Card')

@section('content')

<div class="p-2">
    <button type="button" class="btn btn-info text-white">New Card</button>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">member id</th>
            <th scope="col">Status</th>
            <th scope="col">Username</th>
            <th scope="col">Trainer</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cards as $i => $card)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $card->member_id }}</td>
            <td>{{ $card->active == '1' ? 'aktif' : 'non aktif' }}</td>
            <td>{{ $card->members['username']}}</td>
            <td>{{ $card->members->trainerMember->train_name }}</td>
            <td>
                <a href="" role="button" class="btn btn-primary">Edit</a>
                <button type="button" class="btn btn-danger">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection