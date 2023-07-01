@extends('layouts.main')


@section('content')
@section('title', 'Supplier Edit')
<div class="page-content">
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Edit Supplier</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('supplier.update', $supplier->id) }}"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Supplier Name</label>
                                                <input type="text" id="name"
                                                    class="form-control @error('name')
                                                    is-invalid
                                                @enderror"
                                                    name="name" placeholder="Supplier Name"
                                                    value="{{ $supplier->name ?? old('name') }}">
                                            </div>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nohp">No Hp</label>
                                                <input type="text" id="nohp"
                                                    class="form-control @error('nohp')
                                                    is-invalid
                                                @enderror"
                                                    name="nohp" placeholder="No Hp"
                                                    value="{{ $supplier->nohp ?? old('nohp') }}">
                                            </div>
                                            @error('nohp')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <div class="form-group with-title mb-3">
                                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3" name="alamat">{{ $supplier->alamat }}</textarea>
                                                    <label>Nullable</label>
                                                </div>

                                            </div>
                                            @error('alamat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
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
