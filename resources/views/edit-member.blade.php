@extends('layouts.mainlayout')

@section('title', 'Home')
@section('crud-title', 'Update')

@section('content')

@if (Session::has('status'))
<div class="alert alert-{{ Session::get('status') }}" role="alert">
    {{ Session::get('message') }}
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="container">
    <div class="card border-primary mb-3 p-4" style="max-width: 30rem;">
        <h5 class="text-muted">Update data {{ $memberById->username }}</h5>
        <form action="/member/{{ $memberById->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group my-2 pb-2">
                <label>Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email"
                    value="{{ $memberById->email }}">
            </div>
            <div class="form-group my-2 pb-2">
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter Username"
                    value="{{ $memberById->username }}">
            </div>
            <div class="form-group my-2 pb-2">
                <label>No Hp</label>
                <input type="text" class="form-control" name="no_hp" placeholder="Enter Number phone"
                    value="{{ $memberById->no_hp }}">
            </div>
            <div class="form-group my-2 pb-2">
                <label>Address</label>
                <input type="text" class="form-control" name="alamat" placeholder="Enter Address"
                    value="{{ $memberById->alamat }}">
            </div>
            <div class="form-group my-2 pb-2">
                <label>Gender</label>
                <select name="gender" class="form-control">
                    <option value="" selected disabled>Select one</option>
                    <option value="1" {{ $memberById->gender == 1 ? 'selected' : ''}}>Man</option>
                    <option value="0" {{ $memberById->gender == 0 ? 'selected' : ''}}>Women</option>
                </select>
            </div>
            <div class="form-group my-2 pb-2">
                <label for="exampleFormControlSelect1">Trainer</label>
                <select name="trainer_id" class="form-control" id="exampleFormControlSelect1">
                    <option value="{{ $memberById->trainerMember->id }}">{{ $memberById->trainerMember->train_name }}
                    </option>
                    @foreach ($trainer as $train)
                    <option value="{{ $train->id }}">{{ $train->train_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection