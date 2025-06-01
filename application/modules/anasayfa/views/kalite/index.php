<!DOCTYPE html>
<html lang="tr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="<?php echo base_url("assets"); ?>/assets/js/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">



    <!-- Optional theme -->

    <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/assets/css/jquery.dataTables.min.css">

    <!-- Latest compiled and minified JavaScript -->

    <script src="<?php echo base_url("assets"); ?>/assets/js/jquery.dataTables.min.js"></script>
    <title>Girdi Kontrol Formları</title>






    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --danger-gradient: linear-gradient(135deg, #ee0979 0%, #ff6a00 100%);
            --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --info-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-bg: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }

        body {
            background: var(--dark-bg);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .hero-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 60px 40px;
            margin: 40px 20px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease-out;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 700;
            background: linear-gradient(135deg, #fff 0%, #f0f0f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.2rem;
            margin-bottom: 0;
        }

        .menu-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .menu-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: slideInUp 0.8s ease-out;
        }

        .control-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 30px;
            margin: 15px 0;
            border-radius: 20px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .control-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .control-btn:hover::before {
            left: 100%;
        }

        .control-btn:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
        }

        .control-btn:active {
            transform: translateY(-2px) scale(0.98);
        }

        .btn-girdi {
            background: var(--primary-gradient);
            color: white;
        }

        .btn-proses {
            background: var(--success-gradient);
            color: white;
        }

        .btn-final {
            background: var(--danger-gradient);
            color: white;
        }

        .btn-yonetim {
            background: var(--warning-gradient);
            color: white;
        }

        .btn-etiket {
            background: var(--info-gradient);
            color: white;
        }

        .btn-icon {
            font-size: 1.5rem;
            margin-right: 15px;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        }

        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 80%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
            }

            70% {
                box-shadow: 0 0 0 20px rgba(255, 255, 255, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-section {
                margin: 20px 10px;
                padding: 40px 20px;
            }

            .menu-card {
                padding: 30px 20px;
            }

            .control-btn {
                padding: 18px 25px;
                font-size: 1rem;
            }

            .btn-icon {
                font-size: 1.3rem;
                margin-right: 12px;
            }
        }
    </style>





</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">

    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>
            </section><!-- #dash-content -->
        </div><!-- .wrap -->


        <!-- /#app-footer -->
    </main>
    <!--========== END app main -->



</body>

</html>