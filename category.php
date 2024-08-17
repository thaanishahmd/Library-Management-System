<?php
    include "include/header.php";
    if(!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>


        <div class="menu category">
        <div class="selection">
            
            <h3>Categories</h3><br><br>
            <?php 
                $sql ="SELECT * from books"; 
                if(mysqli_query($con, $sql)){ 
                $result=mysqli_query($con, $sql); 
                while($row = mysqli_fetch_assoc($result)){ 
                    $oid = $row['book_id']; 
            ?> 
                <table>
                    <tr>
                        <td><a href="bookview.php?book_category=<?php echo $row['book_category'];?>"><?php echo $row['book_category'];?></a></td>
                    </tr>
                    
                </table>
            <?php
                    }
                }
            ?>
            
                
            </div>
            <p id="demo"></p>
            <br><br>
        </div>
<?php
    include "include/footer.php";
?>