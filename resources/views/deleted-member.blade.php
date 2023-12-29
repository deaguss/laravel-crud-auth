@extends('layouts.mainlayout')

@section('title', 'Deleted members')

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
            <th scope="col">Deleted at</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($deletedMembers as $i => $member)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $member->username }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->no_hp }}</td>
            <td>{{ $member->deleted_at }}</td>
            <td>
                <a href="/member/{{ $member->id }}/restore" class="btn btn-outline-success">Restore</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection