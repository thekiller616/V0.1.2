<?php


$localhost="localhost"; //your server name/IP, usually 'localhost'
$username="root"; //your database username
$password=""; //your database password
$database="ftppassword"; //your database name

$con = mysqli_connect("$localhost", "$username", "$password", "$database");


if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


