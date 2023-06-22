
<?php
include '../conn.php';
session_start();
if (!empty($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    if (isset($_POST["rating_data"])) {

        // $id = $_GET['id'];
        $user_review = $_POST['user_review'];
        $rating_data = $_POST['rating_data'];
        $product_name = $_POST['pname'];
        $sql = "SELECT * FROM orders WHERE proname = '$product_name' AND login_id = '$user_id' ";
        $result = mysqli_query($dbcon, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $sql = "INSERT INTO review (pro_name,rating_data,user_review,user_id) VALUES('$product_name','$rating_data','$user_review','$user_id')";
            $result = mysqli_query($dbcon, $sql);
            if ($result) {

                echo "Review Submited";
            } else {
                echo 'there is problem';
            }
        } else {
            echo "first you have to order this product to give review ";
        }
    }
    
} else {
    echo "You have to Login First";
}

?>