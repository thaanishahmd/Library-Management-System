<?php
    include "include/header.php";
    if(!isset($_SESSION['user_id'])){
        header("Location: homepage.php");
    }else{
        $user_id = $_SESSION['user_id'];
    }
?>

        <div class="menu profilepg">
        
        

        <div class="profilediv">
        
        
        <div class = "leftflex">
            <label for="time"> Time : </label>
            <input type="text" id="currentTime" name="ct">
            <br><br>
            <label for="date"> Date : </label>
            <input type="text" id="currentDate" name="cd">
            <br><br>
            <?php 
                $sql ="SELECT * from members WHERE member_id = '$user_id'"; 
                if(mysqli_query($con, $sql)){ 
                $result=mysqli_query($con, $sql); 
                while($row = mysqli_fetch_assoc($result)){ 
                    $oid = $row['member_id']; 
            ?> 
            <label for="id"> Member ID : </label>
            <span><?php echo $row['member_id'] ?></span>
            <br><br>
            <label for="Email">Email :</label>
            <span><?php echo $row['m_email'] ?></span>
            <br><br>
            
            </form>
            
            
        <br>
            <fieldset style="padding:15px;border:1px solid;">
                <legend style="font-size:12px;text-align:center;">Change password</legend>
            <form action="updatepass.php" method="post">    
            <div class="text_field">
                <input type="password" name="old_password" required>
                <label>  Current Password:    </label>
            </div>
            <div class="text_field">
                <input type="password" name="password" required>
                <label>  New Password:    </label>
            </div>
            
            <div class="text_field">
                <input type="password" name="confirm_password" required>
                <label>  Confirm  Password:    </label>
            </div>
                <button type="submit" class="changepass">Change Password</button>
            </form>
            </fieldset>
        <?php
            }
        }
        ?>

        </div>

        <div class="rightflex">
            <form action="editprofile.php" method="POST">
                <div class="mp">
                    <h3>My Profile</h3>
                    <br>
                    <div class="container">
                        <img src="images/avatar.jpg" id="img" height="200px" width="200px"  alt="Profile Picture">
                    </div>
                    <br>
                    
                        <?php 
                            $sql ="SELECT * from members WHERE member_id = '$user_id'"; 
                            if(mysqli_query($con, $sql)){ 
                            $result=mysqli_query($con, $sql); 
                            while($row = mysqli_fetch_assoc($result)){ 
                                $oid = $row['member_id']; 
                        ?>
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
                                <td> : <input type="date" name = "DOB" class = "DOB" value="<?php echo $row['m_dob'] ?>"></td>
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
                        <?php 
                            }
                        }
                        ?>
                        
                        <button class="edit" type="submit">Edit profile</button>
                        
                </div>
            </form>
        </div>
        </div>

        <div class="bottomflex">
        <form action="paysubmit.php" method="POST">
            <div class="xyz">
            <h3>Payment Method</h3>    
                <br>
                <table>
                        <tr>
                            <td><label>Name on Card</label></td>
                            <td>: <input type="text" id="cname" name="cardname" placeholder="Joshep M. Demo"></td>
                        </tr>
                        <tr>
                            <td><label>Credit card number</label></td>
                            <td>: <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"></td>
                        </tr>
                        <tr>
                            <td><label>Expiry Month</label></td>
                            <td>: <input type="text" id="expmonth" name="expmonth" placeholder="September"></td>
                        </tr>
                        <tr>
                            <td><label>Expiry Year</label></td>
                            <td>: <input type="text" id="expyear" name="expyear" placeholder="2018"></td>
                        </tr>
                        <tr>
                            <td><label>CVC</label></td>
                            <td>: <input type="text" id="cvc" name="cvc" placeholder="352"></td>
                        </tr>
                </table>
                <br>
                <button type="submit" class="pay">Pay Here</button>
            </div>           
        </form>
        </div>
        </div>

        <script>
            var today = new Date();
            var date = today.getDate()+" / "+(today.getMonth()+1)+" / "+today.getFullYear();
            document.getElementById("currentDate").value=date;
            var time = today.getHours()+":"+(today.getMinutes()+1)+":"+today.getSeconds();
            document.getElementById("currentTime").value=time;
        </script>
        

<?php
    include "include/footer.php";
?>