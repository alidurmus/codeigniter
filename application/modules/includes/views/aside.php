<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary-color: #2563eb;
        --primary-dark: #1d4ed8;
        --sidebar-bg: #1e293b;
        --sidebar-hover: #334155;
        --text-primary: #ffffff;
        --text-secondary: #cbd5e1;
        --accent: #f59e0b;
        --border-color: #374151;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        --sidebar-width: 280px;
        --sidebar-collapsed: 70px;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        overflow-x: hidden;
    }

    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: var(--sidebar-width);
        height: 100vh;
        background: var(--sidebar-bg);
        backdrop-filter: blur(10px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1000;
        box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        border-right: 1px solid var(--border-color);
    }

    .sidebar.collapsed {
        width: var(--sidebar-collapsed);
    }

    .sidebar-header {
        padding: 1.5rem;
        border-bottom: 1px solid var(--border-color);
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: all 0.3s ease;
    }

    .user-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: var(--accent);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 1.2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        min-width: 48px;
    }

    .user-details {
        flex: 1;
        transition: all 0.3s ease;
    }

    .user-name {
        color: var(--text-primary);
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 0.25rem;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .user-name:hover {
        color: var(--accent);
    }

    .logout-btn {
        color: var(--text-secondary);
        text-decoration: none;
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: color 0.2s ease;
    }

    .logout-btn:hover {
        color: var(--accent);
    }

    .sidebar.collapsed .user-details {
        opacity: 0;
        width: 0;
    }

    .toggle-btn {
        position: absolute;
        top: 1.5rem;
        right: -15px;
        background: var(--primary-color);
        color: white;
        border: none;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: var(--shadow);
        z-index: 1001;
    }

    .toggle-btn:hover {
        background: var(--primary-dark);
        transform: scale(1.1);
    }

    .menu-container {
        height: calc(100vh - 120px);
        overflow-y: auto;
        padding: 1rem 0;
    }

    .menu-container::-webkit-scrollbar {
        width: 4px;
    }

    .menu-container::-webkit-scrollbar-track {
        background: transparent;
    }

    .menu-container::-webkit-scrollbar-thumb {
        background: var(--border-color);
        border-radius: 2px;
    }

    .menu-section {
        margin-bottom: 1.5rem;
    }

    .menu-section-title {
        color: var(--text-secondary);
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 0 1.5rem 0.5rem;
        opacity: 0.8;
        transition: all 0.3s ease;
    }

    .sidebar.collapsed .menu-section-title {
        opacity: 0;
        height: 0;
        padding: 0;
        margin: 0;
    }

    .menu-item {
        margin-bottom: 0.25rem;
    }

    .menu-link {
        display: flex;
        align-items: center;
        padding: 0.875rem 1.5rem;
        color: var(--text-secondary);
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        border-radius: 0 25px 25px 0;
        margin-right: 1rem;
    }

    .menu-link:hover {
        background: var(--sidebar-hover);
        color: var(--text-primary);
        transform: translateX(5px);
    }

    .menu-link.active {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: var(--text-primary);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .menu-link.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 4px;
        background: var(--accent);
        border-radius: 0 2px 2px 0;
    }

    .menu-icon {
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.1rem;
        min-width: 20px;
    }

    .menu-text {
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .sidebar.collapsed .menu-text {
        opacity: 0;
        width: 0;
    }

    .submenu-toggle {
        position: relative;
    }

    .submenu-arrow {
        margin-left: auto;
        transition: transform 0.3s ease;
        font-size: 0.875rem;
    }

    .submenu-toggle.open .submenu-arrow {
        transform: rotate(90deg);
    }

    .submenu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        background: rgba(0, 0, 0, 0.2);
        margin: 0.25rem 0;
        border-radius: 0 15px 15px 0;
        margin-right: 1rem;
    }

    .submenu.open {
        max-height: 200px;
    }

    .submenu-item {
        padding-left: 4rem;
    }

    .sidebar.collapsed .submenu {
        display: none;
    }

    .main-content {
        margin-left: var(--sidebar-width);
        transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 2rem;
        min-height: 100vh;
    }

    .sidebar.collapsed~.main-content {
        margin-left: var(--sidebar-collapsed);
    }

    .tooltip {
        position: absolute;
        left: calc(100% + 10px);
        top: 50%;
        transform: translateY(-50%);
        background: var(--sidebar-bg);
        color: var(--text-primary);
        padding: 0.5rem 0.75rem;
        border-radius: 6px;
        font-size: 0.875rem;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: all 0.3s ease;
        box-shadow: var(--shadow);
        border: 1px solid var(--border-color);
        z-index: 1002;
    }

    .tooltip::before {
        content: '';
        position: absolute;
        left: -5px;
        top: 50%;
        transform: translateY(-50%);
        border: 5px solid transparent;
        border-right-color: var(--sidebar-bg);
    }

    .sidebar.collapsed .menu-link:hover .tooltip {
        opacity: 1;
    }

    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
        }

        .sidebar.mobile-open {
            transform: translateX(0);
        }

        .main-content {
            margin-left: 0;
        }

        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .mobile-overlay.active {
            opacity: 1;
            pointer-events: all;
        }
    }

    .demo-content {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: var(--shadow);
        margin-bottom: 2rem;
    }

    .demo-title {
        color: var(--sidebar-bg);
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .demo-text {
        color: #64748b;
        line-height: 1.6;
    }
</style>


<?php $user = get_active_user(); ?>

<div class="mobile-overlay" id="mobileOverlay"></div>

<aside class="sidebar" id="sidebar">
    <button class="toggle-btn" id="toggleBtn">
        <i class="fas fa-chevron-left"></i>
    </button>

    <div class="sidebar-header">
        <div class="user-info">
            <div class="user-avatar">
                JD
            </div>
            <div class="user-details">
                <h5><a href="<?php echo base_url("users/update_form/$user->id"); ?>" class="user-name"><?php echo $user->full_name; ?></a></h5>


                <a href="<?php echo base_url("logout"); ?>" class="logout-btn">
                    <i class="fas fa-power-off"></i>
                    <span>Çıkış</span>
                </a>
            </div>
        </div>
    </div>

    <div class="menu-container">
        <div class="menu-section">
            <div class="menu-section-title">Ana Menü</div>
            <div class="menu-item">
                <a href="<?php echo base_url("dashboard"); ?>" class="menu-link active">
                    <i class="fas fa-home menu-icon"></i>
                    <span class="menu-text">Ana Sayfa</span>
                    <div class="tooltip">Ana Sayfa</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="<?php echo base_url("anasayfa/kalite"); ?>" class="menu-link">
                    <i class="fas fa-star menu-icon"></i>
                    <span class="menu-text">Kalite İşlemleri</span>
                    <div class="tooltip">Kalite İşlemleri</div>
                </a>
            </div>
        </div>


        <div class="menu-section">
            <div class="menu-section-title">Ürün Yönetimi</div>

            <?php if (isAllowedViewModule("urunler")) { ?>
                <div class="menu-item">
                    <a href="<?php echo base_url("urunler"); ?>" class="menu-link">
                        <i class="fas fa-box menu-icon"></i>
                        <span class="menu-text">Ürünler</span>
                        <div class="tooltip">Ürünler</div>
                    </a>
                </div>
            <?php } ?>
            <?php if (isAllowedViewModule("malzemeler")) { ?>
                <div class="menu-item">
                    <a href="<?php echo base_url("malzemeler"); ?>" class="menu-link">
                        <i class="fas fa-cubes menu-icon"></i>
                        <span class="menu-text">Malzemeler</span>
                        <div class="tooltip">Malzemeler</div>
                    </a>
                </div>
            <?php } ?>
            <?php if (isAllowedViewModule("musteriler")) { ?>
                <div class="menu-item">
                    <a href="<?php echo base_url("musteriler"); ?>" class="menu-link">
                        <i class="fas fa-users menu-icon"></i>
                        <span class="menu-text">Müşteriler</span>
                        <div class="tooltip">Müşteriler</div>
                    </a>
                </div>
            <?php } ?>
            <?php if (isAllowedViewModule("tedarikciler")) { ?>
                <div class="menu-item">
                    <a href="<?php echo base_url("tedarikciler"); ?>" class="menu-link">
                        <i class="fas fa-truck menu-icon"></i>
                        <span class="menu-text">Tedarikçiler</span>
                        <div class="tooltip">Tedarikçiler</div>
                    </a>
                </div>
            <?php } ?>
            <?php if (isAllowedViewModule("brands")) { ?>
                <div class="menu-item">
                    <a href="<?php echo base_url("brands"); ?>" class="menu-link">
                        <i class="fas fa-clipboard-list menu-icon"></i>
                        <span class="menu-text">Markalar</span>
                        <div class="tooltip">Markalar</div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="menu-section">
            <div class="menu-section-title">Kullanıcı Yönetimi</div>
            <?php if (isAllowedViewModule("user_roles")) { ?>
                <div class="menu-item">
                    <a href="<?php echo base_url("user_roles"); ?>" class="menu-link">
                        <i class="fas fa-user-shield menu-icon"></i>
                        <span class="menu-text">Kullanıcı Rolü</span>
                        <div class="tooltip">Kullanıcı Rolü</div>
                    </a>
                </div>
            <?php } ?>
            <?php if (isAllowedViewModule("users")) { ?>
                <div class="menu-item">
                    <a href="<?php echo base_url("users"); ?>" class="menu-link">
                        <i class="fas fa-users-cog menu-icon"></i>
                        <span class="menu-text">Kullanıcılar</span>
                        <div class="tooltip">Kullanıcılar</div>
                    </a>
                </div>
            <?php } ?>
        </div>

        <div class="menu-section">
            <div class="menu-section-title">Kalite Kontrol</div>
            <?php if (isAllowedViewModule("girdikontrol")) { ?>
                <div class="menu-item">
                    <a href="<?php echo base_url("girdikontrol"); ?>" class="menu-link">
                        <i class="fas fa-check-circle menu-icon"></i>
                        <span class="menu-text">Girdi Kontrol</span>
                        <div class="tooltip">Girdi Kontrol</div>
                    </a>
                </div>
            <?php } ?>
            <?php if (isAllowedViewModule("proseskontrol")) { ?>
                <div class="menu-item">
                    <a href="<?php echo base_url("proseskontrol"); ?>"" class=" menu-link">
                        <i class="fas fa-cogs menu-icon"></i>
                        <span class="menu-text">Proses Kontrol</span>
                        <div class="tooltip">Proses Kontrol</div>
                    </a>
                </div>
            <?php } ?>
            <?php if (isAllowedViewModule("proses_categories")) { ?>
                <div class="menu-item">
                    <a href="<?php echo base_url("proses_categories"); ?>" class="menu-link">
                        <i class="fas fa-tags menu-icon"></i>
                        <span class="menu-text">Proses Kategori</span>
                        <div class="tooltip">Proses Kategori</div>
                    </a>
                </div>
            <?php } ?>
            <?php if (isAllowedViewModule("finalkontrol")) { ?>
                <div class="menu-item">
                    <a href="<?php echo base_url("finalkontrol"); ?>" class="menu-link">
                        <i class="fas fa-flag-checkered menu-icon"></i>
                        <span class="menu-text">Final Kontrol</span>
                        <div class="tooltip">Final Kontrol</div>
                    </a>
                </div>
            <?php } ?>
        </div>





        <div class="menu-section">
            <div class="menu-section-title">Sistem Ayarları</div>
            <?php if (isAllowedViewModule("settings")) { ?>
                <div class="menu-item">
                    <a href="<?php echo base_url("settings"); ?>" class="menu-link">
                        <i class="fas fa-cog menu-icon"></i>
                        <span class="menu-text">Site Ayarları</span>
                        <div class="tooltip">Site Ayarları</div>
                    </a>
                </div>
            <?php } ?>
            <?php if (isAllowedViewModule("emailsettings")) { ?>
                <div class="menu-item">
                    <a href="<?php echo base_url("emailsettings"); ?>" class="menu-link">
                        <i class="fas fa-envelope menu-icon"></i>
                        <span class="menu-text">E-posta Ayarları</span>
                        <div class="tooltip">E-posta Ayarları</div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</aside>