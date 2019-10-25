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
    $result->free();
    $mysqli->query("INSERT INTO Users (user_id) VALUES ('" . $_GET["nameInput"] . "')");
    echo "<p>Success! The user, <b>" . $_GET["nameInput"] . "</b> is registered.</p>";
} else {
  echo "<p>Invalid entry. The inputted user name <b>" . $_GET["nameInput"] . "</b> was blank or already exists.</p>";
}

/* close connection */
$mysqli->close();
?>
