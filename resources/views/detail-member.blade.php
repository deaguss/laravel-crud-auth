@extends('layouts.mainlayout')

@section('title', $memberById->username)
@section('content')
<section style="background-color: #eee; height: 100vh;">
    <div class="container py-5">

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                            alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{$memberById->username }}</h5>
                        <p class="text-muted mb-4">{{ $memberById->alamat }}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-primary">Follow</button>
                            <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $memberById->username}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $memberById->email}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Join At</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $memberById->created_at->format('Y-m-d')}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $memberById->no_hp}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $memberById->alamat}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">jenis kelamin</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $memberById->gender == '0' ? 'Perempuan' : 'Laki-laki'}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Trainer</span>
                                </p>
                                <hr>
                                <p class="mb-1" style="font-size: .77rem;">Name: {{
                                    $memberById->trainerMember->train_name}}
                                </p>
                                <hr>
                                <p class="mb-1" style="font-size: .77rem;">Dibuat: {{
                                    $memberById->trainerMember->created_at->format('Y-m-d')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Total item:
                                        {{$memberById->items->count()}}
                                </p>
                                <p class="mb-1" style="font-size: .77rem;">
                                    @foreach ($memberById->items as $item)
                                    {{ $item->name }}
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection