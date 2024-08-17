<?php
	include "include/config.php";
    include "include/core.php";
    if(!isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>

<?php
    $pub_ids = $_POST["publisher_id"];
                        
    $sql = "DELETE FROM publishers WHERE publisher_id = '$pub_ids'";
    if(mysqli_query($con, $sql)){
        echo "<script>alert('Data deleted successfully!')</script>";
        header ("Location:managepublisher.php??s_message='Publisher Removed Successfully'");
    }
    else{
        echo "<script>alert('Error!')</script>";
        echo "Error: 3" . $sql . "<br>" . mysqli_error($con);
        header ("Location:managepublisher.php?e_message='Unable to Remove Publisher!'");
    }
?>