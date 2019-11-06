<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "jace_kline", "feuta7Ya", "jace_kline");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT content FROM Posts WHERE author_id='" . $_POST["nameInput"] . "'";

if ($result = $mysqli->query($query)) {
    echo "<p style='font-size:40px'>List of Posts for <u><b>" . $_POST["nameInput"] . "</b></u></p>";

    if($result->num_rows == 0) {
        echo "<p style='font-size:30px'>This user has no posts.</p>";
    }
    else {
        echo "<table style='font-size:20px'>";

        /* fetch associative array and display user names in a table*/
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td style='padding-bottom:2em'>" . $row["content"] . "</td></tr>";
        }

        /* free result set */
        $result->free();

        echo "</table>";
    }

}

/* close connection */
$mysqli->close();

?>
