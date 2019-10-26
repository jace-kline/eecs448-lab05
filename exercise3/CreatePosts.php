<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jace_kline", "feuta7Ya", "jace_kline");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users WHERE user_id='" . $_GET["nameInput"] . "'";
$result = $mysqli->query($query);

if ($result->num_rows == 0) {
    echo "<br><p style='font-size:30px'>Invalid user. The inputted user name <b>" . $_GET["nameInput"] . "</b> is not registered.</p>";
} 
else if(strlen($_GET["post"]) == 0) {
    echo "<br><p style='font-size:30px'>Invalid post. The post has no content.</p>";
}
else {
    $result->free();
    $mysqli->query("INSERT INTO Posts (author_id, content) VALUES ('" . $_GET["nameInput"] . "', '" . $_GET["post"] .  "')");
    echo "<br><p style='font-size:30px'>Success! The post has been saved.</p>";
}

/* close connection */
$mysqli->close();
?>