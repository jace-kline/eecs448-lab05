<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jace_kline", "feuta7Ya", "jace_kline");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users";

if ($result = $mysqli->query($query)) {
    echo "<h1><u>List of Users:</u></h1>";
    echo "<table style='font-size:30px'>";

    /* fetch associative array and display user names in a table*/
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["user_id"] . "</td></tr>";
    }

    /* free result set */
    $result->free();

    echo "</table>";
}

/* close connection */
$mysqli->close();

?>