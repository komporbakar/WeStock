@extends('layouts.main')


@section('content')
@section('title', 'Dashboard')
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Barang</h6>
                                    <h6 class="font-extrabold mb-0">{{ $total_product }} Items</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Pendapatan</h6>
                                    {{-- <h6 class="font-extrabold mb-0">{{ $total_credit->sum('stock') }} Items</h6> --}}
                                    <h6 class="font-extrabold mb-0">Rp.
                                        {{ number_format($total_credit->sum('price')) }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Pengeluaran</h6>
                                    <h6 class="font-extrabold mb-0">Rp. {{ number_format($total_debit->sum('price')) }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Profit</h6>
                                    <h6 class="font-extrabold mb-0">
                                        Rp.
                                        {{ number_format($total_credit->sum('price') - $total_debit->sum('price')) }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Total Transaction</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="transactionChart" width="400" height="100"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
</div>
@endsection
@push('script')
<script src="{{ asset('assets/chart.umd.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Ambil data dari variabel yang telah dikirimkan
    const transactions = {!! json_encode($transactions) !!};

    // Menghitung total price dan total item per hari
    const dailyTotalPrice = {};
    const dailyTotalItem = {};

    // Iterasi data transaksi
    transactions.forEach(transaction => {
        const date = transaction.transaction_date; // Tanggal dari data transaksi
        const price = transaction.price;
        const item = transaction.stock;

        if (!dailyTotalPrice[date]) {
            dailyTotalPrice[date] = 0;
            dailyTotalItem[date] = 0;
        }

        dailyTotalPrice[date] += price;
        dailyTotalItem[date] += item;
    });

    // Ambil array label dan data dari objek yang telah dihitung
    const chartLabels = Object.keys(dailyTotalPrice);
    const chartDataPrice = Object.values(dailyTotalPrice);
    const chartDataItem = Object.values(dailyTotalItem);

    // Buat chart menggunakan data yang telah dihitung
    const ctx = document.getElementById('transactionChart').getContext('2d');
    const transactionChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                    label: 'Total Price: Rp. ',
                    data: chartDataPrice,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Total Item',
                    data: chartDataItem,
                    backgroundColor: 'rgba(192, 75, 75, 0.6)',
                    borderColor: 'rgba(192, 75, 75, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
