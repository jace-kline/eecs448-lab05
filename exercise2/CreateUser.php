<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jace_kline", "feuta7Ya", "jace_kline");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users WHERE user_id='" . $_POST["nameInput"] . "'";
$result = $mysqli->query($query);

if ($result->num_rows == 0 && strlen($_POST["nameInput"]) > 0) {
    $result->free();
    $mysqli->query("INSERT INTO Users (user_id) VALUES ('" . $_POST["nameInput"] . "')");
    echo "<br><p style='font-size:30px'>Success! The user, <b>" . $_POST["nameInput"] . "</b>, is registered.</p>";
} else {
    if(strlen($_POST["nameInput"]) == 0) {
        echo "<br><p style='font-size:30px'>Invalid entry. The inputted user name was blank.</p>";
    }
    else {
        echo "<br><p style='font-size:30px'>Invalid entry. The inputted user name <b>" . $_POST["nameInput"] . "</b> already exists.</p>";
    }
}

/* close connection */
$mysqli->close();
?>
