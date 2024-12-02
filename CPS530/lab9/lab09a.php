<?php
$conn = mysqli_connect("localhost", "q1to", "WEmxpxCH", "q1to") or die(mysqli_error());
// Insert records
$sql = "INSERT INTO photographs (subject, location, date_taken, picture_url) VALUES
    ('Sunset Beach', 'Toronto, Ontario', '2024-10-10', 'images/sunset.jpg'),
    ('Mountain View', 'Banff, Alberta', '2024-09-15', 'images/mountain.jpg'),
    ('City Lights', 'Vancouver, British Columbia', '2024-08-20', 'images/citylights.jpg'),
    ('Forest Trail', 'Muskoka, Ontario', '2024-07-05', 'images/forest.jpg'),
    ('Lake Reflection', 'Niagara, Ontario', '2024-06-25', 'images/lake.jpg'),
    ('Historic Castle', 'Quebec City, Quebec', '2024-05-12', 'images/castle.jpg'),
    ('Snowy Hills', 'Whistler, British Columbia', '2024-01-30', 'images/snow.jpg'),
    ('Wildlife Safari', 'Jasper, Alberta', '2024-03-10', 'images/safari.jpg'),
    ('Urban Park', 'Ottawa, Ontario', '2024-02-15', 'images/park.jpg'),
    ('Harbor View', 'Halifax, Nova Scotia', '2024-04-01', 'images/harbor.jpg')";

if ($conn->query($sql) === TRUE) {
    echo "Records added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
