<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Kontrol</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #64748b;
            --success-color: #059669;
            --danger-color: #dc2626;
            --warning-color: #d97706;
            --info-color: #0891b2;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --border-radius: 12px;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            margin: 20px 0;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .page-header {
            background: linear-gradient(135deg, var(--primary-color), var(--info-color));
            color: white;
            padding: 25px;
            border-radius: var(--border-radius);
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.1;
        }

        .page-header h1 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .btn-modern {
            padding: 12px 24px;
            border-radius: var(--border-radius);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
            transform: translateY(0);
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-modern:hover::before {
            left: 100%;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, var(--primary-color), #3b82f6);
            color: white;
        }

        .btn-warning-modern {
            background: linear-gradient(135deg, var(--warning-color), #f59e0b);
            color: white;
        }

        .btn-danger-modern {
            background: linear-gradient(135deg, var(--danger-color), #ef4444);
            color: white;
        }

        .btn-success-modern {
            background: linear-gradient(135deg, var(--success-color), #10b981);
            color: white;
        }

        .search-container {
            background: white;
            padding: 25px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            margin-bottom: 25px;
            border: 1px solid #e2e8f0;
        }

        .search-form {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-input {
            flex: 1;
            min-width: 250px;
            padding: 12px 20px;
            border: 2px solid #e2e8f0;
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .search-btn {
            padding: 12px 30px;
            background: linear-gradient(135deg, var(--primary-color), #3b82f6);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow);
        }

        .table-container {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            border: 1px solid #e2e8f0;
        }

        .table-modern {
            margin: 0;
            font-size: 14px;
        }

        .table-modern thead th {
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            color: var(--dark-color);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            border: none;
            padding: 20px 15px;
            position: relative;
        }

        .table-modern thead th::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-color), var(--info-color));
        }

        .table-modern tbody tr {
            transition: all 0.3s ease;
            border: none;
        }

        .table-modern tbody tr:hover {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            transform: scale(1.01);
            box-shadow: inset 0 0 0 1px rgba(37, 99, 235, 0.1);
        }

        .table-modern tbody td {
            padding: 18px 15px;
            vertical-align: middle;
            border-top: 1px solid #f1f5f9;
            font-weight: 500;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-sm-modern {
            padding: 8px 16px;
            font-size: 12px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-info-modern {
            background: linear-gradient(135deg, var(--info-color), #06b6d4);
            color: white;
        }

        .btn-danger-modern-sm {
            background: linear-gradient(135deg, var(--danger-color), #ef4444);
            color: white;
        }

        .btn-sm-modern:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .pagination-container {
            margin-top: 25px;
            text-align: center;
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-stats {
            background: white;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            text-align: center;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .card-stats:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .stats-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 5px;
        }

        .stats-label {
            color: var(--secondary-color);
            font-weight: 500;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }

        @media (max-width: 768px) {
            .nav-buttons {
                flex-direction: column;
            }

            .btn-modern {
                text-align: center;
                width: 100%;
            }

            .search-form {
                flex-direction: column;
            }

            .search-input {
                width: 100%;
                min-width: auto;
            }

            .action-buttons {
                flex-direction: column;
            }
        }

        .loading {
            display: none;
            text-align: center;
            padding: 20px;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 10px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="main-container fade-in">
            <!-- Page Header -->
            <div class="page-header">
                <h1><i class="fas fa-cogs me-3"></i>PROSES KONTROL</h1>
            </div>

            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card-stats">
                        <div class="stats-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="stats-number">127</div>
                        <div class="stats-label">Toplam Kayıt</div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card-stats">
                        <div class="stats-icon">
                            <i class="fas fa-check-circle" style="color: var(--success-color);"></i>
                        </div>
                        <div class="stats-number">98</div>
                        <div class="stats-label">Onaylı</div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card-stats">
                        <div class="stats-icon">
                            <i class="fas fa-clock" style="color: var(--warning-color);"></i>
                        </div>
                        <div class="stats-number">15</div>
                        <div class="stats-label">Beklemede</div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card-stats">
                        <div class="stats-icon">
                            <i class="fas fa-exclamation-triangle" style="color: var(--danger-color);"></i>
                        </div>
                        <div class="stats-number">14</div>
                        <div class="stats-label">Sorunlu</div>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="nav-buttons">
                <a href="<?php echo base_url("anasayfa/kalite"); ?>" class="btn-modern btn-primary-modern">
                    <i class="fas fa-arrow-left me-2"></i>Kalite
                </a>
                <a href="<?php echo base_url("dashboard"); ?>" class="btn-modern btn-warning-modern">
                    <i class="fas fa-arrow-left me-2"></i>Yönetim
                </a>
                <a href="<?php echo base_url("excel/proses_kontrol"); ?>" class="btn-modern btn-danger-modern">
                    <i class="fas fa-file-excel me-2"></i>Excel
                </a>
                <a href="<?php echo base_url("anasayfa/urun"); ?>" class="btn-modern btn-success-modern">
                    <i class="fas fa-plus me-2"></i>Yeni Ekle
                </a>
            </div>

            <!-- Search Container -->
            <div class="search-container">
                <form method="post" action="<?= base_url() ?>proseskontrol/" class="search-form">
                    <input type="text" name="search" value="<?= $search_text ?>" placeholder="Arama yapın..." class="search-input">
                    <button type="submit" name="submit" class="search-btn">
                        <i class="fas fa-search me-2"></i>Ara
                    </button>
                </form>
            </div>

            <!-- Loading Spinner -->
            <div class="loading" id="loadingSpinner">
                <div class="spinner"></div>
                <p>Veriler yükleniyor...</p>
            </div>

            <!-- Table Container -->
            <div class="table-container">
                <div class="table-responsive">
                    <table id="dataTablex" class="table table-hover table-modern">
                        <thead>
                            <tr>
                                <th><i class="fas fa-hashtag me-2"></i>HPK</th>
                                <th><i class="fas fa-box me-2"></i>Ürün</th>
                                <th><i class="fas fa-barcode me-2"></i>Lot</th>
                                <th><i class="fas fa-clipboard-check me-2"></i>Kontrol No</th>
                                <th><i class="fas fa-tags me-2"></i>Parti No</th>
                                <th><i class="fas fa-calendar me-2"></i>Tarih</th>
                                <th><i class="fas fa-cog me-2"></i>İşlem</th>
                            </tr>
                        </thead>
                        <tbody class="sortable" data-url="<?php echo base_url("proseskontrol/rankSetter"); ?>">
                            <?php foreach ($items as $item) { ?>
                                <tr>
                                    <td><strong><?php echo $item->hpk; ?></strong></td>
                                    <td><?php echo $item->urun_adi; ?></td>
                                    <td><span class="badge bg-primary"><?php echo $item->lot; ?></span></td>
                                    <td><?php echo $item->kontrol_no; ?></td>
                                    <td><?php echo $item->parti_no; ?></td>
                                    <td><i class="fas fa-clock me-1"></i><?php echo tarih_ayarla($item->tarih, "Y/m/d H:i"); ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="<?php echo base_url("anasayfa/proseskontrol_duzenle"); ?>/<?php echo $item->id; ?>" class="btn-sm-modern btn-info-modern">
                                                <i class="fas fa-edit me-1"></i>Düzenle
                                            </a>
                                            <button data-url="<?php echo base_url("anasayfa/proseskontrol_sil/$item->id"); ?>" class="btn-sm-modern btn-danger-modern-sm remove-btn">
                                                <i class="fas fa-trash me-1"></i>Sil
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="pagination-container">
                <?php echo $links; ?>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // DataTable initialization
            $('#dataTablex').DataTable({
                "language": {
                    "lengthMenu": "Sayfa başına _MENU_ kayıt göster",
                    "zeroRecords": "Kayıt bulunamadı",
                    "info": "_TOTAL_ kayıttan _START_ - _END_ arası gösteriliyor",
                    "infoEmpty": "Kayıt bulunamadı",
                    "infoFiltered": "(_MAX_ kayıt içinden filtrelendi)",
                    "search": "Ara:",
                    "paginate": {
                        "first": "İlk",
                        "last": "Son",
                        "next": "Sonraki",
                        "previous": "Önceki"
                    }
                },
                "pageLength": 25,
                "responsive": true,
                "order": [
                    [5, "desc"]
                ], // Tarih sütununa göre azalan sıralama
                "columnDefs": [{
                        "orderable": false,
                        "targets": [6]
                    } // İşlem sütunu sıralanamaz
                ]
            });

            // Remove button confirmation
            $('.remove-btn').on('click', function(e) {
                e.preventDefault();
                const url = $(this).data('url');
                const row = $(this).closest('tr');

                if (confirm('Bu kaydı silmek istediğinizden emin misiniz?')) {
                    // Show loading
                    $('#loadingSpinner').show();

                    // Simulate AJAX call (replace with actual AJAX)
                    setTimeout(() => {
                        window.location.href = url;
                    }, 500);
                }
            });

            // Add hover effects to table rows
            $('.table-modern tbody tr').hover(
                function() {
                    $(this).addClass('table-hover-effect');
                },
                function() {
                    $(this).removeClass('table-hover-effect');
                }
            );

            // Search form enhancement
            $('.search-input').on('focus', function() {
                $(this).parent().addClass('search-focused');
            }).on('blur', function() {
                $(this).parent().removeClass('search-focused');
            });

            // Button click animations
            $('.btn-modern, .btn-sm-modern').on('click', function() {
                $(this).addClass('btn-clicked');
                setTimeout(() => {
                    $(this).removeClass('btn-clicked');
                }, 200);
            });

            // Auto-refresh stats (optional)
            setInterval(function() {
                // You can add AJAX call here to refresh statistics
                console.log('Stats refreshed');
            }, 30000); // 30 seconds
        });

        // Add some CSS for dynamic effects
        const style = document.createElement('style');
        style.textContent = `
            .table-hover-effect {
                background: linear-gradient(135deg, #f8fafc, #f1f5f9) !important;
                transform: scale(1.01) !important;
            }
            
            .search-focused {
                transform: scale(1.02);
                transition: transform 0.3s ease;
            }
            
            .btn-clicked {
                transform: scale(0.95) !important;
                transition: transform 0.1s ease;
            }
        `;
        document.head.appendChild(style);
    </script>
</body>

</html>