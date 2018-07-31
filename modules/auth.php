<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/server/config.php';

if(isset($_SESSION['id'])){
    header("Location:" . $siteURL."/modules/feed.php");
}else{
    if (isset($_POST['submit'])) {
        $email = trim(htmlspecialchars($_POST['email']));
        $password = trim(htmlspecialchars(md5($_POST['password'])));

        $query1 = mysqli_query($db, "SELECT * FROM `users` WHERE  `email`='$email' AND `password`='$password'");

        if (mysqli_num_rows($query1) > 0) {
            $users = mysqli_fetch_assoc($query1);
            $_SESSION['id'] = $users['id'];
            header("Location:" . "/modules/feed.php");
        }else{
            print "wrong email or password";
        }
    }
    ?>
    <html>
        <head>
             <title>Welcome to BlackChat</title>
        </head>
        <body>
            <form method="post" action="/modules/auth.php">
                <input type="text" name="email" placeholder="e-mail"/><br> <br>
                <input type="password" name="password" placeholder="password"/><br> <br>
                <input type="submit" name="submit" value="Sign in">
            </form>
            <br>
            <a href="/modules/registration.php">Sign up</a>
        </body>
    </html>
    <?php
}

