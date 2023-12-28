@extends('layouts.mainlayout')

@section('title', 'Trainer')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trainers as $i => $trainer)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $trainer->train_name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection