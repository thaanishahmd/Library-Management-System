<?php
    include "include/header.php";
    if(!isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>

        <div class="menu managepub">
        <br>
                <h2>Manage Publisher</h2><br>
            <form action="addpubsubmit.php" method="POST">
                <h3>Add publisher</h3>
                <div class="text_field">
                    <input type="text" name="pubname" required>
                    <label> Publisher name : </label>
                </div>
                <div class="text_field">
                    <input type="text" name="pubaddress" required>
                    <label> Publisher Address : </label>
                </div>
                <div class="text_field">
                    <input type="text" name="pubemail" required>
                    <label> Publisher email : </label>
                </div>
                <button class="addpubbtn" type="submit" name="submit">Add Publisher</button>
            </form><br>
            <hr><br>

            <form action="removepubsubmit.php" method="POST">
            <h3>Remove publisher</h3><br>
            <label> Publisher : </label>
                <select name="publisher_id">
                <?php 
                    $sql ="SELECT * from publishers"; 
                    if(mysqli_query($con, $sql)){ 
                    $result=mysqli_query($con, $sql); 
                    while($row = mysqli_fetch_assoc($result)){ 
                        $oid = $row['publisher_id']; 
                ?> 
                 
                    <option value="<?php echo $row['publisher_id'];?>" name="ctgry"><?php echo $row['pub_name'];?></option>
                    <?php
                    }
                }
                ?>
                </select><br><br>
                <button class="removepubbtn" type="submit" name="submit">Remove Publisher</button>
            </form>
        </div>
       


<?php
    include "include/footer.php";
?>