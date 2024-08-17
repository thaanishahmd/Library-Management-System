<?php
	include "include/config.php";
    if(isset($_SESSION['user_id']) || isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>

<?php
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $phone = $_POST["contact_number"];
    $dob = $_POST["DOB"];
    $emailadd = $_POST["email"];
    $peraddress = $_POST["address"];
    $un = $_POST["Username"];
    $pw = md5($_POST["password"]);

    $sql = "INSERT INTO members(m_fname, m_lname, m_phone_no, m_dob, m_email, m_address, m_username, m_password) VALUE ('$firstname', '$lastname', '$phone', '$dob', '$emailadd', '$peraddress', '$un', '$pw')";
    if(mysqli_query($con, $sql)){
        echo "<script>alert('Data inserted successfully!')</script>";
        header ("Location:homepage.php?s_message='Registered Successfully!'");
    }
    else{
        echo "<script>alert('Error!')</script>";
        header ("Location:registeruser.php?e_message='Registering Unsuccessful!'");
    }
?>