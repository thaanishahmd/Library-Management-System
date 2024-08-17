<?php
	include "include/config.php";
    if(isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>

<?php
    $book_id = $_POST["book_id"];
    $bookname = $_POST["bname"];
    $author = $_POST["b_author"];
    $category= $_POST["b_category"];
    
    $sql = "UPDATE books SET  book_category = '$category', book_name = '$bookname', author = '$author' WHERE book_id= '$book_id'"; 
    if(mysqli_query($con, $sql)){
        echo "<script>alert('Data inserted successfully!')</script>";
        header ("Location:editbook.php?book_id=$book_id");
    }
    else{
        echo "<script>alert('Error!')</script>";
        header ("Location:editbook.php?book_id=$book_id");
    }
?>