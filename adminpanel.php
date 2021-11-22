


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
   <tbody id="_editable_table">
      <?php foreach($queryRecords as $res) :?>
      <tr data-row-id="<?php echo $res['id'];?>">
         <td class="editable-col" contenteditable="true" col-index='0' oldVal ="<?php echo $res['id'];?>"><?php echo $res['id'];?></td>
         <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $res['username'];?>"><?php echo $res['username'];?></td>
         <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $res['password'];?>"><?php echo $res['password'];?></td>
      </tr>
    <?php endforeach;?>
   </tbody>
</table>
</body>
</html>
<?php
  $columns = array(
    0 =>'id',
    1 => 'username',
    2 => 'password'
  );
  $error = true;
  $colVal = '';
  $colIndex = $rowId = 0;
  
  $msg = array('status' => !$error, 'msg' => 'Failed! updation in mysql');
 
  if(isset($_POST)){
    if(isset($_POST['val']) && !empty($_POST['val']) && $error) {
      $colVal = $_POST['val'];
      $error = false;
      
    } else {
      $error = true;
    }
    if(isset($_POST['index']) && $_POST['index'] >= 0 &&  $error) {
      $colIndex = $_POST['index'];
      $error = false;
    } else {
      $error = true;
    }
    if(isset($_POST['id']) && $_POST['id'] > 0 && $error) {
      $rowId = $_POST['id'];
      $error = false;
    } else {
      $error = true;
    }
  
    if(!$error) {
        $sql = "UPDATE user_db SET ".$columns[$colIndex]." = '".$colVal."' WHERE id='".$rowId."'";
        $status = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
        $msg = array('status' => !$error, 'msg' => 'Success! updation in mysql');
    }
  }
  
  // send data as json format
  echo json_encode($msg);

?>
