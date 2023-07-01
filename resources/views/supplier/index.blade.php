@extends('layouts.main')


@section('content')
@section('title', 'Supplier')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex ">
                <a href="{{ route('supplier.create') }}" class="btn btn-sm btn-primary ms-auto"><i
                        class="bi bi-plus-circle"></i> Create
                    Data</a>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $index => $supplier)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->nohp ?? '-' }}</td>
                                <td>{{ $supplier->alamat ?? '-' }}</td>
                                <td>

                                    <a href="{{ route('supplier.edit', $supplier->id) }}"
                                        class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" onclick="confirmDelete(event)"><i
                                                class="bi bi-trash"></i></button>
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
