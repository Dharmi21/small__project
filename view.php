<?php
include '../conn.php';
session_start();
echo '<br>';
echo '<br>';
echo '<br>';

?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>Review & Rating System in PHP & Mysql using Ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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

</head>

<body>
    <br>
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
        <div class="container">
            <div class="card">
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <?php

                            if (empty($_GET['tegdtfg5453'])) {
                            } else {
                                $id = $_GET['tegdtfg5453'];
                                $query = " SELECT * FROM product WHERE pro_id = '$id' ";
                                $result = mysqli_query($dbcon, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                            ?>


                                    <img class="card-img-bottom" src="../imgs/<?php echo $data['pro_image']; ?>" alt="Card image cap">
                        </div>
                        <div class="col-sm-4 text-center">
                            <h5 name="name" class="card-title"><?php echo $data['pro_name']; ?></h5>
                            <li name="price" class="list-group-item">Price:₹<?php echo $data['pro_price']; ?></li>
                            <li class="list-group-item"><?php echo $data['pro_desc']; ?></li>
                            <div class="col-md-6 py-1 pl-4">
                                <b>Quantity : </b>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="pqty" class="form-control pqty" value="<?= $data['pro_qty'] ?>">
                            </div>
                            <br>
                            <input type="submit" name="btn" value="Add to cart" class="btn btn-success btn-block addItemBtn">
                            <br>
                            <br>
                            <input type="submit" name="buynow" value="Buy Now" class="btn btn-success btn-block addItemBtn">
                            <input type="hidden" name="pid" value="<?= $data['pro_id'] ?>">

                            <input type="hidden" name="pprice" value="<?= $data['pro_price'] ?>">
                            <input type="hidden" name="pimage" value="<?= $data['pro_image'] ?>">
                            <input type="hidden" name="pcode" value="<?= $data['pro_code'] ?>">

                        </div>


                        <div class="col-sm-4">

                            <div class="modal-body">
                                <h4 class="text-center mt-2 mb-4">
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                </h4>
                                <input type="hidden" name="pname" id="pname" value="<?= $data['pro_name'] ?>">
                                <div class="form-group">
                                    <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                                </div>
                                <div class="form-group text-center mt-4">
                                    <button type="button" class="btn btn-primary" id="save_review">Submit</button>

                                </div>

                            </div>
                        </div>
                <?php
                                    $product_name = $data['pro_name'];
                                }
                            }
                ?>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">

            <div class="card">
                <div class="card-header">Review Section</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <h1 class="text-warning mt-4 mb-4">
                                <?php
                                $average_rating = 0;
                                $total_review = 0;
                                $total_user_rating = 0;
                                $query = "SELECT * FROM review WHERE pro_name='$product_name'";
                                $result = mysqli_query($dbcon, $query);
                                $num = mysqli_num_rows($result);
                                if ($num > 0) {
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        $total_review++;
                                        $total_user_rating = $total_user_rating + $rows["rating_data"];
                                    }
                                    $total_review;

                                    $total_user_rating;

                                    $average_rating = $total_user_rating / $total_review;
                                }
                                ?>
                                <b><span id="average_rating"><?php echo number_format($average_rating) ?></span> / 5</b>
                            </h1>

                            <?php
                            $total = 0;
                            $query1 = "SELECT (pro_name) FROM review WHERE pro_name='$product_name'";
                            $res = mysqli_query($dbcon, $query1);
                            while ($row = mysqli_fetch_assoc($res)) {
                                $total++;
                            }
                            ?>
                            <h3><span id="total_review"><?php echo $total ?></span> Review</h3>

                        </div>
                        <?php

                        $sql1 = "SELECT  a.id,a.name,b.user_review,b.user_id,b.rating_data FROM user_login a,review b WHERE b.pro_name = '$product_name' and a.id = b.user_id";
                        $res = mysqli_query($dbcon, $sql1);
                        while ($row1 = mysqli_fetch_assoc($res)) {
                            $data = $row1['rating_data'];


                        ?>
                            <br />
                            <br />
                            <div class="col-sm-4 text-center">
                                <div class="row mb-3">
                                    <div class="col-sm-11">

                                        <div class="card">

                                            <div class="card-header">
                                                <b>
                                                    <?php echo $row1['name'] ?>
                                                </b>
                                            </div>
                                            <div class="card-body">

                                                <?php 
                                                if($data==1){
                                                    echo '<img src="../imgs/1.png">';
                                                }
                                                if($data==2){
                                                    echo '<img src="../imgs/2.png">';
                                                }
                                                if($data==3){
                                                    echo '<img src="../imgs/3.png">';
                                                }
                                                if($data==4){
                                                    echo '<img src="../imgs/4.png">';
                                                }
                                                if($data==5){
                                                    echo '<img src="../imgs/5.png">';
                                                }
                                                ?>

                                            </div>
                                            <hr>
                                            <div class="card-body">

                                                <?php echo $row1['user_review'] ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script>
            $(document).ready(function() {
                var rating_data = 0;
                $('#add_review').click(function() {

                    $('#review_modal').modal('show');

                });
                $(document).on('mouseenter', '.submit_star', function() {

                    var rating = $(this).data('rating');

                    reset_background();

                    for (var count = 1; count <= rating; count++) {

                        $('#submit_star_' + count).addClass('text-warning');

                    }

                });

                function reset_background() {
                    for (var count = 1; count <= 5; count++) {

                        $('#submit_star_' + count).addClass('star-light');

                        $('#submit_star_' + count).removeClass('text-warning');

                    }
                }
                $(document).on('mouseleave', '.submit_star', function() {

                    reset_background();

                    for (var count = 1; count <= rating_data; count++) {

                        $('#submit_star_' + count).removeClass('star-light');

                        $('#submit_star_' + count).addClass('text-warning');
                    }

                });

                $(document).on('click', '.submit_star', function() {

                    rating_data = $(this).data('rating');

                });
                $('#save_review').click(function() {



                    var user_review = $('#user_review').val();
                    var pname = $('#pname').val();


                    if (user_review == '') {
                        alert("Please Fill Both Field");
                        return false;
                    } else {
                        $.ajax({
                            url: "review.php",
                            method: "POST",
                            data: {
                                pname: pname,
                                rating_data: rating_data,

                                user_review: user_review
                            },
                            success: function(data) {
                                $('#review_modal').modal('hide');


                                Swal.fire(data);
                            }
                        })
                    }
                });




            });
        </script>
    </form>
    <?php
    if (isset($_POST['btn'])) {
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $pimage = $_POST['pimage'];
        $pcode = $_POST['pcode'];
        $pqty = $_POST['pqty'];
        $id = $_SESSION['id'];
        $total_price = $pqty * $pprice;
        $already = "SELECT pro_code FROM cart WHERE pro_code='$pcode'";
        $res = mysqli_query($dbcon, $already);
        $data = mysqli_fetch_array($res);
        if (empty($_SESSION['id'])) {
            echo "<script>
           
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You Have To Login First!!!',
           
          }).then (function(){
            window.location='../login.php';
          });
        
    
           </script>";
        } else {
            if (!$data) {



                $query = "INSERT INTO cart (pro_name,pro_price,pro_image,qty,total_price,pro_code,login_id) VALUES ('$pname','$pprice','$pimage','$pqty','$total_price','$pcode','$id')";
                $result = mysqli_query($dbcon, $query);

                echo "<script>
            Swal.fire(
                'Good job!',
                'Added Into Cart!',
                'success'
              )
            </script>";
            } else {
                echo "<script>
           
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Already There In Cart!'
              })
        
       </script>";
            }
        }
    }
    if (isset($_POST['buynow'])) {
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $pimage = $_POST['pimage'];
        $pcode = $_POST['pcode'];
        $pqty = $_POST['pqty'];
        $id = $_SESSION['id'];
        $total_price = $pqty * $pprice;
        $already = "SELECT pro_code FROM cart WHERE pro_code='$pcode'";
        $res = mysqli_query($dbcon, $already);
        $data = mysqli_fetch_array($res);
        if (empty($_SESSION['id'])) {

            echo "<script>
               
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You Have To Login First!!!',
               
              }).then (function(){
                window.location='../login.php';
              });
            
        
      </script>";
        } else {
            if (!$data) {
                $query = "INSERT INTO cart (pro_name,pro_price,pro_image,qty,total_price,pro_code,login_id) VALUES ('$pname','$pprice','$pimage','$pqty','$total_price','$pcode','$id')";
                $result = mysqli_query($dbcon, $query);
                if ($result) {

                    echo '<script>location.href="cart.php"</script>';
                }
            } else {
                echo "<script>
               
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Already There In Cart!'
                  })
            
        </script>";
            }
        }
    }




    ?>


</body>

</html>