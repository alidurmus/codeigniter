<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Kontrol</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --warning-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --danger-gradient: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%);
            --info-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header-section {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid var(--glass-border);
        }

        .btn-modern {
            position: relative;
            overflow: hidden;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
        }

        .btn-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
        }

        .btn-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-modern:hover::before {
            left: 100%;
        }

        .btn-primary-modern {
            background: var(--primary-gradient);
            color: white;
        }

        .btn-warning-modern {
            background: var(--warning-gradient);
            color: white;
        }

        .btn-danger-modern {
            background: var(--danger-gradient);
            color: white;
        }

        .btn-success-modern {
            background: var(--success-gradient);
            color: white;
        }

        .btn-info-modern {
            background: var(--info-gradient);
            color: white;
        }

        .title-badge {
            background: var(--danger-gradient);
            color: white;
            font-size: 1.2rem;
            font-weight: 700;
            letter-spacing: 1px;
            border-radius: 12px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
            }

            50% {
                box-shadow: 0 15px 40px rgba(255, 107, 107, 0.5);
            }

            100% {
                box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
            }
        }

        .search-container {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            border: 1px solid var(--glass-border);
        }

        .search-input {
            border: 2px solid transparent;
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
            transform: scale(1.02);
        }

        .search-btn {
            background: var(--primary-gradient);
            border: none;
            color: white;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 600;
            margin-left: 10px;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .table-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .table-modern {
            margin: 0;
            background: transparent;
        }

        .table-modern thead {
            background: var(--dark-gradient);
            color: white;
        }

        .table-modern thead th {
            border: none;
            padding: 20px 15px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 14px;
        }

        .table-modern tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .table-modern tbody tr:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: scale(1.01);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .table-modern tbody td {
            padding: 15px;
            vertical-align: middle;
            border: none;
        }

        .action-buttons .btn {
            margin: 2px;
            border-radius: 8px;
            font-size: 12px;
            padding: 8px 15px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .action-buttons .btn:hover {
            transform: translateY(-2px);
        }

        .btn-edit {
            background: var(--info-gradient);
            border: none;
            color: white;
        }

        .btn-delete {
            background: var(--danger-gradient);
            border: none;
            color: white;
        }

        .navigation-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 20px;
        }

        .title-section {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .navigation-buttons {
                flex-direction: column;
                gap: 10px;
            }

            .btn-modern {
                width: 100%;
                margin-bottom: 10px;
            }

            .main-container {
                margin: 10px;
                padding: 20px;
            }
        }

        .icon-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 25px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="main-container">
            <div class="header-section">
                <div class="row">
                    <div class="col-lg-7 col-md-12">
                        <div class="navigation-buttons">
                            <a href="<?php echo base_url("anasayfa/kalite"); ?>" class="btn btn-modern btn-primary-modern icon-btn">
                                <i class="fas fa-arrow-left"></i> Kalite
                            </a>
                            <a href="<?php echo base_url("dashboard"); ?>" class="btn btn-modern btn-warning-modern icon-btn">
                                <i class="fas fa-cog"></i> Yönetim
                            </a>
                            <a href="<?php echo base_url("excel/final_kontrol"); ?>" class="btn btn-modern btn-danger-modern icon-btn">
                                <i class="fas fa-file-excel"></i> Excel
                            </a>
                            <a href="<?php echo base_url("anasayfa/urun2"); ?>" class="btn btn-modern btn-success-modern icon-btn">
                                <i class="fas fa-plus"></i> Yeni Ekle
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="title-section">
                            <div class="title-badge w-100">
                                <i class="fas fa-check-circle"></i> FİNAL KONTROL
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="search-container">
                <form method="post" action="<?= base_url() ?>finalkontrol/" class="d-flex align-items-center flex-wrap">
                    <input type="text" name="search" value="<?= $search_text ?>" class="form-control search-input flex-grow-1" placeholder="Arama yapın..." style="min-width: 200px;">
                    <button type="submit" name="submit" class="btn search-btn icon-btn">
                        <i class="fas fa-search"></i> Ara
                    </button>
                </form>
            </div>

            <div class="table-container">
                <table id="dataTablex" class="table table-modern">
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-box"></i> Ürün</th>
                            <th><i class="fas fa-clipboard-check"></i> Kontrol No</th>
                            <th><i class="fas fa-archive"></i> Kutu No</th>
                            <th><i class="fas fa-tags"></i> Lot</th>
                            <th><i class="fas fa-calendar"></i> Tarih</th>
                            <th><i class="fas fa-tools"></i> İşlem</th>
                        </tr>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("finalkontrol/rankSetter"); ?>">
                        <?php foreach ($items as $item) { ?>
                            <tr>
                                <td><strong><?php echo $item->id; ?></strong></td>
                                <td><?php echo $item->urun_adi; ?></td>
                                <td><span class="badge bg-primary"><?php echo $item->kontrol_no; ?></span></td>
                                <td><span class="badge bg-info"><?php echo $item->kutu_no; ?></span></td>
                                <td><span class="badge bg-success"><?php echo $item->lot; ?></span></td>
                                <td><i class="fas fa-clock text-muted"></i> <?php echo tarih_ayarla($item->tarih, "Y/m/d H:i"); ?></td>
                                <td class="action-buttons">
                                    <a href="<?php echo base_url("anasayfa/finalkontrol_duzenle"); ?>/<?php echo $item->id; ?>" class="btn btn-edit icon-btn">
                                        <i class="fas fa-edit"></i> Düzenle
                                    </a>
                                    <button data-url="<?php echo base_url("anasayfa/finalkontrol_sil/$item->id"); ?>" class="btn btn-delete btn-outline remove-btn icon-btn">
                                        <i class="fas fa-trash"></i> Sil
                                    </button>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();

            // Smooth animations for buttons
            $('.btn-modern').hover(function() {
                $(this).addClass('animate__animated animate__pulse');
            }, function() {
                $(this).removeClass('animate__animated animate__pulse');
            });

            // Table row hover effects
            $('.table-modern tbody tr').hover(function() {
                $(this).css('transform', 'scale(1.02)');
            }, function() {
                $(this).css('transform', 'scale(1)');
            });
        });
    </script>
</body>

</html>