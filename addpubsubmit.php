<?php
	include "include/config.php";
    if(!isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>

<?php
    $pname = $_POST["pubname"];
    $paddress = $_POST["pubaddress"];
    $pemail = $_POST["pubemail"];
                        
    $sql = "INSERT INTO publishers(pub_name, pub_address, pub_email) VALUE ('$pname', '$paddress', '$pemail')";
    if(mysqli_query($con, $sql)){
        echo "<script>alert('Data inserted successfully!')</script>";
        header ("Location:managepublisher.php?s_message='Publisher Added Successfully!'");
    }
    else{
        echo "<script>alert('Error!')</script>";
        header ("Location:managepublisher.php?e_message='Adding Publisher Unsuccessful!'");
    }
?>