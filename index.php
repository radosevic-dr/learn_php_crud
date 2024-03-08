<?php
include "layout.php";
?>

<form action="create_user.php" method="POST" class="flex flex-col gap-5 w-[300px] mx-auto mt-[100px]">
  <input type="text" name="username" placeholder="username" class="px-1 py-1 rounded-md border border-slate-300">
  <input type="password" name="password" placeholder="*********" class="px-1 py-1 rounded-md border border-slate-300">
  <input type="submit" name="submit" value="Create User" class="px-3 py-1 rounded-md border border-blue-300">
</form>

<?php
include "end_layout.php";
?>