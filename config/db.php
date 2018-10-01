<?php

$conn = new mysqli("localhost","phpmyadmin","root","mvc");
if($conn->connect_error)
{
    echo "connection failed";
}
?>