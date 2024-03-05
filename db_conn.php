<?php

$conn = mysqli_connect('localhost', 'root', '', 'internal');

if(!$conn){
    die("Connection Failed".mysqli_connect_error());
}
//echo "connected lamo";

?>