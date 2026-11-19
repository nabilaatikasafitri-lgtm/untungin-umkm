
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pendapatan | Untungin UMKM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f7fc;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #243247;
        }

        .form-card {
            max-width: 650px;
            margin: 50px auto;
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 4px 20px rgba(20, 50, 90, 0.06);
        }

        .page-title {
            color: #173b76;
            font-weight: 700;
        }

        .subtitle {
            color: #718096;
        }

        .icon-income {
            width: 48px;
            height: 48px;
            background: #e5f5ec;
            color: #198754;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
        }

        .form-label {
            font-weight: 600;
            color: #35465d;
        }

        .form-control {
            padding: 11px 13px;
            border-radius: 9px;
            border: 1px solid #dce3ed;
        }

        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.12);
        }

        .btn-primary {
            background: #2563eb;
            border-color: #2563eb;
            border-radius: 9px;
            padding: 11px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            border-radius: 9px;
            padding: 11px;
        }

        @media (max-width: 576px) {
            .form-card {
                margin: 20px auto;
                padding: 22px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="form-card">

        <!-- Header -->
        <div class="d-flex align-items-center gap-3 mb-4">

            <div class="icon-income">
                <i class="bi bi-cash-stack"></i>
            </div>

            <div>
                <h3 class="page-title mb-1">Tambah Pendapatan</h3>
                <p class="subtitle mb-0">
                    Catat pemasukan usaha kamu.
                </p>
            </div>

        </div>

        <!-- Validasi Error -->
        @if($errors->any())
            <div class="alert alert-danger rounded-3">
                <i class="bi bi-exclamation-circle me-2"></i>

                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('pendapatan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">
                    <i class="bi bi-calendar3 me-1 text-primary"></i>
                    Tanggal Pendapatan
                </label>

                <input type="date"
                       name="tanggal"
                       class="form-control"
                       value="{{ old('tanggal') }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    <i class="bi bi-card-text me-1 text-primary"></i>
                    Keterangan
                </label>

                <input type="text"
                       name="keterangan"
                       class="form-control"
                       placeholder="Contoh: Penjualan nasi ayam"
                       value="{{ old('keterangan') }}"
                       required>
            </div>

            <div class="mb-4">
                <label class="form-label">
                    <i class="bi bi-currency-dollar me-1 text-primary"></i>
                    Jumlah Pendapatan (Rp)
                </label>

                <input type="number"
                       name="jumlah"
                       class="form-control"
                       placeholder="Contoh: 300000"
                       min="1"
                       value="{{ old('jumlah') }}"
                       required>

                <small class="text-secondary mt-1 d-block">
                    Masukkan nominal tanpa titik atau koma.
                </small>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-check-circle me-1"></i>
                Simpan Pendapatan
            </button>

            <a href="{{ route('pendapatan.index') }}"
               class="btn btn-outline-secondary w-100 mt-2">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali
            </a>

        </form>

    </div>

</div>

</body>
</html>
