<?php
include '../conn.php';
session_start();

    if(empty($_SESSION["id"])){
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
