<?php
    include "include/header.php";
?>

    <div class="menu viewbook">
    <?php 
            $category = $_GET['book_category'];
            $sql ="SELECT * from books WHERE book_category = '$category'"; 
            if(mysqli_query($con, $sql)){ 
            $result=mysqli_query($con, $sql); 
            while($row = mysqli_fetch_assoc($result)){ 
            $oid = $row['book_id']; 
        ?>
        <h3><?php echo $row['book_category'];?></h3><br><br>
        <ul type="circle">
            <li><a href="book.php?book_id=<?php echo $row['book_id'];?>"><?php echo $row['book_name'];?></a></li>
        </ul>
        <?php
                    }
                }
            ?>
    </div>

<?php
    include "include/footer.php";
?>