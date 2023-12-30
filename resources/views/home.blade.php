@extends('layouts.mainlayout')

@section('title', 'Home')

@section('content')

<div class="d-flex">
    <div class="p-2">
        <a href="/add-member" class="btn btn-info text-white">New Member</a>
    </div>

    <div class="p-2">
        <a href="/soft-delete-member" class="btn btn-primary text-white">Show soft deleted</a>
    </div>

    <div class="p-2">
        <form id="searchForm" action="" method="get">
            <div class="input-group">
                <input type="text" class="form-control" id="searchInput" placeholder="Search... " name="search" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
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
                <a href="/edit-member/{{ $member->id }}" role="button" class="btn btn-primary">Edit</a>

                <form action="/member/{{ $member->id }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure?') ? window.location.href='/member/{{ $member->id }}' : false">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="p-2">
    {{ $members->withQueryString()->links() }}
</div>
@endsection