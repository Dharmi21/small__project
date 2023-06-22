<?php
include '../conn.php';

include 'error.php';
// $quantity = $_SESSION["quantity"];
// echo $quantity;

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>

    <title></title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }

        .bg-grey {
            background-color: #eae8e8;
        }

        @media (min-width: 992px) {
            .card-registration-2 .bg-grey {
                border-top-right-radius: 16px;
                border-bottom-right-radius: 16px;
            }
        }

        @media (max-width: 991px) {
            .card-registration-2 .bg-grey {
                border-bottom-left-radius: 16px;
                border-bottom-right-radius: 16px;
            }
        }
    </style>
</head>

<body>
    <form method="POST">


        <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">

            <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <a href="index.php" class="navbar-brand ms-4 ms-lg-0">
                    <h1 class="fw-bold text-primary m-0">Ghanshyam Grocery Shop</h1>
                </a>
                <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto p-4 p-lg-0">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <?php
                        if (empty($_SESSION['id'])) {

                        ?>
                            <a class="nav-link" href="../login.php"><i class="fas fa-money-check-alt mr-2"></i>login</a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link" href="logout.php"><i class="fas fa-money-check-alt mr-2"></i>Logout</a>
                            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                            <a class="nav-link" href="history.php"><i class="fas fa-money-check-alt mr-2"></i>Order History</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </div>

        <?php
        if (!empty($_SESSION['id'])) {

            $id = $_SESSION['id'];

            $query = " SELECT * FROM cart WHERE login_id = '$id'";
            $result = mysqli_query($dbcon, $query);
            $rowcount = mysqli_num_rows($result);
            if (!$rowcount > 0) {
                echo '<section>
                <br>
                <br>
                <br>
                <br> <br>
                <br>
                <br> <br>
                <br>
                <br> <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <!-- Image -->
                            <img src="../imgs/empty-cart.gif" class="h-200 h-md-300 mb-3" alt="">
                            <!-- Subtitle -->
                            <h2>Your cart is currently empty</h2>
                            <!-- info -->
                            <p class="mb-0">I think the below button is important. Hit this button and you will find a lot of interesting products on our "Shop" page</p>
                            <!-- Button -->
                            <a href="index.php" class="btn btn-primary mt-4 mb-0">Back to Shop</a>
                        </div>
                    </div>
                </div>
            </section>';
            } else {
        ?>

                <section class="h-100 h-custom">

                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12">
                                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                    <div class="card-body p-0">
                                        <div class="row g-0">
                                            <div class="col-lg-8">
                                                <div class="p-5">
                                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                                        <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                                    </div>
                                                    <hr class="my-4">

                                                    <!-- ##################################product start############################################## -->

                                                    <?php
                                                    $total = 0;
                                                    $total_items = 0;
                                                    while ($data = mysqli_fetch_assoc($result)) {

                                                    ?>

                                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                                <img src="../imgs/<?php echo $data['pro_image']; ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                                <h6 class="text-black mb-0"><?php echo $data['pro_name']; ?></h6>
                                                                <input type="text" hidden name="proname" value="<?php echo $data['pro_name']; ?>">
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                                <h6 class="text-black mb-0"><?php echo number_format($data['qty']); ?></h6>
                                                            </div>
                                                            <div class="col-md-3 col-lg-2 col-xl-2 text-end">
                                                                <h6 class="mb-0">
                                                                    <h6 class="text-black mb-0">₹<?php echo number_format($data['total_price']); ?></h6>

                                                                </h6>
                                                            </div>
                                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                                <a href="action.php?id=<?= $data['id'] ?>" class="text-danger lead"><i class="fas fa-trash-alt"></i></a>

                                                            </div>
                                                        </div> <?php

                                                                $total += $data['total_price'];

                                                                $total_items += $data['qty'];
                                                                $names[] = $data['pro_name'];
                                                            }



                                                                ?>
                                                    <a href="index.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
                                                        Shopping</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 bg-grey">
                                                <div class="p-5">
                                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                                    <hr class="my-4">
                                                    <div class="d-flex justify-content-between mb-5">
                                                        <h5 class="text-uppercase">Total Iteams</h5>
                                                        <h2 class="mb-0">
                                                            <h2 class="text-black mb-0"><?php echo number_format($total_items) ?></h2>

                                                            <input type="text" hidden name="total" value="<?php echo number_format($total_items) ?>">

                                                        </h2>

                                                    </div>
                                                    <hr class="my-4">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <h5 class="text-uppercase">Total price</h5>
                                                        <h5 class="mb-0">
                                                            <h5 class="text-black mb-0">₹<?php echo number_format($total, 2) ?></h5>
                                                            <input type="text" hidden name="price" value="<?php echo number_format($total, 2) ?>">


                                                        </h5>
                                                    </div>

                                                    <input type="submit" class="btn btn-dark btn-block btn-lg" name="btn1" value="Place Order">

                                                <?php
                                            }
                                            if (isset($_POST['btn1'])) {
                                                if (!empty($_POST['total']) && !empty($_POST['price']) && !empty(implode(',', $names)) && !empty($_SESSION['id'])) {
                                                    $pro1 = $_POST['total'];
                                                    $main_total1 = $_POST['price'];
                                                    $pro_name = implode(',', $names);
                                                    $id = $_SESSION['id'];


                                                    $add = "INSERT INTO orders(total_items,total_bill,login_id,proname) VALUES('$pro1','$main_total1','$id','$pro_name')";
                                                    $res2 = mysqli_query($dbcon, $add);
                                                    echo "<script>
                                                                    Swal.fire(
                                                                         'Good job!',
                                                                         'Order placed!!!!',
                                                                         'success'
                    
                                                                           ).then (function(){
                                                                            window.location='index.php';
                                                                          });
                                                                            </script>";

                                                    $remove = "DELETE FROM cart WHERE login_id = '$id'";
                                                    $res3 = mysqli_query($dbcon, $remove);
                                                } else {
                                                    echo "<script>
                               
                                                                        Swal.fire({
                                                                        icon: 'error',
                                                                        title: 'Oops...',
                                                                        text: 'Order not placed!!!',
                               
                                                                                          })
                            
                        
                                                                             </script>";
                                                }
                                            }
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                </section>
            <?php
        } else {
            echo "<script>
           
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You Have To Login First!!!',
               
              }).then (function(){
                window.location='../login.php';
              });
            
        
    </script>";
        }
            ?>
    </form>
    <script src="" async defer></script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>