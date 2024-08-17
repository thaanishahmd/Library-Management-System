<?php
	include "include/config.php";
    if(!isset($_SESSION['user_id'])){
        header("Location: homepage.php");
    }
?>

<?php
    $memail = $_POST["email"];
    $fmessage = $_POST["cmessage"];

    $sql = "INSERT INTO contact_us(m_email, message) VALUE ('$memail', '$fmessage')";
    if(mysqli_query($con, $sql)){
        echo "<script>alert('Data inserted successfully!')</script>";
        header ("Location:contactus.php?s_message='Thank you For Contacting Us!'");
    }
    else{
        echo "<script>alert('Error!')</script>";
        header ("Location:contactus.php");
    }
?>