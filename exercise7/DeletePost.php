<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "jace_kline", "feuta7Ya", "jace_kline");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if($_POST['checkbox'] == false) {
    echo "<br><p style='font-size:30px'>No posts were selected for deletion.</p>";
}
else {
    echo "<table style='font-size:30px'>";
    echo "<h2>Post IDs Deleted:</h2>";

    foreach($_POST['checkbox'] as $postID) {
        if($result = $mysqli->query("SELECT post_id from Posts WHERE post_id='" . $postID . "'")) {
            $result->free();
            $mysqli->query("DELETE FROM Posts WHERE post_id='" . $postID . "'");
            echo "<tr><td>" . $postID . "</td></tr>";
        }
    }

    echo "</table>";
}



/* close connection */
$mysqli->close();

?>
