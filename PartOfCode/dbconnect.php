
<?php
    $servername="localhost";
    $username="root";
    $password= "";
    $database= "mynotes";

    $conn = new mysqli($servername, $username, $password,$database);
    if (!$conn) {
        
        die("Error : ".mysqli_connect_error());
    }

?>