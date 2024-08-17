<?php
	include "include/config.php";
    include "include/core.php";
    if(!isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>

<?php
    $book_ids = $_GET["book_id"];
    
    $sql = "DELETE FROM books WHERE book_id = '$book_ids'";
    if(mysqli_query($con, $sql)){
        echo "<script>alert('Data deleted successfully!')</script>";
        header ("Location: homepage.php?s_message='Removed Book Successfully!'");
    }
    else{
        echo "<script>alert('Error!')</script>";
        echo "Error: 3" . $sql . "<br>" . mysqli_error($con);
        header ("Location:homepage.php?e_message='Unable to Remove Book!'");
    }
?>