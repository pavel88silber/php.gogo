<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP</title>
</head>
    <body>

        <h1>php</h1>

        <?php
            $connect = mysqli_connect('php.gogo', 'root', '', 'test_db');     // mysqli_connect(server, user, pass, db_name)

            if($connect == false) {
                echo 'No connection with DB';
                echo mysqli_connect_error();
                exit(); // die();
            } 

            $result = mysqli_query($connect, "SELECT * FROM `articles_categories`");
            $artic = mysqli_query($connect, "SELECT * FROM `articles`");

            $count = mysqli_num_rows($result); // total number of articles

            $count_new = mysqli_query($connect, "SELECT * FROM `articles`");

        ?>

            <ul>
                <?php

                    //echo 'Total of articles is ' . $count . '<br>';

                    while ( $cat = mysqli_fetch_assoc($result) AND $arr = mysqli_fetch_assoc($count_new)) {

                        $articles_count = mysqli_query($connect, "SELECT * FROM `articles` WHERE `category_id` =  " . $cat['id']);


                        echo '<hr>' . '<li>' . $cat['title'] . ' ' . '(' . mysqli_num_rows($articles_count) . ')' . '</li>';
                        
                    }
                    echo '<hr>';
                ?>
            </ul>


        <?php
            mysqli_close($connect);
        ?>

    
    </body>
</html>


