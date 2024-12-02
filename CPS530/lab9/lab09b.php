<?php
$conn = mysqli_connect("localhost", "q1to", "WEmxpxCH", "q1to") or die(mysqli_error());

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM photographs ORDER BY date_taken DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Photographs</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Photographs</h1>
    <table>
        <tr>
            <th>Picture Number</th>
            <th>Subject</th>
            <th>Location</th>
            <th>Date Taken</th>
            <th>Image</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['picture_number']; ?></td>
            <td><?= $row['subject']; ?></td>
            <td><?= $row['location']; ?></td>
            <td><?= $row['date_taken']; ?></td>
            <td><img src="<?= $row['picture_url']; ?>" alt="Image" width="100"></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php $conn->close(); ?>
