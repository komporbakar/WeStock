@extends('layouts.main')


@section('content')
@section('title', 'Transaction Create')
<div class="page-content">
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Create Transaction</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('transactionout.store') }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Name *</label>
                                                <input type="text" id="name"
                                                    class="form-control @error('name')
                                                    is-invalid
                                                @enderror"
                                                    name="name" placeholder="Name">
                                            </div>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 ">
                                            <h6>Select Product *</h6>
                                            <div class="form-group">
                                                <select class="choices form-select" name="product_id">
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">
                                                            {{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label for="transaction_date">Transaction Date *</label>
                                                <input type="date" name="transaction_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="stock">Stock *</label>
                                                <input type="number" id="stock"
                                                    class="form-control @error('stock')
                                                    is-invalid
                                                @enderror"
                                                    name="stock" placeholder="Stock">
                                            </div>
                                            @error('stock')
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
