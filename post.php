<?php

include 'connect.php';

session_start();
if (!isset($_SESSION['fullName'])){
    header("Location: index.html");
}

$fullName = $_SESSION['fullName'];
$caption = $_POST['caption'];
$post_image = $_POST['customFile']['image'];
$times = date('Y-m-d H:i:s');

$sql = mysqli_query($connect, "SELECT post_id FROM post ORDER BY post_id DESC LIMIT 1");
$row = $sql -> fetch_assoc();
$LastId = $row['post_id']+1;

$sql = mysqli_query($connect, "INSERT INTO post (post_id, fullName, caption, post_image, times) VALUES ('$LastId','$fullName','$caption','$post_image','$times')");
header("Location: timeline.php");
?>
