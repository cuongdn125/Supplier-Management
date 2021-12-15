<?php
    include '../../database.php';
    if($_POST['ma'] != ''){
        $ma = $_POST['ma'];
        $sql = "SELECT * FROM Nhacungcap WHERE ma = '$ma'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }else{

    }
?>