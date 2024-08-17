<?php
	include "include/config.php";
    if(!isset($_SESSION['user_id'])){
        header("Location: homepage.php");
    }
?>

<?php
    $memail = $_POST["mememail"];
    $fmessage = $_POST["message"];

    $sql = "INSERT INTO feedback(m_email, feed_message) VALUE ('$memail', '$fmessage')";
    if(mysqli_query($con, $sql)){
        echo "<script>alert('Data inserted successfully!')</script>";
        header ("Location:feedbackform.php?s_message='Thank you for your Feedback!'");
    }
    else{
        echo "<script>alert('Error!')</script>";
        header ("Location:feedbackform.php?s_message='Feedback Not Submitted!'");
    }
?>