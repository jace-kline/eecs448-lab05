<?php


$mysqli = new mysqli("mysql.eecs.ku.edu", "jace_kline", "feuta7Ya", "jace_kline");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT post_id,author_id,content FROM Posts";

if ($result = $mysqli->query($query)) {
    echo "<table style='font-size:30px; width:80%;table-layout:fixed'>";
    echo "<th><td style='width=10%'><b><u>Delete?</u></b></td><td><b><u>Author ID</u></b></td><td><b><u>Post Content</u></b></td></th>";

    /* fetch associative array and display the 3 values in the table*/
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td></td><td><input type='checkbox' name='checkbox[]' value='" . $row["post_id"] . "'></td>";
        echo "<td>" . $row["author_id"] . "</td>";
        echo "<td style='word-wrap:break-word'>" . $row["content"] . "</td></tr>";
    }

    /* free result set */
    $result->free();

    echo "</table>";
}

/* close connection */
$mysqli->close();

?>