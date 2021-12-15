<?php
    include '../../database.php';
    $sql = "SELECT COUNT(ma), nhom FROM Nhacungcap GROUP BY nhom;";
    $result = mysqli_query($conn, $sql);
    $data = array();
    while($row = mysqli_fetch_array($result)){
        $data[] = $row;
    }
    echo json_encode($data);
?>