<?php
session_start();

require $_SERVER['DOCUMENT_ROOT'] . '/server/config.php';

if (!isset($_SESSION['id'])) {
    header("Location:" . $siteURL);
} else {

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
        <title></title>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <link href="../style/style.css" rel="stylesheet">
    </head>

    <body>

    <div class="wrapper">

        <header class="header">
            <h1>BlackChat</h1>
        </header><!-- .header-->

        <div class="middle">

            <div class="container">
                <main class="content">
                    <div class="feed-wrap">
                        <?php
                        $query6 = mysqli_query($db, "SELECT * FROM `commonmessages` WHERE 1");
                        if (mysqli_num_rows($query6) > 0) {
                            while ($mes = mysqli_fetch_assoc($query6)) {
                                $mes_userId = $mes['userid'];
                                $mes_message = $mes['message'];
                                ?>
                                <div class="message_border">
                                    <?=  "User: " . $mes_userId . ' ' . $mes_message ?>
                                </div>
                                </br>
                                <?php
                            }
                        } else {
                            print "No messages";
                        }


                        ?>
                    </div>
                    <div class="common-message__send">
                        <form action="/server/commessageadd.php" method="POST">
                        <textarea name="common_text" placeholder="write your message" id="" cols="30" rows="3">

                        </textarea><br><br>
                            <input type="submit" name="common_submit" value="Send">
                        </form>
                    </div>
                </main><!-- .content -->
            </div><!-- .container-->

            <aside class="right-sidebar">
                <strong>Right Sidebar:</strong>
            </aside><!-- .right-sidebar -->

        </div><!-- .middle-->

    </div><!-- .wrapper -->

    <footer class="footer">
        <strong>I am Footer@</strong>
    </footer><!-- .footer -->

    </body>
    </html>
    <?php
}

