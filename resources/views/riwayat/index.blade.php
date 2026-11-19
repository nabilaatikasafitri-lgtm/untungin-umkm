
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat | Untungin UMKM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f7fc;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #243247;
        }

        .container {
            max-width: 1200px;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .page-title {
            font-weight: 700;
            color: #173b76;
        }

        .subtitle {
            color: #718096;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(20, 50, 90, 0.06);
        }

        .summary-card {
            border: none;
            border-radius: 15px;
            height: 100%;
        }

        .income-card {
            background: #e9f8ef;
        }

        .expense-card {
            background: #fff0f0;
        }

        .profit-card {
            background: #eaf1ff;
        }

        .summary-label {
            color: #65758b;
            font-size: 14px;
        }

        .summary-value {
            font-weight: 700;
            margin-top: 10px;
            font-size: 22px;
            word-break: break-word;
        }

        .income-value {
            color: #16803c;
        }

        .expense-value {
            color: #dc3545;
        }

        .profit-value {
            color: #2563eb;
        }

        .summary-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .income-icon {
            background: #d1f1df;
            color: #198754;
        }

        .expense-icon {
            background: #ffdede;
            color: #dc3545;
        }

        .profit-icon {
            background: #d7e5ff;
            color: #2563eb;
        }

        .table thead th {
            background: #edf3ff;
            color: #24477d;
            font-weight: 600;
            border-bottom: none;
            padding: 15px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 14px 15px;
            border-color: #eef1f5;
        }

        .table tbody tr:hover {
            background: #f8faff;
        }

        .filter-box {
            background: #f8faff;
            border: 1px solid #edf1f7;
            border-radius: 12px;
            padding: 20px;
        }

        .form-control {
            border-radius: 9px;
            padding: 10px;
        }

        .btn-primary {
            background: #2563eb;
            border-color: #2563eb;
            border-radius: 9px;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-reset {
            border-radius: 9px;
        }

        .empty-state {
            padding: 45px 20px !important;
        }

        .badge-income {
            background: #e2f6e9;
            color: #198754;
        }

        .badge-expense {
            background: #ffe5e5;
            color: #dc3545;
        }

        .amount {
            font-weight: 700;
            white-space: nowrap;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- Header -->
    <div class="d-flex align-items-center gap-3 mb-4">

        <div class="summary-icon profit-icon">
            <i class="bi bi-clock-history"></i>
        </div>

        <div>
            <h3 class="page-title mb-1">Riwayat Transaksi</h3>
            <p class="subtitle mb-0">
                Pantau seluruh catatan pendapatan dan biaya usaha.
            </p>
        </div>

    </div>

    <!-- Card Utama -->
    <div class="card p-3 p-md-4">

        <!-- Filter Tanggal -->
        <div class="filter-box mb-4">

            <h6 class="fw-bold mb-3">
                <i class="bi bi-funnel me-2 text-primary"></i>
                Filter Transaksi
            </h6>

            <form action="{{ route('riwayat.index') }}" method="GET"
                  class="row g-3">

                <div class="col-md-4">
                    <label class="form-label fw-medium">Tanggal Awal</label>

                    <input type="date"
                           name="tanggal_awal"
                           class="form-control"
                           value="{{ request('tanggal_awal') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-medium">Tanggal Akhir</label>

                    <input type="date"
                           name="tanggal_akhir"
                           class="form-control"
                           value="{{ request('tanggal_akhir') }}">
                </div>

                <div class="col-md-4 d-flex align-items-end gap-2">

                    <button type="submit" class="btn btn-primary px-3">
                        <i class="bi bi-search me-1"></i>
                        Filter
                    </button>

                    <a href="{{ route('riwayat.index') }}"
                       class="btn btn-outline-secondary btn-reset px-3">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>
                        Reset
                    </a>

                </div>

            </form>
        </div>

        <!-- Ringkasan -->
        <h5 class="fw-bold mb-3">Ringkasan Keuangan</h5>

        <div class="row g-3 mb-4">

            <!-- Pendapatan -->
            <div class="col-md-4">
                <div class="card summary-card income-card">
                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <div class="summary-label">Total Pendapatan</div>

                                <h4 class="summary-value income-value">
                                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                                </h4>
                            </div>

                            <div class="summary-icon income-icon">
                                <i class="bi bi-arrow-down-left-circle"></i>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Biaya -->
            <div class="col-md-4">
                <div class="card summary-card expense-card">
                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <div class="summary-label">Total Biaya</div>

                                <h4 class="summary-value expense-value">
                                    Rp {{ number_format($totalBiaya, 0, ',', '.') }}
                                </h4>
                            </div>

                            <div class="summary-icon expense-icon">
                                <i class="bi bi-arrow-up-right-circle"></i>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Keuntungan -->
            <div class="col-md-4">
                <div class="card summary-card profit-card">
                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <div class="summary-label">Perkiraan Keuntungan</div>

                                <h4 class="summary-value profit-value">
                                    Rp {{ number_format($keuntungan, 0, ',', '.') }}
                                </h4>
                            </div>

                            <div class="summary-icon profit-icon">
                                <i class="bi bi-wallet2"></i>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Tabel Riwayat -->
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

            <h5 class="fw-bold mb-0">Daftar Transaksi</h5>

            <span class="badge bg-light text-primary border">
                {{ count($riwayat) }} Transaksi
            </span>

        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Kategori</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($riwayat as $item)

                        <tr>
                            <td class="text-secondary">
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <i class="bi bi-calendar3 text-secondary me-1"></i>
                                {{ \Carbon\Carbon::parse($item['tanggal'])->format('d-m-Y') }}
                            </td>

                            <td>
                                @if($item['jenis'] == 'Pendapatan')
                                    <span class="badge badge-income rounded-pill px-3 py-2">
                                        <i class="bi bi-arrow-down-left me-1"></i>
                                        Pendapatan
                                    </span>
                                @else
                                    <span class="badge badge-expense rounded-pill px-3 py-2">
                                        <i class="bi bi-arrow-up-right me-1"></i>
                                        Biaya
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $item['kategori'] }}
                            </td>

                            <td class="fw-medium">
                                {{ $item['keterangan'] }}
                            </td>

                            <td class="amount {{ $item['jenis'] == 'Pendapatan' ? 'text-success' : 'text-danger' }}">
                                Rp {{ number_format($item['jumlah'], 0, ',', '.') }}
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center empty-state">

                                <i class="bi bi-inbox display-4 text-secondary"></i>

                                <p class="fw-semibold mt-3 mb-1">
                                    Belum ada riwayat transaksi
                                </p>

                                <p class="text-secondary mb-0">
                                    Transaksi yang kamu tambahkan akan muncul di sini.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

        <!-- Footer -->
        <div class="mt-4 pt-3 border-top">

            <a href="{{ route('dashboard') }}"
               class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke Dashboard
            </a>

        </div>

    </div>

</div>

</body>
</html>
