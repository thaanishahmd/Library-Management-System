<?php
include "include/header.php";
if (!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id'])) {
    header("Location: homepage.php");
}
?>

<div class="menu bookstatus">
    <div class="status">
        <div class="booktable">
            <table>
                <tr>
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>User Taken</th>
                    <th>Fine(LKR)</th>
                    <th>Availability</th>
                    <th>Return Book</th>
                </tr>
                <?php
                //$book_id = $_GET['book_id'];
                $sql = "SELECT * from books";
                if (mysqli_query($con, $sql)) {
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $oid = $row['book_id'];

                        

                ?>
                        <form method="POST" action="returnbkbtn.php">
                            <input name="book_id" value="<?php echo $row['book_id']; ?>" hidden> 
                            <tr>
                                <td><?php echo $row['book_id']; ?></td>
                                <td><?php echo $row['book_name']; ?></td>
                                <?php
                                    $sql1 = "SELECT * from member_book WHERE book_returned = 'NO' AND book_id = '$oid' LIMIT 1";
                                    $result1 = mysqli_query($con, $sql1);
                                    if($row1 = mysqli_fetch_assoc($result1)){
                                        $now = time(); 
                                        $return_time = strtotime($row1['return_date']);
                                        $overdue = ceil(($now - $return_time)/86400);                                                                           
                                ?>
                                <input name="reserve_id" value="<?php echo $row1['reserve_id']; ?>" hidden>
                                <input name="member_id" value="<?php echo $row1['member_id']; ?>" hidden>
                                <td><?php echo $row1['member_id']; ?></td>
                                <?php
                                    if($overdue > 0){
                                ?>  <input name="fine_amount" value="<?php echo $overdue*30; ?>" hidden>
                                    <td><?php echo $overdue*30 ?></td>
                                <?php
                                    }else{
                                ?><input name="fine_amount" value="<?php echo 0 ?>" hidden>
                                <td>-</td>
                                <?php
                                    }
                                     }else{
                                
                                ?>
                                    <td> - </td>
                                    <td> - </td>
                                <?php
                                 }
                                ?>
                                <td><?php echo $row['availability']; ?></td>
                                <?php
                                    if($row['availability']!="Available"){
                                ?>
                                <td> <button class="returnbkbtn" type="submit">Return Book</button>

                                <?php
                                
                                    }else{
                                ?>
                                    <td> <button class="returnbkbtn2" type="button" disabled>Return Book</button>
                                <?php

                                    }
                                ?>
                            </td>
                            </tr>
                        </form>
                <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>

<?php
include "include/footer.php";
?>