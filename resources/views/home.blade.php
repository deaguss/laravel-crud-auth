@extends('layouts.mainlayout')

@section('title', 'Home')

@section('content')

<div class="p-2">
    <a href="/add-member" class="btn btn-info text-white">New Member</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">No Hp</th>
            <th scope="col">Detail</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $i => $member)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $member->username }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->no_hp }}</td>
            <td>
                <a href="/home/{{ $member->id }}" class="btn btn-outline-success">Detail</a>
            </td>
            <td>
                <a href="" role="button" class="btn btn-primary">Edit</a>
                <button type="button" class="btn btn-danger">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection