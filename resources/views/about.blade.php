@extends('layouts.mainlayout')

@section('title', 'About')

@section('content')



<h1>Anda adalah {{Auth::user()->role->name}}
</h1>
@endsection