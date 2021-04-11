<?php

include 'connect.php';

$email = $_POST['email'];
$password = $_POST['pass'];
$fullName = $_POST['name'];

$sql = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email'");
$result = mysqli_num_rows($sql);
if ($result){
  header ('Location: signup.html');
} else {
  $sql = mysqli_query($connect, "SELECT username FROM user ORDER BY username DESC LIMIT 1");
  $row = $sql -> fetch_assoc();
  $LastId = $row['username']+1;

  $sql = mysqli_query($connect, "INSERT INTO user (username, email, password, fullName) VALUES ('$LastId','$email','$password','$fullName')");
  header ("Location: index.html");
}

?>
