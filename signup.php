<?php 
    $showalert=false;
    $showerror=false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        include 'PartOfCode/dbconnect.php';
        $username=$_POST["username"];
        $email=$_POST["email"];
        $password=$_POST["pwd"];
        $conpassword=$_POST["conpwd"];

        //Check user name is exist or not.
        $existsql="SELECT * FROM `user` WHERE name='$username'";
        $value=mysqli_query($conn,$existsql);
        $numExitRow=mysqli_num_rows($value);
        if($numExitRow> 0){
            $showerror="User name already exists.";
        }
        else{
            if($password == $conpassword){
                
                $sql="INSERT INTO `user` (`name`, `password`, `data`) VALUES ('$username', '$password', current_timestamp());";
                $result=mysqli_query($conn,$sql);
                if($result){
                    $showalert=true;
                }
            }
            else{
                $showerror="Paaword do not match.";
            }
        }
    }
    

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myNotes1.0 | Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/signup.css">
    
  </head>
  <body>
    <!-- include navbar.php file -->
    <?php require 'PartOfCode/navbar.php' ?>
    <?php
        if($showalert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Succuess!</strong> You account is created and you can login.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }

        if($showerror){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error: </strong> '. $showerror .'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    ?>

    <div class="container">
        <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                        <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                        <form action="signup.php" method="post">

                            <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" name="username" id="form3Example1cg" class="form-control form-control-lg" required>
                            <label class="form-label" for="form3Example1cg">Your Name</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" required>
                            <label class="form-label" for="form3Example3cg">Your Email</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" name="pwd" id="form3Example4cg" class="form-control form-control-lg" required>
                            <label class="form-label" for="form3Example4cg">Password</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" name="conpwd" id="form3Example4cdg" class="form-control form-control-lg" required>
                            <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                            </div>


                            <div class="d-flex justify-content-center">
                            <button  type="submit" data-mdb-button-init
                                data-mdb-ripple-init class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                            </div>

                            <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                                class="fw-bold text-body"><u>Login here</u></a></p>

                        </form>

                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>