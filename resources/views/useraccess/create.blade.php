@extends('layouts.main')


@section('content')
@section('title', 'User Access Create')
<div class="page-content">
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Create User Access</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('useraccess.store') }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="username">Username *</label>
                                                <input type="text" id="username"
                                                    class="form-control @error('username')
                                                    is-invalid
                                                @enderror"
                                                    name="username" placeholder="Username">
                                            </div>
                                            @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Email *</label>
                                                <input type="email" id="name"
                                                    class="form-control @error('name')
                                                    is-invalid
                                                @enderror"
                                                    name="email" placeholder="Email">
                                            </div>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Password *</label>
                                                <input type="password" id="password"
                                                    class="form-control @error('password')
                                                    is-invalid
                                                @enderror"
                                                    name="password" placeholder="Password">
                                            </div>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 ">
                                            <h6>Role *</h6>
                                            <div class="form-group">
                                                <select class="choices form-select" name="role">
                                                    <option value="admin">Admin</option>
                                                    <option value="superadmin">Super Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
