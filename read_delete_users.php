<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["userid"])) {
  $user_id = (int)$_POST["userid"];
  
   // Prepare SQL statement
   $stmt = mysqli_prepare($connect, "DELETE FROM users WHERE id = ?");
   mysqli_stmt_bind_param($stmt, "i", $user_id); // "i" for integer value

   mysqli_stmt_execute($stmt);

   // Close prepared statement
   mysqli_stmt_close($stmt);
  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}


$query = "select * from users";
$result = mysqli_query($connect, $query);

?>
<?php include "layout.php"; ?>
<div class="w-[300px] mx-auto mt-[100px] flex flex-col gap-5">
  <?php 
  while($row = mysqli_fetch_assoc($result)){
    echo "
    <p class='flex gap-5'>$row[username] => $row[password]
      <button class='px-2 py-1 border border-slate-300 rounded-md' data-delete=$row[id]>Delete</button>
    </p>"; 
  }
  ?>
</div>

<script>
  const btns = document.querySelectorAll("[data-delete]");

  btns.forEach((btn, i) => {
    const userid = btn.dataset.delete;
    btn.addEventListener("click", () => {
        fetch(location.href, {
            method: "POST",
            mode: "same-origin",
            credentials: "same-origin",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `userid=${userid}`
        })
        .then(res => {
            if(res.ok) {
                console.log("User deleted");
                // Refresh page to see change
                location.reload();
            }
        })
        .catch(e => alert(e.message));
    });
});
</script>


<?php include "end_layot.php"; ?>