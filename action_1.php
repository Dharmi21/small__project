<?php
if (isset($_POST['btn'])) {
    $cat = $_POST['category'];
    $sub = $_POST['sub'];
    echo "<h2>" . $cat . "</h2>";
    echo "<h2>" . $sub . "</h2>";
    echo "<br>";
    $_SESSION["category"] = $cat;
    $_SESSION["subcategory"] = $sub;
    if (empty($cat) || empty($sub)) {
        echo "<script>
           
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'please select value in both dropdown!!!',
           
          })
        
    
</script>";
      
    } else {

        echo "<script> location.href='shooping.php'</script>";
    }
}
?>