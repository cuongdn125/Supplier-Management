<?php
    include './database.php';
    $sql = 'SELECT * FROM Nhacungcap';
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
?>
    <div class="col" style="margin-top:20px">
        <div class="card" style="width: 18rem;">
            <img style=" height: 200px; object-fit: contain" src="<?php echo $row['img']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['ten']?></h5>
                <p class="card-text">Số Điện thoại: <?php echo $row['sdt']?>
                    <br/>Email: <?php echo $row['email']?>
                    <br/> Nhóm: <?php echo $row['nhom']?>
                </p>
            </div>
        </div>
    </div>
<?php
}
?>