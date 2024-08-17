<?php
    include "include/header.php";
    if(!isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>

        <div class="menu memberlist">
            <center>
            <h3>Members</h3>
            </center>
            <br>
            <?php 
                $sql ="SELECT * from members"; 
                if(mysqli_query($con, $sql)){ 
                $result=mysqli_query($con, $sql); 
                while($row = mysqli_fetch_assoc($result)){ 
                    $oid = $row['member_id']; 
            ?> 
                <table>
                    <tr>
                        <td><?php echo $row['member_id'];?></td>
                        <td><a href="editmembers.php?member_id=<?php echo $row['member_id'];?>"><?php echo $row['m_fname'];?> <?php echo $row['m_lname'];?></a></td>
                    </tr>
                    
                </table>
            <?php
                    }
                }
            ?>
           
        </div>

<?php
    include "include/footer.php";
?>