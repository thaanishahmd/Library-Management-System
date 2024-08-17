<?php
    include "include/header.php";
    if(isset($_SESSION['user_id']) || isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>


        <div class="menu registerform">
        <br>
            <h2>Registration Form</h2><br><br>
            <div class="regiform">
        <form action="registersubmit.php" method="POST">

            <div class="text_field">
                <input type="text" name="fname" required>
                <label> First name : </label>
            </div>
            <div class="text_field">
                <input type="text" name="lname" required>
                <label> Last name : </label>
            </div>
            

            <div class="text_field">
                <input type="text" name="address" required>
                <label>  Permanent Address :  </label>
            </div>
            
                <label style="color:grey;"> Date of Birth :   </label><br>
            <div class="dob">
                <input type="date" name="DOB" required>
            </div>
            <br>

                <label style="color:grey;"> Gender :  </label><br><br>
            <div class="gender">
                <input type="radio" id="Male" name="Gender" value "Male"><span>  Male</span required><br>
                <input type="radio" id="Female" name="Gender" value "Female"><span>  Female</span required>

            </div>
            
            <div class="text_field">
                <input type="text" name="contact_number" required>
                <label>  Contact number :</label>
            </div>
            

            <div class="text_field">
                <input type="email" name="email" required>
                <label>  E-mail Address :   </label>
            </div>
            
            <div class="text_field">
                <input type="text" name="Username" required>
                <label> User Name :    </label>
            </div>
            <div class="text_field">
                <input type="password" name="password" required>
                <label>  Create Password:    </label>
            </div>
            
            <br>
            </div>
            
            <input type="checkbox" name="checkbox" value="check" id="agree" required> <span style="font-size: 13px;">I have read and agree to the terms presented in the Terms and Conditions agreement.</span>
            <br><br>
            <button class="regsubmitbtn" type="submit" name="submit">Register</button>
            </form>
        </div>
        
        
<?php
    include "include/footer.php";
?>
