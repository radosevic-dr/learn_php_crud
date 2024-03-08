<?php
include "db.php";

$get_users_query = "select * from users";
$users = mysqli_query($connect, $get_users_query);

if(isset($_POST["submit"])){
  
  $user_id = (int)$_POST["id"];
  $user_username = $_POST["username"];
  $user_password = $_POST["password"];

  $update_query = <<<UPDATEUSER
    update users 
    set username = '$user_username', password = '$user_password' 
    where id = $user_id;
  UPDATEUSER;

  $update_result = mysqli_query($connect, $update_query);

  if(!$update_result){
    die("Unable to update user " . mysqli_error($connect));
  } else {
    header("Location: read_delete_users.php");
  }
}
?>

<?php include "layout.php"; ?>
<form action="./update_users.php" method="POST" class="flex flex-col gap-5 w-[300px] mx-auto mt-[100px]">
  <select name="id" id="">
    <option value="">Select user id</option>
    <?php
      while($row = mysqli_fetch_assoc($users)){
        echo "<option value=$row[id]>$row[id]</option>";
      }
    ?>
  </select>
  <input type="text" name="username" placeholder="username" class="px-1 py-1 rounded-md border border-slate-300">
  <input type="password" name="password" placeholder="*********" class="px-1 py-1 rounded-md border border-slate-300">
  <input type="submit" name="submit" value="Update User" class="px-3 py-1 rounded-md border border-blue-300">
</form>
<?php include "end_layout.php"; ?>