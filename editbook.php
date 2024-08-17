<?php
    include "include/header.php";
    if(!isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }else{
        $admin_id = $_SESSION['admin_id'];
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
            <div class="menu editbook" style="border: 1px solid black;margin: 10px;padding: 25px;">
            <form action="editbkbtn.php" method="POST">
                <div class="mp">
                    <h3><?php echo $row['book_name'];?></h3>
                    <br>
                    <div class="bkcontainer">
                        <img src="images/book.png" id="img" height="200px" width="200px"  alt="Book cover">
                    </div>
                    <br>
                    
                        
                        <input type="text" id="book_id" name="book_id" value="<?php echo $row['book_id'] ?>" hidden>
                        <table>
                            <tr>
                                <td><label for="fname">Book Name</label></td>
                                <td>: <input type="text" id="textt1" name="bname" size="40" value="<?php echo $row['book_name'] ?>"></td>
                            </tr>
                            <tr>
                                <td><label for="id"> Author </label></td>
                                <td>: <input type="text" id="textt2" name="b_author" size="40" value="<?php echo $row['author'] ?>"></td>
                            </tr>
                            <tr>
                                <td><label for="date"> Category </label></td>
                                <td>: <select name="b_category">
                                            <option value="<?php echo $row['book_id'];?>"><?php echo $row['book_category'];?></option>
                                            <option value="Adventure">Adventure</option>
                                            <option value="Science Fiction">Science Fiction</option>
                                            <option value="Arts & Music">Arts & Music</option>
                                            <option value="Animals">Animals</option>
                                            <option value="Cooking">Cooking</option>
                                            <option value="Comedy">Comedy</option>
                                            <option value="Health & Fitness">Health & Fitness</option>
                                            <option value="History">History</option>
                                            <option value="Information Technology">Information Technology</option>
                                            <option value="Horror">Horror</option>
                                            <option value="Auto-Biography">Auto-Biography</option>
                                            <option value="Religion">Religion</option>
                                        </select></td>
                            </tr>
                        </table>
                        <br><br>
                        <?php 
                            }
                        }
                        ?>
                        
                        <button class="edit" type="submit">Edit Book</button>
                        
                </div>
            </form>
            </div>

<?php
    include "include/footer.php";
?>