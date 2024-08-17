<?php
	include "include/config.php";
    if(!isset($_SESSION['user_id'])){
        header("Location: homepage.php");
    }
?>

<?php
    $cname = $_POST["cardname"];
    $cno = $_POST["cardnumber"];
    $exp_m = $_POST["expmonth"];
    $exp_y = $_POST["expyear"];
    $ccvc = $_POST["cvc"];
                        
    $sql = "INSERT INTO payment(card_name, card_no, exp_month, exp_year, CVC) VALUE ('$cname', '$cno', '$exp_m', '$exp_y', '$ccvc')";
    if(mysqli_query($con, $sql)){
        echo "<script>alert('Data inserted successfully!')</script>";
        header ("Location:profilepage.php?s_message='Payment Successful!'");
    }
    else{
        echo "<script>alert('Error!')</script>";
        header ("Location:profilepage.php?e_message='Payment Unsuccessful!'");
    }
?>