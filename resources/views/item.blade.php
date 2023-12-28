@extends('layouts.mainlayout')

@section('title', 'Item')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">name</th>
            <th scope="col">description</th>
            <th scope="col">members</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i => $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description}}</td>
            <td>@foreach ($item->members as $item)
                {{ $item->username}}
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection