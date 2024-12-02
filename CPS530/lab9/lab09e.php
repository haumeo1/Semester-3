<?php
$conn = mysqli_connect("localhost", "q1to", "WEmxpxCH", "q1to") or die(mysqli_error());

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$totalImages = $conn->query("SELECT COUNT(*) as total FROM photographs")->fetch_assoc()['total'];
$randomImage = $conn->query("SELECT * FROM photographs ORDER BY RAND() LIMIT 1")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Random Photo</title>
</head>
<body>
    <h1>Random Photo</h1>
    <div>
        <img class = "pic" src="<?= $randomImage['picture_url']; ?>" alt="Random Photo" width="300">
        <p class = "info-pic"><?= $randomImage['subject']; ?> - <?= $randomImage['location']; ?> (<?= $randomImage['date_taken']; ?>)</p>
    </div>
    <p>Total images in database: <?= $totalImages; ?></p>
</body>
</html>
<?php $conn->close(); ?>
