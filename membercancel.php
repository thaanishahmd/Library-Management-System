<?php
	include "include/config.php";
    include "include/core.php";
    if(!isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>

<?php
    $mem_id = $_GET["member_id"]; 
                        
    $sql = "DELETE FROM members WHERE member_id = '$mem_id'";
    if(mysqli_query($con, $sql)){
        
        echo "<script>alert('Data inserted successfully!')</script>";
        header ("Location:managemembers.php?s_message='Membership Cancelled Successful!'");
    }
    else{
        echo "<script>alert('Error!')</script>";
        echo "Error: 3" . $sql . "<br>" . mysqli_error($con);
        header ("Location:managemembers.php?e_message='Unable to Cancel Membership!'");
    }
?>