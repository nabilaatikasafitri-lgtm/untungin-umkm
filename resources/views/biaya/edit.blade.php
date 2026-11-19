```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Biaya - Untungin UMKM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f7fc;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #334155;
        }

        .form-card {
            max-width: 700px;
            margin: auto;
            background: white;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .header-form {
            padding: 25px;
            border-bottom: 1px solid #eef0f4;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon-header {
            width: 55px;
            height: 55px;
            background: #fee2e2;
            color: #dc3545;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .header-form h3 {
            margin: 0;
            font-weight: 700;
            color: #1e293b;
        }

        .header-form p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .form-content {
            padding: 30px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #dce2eb;
        }

        .form-control:focus, .form-select:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
        }

        .btn-save {
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 11px 20px;
            font-weight: 600;
        }

        .btn-save:hover {
            background: #bb2d3b;
            color: white;
        }

        .btn-back {
            background: #f1f5f9;
            color: #475569;
            border: none;
            border-radius: 10px;
            padding: 11px 20px;
            font-weight: 600;
        }

        .btn-back:hover {
            background: #e2e8f0;
            color: #334155;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="form-card">

        <div class="header-form">
            <div class="icon-header">
                <i class="bi bi-pencil-square"></i>
            </div>

            <div>
                <h3>Edit Biaya</h3>
                <p>Perbarui informasi pengeluaran usaha Anda.</p>
            </div>
        </div>

        <div class="form-content">

            <form action="{{ route('biaya.update', $biaya->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-calendar3 me-1"></i> Tanggal
                    </label>

                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           value="{{ old('tanggal', $biaya->tanggal) }}"
                           required>

                    @error('tanggal')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-tags me-1"></i> Kategori Biaya
                    </label>

                    <select name="kategori" class="form-select" required>
                        <option value="Bahan Baku" {{ old('kategori', $biaya->kategori) == 'Bahan Baku' ? 'selected' : '' }}>Bahan Baku</option>
                        <option value="Kemasan" {{ old('kategori', $biaya->kategori) == 'Kemasan' ? 'selected' : '' }}>Kemasan</option>
                        <option value="Gas" {{ old('kategori', $biaya->kategori) == 'Gas' ? 'selected' : '' }}>Gas</option>
                        <option value="Listrik" {{ old('kategori', $biaya->kategori) == 'Listrik' ? 'selected' : '' }}>Listrik</option>
                        <option value="Lainnya" {{ old('kategori', $biaya->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>

                    @error('kategori')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-card-text me-1"></i> Keterangan
                    </label>

                    <input type="text"
                           name="keterangan"
                           class="form-control"
                           value="{{ old('keterangan', $biaya->keterangan) }}"
                           placeholder="Contoh: Membeli ayam dan beras"
                           required>

                    @error('keterangan')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-cash me-1"></i> Jumlah Biaya (Rp)
                    </label>

                    <input type="number"
                           name="jumlah"
                           class="form-control"
                           min="1"
                           value="{{ old('jumlah', $biaya->jumlah) }}"
                           placeholder="Masukkan jumlah biaya"
                           required>

                    @error('jumlah')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 flex-wrap">
                    <button type="submit" class="btn-save">
                        <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                    </button>

                    <a href="{{ route('biaya.index') }}" class="btn-back">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>