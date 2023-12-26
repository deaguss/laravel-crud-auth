@extends('layouts.mainlayout')

@section('title', 'Card')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">member id</th>
            <th scope="col">Status</th>
            <th scope="col">Username</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cards as $i => $card)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $card->member_id }}</td>
            <td>{{ $card->active == '1' ? 'aktif' : 'non aktif' }}</td>
            <td>{{ $card->members['username']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection