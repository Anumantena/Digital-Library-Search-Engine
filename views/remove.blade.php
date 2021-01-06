<?php

$url = $_SERVER['HTTP_REFERER'];

$thisID= auth()->user()->id;

$title=Request('title');
$sourceURL=Request('sourceURL');
$description=Request('description');
$publisher=Request('publisher');

$mysqli = new mysqli("127.0.0.1", "admin", "monarchs", "amant");

$link = mysqli_connect("127.0.0.1", "admin", "monarchs", "amant");

$sql = "DELETE FROM save WHERE id=$id";
if(mysqli_query($link, $sql)){
    echo "Removed";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>