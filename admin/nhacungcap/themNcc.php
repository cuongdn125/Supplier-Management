<?php
    header('Access-Control-Allow-Origin: *');
    include '../../database.php';
    $ma = $_POST['ma'];
    $ten = $_POST['ten'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $nhom = $_POST['nhom'];


    if(isset($_FILES['image'])) {
        $name = str_replace(' ', '-', $_FILES["image"]["name"]);
        $bannerpath="../../public/uploads/".$name;
        $flag = move_uploaded_file($_FILES["image"]["tmp_name"],$bannerpath);
        if($flag) {
          $domain = "http://localhost:8888/ltw3/public";
          $resultImg = $domain. "/uploads/". $name;
          $size = $_FILES["image"]["size"];
          $result->resultImg = $domain. "uploads/". $name;
          $result->size = $size / 1024;
          $result->name = $name;
          echo json_encode($result);


          $sql = "INSERT INTO `Nhacungcap`( `ma`, `ten`, `sdt`, `email`, `diachi`, `nhom`, `img`)
                VALUES ('$ma','$ten', '$sdt', '$email', '$diachi', '$nhom','$resultImg')";
            if (mysqli_query($conn, $sql)) {
                echo json_encode(array("statusCode"=>200));
            }else{
                echo json_encode(array("statusCode"=>201));
            }

        }
        return $flag;
    }
    // $photo = $_FILES['anh'];
    // echo json_encode(array("statusCode"=>$photo));


    // $imagename = '';

    // $sql = "INSERT INTO `Nhacungcap`( `ma`, `ten`, `sdt`, `email`, `diachi`, `nhom`)
    //     VALUES ('$ma','$ten', '$sdt', '$email', '$diachi', '$nhom')";
    // if (mysqli_query($conn, $sql)) {
    //     echo json_encode(array("statusCode"=>200));
    // }else{
    //     echo json_encode(array("statusCode"=>201));
    // }


?>