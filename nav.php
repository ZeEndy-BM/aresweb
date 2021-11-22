<head>
<style>
.container {
  display: flex;
  justify-content: center;
}
.center {
  width: 400px; 
  padding: 10px;
  background: #5F85DB;
  color: #fff;
  font-weight: bold;
  font-family: Tahoma;
}
</style>
</head>
<div class="container">
<a  href="index.php">Sākumlapa</a><br>
<a  href="about.php">Par mums</a><br>
<a href="login.php">Ienākt</a><br>
<a href="logout.php">Iziet</a><br>
<?php if ((isset($_SESSION["username"]) && ($_SESSION["rank"] == "admin")) or (isset($_SESSION["username"]) && ($_SESSION["rank"] == "root"))):?>
    <a href="adminpanel.php">Admin</a><br>
<?php endif;?>
</div>