<?php
function is_page_active($page_name) {
    if (isset($_GET['page']) && $_GET['page'] == $page_name) {
        echo 'open active';
    }
}
?>

<ul class="menu-inner py-1">
    <li class="menu-item <?php is_page_active('beranda'); ?>">
        <a href="dashboard.php?page=beranda" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Beranda</div>
        </a>
    </li>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Internal</span>
    </li>
    <li class="menu-item <?php is_page_active('tambah-pengguna'); ?> || <?php is_page_active('semua-pengguna'); ?>">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Account Settings">Data Pengguna</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item <?php is_page_active('tambah-pengguna'); ?>">
                <a href="dashboard.php?page=tambah-pengguna" class="menu-link">
                    <div data-i18n="Account">Tambah pengguna</div>
                </a>
            </li>
            <li class="menu-item <?php is_page_active('semua-pengguna'); ?>">
                <a href="dashboard.php?page=semua-pengguna" class="menu-link">
                    <div data-i18n="Notifications">Semua pengguna</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Main</span>
    </li>
    <li class="menu-item <?php is_page_active('tambah-cucian'); ?> || <?php is_page_active('cucian-ready'); ?> || <?php is_page_active('info-paket'); ?> || <?php is_page_active('semua-cucian'); ?>">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-basket"></i>
            <div data-i18n="Account Settings">Cucian</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item <?php is_page_active('tambah-cucian'); ?>">
                <a href="dashboard.php?page=tambah-cucian" class="menu-link">
                    <div data-i18n="Account">Tambah Cucian</div>
                </a>
            </li>
            <li class="menu-item <?php is_page_active('info-paket'); ?>">
                <a href="dashboard.php?page=info-paket" class="menu-link">
                    <div data-i18n="Account">Info Paket</div>
                </a>
            </li>
        </ul>
    </li>

    <!-- Extended components -->
</ul>