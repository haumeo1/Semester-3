<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Lab Solutions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            border: 2px solid #444;
            padding: 15px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #555;
            color: #fff;
            font-size: 1.2em;
        }
        .greeting {
            font-size: 2em;
            color: black;
            padding: 40px;
            text-align: center;
            background-size: cover;
        }
        .table-container {
            margin: 20px auto;
            width: fit-content;
        }
        iframe {
            width: 100%;
            height: 250px;
            border: none;
        }
        .favorite-image {
            position: fixed;
            top: 10px;
            right: 10px;
            opacity: 0.8;
        }
    </style>
</head>
<body>

<h1>PHP LAB 8</h1>

<table>
    <!-- Problem 1: Greeting Based on Time of Day -->
    <tr>
        <th>Problem 1: Dynamic Greeting</th>
        
            <?php
            date_default_timezone_set('America/Toronto');
            $hour = date('H');
            $background = '';
            $greeting = '';

            if ($hour >= 5 && $hour < 12) {
                $greeting = "Good Morning";
                $background = "url('./img/morning.jpg')";
            } elseif ($hour >= 12 && $hour < 18) {
                $greeting = "Good Afternoon";
                $background = "url('./img/afternoon.jpg')";
            } elseif ($hour >= 18 && $hour < 21) {
                $greeting = "Good Evening";
                $background = "url('./img/evening.jpg')";
            } else {
                $greeting = "Good Night";
                $background = "url('./img/night.jpg')";
            }
            echo '<td style="background-image: ' . $background . ';background-size: cover; ">';
            echo "<div class='greeting'; style='color:red'>$greeting</div>";
            echo "</td>";
            if (!file_exists(str_replace('url(\'', '', str_replace('\')', '', $background)))) {
                echo "<p style='color:red;'>Background image not found: $background</p>";
            }
            ?>
        
    </tr>

    <!-- Problem 2: Multiplication Table -->
    <tr>
        <th>Problem 2: Multiplication Table</th>
        <td>
            <form id="tableForm" action="process.php" method="POST" target="resultFrame">
                <label>Enter two integers (between 3 and 12):</label><br>
                <input type="number" name="rows" min="3" max="12" required>
                <input type="number" name="columns" min="3" max="12" required>
                <button type="submit">Generate Table</button>
            </form>
            <br>
            <iframe name="resultFrame" class="table-container"></iframe>
        </td>
    </tr>

    <!-- Problem 3: Favorite Image Selection -->
    <tr>
        <th>Problem 3: Choose Favorite Image</th>
        <td>
            <form action="set_cookie.php" method="POST">
                <label>Select an image:</label><br>
                <select name="favoriteImage" required>
                  <option value="img/corn.gif">Corn</option>
                  <option value="img/maple.gif">Maple</option>
                  <option value="img/turkey.gif">Turkey</option>
                  <option value="img/thanksgiving.gif">Thanksgiving</option>
                  <option value="img/pumpkin-soup.gif">Pumpkin Soup</option>
                </select>
                <button type="submit">Save Choice</button>
            </form>

            <?php
            // Display image
            if (isset($_COOKIE['favoriteImage'])) {
                $favoriteImage = htmlspecialchars($_COOKIE['favoriteImage']);
                if (file_exists($favoriteImage)) {
                    echo "<div class='favorite-image'><img src='$favoriteImage' alt='Favorite Image' style='width:100px;'><br>";
                    echo "<strong>Current image:</strong> $favoriteImage</div>";
                } else {
                    echo "<p>Selected image not found.</p>";
                }
            } else {
                echo "<p>Choose your favorite holiday image above.</p>";
            }
            ?>
        </td>
    </tr>
</table>
<p>&copy; 2024 Benjamin To</p>

</body>
</html>