<?php
    include "include/config.php";
    include "include/core.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lmsstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <div class="bder">
            <div class="menu logo">
                    <img src="images/logo.png" alt="Spectrum Library Logo" style="width:50%;">
            </div>
            <div class="menu mid">
                <strong><br>spectrumlibrary21@gmail.com</strong>
            </div> 
            <div class="menu buttons">
            <?php
                if(isset($_SESSION['user_id']) || isset($_SESSION['admin_id'])){
              
                    if(isset($_SESSION['user_id'])){
            ?>
                        <form action="profilepage.php">
                            <button class="profile" type="submit">Account/Profile</button>
                        </form>
                <?php
                    }
                ?>
                    <form action="logout.php">
                        <button class="logout" type="submit">Logout</button>
                    </form>
            <?php
                }
                else{
            ?>
                    <form action="loginuser.php">
                        <button class="login" type="submit">Login</button>
                    </form>
                    <form action="registeruser.php">
                        <button class="register" type="submit">Register</button>
                    </form>
            <?php
                }
            ?>
            </div>
        </div>
    </header>

    <div class="topnav">
        <a class="active" href="homepage.php">Dashboard</a>
        <a href="category.php">Categories</a>
        <a href="events.php">Events</a>
        <a href="contactus.php">Contact Us</a>
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search book.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <?php
            if(isset($_GET['e_message'])){
        ?>
        <div id="alert" class="alert alert_warning show showAlert">
            <span class="fa fa-exclamation-circle"></span>
            <span class="msg"> <?php echo $_GET['e_message'];?></span>
            <div class="close-btn" id="close-btn" >
                <span class="fa fa-times"></span>
            </div>
        </div>
        <?php

            }elseif(isset($_GET['s_message'])){
        ?>
        <div id="alert" class="alert alert_success show showAlert">
            <span class="fa fa-exclamation-circle"></span>
            <span class="msg"><?php echo $_GET['s_message'];?></span>
            <div class="close-btn" id="close-btn" >
                <span class="fa fa-times"></span>
            </div>
        </div>
        <?php

            }
        ?>
    <div class="flexbox">

        <div class="menu flex1"><br>
            <h4>Latest Arrivals</h4><br>
            <?php 
                $sql ="SELECT * from books ORDER BY book_name ASC"; 
                if(mysqli_query($con, $sql)){ 
                $result=mysqli_query($con, $sql); 
                while($row = mysqli_fetch_assoc($result)){ 
                    $oid = $row['book_id']; 
            ?> 
                <a href="book.php?book_id=<?php echo $row['book_id'];?>"><?php echo $row['book_name'];?></a>
            <?php
                    }
                }
            ?>
        </div>
