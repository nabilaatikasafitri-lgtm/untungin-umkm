
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Biaya - Untungin UMKM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f7fc;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #334155;
        }

        .form-card {
            background: white;
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .icon-header {
            width: 55px;
            height: 55px;
            background: #fff1f2;
            color: #e11d48;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .form-label {
            font-weight: 600;
            color: #475569;
        }

        .form-control, .form-select {
            border-radius: 10px;
            padding: 11px 14px;
            border: 1px solid #dbe3ef;
        }

        .form-control:focus, .form-select:focus {
            border-color: #93b4ff;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .btn {
            border-radius: 9px;
            padding: 10px 18px;
            font-weight: 500;
        }

        .btn-primary {
            background: #2563eb;
            border: none;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #64748b;
            border: none;
        }

        .btn-secondary:hover {
            background: #475569;
        }

        .text-danger {
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">

            <div class="card form-card">
                <div class="card-body p-4 p-md-5">

                    <!-- Header -->
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="icon-header">
                            <i class="bi bi-wallet2"></i>
                        </div>

                        <div>
                            <h3 class="fw-bold mb-1">Tambah Biaya</h3>
                            <p class="text-muted mb-0">
                                Catat pengeluaran usaha Anda
                            </p>
                        </div>
                    </div>

                    <hr class="mb-4">

                    <!-- Form -->
                    <form action="{{ route('biaya.store') }}" method="POST">
                        @csrf

                        <!-- Tanggal -->
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-calendar3 me-1"></i>
                                Tanggal
                            </label>

                            <input
                                type="date"
                                name="tanggal"
                                class="form-control"
                                value="{{ old('tanggal') }}"
                                required
                            >

                            @error('tanggal')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-tags me-1"></i>
                                Kategori Biaya
                            </label>

                            <select name="kategori" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>

                                <option value="Bahan Baku" {{ old('kategori') == 'Bahan Baku' ? 'selected' : '' }}>
                                    Bahan Baku
                                </option>

                                <option value="Kemasan" {{ old('kategori') == 'Kemasan' ? 'selected' : '' }}>
                                    Kemasan
                                </option>

                                <option value="Gas" {{ old('kategori') == 'Gas' ? 'selected' : '' }}>
                                    Gas
                                </option>

                                <option value="Listrik" {{ old('kategori') == 'Listrik' ? 'selected' : '' }}>
                                    Listrik
                                </option>

                                <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>
                                    Lainnya
                                </option>
                            </select>

                            @error('kategori')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Keterangan -->
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-card-text me-1"></i>
                                Keterangan
                            </label>

                            <input
                                type="text"
                                name="keterangan"
                                class="form-control"
                                value="{{ old('keterangan') }}"
                                placeholder="Contoh: Membeli ayam dan beras"
                                required
                            >

                            @error('keterangan')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Jumlah -->
                        <div class="mb-4">
                            <label class="form-label">
                                <i class="bi bi-cash me-1"></i>
                                Jumlah Biaya (Rp)
                            </label>

                            <input
                                type="number"
                                name="jumlah"
                                class="form-control"
                                min="1"
                                value="{{ old('jumlah') }}"
                                placeholder="Contoh: 50000"
                                required
                            >

                            @error('jumlah')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex gap-2 flex-wrap">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i>
                                Simpan Biaya
                            </button>

                            <a href="{{ route('biaya.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-1"></i>
                                Kembali
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>
