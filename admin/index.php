<?php
session_start();
if($_SESSION['admin'] == "" ||  empty($_SESSION['admin'])){
    header("Location: http://localhost:8080/ltw3/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/index.css"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <title>Quản lý</title>
  </head>

  <body>

    <?php
        include '../header.php';

        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 'nhacungcap';
        }

        if($page == 'nhacungcap'){
          include './nhacungcap/index.php';
        }else{
          include './nhavanchuyen/index.php';
        }

    ?>


    <script type="text/javascript" language="javascript" >

      function getNcc(ma){
        $("#sua_ma").val(ma);
        $.ajax({
          url: './nhacungcap/getNcc.php',
          data: {
            ma: ma
          },
          type: 'POST',
          success: function(data){
            var ncc = JSON.parse(data);
            $("#sua_ten").val(ncc.ten);
            $("#sua_diachi").val(ncc.diachi);
            $("#sua_sdt").val(ncc.sdt);
            $("#sua_email").val(ncc.email);
            $("#sua_nhom").val(ncc.nhom);
            $("#view_anh").attr('src',ncc.img);
          }
        })
      }
      function getNvc(ma){
        $("#sua_ma_nvc").val(ma);
        $.ajax({
          url: './nhavanchuyen/getNvc.php',
          data: {
            ma: ma
          },
          type: 'POST',
          success: function(data){
            var ncc = JSON.parse(data);
            $("#sua_ten_nvc").val(ncc.ten);
            $("#sua_sdt_nvc").val(ncc.sdt);
            $("#sua_email_nvc").val(ncc.email);
            $("#sua_khuvuc_nvc").val(ncc.khuvuc);
            $("#view_anh_nvc").attr('src',ncc.img);
          }
        })
      }
      function suaNcc(){
        var ma = $("#sua_ma").val();
        var ten = $("#sua_ten").val();
        var diachi = $("#sua_diachi").val();
        var sdt = $("#sua_sdt").val();
        var email = $("#sua_email").val();
        var nhom = $("#sua_nhom").val();

        let img = $("#sua_anh");
        var form = new FormData();
        form.append("image", img[0].files[0]);
        form.append("ma", ma);
        form.append("ten", ten);
        form.append("diachi", diachi);
        form.append("sdt", sdt);
        form.append("email", email);
        form.append("nhom", nhom);


        $.ajax({
          url: './nhacungcap/suaNcc.php',
          processData: false,
          mimeType: "multipart/form-data",
          contentType: false,
          data: form,
          type: 'POST',
          success: function(data){
            location.reload();
          }
        })
      }
      function suaNvc(){
        var ma = $("#sua_ma_nvc").val();
        var ten = $("#sua_ten_nvc").val();
        var sdt = $("#sua_sdt_nvc").val();
        var email = $("#sua_email_nvc").val();
        var khuvuc = $("#sua_khuvuc_nvc").val();

        let img = $("#sua_anh_nvc");
        var form = new FormData();
        form.append("image", img[0].files[0]);
        form.append("ma", ma);
        form.append("ten", ten);
        form.append("sdt", sdt);
        form.append("email", email);
        form.append("khuvuc", khuvuc);

        $.ajax({
          url: './nhavanchuyen/suaNvc.php',
          processData: false,
          mimeType: "multipart/form-data",
          contentType: false,
          data: form,
          type: 'POST',
          success: function(data){
            location.reload();
          }
        })
      }
      function xoaNcc(ma){
        var check = confirm("Bạn có muốn xoá ?");
          if(check){
            $.ajax({
              url: "./nhacungcap/xoaNcc.php",
              method: "POST",
              data: {ma: ma},
              success: function(dataResult){
                $("#noti").html(dataResult);
                $("#noti").show();
                  viewDataNcc();
                  thongkeNcc();
              }
            });
          }
      }
      function xoaNvc(ma){
        var check = confirm("Bạn có muốn xoá ?");
          if(check){
            $.ajax({
              url: "./nhavanchuyen/xoaNvc.php",
              method: "POST",
              data: {ma: ma},
              success: function(dataResult){
                $("#noti").html(dataResult);
                $("#noti").show();
                  viewDataNvc();
              }
            });
          }
      }
      function viewDataNcc(){
        $.ajax({
          url: "./nhacungcap/dsNcc.php",
          method: "GET",
          success: function(dataResult){
              $("#load_ncc").html(dataResult);
          }
        });
      }
      function viewDataNvc(){
        $.ajax({
          url: "./nhavanchuyen/dsNvc.php",
          method: "GET",
          success: function(dataResult){
              $("#load_nvc").html(dataResult);
              console.log(dataResult);
          }
        });
      }
      function themNcc(){
        var ma = $("#ma").val();
        var ten = $("#ten").val();
        var diachi = $("#diachi").val();
        var sdt = $("#sdt").val();
        var email = $("#email").val();
        var nhom = $("#nhom").val();
        let img = $("#anh");
        var form = new FormData();
        form.append("image", img[0].files[0]);
        form.append("ma", ma);
        form.append("ten", ten);
        form.append("diachi", diachi);
        form.append("sdt", sdt);
        form.append("email", email);
        form.append("nhom", nhom);

        $.ajax({
          url: './nhacungcap/themNcc.php',
          processData: false,
          mimeType: "multipart/form-data",
          contentType: false,
          data: form,
          type: 'POST',
          success: function(data){
            location.reload();
          }
        })
      }
      function themNvc(){
        var ma = $("#ma_nvc").val();
        var ten = $("#ten_nvc").val();
        var sdt = $("#sdt_nvc").val();
        var email = $("#email_nvc").val();
        var khuvuc = $("#khuvuc_nvc").val();
        // console.log(ma, sdt, email, khuvuc);
        let img = $("#anh_nvc");
        var form = new FormData();
        form.append("image", img[0].files[0]);
        form.append("ma", ma);
        form.append("ten", ten);
        form.append("sdt", sdt);
        form.append("email", email);
        form.append("khuvuc", khuvuc);

        $.ajax({
          url: './nhavanchuyen/themNvc.php',
          processData: false,
          mimeType: "multipart/form-data",
          contentType: false,
          data: form,
          type: 'POST',
          success: function(data){
            location.reload();
          }
        })
      }
      function timNcc(){
        // e.preventDefault();
        var timkiem = $("#timkiem_ncc").val();
        console.log(timkiem);
        $.ajax({
          url: './nhacungcap/timkiemNcc.php',
          data: {
            timkiem: timkiem,
          },
          type: 'POST',
          success: function(data){
            $("#load_ncc").html(data);
          }
        })
      }
      function timNvc(){
        var timkiem = $("#timkiem_nvc").val();
        console.log(timkiem);
        $.ajax({
          url: './nhavanchuyen/timkiemNvc.php',
          data: {
            timkiem: timkiem,
          },
          type: 'POST',
          success: function(data){
            $("#load_nvc").html(data);
          }
        })
      }
      function doThiNcc(nhom, soluong){
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: nhom,
                datasets: [{
                    label: 'Nhóm',
                    data: soluong,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

      }
      function doThiNvc(khuvuc, soluong){
        const ctx = document.getElementById('myChartNvc');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: khuvuc,
                datasets: [{
                    label: 'Khu vực',
                    data: soluong,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
      }
      function thongkeNcc(){
        $.ajax({
          url: './nhacungcap/thongke.php',
          type: 'GET',
          contentType: 'application/json',
          success: function(data){
            var data = JSON.parse(data);
            var nhom = new Array();
            var soluong = new Array();
            data.map(function(item){
              nhom.push(item.nhom);
              soluong.push(parseInt(item["0"]));
            })
            // console.log(nhom);
            // console.log(soluong);
            doThiNcc(nhom, soluong);
          }
        })
      }
      function thongkeNvc(){
        $.ajax({
          url: './nhavanchuyen/thongke.php',
          type: 'GET',
          contentType: 'application/json',
          success: function(data){
            var data = JSON.parse(data);
            // console.log(data);
            var khuvuc = new Array();
            var soluong = new Array();
            data.map(function(item){
              khuvuc.push(item.khuvuc);
              soluong.push(parseInt(item["0"]));
            })
            // console.log(khuvuc);
            // console.log(soluong);
            doThiNvc(khuvuc, soluong);
          }
        })
      }
      $(document).ready(function() {
        viewDataNcc();
        viewDataNvc();
        thongkeNcc();
        thongkeNvc();
      });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
