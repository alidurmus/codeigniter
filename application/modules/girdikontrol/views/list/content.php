<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Girdi Kontrol Sistemi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --danger-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --dark-gradient: linear-gradient(135deg, #434343 0%, #000000 100%);
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --hover-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .main-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            margin: 20px 0;
            overflow: hidden;
            animation: slideInUp 0.6s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-section {
            background: var(--primary-gradient);
            padding: 30px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .header-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
            position: relative;
            z-index: 1;
        }

        .modern-btn {
            border: none;
            border-radius: 15px;
            padding: 12px 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
        }

        .modern-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .modern-btn:hover::before {
            left: 100%;
        }

        .modern-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .btn-kalite {
            background: var(--primary-gradient);
            color: white;
        }

        .btn-yonetim {
            background: var(--warning-gradient);
            color: white;
        }

        .btn-excel {
            background: var(--danger-gradient);
            color: white;
        }

        .btn-yeni {
            background: var(--success-gradient);
            color: white;
        }

        .content-section {
            padding: 30px;
        }

        .search-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: var(--card-shadow);
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
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 1rem;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3), inset 0 2px 5px rgba(0, 0, 0, 0.1);
            transform: scale(1.02);
        }

        .search-btn {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .search-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
        }

        .data-table-container {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .table {
            margin: 0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .table thead th {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 15px 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
            position: relative;
        }

        .table tbody tr {
            transition: all 0.3s ease;
            border: none;
        }

        .table tbody tr:hover {
            background: linear-gradient(135deg, #f8f9ff 0%, #e6f3ff 100%);
            transform: scale(1.01);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .table tbody td {
            padding: 15px 10px;
            border: none;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: middle;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-edit {
            background: linear-gradient(135deg, #36d1dc 0%, #5b86e5 100%);
            border: none;
            color: white;
            border-radius: 8px;
            padding: 8px 15px;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-delete {
            background: linear-gradient(135deg, #ff758c 0%, #ff7eb3 100%);
            border: none;
            color: white;
            border-radius: 8px;
            padding: 8px 15px;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-edit:hover,
        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .table-responsive {
            border-radius: 15px;
            box-shadow: none;
        }

        @media (max-width: 768px) {
            .nav-buttons {
                flex-direction: column;
                align-items: center;
            }

            .modern-btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }

            .search-form {
                flex-direction: column;
            }

            .search-input {
                min-width: 100%;
            }

            .page-title {
                font-size: 2rem;
            }

            .action-buttons {
                flex-direction: column;
            }
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255, 255, 255, 0.3);
            border-top: 5px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
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
    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner"></div>
    </div>

    <div class="container-fluid">
        <div class="main-container">
            <!-- Header Section -->
            <div class="header-section">
                <h1 class="page-title">
                    <i class="fas fa-clipboard-check me-3"></i>
                    GİRDİ KONTROL SİSTEMİ
                </h1>

                <div class="nav-buttons">
                    <a href="<?php echo base_url("anasayfa/kalite"); ?>" class="modern-btn btn-kalite">
                        <i class="fas fa-arrow-left"></i>
                        Kalite
                    </a>
                    <a href="<?php echo base_url("dashboard"); ?>" class="modern-btn btn-yonetim">
                        <i class="fas fa-cog"></i>
                        Yönetim
                    </a>
                    <a href="<?php echo base_url("excel/girdi_kontrol"); ?>" class="modern-btn btn-excel">
                        <i class="fas fa-file-excel"></i>
                        Excel
                    </a>
                    <a href="<?php echo base_url("anasayfa/malzeme"); ?>" class="modern-btn btn-yeni">
                        <i class="fas fa-plus"></i>
                        Yeni Ekle
                    </a>
                </div>
            </div>

            <!-- Content Section -->
            <div class="content-section">
                <!-- Search Section -->
                <div class="search-container">
                    <form method="post" action="<?= base_url() ?>girdikontrol/" class="search-form">
                        <input type="text" name="search" value="<?= $search_text ?>"
                            class="search-input" placeholder="Arama yapmak için buraya yazın...">
                        <button type="submit" name="submit" class="search-btn">
                            <i class="fas fa-search me-2"></i>
                            Ara
                        </button>
                    </form>
                </div>

                <!-- Data Table Section -->
                <div class="data-table-container">
                    <div class="table-responsive">
                        <table id="dataTablex" class="table table-hover">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-hashtag me-2"></i>ID</th>
                                    <th><i class="fas fa-box me-2"></i>Malzeme</th>
                                    <th><i class="fas fa-truck me-2"></i>Tedarikçi</th>
                                    <th><i class="fas fa-barcode me-2"></i>Kontrol No</th>
                                    <th><i class="fas fa-tags me-2"></i>Parti No</th>
                                    <th><i class="fas fa-receipt me-2"></i>İrsaliye</th>
                                    <th><i class="fas fa-calendar me-2"></i>Tarih</th>
                                    <th><i class="fas fa-cogs me-2"></i>İşlem</th>
                                </tr>
                            </thead>
                            <tbody class="sortable" data-url="<?php echo base_url("girdikontrol/rankSetter"); ?>">
                                <?php foreach ($items as $item) { ?>
                                    <tr>
                                        <td><strong><?php echo $item->id; ?></strong></td>
                                        <td><?php echo $item->malzeme_adi; ?></td>
                                        <td><?php echo $item->tedarikci_adi; ?></td>
                                        <td><span class="badge bg-primary"><?php echo $item->kontrol_no; ?></span></td>
                                        <td><span class="badge bg-secondary"><?php echo $item->parti_no; ?></span></td>
                                        <td><?php echo $item->irsaliye; ?></td>
                                        <td>
                                            <small class="text-muted">
                                                <i class="fas fa-clock me-1"></i>
                                                <?php echo tarih_ayarla($item->tarih, "Y/m/d H:i"); ?>
                                            </small>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="<?php echo base_url("anasayfa/girdikontrol_duzenle"); ?>/<?php echo $item->id; ?>"
                                                    class="btn-edit">
                                                    <i class="fas fa-edit me-1"></i>
                                                    Düzenle
                                                </a>
                                                <button data-url="<?php echo base_url("anasayfa/girdikontrol_sil/$item->id"); ?>"
                                                    class="btn-delete remove-btn">
                                                    <i class="fas fa-trash me-1"></i>
                                                    Sil
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination-container">
                        <?php echo $links; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // DataTable başlatma
            $('#dataTablex').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Turkish.json"
                },
                "pageLength": 25,
                "responsive": true,
                "order": [
                    [0, "desc"]
                ],
                "columnDefs": [{
                    "orderable": false,
                    "targets": 7
                }]
            });

            // Silme butonu için onay
            $('.remove-btn').on('click', function(e) {
                e.preventDefault();
                const url = $(this).data('url');

                if (confirm('Bu kaydı silmek istediğinizden emin misiniz?')) {
                    $('#loadingOverlay').show();
                    window.location.href = url;
                }
            });

            // Form gönderimi için loading
            $('form').on('submit', function() {
                $('#loadingOverlay').show();
            });

            // Sayfa yüklendiğinde loading'i gizle
            $('#loadingOverlay').hide();

            // Hover efektleri
            $('.table tbody tr').hover(
                function() {
                    $(this).find('.action-buttons').addClass('show');
                },
                function() {
                    $(this).find('.action-buttons').removeClass('show');
                }
            );
        });

        // Sayfa geçişlerinde smooth scroll
        $('a').on('click', function(e) {
            if ($(this).hasClass('remove-btn')) return;
            if ($(this).attr('href').startsWith('#')) return;

            $('#loadingOverlay').show();
        });
    </script>
</body>

</html>