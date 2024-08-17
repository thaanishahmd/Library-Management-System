<?php
include "include/header.php";
if (!isset($_SESSION['admin_id'])) {
    header("Location: homepage.php");
} else {
    $admin_id = $_SESSION['admin_id'];
}
?>

<div class="editmembers">
    <?php
    $mem_id = $_GET["member_id"];
    $sql = "SELECT * from members WHERE member_id = '$mem_id'";
    if (mysqli_query($con, $sql)) {
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $oid = $row['member_id'];
    ?>
            <form action="editprofile.php" method="POST">
                <div class="mp">
                    <h3><?php echo $row['m_fname'] ?> <?php echo $row['m_lname'] ?></h3>
                    <br>
                    <div class="container">
                        <img src="images/avatar.jpg" id="img" height="200px" width="200px" alt="Profile Picture">
                    </div>
                    <br>


                    <input type="text" id="member_id" name="member_id" value="<?php echo $row['member_id'] ?>" hidden>
                    <table>
                        <tr>
                            <td><label for="fname"> First Name </label></td>
                            <td>: <input type="text" id="textt1" name="fname" value="<?php echo $row['m_fname'] ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="id"> Last Name </label></td>
                            <td>: <input type="text" id="textt2" name="lname" value="<?php echo $row['m_lname'] ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="date"> Date of Birth </label></td>
                            <td> : <input type="date" name="DOB" class="DOB" value="<?php echo $row['m_dob'] ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="adr"> Address </label></td>
                            <td>: <input type="text" id="textt3" name="address" value="<?php echo $row['m_address'] ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="number">Mobile Number </label></td>
                            <td>: <input type="text" id="textt4" name="number" value="<?php echo $row['m_phone_no'] ?>"></td>
                        </tr>
                    </table>



                    <br><br>


                    <button class="edit" type="submit">Edit profile</button>

                </div>
            </form>
            <form action="membercancel.php" method="GET">
                <input type="text" id="member_id" name="member_id" value="<?php echo $row['member_id'] ?>" hidden>
                <button type="submit" class="cancelmember">Cancel Membership</button>
            </form>
    <?php
        }
    }
    ?>
</div>

<?php
include "include/footer.php";
?>