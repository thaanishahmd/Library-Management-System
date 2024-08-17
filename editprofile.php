<?php
	include "include/config.php";
    if(isset($_SESSION['user_id']) && isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>

<?php
    $member_id = $_POST["member_id"];
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $dob = $_POST["DOB"];
    $peraddress = $_POST["address"];
    $phone = $_POST["number"];
    
                        
    $sql = "UPDATE members SET m_fname = '$firstname', m_lname = '$lastname', m_dob = '$dob', m_address = '$peraddress', m_phone_no = '$phone' WHERE member_id= '$member_id'"; 
    if(mysqli_query($con, $sql)){
        echo "<script>alert('Data inserted successfully!')</script>";
        header ("Location:profilepage.php?s_message='Profile Updated Successfully!'");
    }
    else{
        echo "<script>alert('Error!')</script>";
        header ("Location:profilepage.php?e_message='Profile Update Unsuccessful!'");
    }
?>