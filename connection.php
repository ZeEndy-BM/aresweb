<?php
    $conn=mysqli_connect('localhost', 'root', '', 'my_db');
    mysqli_set_charset($conn, 'utf8');
    if($conn) {
    echo "connected!";
}



?>