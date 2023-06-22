<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="draw2.webp" class="img-fluid">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST">

                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">
                            <h1>
                                <center>
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;

                                    Register</center>
                            </h1>
                            </p>
                            <br>

                        </div>
                        <?php

                        $already = $password = "";
                        if (isset($_POST['submit'])) {

                            include 'conn.php';
                            $eid  = $_POST['email'];
                            $pass = $_POST['password'];
                            $address = $_POST['address'];
                            $phone = $_POST['mobile'];
                            $name = $_POST['name'];
                            $pass1 = $_POST['repassword'];



                            $existsql = "SELECT * FROM user_login WHERE email_id='$eid' ";
                            $res = mysqli_query($dbcon, $existsql);
                            $num = mysqli_num_rows($res);
                            if ($num > 0) {
                                $already = "user name is already exist 🙅‍♀️";
                                echo  "<script>
           
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'user name is already exist 🙅‍♀️'
                                  })
                            
                        </script>";
                            } else {
                                if (!($pass == $pass1)) {
                                    $password = "passwords must be same 🙅‍♀️";
                                } else {
                                    $sql = "INSERT INTO user_login (email_id,password,address,phone_no,name) VALUES('$eid','$pass','$address','$phone','$name')";
                                    $res1  = mysqli_query($dbcon, $sql);
                                    print_r($res1);
                                    if ($res1) {
                                        echo "<script>
                                    Swal.fire(
                                        'Good job!',
                                        'Your Register Is Done!',
                                        'success'
                                      ).then (function(){
                                        window.location='login.php';
                                      });
                                    </script>";
                                    }
                                }
                            }
                        }
                        ?>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="email" class="form-control form-control-lg" required placeholder="Enter a valid email address" />
                            <div style="color: #ff0000;">*<?php echo $already; ?></div>

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" class="form-control form-control-lg" required placeholder="Enter password" />
                        </div>
                        <!-- re-Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="repassword" class="form-control form-control-lg" required placeholder="Re-Enter password" />
                            <div style="color: #ff0000;">*<?php echo $password; ?></div>

                        </div>
                        <!-- name input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="name" class="form-control form-control-lg" required placeholder="Enter Name" />
                        </div>
                        <!-- address input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="address" class="form-control form-control-lg" required placeholder="Enter Address" />
                        </div>
                        <!-- phonr_no input -->
                        <div class="form-outline mb-4">
                            <input type="number" name="mobile" class="form-control form-control-lg" required placeholder="Enter Phone_No" />
                        </div>



                        <div class="text-center text-lg-start mt-4 pt-2">
                            <input type="submit" class="btn btn-primary btn-lg" name="submit" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Register">
                            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="login.php" class="link-danger">Login</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>
    <script src="" async defer></script>

</body>

</html>