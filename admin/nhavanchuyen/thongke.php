<?php
    include '../../database.php';
    $sql = "SELECT COUNT(ma), khuvuc FROM Nhavanchuyen GROUP BY khuvuc;";
    $result = mysqli_query($conn, $sql);
    $data = array();
    while($row = mysqli_fetch_array($result)){
        $data[] = $row;
    }
    echo json_encode($data);
?>