


<?php
include "header.php";
if (!((isset($_SESSION["username"]) && ($_SESSION["rank"] == "admin")) or (isset($_SESSION["username"]) && ($_SESSION["rank"] == "root")))) {
    header("location:accessdenied.php");
}
$sql = "SELECT * FROM `user_db`";
$queryRecords = mysqli_query($conn, $sql) or die("error to fetch user database");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Administrator panel</h1>
<table id="user_grid" class="table table-condensed table-hover table-striped bootgrid-table" width="60%" cellspacing="0">
   <thead>
      <tr>
         <th>ID</th>
         <th>USER NAME</th>
         <th>PASSWORD</th>
      </tr>
   </thead>
   <form name="form" method="post">
   <tbody id="_editable_table">
      <?php foreach($queryRecords as $res) :?>
      <tr>
         <td><?php echo $res['id'];?></td>
         <td  name="username" oldVal ="<?php echo $res['username'];?>"><input type="text"><?php echo $res['username'];?></td>
         <td contenteditable="true" name="password" oldVal ="<?php echo $res['password'];?>"><?php echo $res['password'];?></td>
         <td><input name="id" value="<?php echo $res['id']; ?>" type="submit"></td>
      </tr>
    <?php endforeach;?>
   </tbody>
   </form>
</table>
</body>
</html>
<?php


if(isset($_POST['id']) && $_POST['id'] > 0) {
  $id = (int)$_POST['id'];
  echo $_POST['id'];
//  $sql = "UPDATE user_db SET id='".$id."' WHERE ";
}

//while($row = mysqli_fetch_assoc($r)){
 // var_dump($row);
 // echo "<hr>";
//}

?>
