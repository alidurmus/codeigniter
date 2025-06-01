<!DOCTYPE html>
<html lang="tr">

<head>
    <?php $this->load->view("includes/head"); ?>
    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/assets/css/jquery.dataTables.min.css">





    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --card-bg: rgba(255, 255, 255, 0.95);
            --shadow-light: 0 8px 25px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 15px 35px rgba(0, 0, 0, 0.1);
            --border-radius: 16px;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-container {
            padding: 30px 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .data-widget {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-medium);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            animation: slideUp 0.6s ease-out;
        }

        .widget-header {
            background: var(--primary-gradient);
            padding: 25px 30px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .widget-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(30px, -30px);
        }

        .widget-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .search-container {
            padding: 30px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .search-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .search-input-group {
            position: relative;
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .search-input {
            flex: 1;
            padding: 12px 20px 12px 50px;
            border: 2px solid #e9ecef;
            border-radius: 25px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .search-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
            transform: translateY(-2px);
        }

        .search-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 1.1rem;
        }

        .search-btn {
            padding: 12px 25px;
            background: var(--success-gradient);
            border: none;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(17, 153, 142, 0.3);
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(17, 153, 142, 0.4);
        }

        .add-new-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: var(--primary-gradient);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-light);
            margin-bottom: 20px;
        }

        .add-new-btn:hover {
            color: white;
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
        }

        .table-container {
            padding: 30px;
            overflow-x: auto;
        }

        .modern-table {
            width: 100%;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-light);
            border: none;
        }

        .modern-table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .modern-table thead th {
            padding: 18px 20px;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            border: none;
            position: relative;
        }

        .modern-table thead th::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 20px;
            right: 20px;
            height: 2px;
            background: rgba(255, 255, 255, 0.3);
        }

        .modern-table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #f8f9fa;
        }

        .modern-table tbody tr:hover {
            background: linear-gradient(135deg, #f8f9ff 0%, #f0f4ff 100%);
            transform: scale(1.01);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.1);
        }

        .modern-table tbody td {
            padding: 18px 20px;
            vertical-align: middle;
            border: none;
            font-size: 0.95rem;
        }

        .kontrol-no {
            font-weight: 700;
            color: #667eea;
            background: linear-gradient(135deg, #e8f2ff 0%, #f0f8ff 100%);
            padding: 8px 16px;
            border-radius: 20px;
            display: inline-block;
            min-width: 60px;
            text-align: center;
        }

        .process-badge {
            background: var(--success-gradient);
            color: white;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .date-info {
            color: #6c757d;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .empty-state {
            text-align: center;
            padding: 80px 40px;
            color: #6c757d;
        }

        .empty-icon {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 20px;
        }

        .pagination-container {
            padding: 20px 30px;
            background: #f8f9fa;
            border-radius: 0 0 var(--border-radius) var(--border-radius);
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 20px 10px;
            }

            .search-container {
                padding: 20px 15px;
            }

            .search-input-group {
                flex-direction: column;
                gap: 15px;
            }

            .search-input {
                width: 100%;
            }

            .table-container {
                padding: 20px 15px;
            }

            .modern-table {
                font-size: 0.85rem;
            }

            .modern-table thead th,
            .modern-table tbody td {
                padding: 12px 10px;
            }
        }

        /* Custom scrollbar */
        .table-container::-webkit-scrollbar {
            height: 8px;
        }

        .table-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .table-container::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 4px;
        }

        .table-container::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5a6fd8, #6a42a0);
        }
    </style>










</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <!--============= start main area -->

    <!-- APP NAVBAR ==========-->
    <?php $this->load->view("includes/navbar"); ?>
    <!--========== END app navbar -->

    <!-- APP ASIDE ==========-->
    <?php $this->load->view("includes/aside"); ?>
    <!--========== END app aside -->

    <!-- navbar search -->
    <?php $this->load->view("includes/navbar-search"); ?>
    <!-- .navbar-search -->

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>
            </section><!-- #dash-content -->
        </div><!-- .wrap -->

        <!-- APP FOOTER -->
        <?php $this->load->view("includes/footer"); ?>
        <!-- /#app-footer -->
    </main>
    <!--========== END app main -->

    <?php $this->load->view("includes/include_script"); ?>

    <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>

    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example thead tr').clone(true).appendTo('#example thead');
            $('#example thead tr:eq(1) th').each(function(i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });

            var table = $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true
            });
        });
    </script>
</body>

</html>