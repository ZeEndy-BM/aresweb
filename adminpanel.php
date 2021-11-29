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
    <a href="nav.php">Exit admin panel</a>;
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
         <?php if ($res['id']!=1):?>
         <td><?php echo $res['id'];?></td>
         <td><input name="username_<?php echo $res['id'];?>" value="<?php echo $res['username'];?>"></td>
         <td><input name="password_<?php echo $res['id'];?>" value="<?php echo $res['password'];?>"></td>
         <td><select name="rank_<?php echo $res['id'];?>">
               <option <?php if ($res['rank']=="user"):?>selected<?php endif;?> value="user">user</option>
               <option <?php if ($res['rank']=="moderator"):?>selected<?php endif;?> value="moderator" >moderator</option>
               <option <?php if ($res['rank']=="admin"):?>selected<?php endif;?> value="admin">admin</option>
            </select>
         </td>
         <td><input name="id" value="<?php echo $res['id']; ?>" type="submit"></td>
         <td><input name="id_delete" value="<?php echo $res['id'];?>" type="submit"></td>
         <?php endif;?>
      </tr>
    <?php endforeach;?>
    <tr>
         <td></td>
         <td><input name="username_new" value="new username"></td>
         <td><input name="password_new" value="new password"></td>
         
         <td><input name="add_new" value="Add new" type="submit"></td>
      </tr>
   </tbody>
   </form>
</table>
</body>
</html>
<?php
   if(isset($_POST['id']) && $_POST['id'] > 0){
   $id = (int)$_POST['id'];
   echo $_POST['id'];
   echo "<br>";
   echo $_POST['username_'.$id]." ";
   $username = "UPDATE user_db SET username='".$_POST['username_'.$id]."' WHERE id=".$_POST['id'];
   if (mysqli_query($conn, $username)) {
      echo "Record updated successfully";
      } else {
      echo "Error updating record: " . mysqli_error($conn);
      }
   echo "<br>";
   echo $_POST['password_'.$id]." ";
   $password = "UPDATE user_db SET `password`='".$_POST['password_'.$id]."' WHERE id=".$_POST['id'];
   if (mysqli_query($conn, $password)) {
      echo "Record updated successfully";
      } else {
      echo "Error updating record: " . mysqli_error($conn);
   }
   $rank = "UPDATE user_db SET rank='".$_POST['rank_'.$id]."' WHERE id=".$_POST['id'];
   if (mysqli_query($conn, $rank)) {
      echo "Record updated successfully";
      } else {
      echo "Error updating record: " . mysqli_error($conn);
   }
   if ($_SESSION['id']==$_POST['id']){
      $_SESSION['username']=$_POST['username_'.$id];
   }
   header("Refresh:0");
}
if(isset($_POST['id_delete']) && $_POST['id_delete'] > 0){
   $id = (int)$_POST['id_delete'];
   $user = "DELETE FROM user_db WHERE id=".$_POST['id_delete'];
   if (mysqli_query($conn, $user)) {
      header("Refresh:0");
      echo "Record updated successfully";
      } else {
      echo "Error updating record: " . mysqli_error($conn);
      }
}
if (isset($_POST['add_new'])){
   $date = date('Y-m-d H:i:s');
   $sql = "INSERT INTO user_db (username,`password`,token,rank) VALUES ('".$_POST['username_new']."','".$_POST['password_new']."',0,'user')";
   if (mysqli_query($conn, $sql)) {
      header("Refresh:0");
      echo "Record updated successfully";
      } else {
      echo "Error updating record: " . mysqli_error($conn);
      }
}


//while($row = mysqli_fetch_assoc($r)){
 // var_dump($row);
 // echo "<hr>";
//}

?>
