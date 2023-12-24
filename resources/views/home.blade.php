@extends('layouts.mainlayout')

@section('title', 'Home')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">No Hp</th>
            <th scope="col">Gender</th>
            <th scope="col">Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $i => $member)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $member->username }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->no_hp }}</td>
            <td>{{ $member->gender == '1' ? 'Laki-laki' : 'Perempuan' }}</td>
            <td>{{ $member->alamat }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
