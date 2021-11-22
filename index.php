<?php
include "header.php";
?>
<!DOCTYPE html>
<html>
<body>

<?php
include "nav.php";
// Echo session variables that were set on previous page
if (!empty($_SESSION)) {
    echo "Username is " . $_SESSION["username"] . ".<br>";
    echo "Rank is " . $_SESSION["rank"] . ".";
} else {
    header('location:NA.php');
}
print_r ($_SESSION);
?>

</body>
</html> 