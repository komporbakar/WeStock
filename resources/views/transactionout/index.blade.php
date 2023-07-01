@extends('layouts.main')


@section('content')
@section('title', 'Supplier')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex ">
                <a href="{{ route('transactionout.create') }}" class="btn btn-sm btn-primary ms-auto"><i
                        class="bi bi-plus-circle"></i> Create
                    Data</a>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Invoice</th>
                            <th>Name</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactionouts as $index => $transactionout)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $transactionout->invoice_id }}</td>
                                <td>{{ $transactionout->name }}</td>
                                <td>{{ $transactionout->stock }}</td>
                                <td>Rp. {{ number_format($transactionout->price) }}</td>
                                <td>

                                    <a href="{{ route('transactionout.edit', $transactionout->id) }}"
                                        class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('transactionout.destroy', $transactionout->id) }}"
                                        method="POST" class="d-inline">
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

@endsection

{{-- Tambahan JS --}}
