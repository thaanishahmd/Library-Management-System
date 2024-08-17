<?php
	include "include/config.php";
    include "include/core.php";
    if(!isset($_SESSION['user_id'])){
        header("Location: homepage.php");
    }else{
        $member_id = $_SESSION['user_id'];
    }
?>

<?php
    $book_id = $_POST["book_id"];
    $issue_data =   date("Y-m-d");
    $month = strtotime("+1 Months");
    $return_date =  date("Y-m-d", $month);

    $sql = "INSERT INTO member_book(member_id, book_id, reserve_date, return_date) VALUE ('$member_id', '$book_id','$issue_data','$return_date')";
    
    if(mysqli_query($con, $sql)){
        $sql1 = "UPDATE books SET availability='Reserved' WHERE book_id = '$book_id'";
        if(mysqli_query($con, $sql1)){
            echo "<script>alert('Data inserted successfully!')</script>";
            header ("Location:book.php?book_id=$book_id");
        }else{
            echo "<script>alert('Something Went Wrong')</script>";
            header ("Location:book.php?book_id=$book_id");
        }
    }
    else{
        echo "<script>alert('Error!')</script>";
        header ("Location:book.php?book_id=$book_id");
    }
?>