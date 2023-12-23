@extends('layouts.mainlayout')

@section('title', 'Home')

@section('content')
<table class="table">
    <thead>
        <tr>
        <th scope="col">no</th>
        <th scope="col">Data</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $i => $data)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $data }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

