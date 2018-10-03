<?php

$conn = new mysqli("localhost","root","password","mvc");
if($conn->connect_error)
{
    echo "connection failed";
}
?>