<?php
    include "include/header.php";
    if(!isset($_SESSION['user_id'])){
        header("Location: homepage.php");
    }
?>


        <div class="menu fbform">
            <h2>Feedback Form</h2><br>
            <p style="font-size:16px;">How effective was your experience?</p>
            <br>
            <form action="fdbacksubmit.php" method="POST">
            <div class="text_field">
                <input type="text" name="memail">
                <label for="message"></label>
            </div>
            <div>
                <br>
                <label for="message">Please leave your feedback below:</label><br><br>
                <textarea name="message" rows= "7" cols= "50" placeholder="Write something.."></textarea>
            </div>
                <button class="fbformsub" type="submit">Submit</button>
            </form>
        </div>


<?php
    include "include/footer.php";
?>