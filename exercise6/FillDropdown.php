<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "jace_kline", "feuta7Ya", "jace_kline");
            
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users";

if ($result = $mysqli->query($query)) {
    /* fetch associative array and display user names in the dropdown list*/

    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['user_id'] . "'>" . $row['user_id'] . "</option>";
    }

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();

?>