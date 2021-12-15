<?php
    include '../../database.php';
    $ma = $_POST['ma'];
    $sql = "DELETE FROM Nhacungcap WHERE ma = '$ma'";
    $query = mysqli_query($conn, $sql);
    if($query) {
        echo '<td>Xóa thành công</td>';
    } else {
        echo '<td>Xóa thất bại</td>';
    }
?>