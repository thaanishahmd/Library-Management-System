<?php
	include "include/config.php";
    include "include/core.php";
    if(!isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>

<?php
    $book_id = $_POST["book_id"];
    $member_id = $_POST["member_id"];
    $reserve_id = $_POST["reserve_id"];
    $fine_amount = $_POST["fine_amount"];
    
    $sql = "UPDATE books SET availability='Available' WHERE book_id = '$book_id'";
    if(mysqli_query($con, $sql)){
        $sql1 = "UPDATE member_book SET book_returned='YES' WHERE reserve_id = '$reserve_id'";
        if(mysqli_query($con, $sql1)){
            if($fine_amount>>0){
                $sql2 = "INSERT INTO  fine(member_id, fine_amount, reasons) VALUE ('$member_id', '$fine_amount','$book_id')";
                if(mysqli_query($con, $sql2)){
                    echo "<script>alert('Data inserted successfully!')</script>";
                    header ("Location:bookstatus.php?s_message='Book Returned Successfully!'");
                }else{
                    echo "<script>alert('Something Went Wrong')</script>";
                    header ("Location:bookstatus.php");
                }
            }
            echo "<script>alert('Data inserted successfully!')</script>";
            header ("Location:bookstatus.php");
        }else{
            echo "<script>alert('Something Went Wrong')</script>";
            header ("Location:bookstatus.php");
        }
        echo "<script>alert('Data inserted successfully!')</script>";
        header ("Location:bookstatus.php");
    }else{
        echo "<script>alert('Something Went Wrong')</script>";
        header ("Location:bookstatus.php?e_message='Book Return Unsuccessful!'");
    }
    

    
?>