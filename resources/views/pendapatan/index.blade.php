<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendapatan | Untungin UMKM</title>

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

        .btn-primary {
            background: #2563eb;
            border-color: #2563eb;
            border-radius: 9px;
            padding: 10px 16px;
        }

        .btn-primary:hover {
            background: #1d4ed8;
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

        .nominal {
            color: #16803c;
            font-weight: 700;
            white-space: nowrap;
        }

        .btn-edit {
            background: #fff4d6;
            color: #997000;
            border: none;
        }

        .btn-edit:hover {
            background: #ffe7a3;
            color: #775600;
        }

        .btn-delete {
            background: #ffe8e8;
            color: #dc3545;
            border: none;
        }

        .btn-delete:hover {
            background: #ffd1d1;
            color: #b02a37;
        }

        .btn-edit, .btn-delete {
            border-radius: 7px;
            padding: 6px 11px;
        }

        .empty-state {
            padding: 45px 20px !important;
        }

        .icon-income {
            width: 45px;
            height: 45px;
            background: #e5f5ec;
            color: #198754;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div class="d-flex align-items-center gap-3">
            <div class="icon-income">
                <i class="bi bi-cash-stack"></i>
            </div>

            <div>
                <h3 class="page-title mb-1">Data Pendapatan</h3>
                <p class="subtitle mb-0">
                    Kelola dan pantau pemasukan usaha kamu.
                </p>
            </div>
        </div>

        <a href="{{ route('pendapatan.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Pendapatan
        </a>

    </div>

    <!-- Card Tabel -->
    <div class="card p-3 p-md-4">

        <!-- Notifikasi -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}

                <button type="button" class="btn-close"
                        data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Daftar Pendapatan</h5>

            <span class="badge bg-light text-primary border">
                {{ count($pendapatans) }} Data
            </span>
        </div>

        <div class="table-responsive">
            <table class="table align-middle table-hover mb-0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($pendapatans as $index => $pendapatan)

                        <tr>
                            <td class="text-secondary">
                                {{ $index + 1 }}
                            </td>

                            <td>
                                <i class="bi bi-calendar3 text-secondary me-1"></i>
                                {{ \Carbon\Carbon::parse($pendapatan->tanggal)->format('d-m-Y') }}
                            </td>

                            <td class="fw-medium">
                                {{ $pendapatan->keterangan }}
                            </td>

                            <td class="nominal">
                                Rp {{ number_format($pendapatan->jumlah, 0, ',', '.') }}
                            </td>

                            <td class="text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('pendapatan.edit', $pendapatan->id) }}"
                                       class="btn btn-edit btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('pendapatan.destroy', $pendapatan->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data pendapatan ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-delete btn-sm">
                                            <i class="bi bi-trash"></i>
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center empty-state">

                                <i class="bi bi-inbox display-4 text-secondary"></i>

                                <p class="fw-semibold mt-3 mb-1">
                                    Belum ada data pendapatan
                                </p>

                                <p class="text-secondary mb-3">
                                    Silakan tambahkan catatan pendapatan usaha kamu.
                                </p>

                                <a href="{{ route('pendapatan.create') }}"
                                   class="btn btn-primary btn-sm">
                                    <i class="bi bi-plus-lg me-1"></i>
                                    Tambah Data
                                </a>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>