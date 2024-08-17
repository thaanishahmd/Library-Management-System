<?php
    include "include/header.php";
    if(isset($_SESSION['user_id']) || isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>


        <div class="menu loginform">
            <center>
            <br>
            <h2>User Login</h2><br><br>
            <div class="formfield">
            <form action="#" method="post">
            <?php 
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $username = $_POST['username'];
                    $pass = md5($_POST['password']);
                    $password =$pass;
                    $sql = "SELECT * FROM members WHERE m_username='$username' AND m_password='$password'";
                    $result = $con->query($sql);
    
                    if($result->num_rows > 0){
                        //login success
                        $row=$result->fetch_assoc();
                        $_SESSION["user_id"] = $row['member_id']; //set session
                        header("Location: homepage.php?s_message='Logged in Successfully!'");
                    }else{
                        //login failed
                        // echo "Error: 2" . $sql . "<br>" . mysqli_error($con);
                        echo "<div style='color:red'>Invalid username/password<br/></div>";
                    }
                    // echo "Error: 3" . $sql . "<br>" . mysqli_error($con);
                }

            ?>
            
                <div class="text_field">
                    <input type="text" name="username">
                    <label>Username:</label>
                </div>
                <div class="text_field">
                    <input type="password" name="password">
                    <label>Password:</label>
                </div>
                <button class="loginbtn" type="submit">Login</button><br><br>
                <div class="key">Forgot Password?</div><br>
                <div class="signup_link">
					Not a member? <a href="registeruser.php">Register</a>
                </div>
            </form>
            </div>
            <div class="adminbtn">
            <form action="loginadmin.php">
                    <button class="adlog" type="submit">Admin Login</button>
            </form>
            </div>
            </center>
        </div>
       
<?php
    include "include/footer.php";
?>