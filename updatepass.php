<?php
	include "include/config.php";
    include "include/core.php";
    if(!isset($_SESSION['user_id'])){
        header("Location: homepage.php");
    }
?>

<?php
    $mem_id = $_SESSION['user_id'];
    $old_pass = md5($_POST['old_password']);
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if($new_password != $confirm_password ){
        header ("Location:profilepage.php?e_message='Password Does not Match'");
    }
    $password_hash = md5($new_password);
    $sql1 = "SELECT m_password FROM members WHERE member_id = '$mem_id'";
    $sql = "UPDATE members SET m_password = '$password_hash' WHERE member_id='$mem_id' ";
    if(mysqli_query($con, $sql1)){ 
        $result1=mysqli_query($con, $sql1); 
        $row1 = mysqli_fetch_assoc($result1); 
        if($old_pass == $row1['m_password']){
            if(mysqli_query($con, $sql)){ 
                header ("Location:profilepage.php?s_message='Password Updated Successfully!'");
            } 
        }else{
            header ("Location:profilepage.php?e_message='Current Password is Invalid'");
        };
    }else{
        header ("Location:profilepage.php?e_message='Something Went Wrong'");
    }
?>