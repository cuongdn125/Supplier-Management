<?php
    include '../../database.php';
    // include './util.php';
    $ma = $_POST['ma'];
    $ten = $_POST['ten'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $khuvuc = $_POST['khuvuc'];
    // $photo = $_FILES['anh'];
    // echo json_encode(array("statusCode"=>$photo));
        // echo json_encode(array("statusCode"=>$ma));

    // $imagename = '';
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


          $sql = "UPDATE `Nhavanchuyen` SET ten = '$ten' , sdt = '$sdt' , email = '$email', khuvuc = '$khuvuc', img = '$resultImg'
            WHERE ma = '$ma'";
            if (mysqli_query($conn, $sql)) {
                echo json_encode(array("statusCode"=>200));
            }else{
                echo json_encode(array("statusCode"=>201));
            }

        }
        return $flag;
    }



    $sql = "UPDATE `Nhavanchuyen` SET ten = '$ten' , sdt = '$sdt' , email = '$email', khuvuc = '$khuvuc'
            WHERE ma = '$ma'";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("statusCode"=>200));
    }else{
        echo json_encode(array("statusCode"=>201));
    }


?>