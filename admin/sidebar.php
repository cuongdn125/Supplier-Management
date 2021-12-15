<?php
    session_start();
?>

<header class="header" id="header">
    <div class="header_toggle">
    <i class="bx bx-menu" id="header-toggle"></i>
    </div>
    <div >
        <!-- <img src="https://i.imgur.com/hczKIze.jpg" alt="" /> -->
        <?php echo $_SESSION['admin'] ?>
    </div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="http://localhost:8080/ltw3" class="nav_logo">
                <i class="bx bx-layer nav_logo-icon"></i>
                <span class="nav_logo-name">Quản lý</span>
            </a>
            <div class="nav_list">
                <a href="index.php?page=nhacungcap" class="nav_link" id="nhacungcap">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Nhà cung cấp</span>
                </a>
                <a href="index.php?page=nhavanchuyen" class="nav_link" id="nhavanchuyen">
                    <i class="bx bx-user nav_icon"></i>
                    <span class="nav_name">Nhà vận chuyển</span>
                </a>
            </div>
        </div>
        <a href="../logout.php" class="nav_link">
            <i class="bx bx-log-out nav_icon"></i>
            <span class="nav_name">Đăng xuất</span>
        </a>
    </nav>
</div>