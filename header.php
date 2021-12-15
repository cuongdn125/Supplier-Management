<?php
  session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
  <div class="container">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost:8888/ltw3/">Trang chủ</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="http://localhost:8888/ltw3/#nhacungcap">Nhà cung cấp</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost:8888/ltw3/#nhavanchuyen">Nhà vận chuyển</a>
        </li> -->
        <?php
          if(!empty($_SESSION['admin'] && $_SESSION['admin'] !== '')){
            echo '
                  <li class="nav-item">
                    <a class="nav-link" href="http://localhost:8888/ltw3/admin/index.php?page=nhacungcap">Nhà cung cấp</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="http://localhost:8888/ltw3/admin/index.php?page=nhavanchuyen">Nhà vận chuyển</a>
                  </li>';
          }
        ?>
      </ul>
      <?php
        // $_SESSION['admin'] = 'admin';
        if(empty($_SESSION['admin'] || $_SESSION['admin'] === '')):
      ?>
                <a class='login' href="login.php">Đăng nhập</a>
      <?php
        else:
      ?>
            <div style="margin-left: 20px; color:#9a9c9e">
                <?php
                    if (isset($_SESSION['admin'])) {
                        echo $_SESSION['admin'];
                    }
                ?>
            </div>
                <a class='login' href="http://localhost:8888/ltw3/logout.php" >Đăng xuất</a>
        <?php endif; ?>

    </div>
  </div>
</nav>