<?php
    include "include/header.php";
    if(!isset($_SESSION['user_id'])){
        header("Location: homepage.php");
    }
?>

        <div class="menu contact">
            <div class="contactus">
                <h2>Contact Us</h2><br>
                <p style="font-size:16px;">If you have any questions or queries we will always be happy to help. Feel free to contact us by telephone or filling the below form and we will be sure to get back to you as soon as possible. </p>
                <br><br>
                <div class="call">
                    <strong style="font-size:20px"><span style="color:blue;">&#9742;</span> Call Us:</strong><br>
                    <p style="font-size:25px"><b>0112345678</b></p>
                </div>
                <div class="cform">
                    <form action="contactsubmit.php" method="POST">
                        <div class="text_field">
                            <input type="text" name="email" size="40" required>
                            <label for="email">Email</label>
                        </div>
                        <div>
                            <br>
                            <label for="number">Please leave your feedback below:</label><br><br>
                            <textarea rows= "7" cols= "50" name="cmessage" placeholder="Write something.."></textarea>
                        </div>
                        <button class="formsub" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>

<?php
    include "include/footer.php";
?>
        