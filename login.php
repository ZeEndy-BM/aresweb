<?php
include "header.php";
?>
<!DOCTYPE html>
<html>
<body>

<form action="" method="post">
    Vārds: <input type="text" name="username"><br>
    Parole: <input type="text" name="password"><br>
    <input name="login" type="submit" value="Ieiet">
</form>


<?php
// Pārbauda vai login ir noticis
if (isset($_POST["login"])) {
    $username=test_input($_POST["username"]);
    $password=$_POST["password"];
    $query="SELECT * FROM user_db WHERE username='$username'&& password='$password'";
    $result = mysqli_query($conn, $query);
    print_r($result->num_rows);
    
    //num_rows parada cik ir atrasti ieraksti
    if ($result->num_rows>0) {
    //Lietotajs ievadijis datus korekti jasak sesija
        while($user = mysqli_fetch_assoc($result)){
            print_r($user);
            $_SESSION["username"] = $user["username"];
            $_SESSION["rank"] = $user["rank"];
        }
        header('location:index.php');
    } else {
        echo "Nepareizs lietotājvārds vai parole";
    }
}
?>

</body>
</html> 