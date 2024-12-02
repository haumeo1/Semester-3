<?php
$conn = mysqli_connect("localhost", "q1to", "WEmxpxCH", "q1to") or die(mysqli_error());

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM photographs WHERE location LIKE '%Ontario%'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ontario Photos</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .photo { margin: 20px; text-align: center; }
    </style>
</head>
<body>
    <h1>Photos from Ontario</h1>
    <?php if ($result->num_rows > 0) { ?>
        <?php while($row = $result->fetch_assoc()) { ?>
        <div class="photo">
            <img src="<?= $row['picture_url']; ?>" alt="Photo" width="200">
            <p><?= $row['subject']; ?> - <?= $row['location']; ?></p>
        </div>
        <?php } ?>
    <?php } else { ?>
        <p>No photos from Ontario found!</p>
    <?php } ?>
</body>
</html>
<?php $conn->close(); ?>
