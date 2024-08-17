<?php
    include "include/header.php";
    if(!isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>

        <div class="menu managebk">
        <br>
            <h2>Add Books</h2><br>
        <form action="addbksubmit.php" method="POST">
            <div class="text_field">
                <input type="text" name="bkname" required>
                <label> Book name : </label>
            </div>
            <div class="text_field">
                <input type="text" name="bkauthor" required>
                <label> Author : </label>
            </div>
            <div class="selection">
            <label> Category : </label>
                <select name="bkcategory">
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
                </select>
            </div>
            <br>
                <label> Publisher : </label>
                <select name="bkpub">
                <?php 
                    $sql ="SELECT * from publishers"; 
                    if(mysqli_query($con, $sql)){ 
                    $result=mysqli_query($con, $sql); 
                    while($row = mysqli_fetch_assoc($result)){ 
                        $oid = $row['publisher_id']; 
                ?> 
                 
                    <option value="<?php echo $row['publisher_id'];?>"><?php echo $row['pub_name'];?></option>
                    <?php
                    }
                }
                ?>
                </select><br><br>
                <button class="addbkbtn" type="submit" name="submit">Add Book</button>
            </form><br>

        </div>

<?php
    include "include/footer.php";
?>