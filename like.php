<?php

if (
    isset($_POST['action']) && ($_POST['action'] == 'like') &&
    isset($_POST['user_id']) && isset($_POST['like'])
) {

    $user_id = (int)$_POST['user_id'];

    if ($_POST['like'] == 1) {
        $sql = "UPDATE `user_likes` SET `likes` = `likes` + 1 WHERE id = $user_id";
    } else {
        $sql = "UPDATE `user_likes` SET `likes` = `likes` - 1 WHERE id = $user_id";
    }

    include_once "config/db_config.php";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (mysqli_query($conn, $sql)) {

        print_r(json_encode(['status' => 1]));
        die();

    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);

}
