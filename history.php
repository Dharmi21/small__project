<?php

include '../conn.php';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
session_start();
?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <script src="./vendor/jquery/jquery-3.2.1.min.js"></script>
  <title>data</title>
</head>

<body>
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
    <center>
      <h2>Order History</h2>
    </center>
    <br>
    <table class="table table-dark table-striped">

      <thead>
        <tr>
          <th scope="col">id</th>

          <th scope="col">order id</th>
          <th scope="col">total_items</th>
          <th scope="col">total_bill</th>
          <th scope="col">product name</th>
          <!-- <th scope="col">Review</th> -->
        </tr>
      </thead>
      <tbody>
        <?php
        $id = $_SESSION['id'];
        if (empty($id)) {
          echo  '<script>alert("You Have to login first!!")</script>';
          echo '<script>location.href="index.php"</script>';
        } else {
          $sql = "SELECT * FROM orders WHERE login_id = '$id'";

          $result = mysqli_query($dbcon, $sql);
          $rowcount = mysqli_num_rows($result);
          if ($rowcount == 0) {
            echo  '<script>alert("You Have Nothing In Your Order History")</script>';
            echo '<script>location.href="index.php"</script>';
          }
          $number = 1;

          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <th scope="row"><?php echo $number; ?></th>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['total_items']; ?></td>
              <td>₹<?php echo $row['total_bill']; ?></td>
              <td><?php echo $row['proname']; ?></td>
              <!-- <td>
                <button type="button" name="add_review" id="add_review" class="btn btn-primary"><a href="history.php?id=<?= $row['id']; ?>"></a>Review</button>
              </td> -->
            </tr>
        <?php
            $number++;
          }
        }

        ?>
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
</body>

</html>
<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Submit Review</h5>

      </div>
      <div class="modal-body">
        <h4 class="text-center mt-2 mb-4">
          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
        </h4>
        <div class="form-group">
          <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
        </div>
        <div class="form-group">
          <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
        </div>
        <div class="form-group text-center mt-4">
          <button type="button" class="btn btn-primary" id="save_review">Submit</button>
        </div>
      </div>

    </div>
  </div>
</div>

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

      var user_name = $('#user_name').val();

      var user_review = $('#user_review').val();

      if (user_name == '' || user_review == '') {
        alert("Please Fill Both Field");
        return false;
      } else {
        $.ajax({
          url: "submit_rating.php",
          method: "POST",
          data: {
            rating_data: rating_data,
            user_name: user_name,
            user_review: user_review
          },
          success: function(data) {
            $('#review_modal').modal('hide');



            alert(data);
          }
        })
      }
    });



  });
</script>