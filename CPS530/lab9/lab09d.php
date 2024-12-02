<?php
$conn = mysqli_connect("localhost", "q1to", "WEmxpxCH", "q1to") or die(mysqli_error());

$locations = $conn->query("SELECT DISTINCT location FROM photographs");
$years = $conn->query("SELECT DISTINCT YEAR(date_taken) as year FROM photographs ORDER BY year DESC");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedLocation = $_POST['location'];
    $selectedYear = $_POST['year'];
    $sql = "SELECT * FROM photographs WHERE location='$selectedLocation' AND YEAR(date_taken)='$selectedYear'";
    $filteredPhotos = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Filter Photos</title>
    <style>
        .title-pic {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form method="POST">
        <label for="location">Location:</label>
        <select name="location" id="location">
            <?php while ($loc = $locations->fetch_assoc()) { ?>
                <option value="<?= $loc['location']; ?>"><?= $loc['location']; ?></option>
            <?php } ?>
        </select>
        <label for="year">Year:</label>
        <select name="year" id="year">
            <?php while ($year = $years->fetch_assoc()) { ?>
                <option value="<?= $year['year']; ?>"><?= $year['year']; ?></option>
            <?php } ?>
        </select>
        <button type="submit">Filter</button>
    </form>
    <?php if (!empty($filteredPhotos) && $filteredPhotos->num_rows > 0) { ?>
        <?php while($row = $filteredPhotos->fetch_assoc()) { ?>
            <div>
                <img src="<?= $row['picture_url']; ?>" alt="Photo" width="200">
                <p class = "title-pic"><?= $row['subject']; ?> - <?= $row['location']; ?> (<?= $row['date_taken']; ?>)</p>
            </div>
        <?php } ?>
    <?php } ?>
</body>
</html>
<?php $conn->close(); ?>
