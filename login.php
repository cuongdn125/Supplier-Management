
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./public/css/login.css"/>
    <title>Login</title>
  </head>

  <body>
      <div class="position-absolute" style="top: 20px; right: 10px;">
          <a href="register.php" class="btn btn-primary">Register</a>
      </div>
    <div class="container-login position-absolute top-50 start-50 translate-middle ">
        <h2 class="text-center" >Login</h2>

        <form class="form">
            <div class="mb-3">
                <label for="name" class="form-label"
                    >Name</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    aria-describedby="emailHelp"
                />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"
                    >Password</label
                >
                <input
                    type="password"
                    class="form-control"
                    id="password"
                />
            </div>
            <div class="invalid-feedback" id="error" style="margin-bottom: 5px"></div>

            <button type="submit" class="btn btn-primary" id="login">Login</button>
        </form>
    </div>



    <script>
        $(document).ready(function(){

            $("#login").on('click', function(e){
                e.preventDefault();
                var name = $("#name").val();
                var password = $("#password").val();
                if(name !== "" || password !== ""){
                    $.ajax({
                        url: "save.php",
                        method: "POST",
                        data: {
                            type: 2,
                            name: name,
                            password: password
                        },
                        success: function(dataResult){
                            var dataResult = JSON.parse(dataResult);
                            if(dataResult.statusCode === 200){
                                window.location.href = "./index.php";
                            }else if(dataResult.statusCode === 201){
                                $("#error").show();
                                $("#error").html("Invalid Name or Password !");
                            }
                        }
                    });
                }else {
                    alert("Please fill all the fields !");
                }
                });
        })

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>