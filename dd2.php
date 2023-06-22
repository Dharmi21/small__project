<?php
include_once("../conn.php");
if (!empty($_POST["id"])) {
    $id = $_POST['id'];

    $query = "select * from sub_category where cat_id=$id";
    $result = mysqli_query($dbcon, $query);
    if ($result->num_rows > 0) {
        echo '<option value="">Select Sub Category</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option class="" value="' . $row['sub_id'] . '">' . $row['sub_name'] . '</option>';
            
        }
    }
   
} 
