@extends('layouts.main')


@section('content')
@section('title', 'Product Edit')
<div class="page-content">
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Edit Product</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('product.update', $product->id) }}"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Category Name</label>
                                                <input type="text" id="name"
                                                    class="form-control @error('name')
                                                    is-invalid
                                                @enderror"
                                                    name="name" placeholder="Category Name"
                                                    value="{{ $product->name ?? old('name') }}">
                                            </div>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 ">
                                            <h6>Select Category *</h6>
                                            <div class="form-group">
                                                <select class="choices form-select" name="category_id">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $product->category->id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 ">
                                            <h6>Select Supplier *</h6>
                                            <div class="form-group">
                                                <select class="choices form-select" name="supplier_id">
                                                    {{-- @foreach ($categories as $category) --}}
                                                    <option value="1">
                                                        HengkyOng</option>
                                                    {{-- @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="stock">Stock *</label>
                                                <input type="number" id="stock"
                                                    class="form-control @error('stock')
                                                    is-invalid
                                                @enderror"
                                                    name="stock" placeholder="Stock "
                                                    value="{{ $product->stock ?? old('stock') }}">
                                            </div>
                                            @error('stock')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="stock">Price / item *</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Rp.</span>
                                                    <input type="number" id="price"
                                                        class="form-control @error('price')
                                                    is-invalid @enderror"
                                                        name="price" placeholder="Price"
                                                        value="{{ $product->price ?? old('price') }}">
                                                    <span class="input-group-text">per Item</span>
                                                </div>
                                            </div>
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label for="name">Date In *</label>
                                                <input type="date" name="date_in" class="form-control"
                                                    value="{{ $product->date_in ?? old('date_in') }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="storage_location">Storage Location </label>
                                                <input type="text" id="storage_location"
                                                    class="form-control @error('storage_location')
                                                    is-invalid
                                                @enderror"
                                                    name="storage_location" placeholder="Storage Location"
                                                    value="{{ $product->storage_location ?? old('storage_location') }}">
                                            </div>
                                            @error('storage_location')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="location">Description</label>
                                            <div class="form-group with-title mb-3">
                                                <textarea class="form-control" id="description" rows="3" name="description">{{ $product->description }}</textarea>
                                                <label>Nullable</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Image</label>
                                                <input class="form-control" name="image" type="file"
                                                    id="image">
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
