<?php
session_start();
include '../conn.php';
// Add products into the cart table

// Remove single items from cart
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $dbcon->prepare('DELETE FROM cart WHERE id=?');

    $stmt->bind_param('i',$id);
    $stmt->execute();

    
    header('location:cart.php');
  }

 
  
      // Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
        $qty = $_POST['qty'];
        $pid = $_POST['pid'];
        $pprice = $_POST['pprice'];
  
        $tprice = $qty * $pprice;
  
        $stmt = $dbcon->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
        $stmt->bind_param('isi',$qty,$tprice,$pid);
        $stmt->execute();
      }
?>