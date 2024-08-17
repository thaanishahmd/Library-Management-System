<?php
	include "include/config.php";
    if(!isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>

<?php
    $bookname = $_POST["bkname"];
    $authr = $_POST["bkauthor"];
    $ctgry = $_POST["bkcategory"];
    $pub = $_POST["bkpub"];
                        
    $sql = "INSERT INTO books(book_category, book_name, author, publisher_id) VALUE ('$ctgry', '$bookname', '$authr', '$pub')";
    if(mysqli_query($con, $sql)){
        echo "<script>alert('Data inserted successfully!')</script>";
        header ("Location:managebooks.php?s_message='Book Added Successfully!'");
    }
    else{
        echo "<script>alert('Error!')</script>";
        header ("Location:managebooks.php?e_message='Adding Book Unsuccessful!'");
    }
?>