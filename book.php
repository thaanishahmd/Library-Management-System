<?php
    include "include/header.php";
    if(!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>
        <?php 
            $book_id = $_GET['book_id'];
            $sql ="SELECT * from books WHERE book_id = '$book_id'"; 
            if(mysqli_query($con, $sql)){ 
            $result=mysqli_query($con, $sql); 
            while($row = mysqli_fetch_assoc($result)){ 
            $oid = $row['book_id']; 
        ?>
    <div class="menu bkview">
    <h3><?php echo $row['book_name'] ?></h3><br><br>
    <div class="containerbook"> 
        <div class="card">
                <img src="images/book.png" alt="Avatar" style="width:100%">
        </div>
        <div class="details">
        
            <table>
                <tr>
                    <td>Book ID</td>
                    <td> : <?php echo $row['book_id'] ?></td>
                </tr>
                <tr>
                    <td>Book Author</td>
                    <td> : <?php echo $row['author'] ?></td>
                </tr>
                <tr>
                    <td>Book Category</td>
                    <td> : <?php echo $row['book_category'] ?></td>
                </tr>
                <tr>
                    <td>Availability</td>
                    <td> : <?php echo $row['availability'] ?></td>
                </tr>
            </table>
            
            <br><br>
            <?php
                if(isset($_SESSION['admin_id'])){
            ?>
            <form action="editbook.php" method="GET">
                <input type="text" id="book_id" name="book_id" value="<?php echo $row['book_id'] ?>" hidden>
                <button class="editbkbtn" type="submit">Edit Book</button>
            </form>
            <form action="removebksubmit.php" method="GET">
            <input type="text" id="book_id" name="book_id" value="<?php echo $row['book_id'] ?>" hidden>
                <button class="removebkbtn" type="submit">Remove Book</button>
            </form>
            <?php
                }
                else if($row['availability']=='Available'){
                ?>
            <form action="reservebtn.php" method="POST">
                <input type="text" id="book_id" name="book_id" value="<?php echo $row['book_id'] ?>" hidden>
                
                    <button class="reservebkbtn" type="submit" >Reserve Book</button>
                    <?php
                }
                else{
                    ?>
                     <button class="reservebkbtn2" type="submit" disalbled >Reserved</button>
            </form>
            <?php
                    
                }
            ?>
            <?php 
                    }
                }
            ?>
        </div>
    </div>
    </div>

<?php
    include "include/footer.php";
?>