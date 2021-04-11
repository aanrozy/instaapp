<?php
include 'connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

session_start();

if(!empty($email) && !empty($password)) {
  $sql = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
  $result = mysqli_num_rows($sql);
  if ($result) {
    $sql = mysqli_query($connect, "SELECT fullName FROM user WHERE email = '$email'");
    $row = $sql -> fetch_assoc();
    session_start();
    $_SESSION['fullName'] = $row['fullName'];
    header('Location: timeline.php');
  } else {
    echo "gagal";
  }
}
?>
