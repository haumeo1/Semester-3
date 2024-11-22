<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['favoriteImage'])) {
    $selectedImage = $_POST['favoriteImage'];
    setcookie('favoriteImage', $selectedImage, time() + (86400), "/");
    header('Location: lab08.php');
    exit;
}
?>