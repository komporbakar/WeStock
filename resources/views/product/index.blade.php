@extends('layouts.main')


@section('content')
@section('title', 'Barang')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex ">
                <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary ms-auto"><i
                        class="bi bi-plus-circle"></i> Create
                    Data</a>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name ?? '-' }}</td>
                                <td>{{ $product->stock }} Item</td>
                                <td>Rp. {{ number_format($product->price) }}</td>
                                <td>

                                    <a href="{{ route('product.show', $product->id) }}"
                                        class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('product.edit', $product->id) }}"
                                        class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

{{-- Tambahan JS --}}
@push('script')
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this data!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.form.submit();
                }
            });
        })
        }
    </script>
@endpush
@endsection
