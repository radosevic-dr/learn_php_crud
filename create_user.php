<?php
include "db.php";

if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $hash = "$2y$10$";
  $salt = "agesanakirormataierc22";

  $hash_salt = $hash . $salt;
  $crypted_password = crypt($password, $hash_salt);

  $query = <<<CREATEUSER
    insert into users(username, password) 
    values('$username', '$crypted_password');
  CREATEUSER;

  $result = mysqli_query($connect, $query);

  if(!$result) {
    die("Unable to create user " . mysqli_error($connect));
  } else {
    header("Location: read_delete_users.php");
  }

}