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

                                    Login</center>
                            </h1>
                            </p>
                            <br>

                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="id" class="form-control form-control-lg" required placeholder="Enter a valid email address" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="pass" class="form-control form-control-lg" required placeholder="Enter password" />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->

                            <a href="#!" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Login"></button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="Register.php" class="link-danger">Register</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </section>
    <script src="" async defer></script>
</body>

</html>

<?php

if ($_POST) {
    session_start();
    include 'conn.php';

    $eid  = $_POST['id'];
    $pass = $_POST['pass'];

    $existsql = "SELECT * FROM user_login WHERE email_id='$eid' and  password='$pass'";
    $existsql1 = "SELECT * FROM admin_login WHERE login_id='$eid' and  password='$pass'";

    $res = mysqli_query($dbcon, $existsql);
    $res1 = mysqli_query($dbcon, $existsql1);

    $count = mysqli_num_rows($res);
    $count1 = mysqli_num_rows($res1);

    if ($count == 1) {
        header('location:user/index.php');
        $sql = "SELECT * FROM user_login WHERE email_id='$eid'";
        $result = mysqli_query($dbcon, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $id =  $row['id'];
        }
        $_SESSION["id"] = $id;
    } elseif ($count1 == 1) {
        header('location:admin/index.php');
        $sql = "SELECT * FROM admin_login WHERE login_id='$eid'";
        $result = mysqli_query($dbcon, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $adminid =  $row['admin_id'];
        }
        $_SESSION["adminid"] = $adminid;
    } else {

        echo "<script>
           
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Enter Right Values!!'
          })
    
</script>";
    }
}
?>