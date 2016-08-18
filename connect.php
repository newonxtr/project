<?php  
$conn_error = "Could not connect to database";

    $servername = 'localhost';
    $username="newon1";
    $password="Joenin@30";
    $mysql_db = "contactus1";

    $conn = mysqli_connect($servername,$username,$password) or die('Error');
    mysqli_select_db($conn,$mysql_db) or die($conn_error);
    ?>