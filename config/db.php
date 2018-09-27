<?php

$conn = new mysqli("localhost","root","","mvc");
if($conn->connect_error)
{
    echo "connection failed";
}

$var = "1";
?>