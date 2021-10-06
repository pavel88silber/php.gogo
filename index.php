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

        // $r1 = mysqli_fetch_assoc($result);
        // print_r($r1);   // Array ( [id] => 1 [title] => Sport )
        // while ( $record = mysqli_fetch_assoc($result) ) {
        //     // while not empty
        //     print_r($record);
        //     echo '<br>';
        // }

    ?>
        <ul>

            <?php
                while ( $cat = mysqli_fetch_assoc($result) ) {

                    $text = mysqli_fetch_assoc($artic);

                    echo '<hr>' . '<li>' . $cat['title'] . 
                    '<ul>' .
                        '<li>' . '<br>' . $text['text'] . '</li>' .
                    '</ul>';
                }
            ?>
        </ul>

        <?php
            mysqli_close($connect);
        ?>







    
</body>
</html>


