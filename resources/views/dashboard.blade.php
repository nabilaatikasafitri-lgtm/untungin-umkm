```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Untungin UMKM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f7fc;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #334155;
        }

        /* SIDEBAR */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #1746a2, #12377e);
            color: white;
            padding: 28px 18px;
        }

        .brand {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 35px;
            padding-left: 8px;
        }

        .brand i {
            margin-right: 8px;
        }

        .menu-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #a9c4ff;
            margin: 20px 10px 12px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            color: #dce7ff;
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 11px;
            margin-bottom: 8px;
            transition: 0.2s;
        }

        .menu-item i {
            font-size: 18px;
            margin-right: 12px;
        }

        .menu-item:hover {
            background: rgba(255,255,255,0.12);
            color: white;
        }

        .menu-item.active {
            background: white;
            color: #1746a2;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        /* KONTEN */
        .main-content {
            padding: 30px;
        }

        .page-title {
            font-weight: 700;
            color: #1e293b;
        }

        .welcome-text {
            color: #64748b;
        }

        .profile-icon {
            width: 48px;
            height: 48px;
            background: #e8efff;
            color: #1746a2;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
        }

        /* FILTER */
        .filter-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        }

        .form-control {
            border-radius: 10px;
            padding: 11px;
            border: 1px solid #dce2eb;
        }

        .form-control:focus {
            border-color: #1746a2;
            box-shadow: 0 0 0 3px rgba(23,70,162,0.1);
        }

        .btn-filter {
            background: #1746a2;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 11px 18px;
            font-weight: 600;
        }

        .btn-filter:hover {
            background: #12377e;
            color: white;
        }

        .btn-reset {
            background: #f1f5f9;
            color: #475569;
            border: none;
            border-radius: 10px;
            padding: 11px 18px;
        }

        .btn-reset:hover {
            background: #e2e8f0;
        }

        /* KARTU RINGKASAN */
        .stat-card {
            border: none;
            border-radius: 16px;
            padding: 24px;
            height: 100%;
            background: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            transition: transform 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
        }

        .amount {
            font-size: 25px;
            font-weight: 700;
            margin-top: 22px;
            margin-bottom: 8px;
            word-break: break-word;
        }

        .stat-label {
            font-size: 14px;
            font-weight: 600;
            color: #64748b;
        }

        .stat-description {
            font-size: 13px;
            color: #94a3b8;
        }

        .income-card {
            border-top: 4px solid #16a34a;
        }

        .expense-card {
            border-top: 4px solid #dc3545;
        }

        .profit-card {
            border-top: 4px solid #1746a2;
        }

        /* INFORMASI */
        .content-card {
            border: none;
            border-radius: 16px;
            padding: 25px;
            margin-top: 25px;
            background: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        }

        .info-icon {
            width: 45px;
            height: 45px;
            background: #e8efff;
            color: #1746a2;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        /* TOMBOL AKSI */
        .action-btn {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            padding: 11px 16px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            margin-right: 8px;
            margin-bottom: 8px;
        }

        .action-income {
            background: #dcfce7;
            color: #15803d;
        }

        .action-income:hover {
            background: #bbf7d0;
            color: #166534;
        }

        .action-expense {
            background: #fee2e2;
            color: #dc3545;
        }

        .action-expense:hover {
            background: #fecaca;
            color: #b91c1c;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            color: #94a3b8;
            margin-top: 35px;
            padding-bottom: 10px;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                padding: 20px;
            }

            .brand {
                margin-bottom: 20px;
            }

            .main-content {
                padding: 20px 15px;
            }

            .amount {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <div class="col-md-3 col-lg-2 sidebar">

            <div class="brand">
                <i class="bi bi-wallet2"></i> Untungin
            </div>

            <div class="menu-label">Menu Utama</div>

            <a href="{{ route('dashboard') }}" class="menu-item active">
                <i class="bi bi-grid"></i> Dashboard
            </a>

            <a href="{{ route('pendapatan.index') }}" class="menu-item">
                <i class="bi bi-cash-stack"></i> Pendapatan
            </a>

            <a href="{{ route('biaya.index') }}" class="menu-item">
                <i class="bi bi-receipt"></i> Biaya
            </a>

            <a href="{{ route('riwayat.index') }}" class="menu-item">
                <i class="bi bi-clock-history"></i> Riwayat
            </a>

        </div>

        <!-- KONTEN UTAMA -->
        <div class="col-md-9 col-lg-10 main-content">

            <!-- HEADER -->
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h3 class="page-title mb-1">Dashboard</h3>
                    <p class="welcome-text mb-0">
                        Selamat datang di Untungin UMKM!
                    </p>
                </div>

                <div class="profile-icon">
                    <i class="bi bi-person-circle"></i>
                </div>

            </div>

            <!-- FILTER TANGGAL -->
            <div class="card filter-card mb-4">
                <div class="card-body p-4">

                    <h6 class="fw-bold mb-3">
                        <i class="bi bi-calendar-range text-primary me-2"></i>
                        Filter Periode
                    </h6>

                    <form action="{{ route('dashboard') }}" method="GET" class="row g-3">

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Tanggal Awal</label>

                            <input type="date"
                                   name="tanggal_awal"
                                   class="form-control"
                                   value="{{ request('tanggal_awal') }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Tanggal Akhir</label>

                            <input type="date"
                                   name="tanggal_akhir"
                                   class="form-control"
                                   value="{{ request('tanggal_akhir') }}">
                        </div>

                        <div class="col-md-4 d-flex align-items-end gap-2">

                            <button type="submit" class="btn-filter">
                                <i class="bi bi-funnel me-1"></i> Filter
                            </button>

                            <a href="{{ route('dashboard') }}" class="btn-reset">
                                <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                            </a>

                        </div>

                    </form>
                </div>
            </div>

            <!-- RINGKASAN -->
            <div class="mb-3">
                <h5 class="fw-bold">Ringkasan Keuangan</h5>
                <p class="text-secondary small">
                    Ringkasan pemasukan, pengeluaran, dan keuntungan usaha.
                </p>
            </div>

            <div class="row g-4">

                <!-- PENDAPATAN -->
                <div class="col-md-4">
                    <div class="card stat-card income-card">

                        <div class="d-flex justify-content-between align-items-center">

                            <div class="stat-label">Total Pendapatan</div>

                            <div class="stat-icon bg-success-subtle text-success">
                                <i class="bi bi-arrow-down-left"></i>
                            </div>

                        </div>

                        <div class="amount text-success">
                            Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                        </div>

                        <div class="stat-description">
                            <i class="bi bi-wallet2 me-1"></i>
                            Total uang masuk
                        </div>

                    </div>
                </div>

                <!-- BIAYA -->
                <div class="col-md-4">
                    <div class="card stat-card expense-card">

                        <div class="d-flex justify-content-between align-items-center">

                            <div class="stat-label">Total Biaya</div>

                            <div class="stat-icon bg-danger-subtle text-danger">
                                <i class="bi bi-arrow-up-right"></i>
                            </div>

                        </div>

                        <div class="amount text-danger">
                            Rp {{ number_format($totalBiaya, 0, ',', '.') }}
                        </div>

                        <div class="stat-description">
                            <i class="bi bi-receipt me-1"></i>
                            Total uang keluar
                        </div>

                    </div>
                </div>

                <!-- KEUNTUNGAN -->
                <div class="col-md-4">
                    <div class="card stat-card profit-card">

                        <div class="d-flex justify-content-between align-items-center">

                            <div class="stat-label">Perkiraan Keuntungan</div>

                            <div class="stat-icon bg-primary-subtle text-primary">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>

                        </div>

                        <div class="amount text-primary">
                            Rp {{ number_format($keuntungan, 0, ',', '.') }}
                        </div>

                        <div class="stat-description">
                            <i class="bi bi-calculator me-1"></i>
                            Pendapatan dikurangi biaya
                        </div>

                    </div>
                </div>

            </div>

            <!-- AKSI CEPAT -->
            <div class="content-card">

                <h5 class="fw-bold mb-3">
                    <i class="bi bi-lightning-charge text-warning me-2"></i>
                    Aksi Cepat
                </h5>

                <p class="text-secondary small mb-3">
                    Tambahkan catatan transaksi usaha Anda.
                </p>

                <a href="{{ route('pendapatan.create') }}" class="action-btn action-income">
                    <i class="bi bi-plus-circle me-2"></i>
                    Tambah Pendapatan
                </a>

                <a href="{{ route('biaya.create') }}" class="action-btn action-expense">
                    <i class="bi bi-plus-circle me-2"></i>
                    Tambah Biaya
                </a>

            </div>

            <!-- INFORMASI APLIKASI -->
            <div class="content-card">

                <div class="d-flex align-items-center gap-3 mb-3">

                    <div class="info-icon">
                        <i class="bi bi-info-circle"></i>
                    </div>

                    <h5 class="fw-bold mb-0">Tentang Untungin UMKM</h5>

                </div>

                <p class="text-secondary mb-0" style="line-height: 1.8;">
                    Untungin UMKM merupakan aplikasi berbasis web yang membantu
                    pemilik usaha makanan rumahan mencatat pendapatan,
                    mengelola biaya, dan mengetahui perkiraan keuntungan
                    usaha secara otomatis. Dengan pencatatan yang lebih teratur,
                    pemilik usaha dapat memantau kondisi keuangan usahanya
                    dengan lebih mudah.
                </p>

            </div>

            <!-- FOOTER -->
            <div class="footer">
                &copy; 2026 Untungin UMKM. All Rights Reserved.
            </div>

        </div>
    </div>
</div>

</body>
</html>