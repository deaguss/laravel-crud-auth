@extends('layouts.mainlayout')

@section('title', 'Home')
@section('crud-title', 'Create')

@section('content')

<div class="container">
    <div class="card border-primary mb-3 p-4" style="max-width: 30rem;">
        <h5 class="text-muted">Create a new members</h5>
        <form action="member" method="post">
            @csrf
            <div class="form-group my-2 pb-2">
                <label>Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group my-2 pb-2">
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter Username">
            </div>
            <div class="form-group my-2 pb-2">
                <label>No Hp</label>
                <input type="number" class="form-control" name="no_hp" placeholder="Enter Number phone">
            </div>
            <div class="form-group my-2 pb-2">
                <label>Address</label>
                <input type="text" class="form-control" name="alamat" placeholder="Enter Address">
            </div>
            <div class="form-group my-2 pb-2">
                <label>Gender</label>
                <select name="gender" class="form-control">
                    <option value="">Select one</option>
                    <option value="1">Man</option>
                    <option value="0">Women</option>
                </select>
            </div>
            <div class="form-group my-2 pb-2">
                <label for="exampleFormControlSelect1">Trainer</label>
                <select name="trainer" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($trainer as $train)
                    <option value="{{ $train->id }}">{{ $train->train_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection