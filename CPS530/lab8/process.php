<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rows = intval($_POST['rows']);
    $columns = intval($_POST['columns']);

    if ($rows < 3 || $rows > 12 || $columns < 3 || $columns > 12) {
        echo "<p>Please enter numbers between 3 and 12.</p>";
        exit;
    }
    $background = "url('white-background.jpg')";

    echo '<table style="background-image:' . $background . '; background-size: cover; border:solid;color:red;border-color:black;">';
    echo "<tr><th>*</th>";
    for ($i = 1; $i <= $columns; $i++) {
        echo "<th>$i</th>";
    }
    echo "</tr>";

    for ($i = 1; $i <= $rows; $i++) {
        echo "<tr><th>$i</th>";
        for ($j = 1; $j <= $columns; $j++) {
            echo "<td>" . ($i * $j) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>
