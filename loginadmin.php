<?php
    include "include/header.php";
    if(isset($_SESSION['user_id']) || isset($_SESSION['admin_id'])){
        header("Location: homepage.php");
    }
?>


        <div class="menu loginform">
            <center>
            <br>
            <h2>Admin Login</h2><br><br>
            <div class="formfield">
            <form action="#" method="post">
            <?php 
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $aid = $_POST['adminid'];
                    $pass = md5($_POST['password']);
                    $password =$pass;
                    // $password =md5($pass);
                    $sql = "SELECT * FROM admin WHERE admin_id='$aid' AND a_password='$password'";
                    $result = $con->query($sql);
                    // echo "Error: 1" . $sql . "<br>" . mysqli_error($con);
                    if($result->num_rows > 0){
                        //login success
                        $row=$result->fetch_assoc();
                        $_SESSION["admin_id"] = $row['admin_id']; //set session
                        header("Location: homepage.php?s_message='Logged in Successfully!'");
                    }else{
                        //login failed
                        // echo "Error: 2" . $sql . "<br>" . mysqli_error($con);
                        echo "<div style='color:red'>Invalid id/password<br/></div>";
                    }
                    // echo "Error: 3" . $sql . "<br>" . mysqli_error($con);
                }

            ?>
                <div class="text_field">
                    <input type="text" name="adminid">
                    <label for="adminid">Admin ID:</label>
                </div>
                <div class="text_field">
                    <input type="password" name="password">
                    <label for="username">Password:</label>
                </div>
                <button class="loginbtn" type="submit">Login</button><br><br>
                <div class="key">Forgot Password?</div>
            </form>
            </div>
            </center>
        </div>
        
<?php
    include "include/footer.php";
?>