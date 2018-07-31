<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/server/config.php';
if (isset($_SESSION['id'])) {
    header("Location:" . $siteURL . "/modules/feed.php");
} else {
    if (isset($_POST['submit'])) {
        $email = trim(htmlspecialchars($_POST['email']));
        $name = trim(htmlspecialchars($_POST['username']));
        $password = trim(htmlspecialchars(md5($_POST['password'])));

        $query2 = mysqli_query($db, "SELECT * FROM `users` WHERE  `email`='$email' AND `password`='$password'");
        if (mysqli_num_rows($query2) > 0) {
            print "That email already used";
        }else{
            $query3 = mysqli_query($db, "INSERT INTO `users`(`email`, `password`, `name`)
                                    VALUES ('$email', '$password', '$name')");
            if(!$query3){
                print "Something wrong, try again";
            }else{
                print "Success";
            }
        }
    }
    ?>
    <html>
    <head>
        <title>Registration in BlackChat</title>
    </head>
    <body>
    <form method="post" action="/modules/registration.php">
        <input type="text" name="email" placeholder="e-mail"><br><br>
        <input type="text" name="username" placeholder="name"><br><br>
        <input type="password" name="password" placeholder="password"><br><br>
        <input type="submit" name="submit" value="Registration">
    </form>
    <br>
    <a href="/modules/auth.php">Sign in</a>
    </body>
    </html>
    <?php
}

