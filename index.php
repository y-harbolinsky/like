<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Like Game"/>
    <title>Like Game</title>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="public/js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>

<body>

<header>

</header>


<?php

include_once "config/db_config.php";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$users = [];
$sql = "SELECT * FROM `user_likes`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    echo "No users";
}
$conn->close();

?>

<main>
    <article>

        <header>

            <h1>This is
                <mark>Like Game</mark>
            </h1>

        </header>

    </article>

    <?php foreach ($users as $user): ?>

        <div class="user_container">
            <div>
                <img src="<?php echo $user['avatar']; ?>">
            </div>
            <div class="user_info">
                <p>
                    <span class="name"><?php echo $user['name']; ?></span>
                    <span class="like_button">
                        <button onclick="likeHandle(this);" data-id="<?php echo $user['id']; ?>">
                            Like <span class="likes_count"><?php echo $user['likes']; ?></span>
                        </button>
                    </span>
                </p>
            </div>
        </div>

    <?php endforeach; ?>

</main>

<footer>

    <p>Copyright © 2017</p>

</footer>

</body>

</html>
