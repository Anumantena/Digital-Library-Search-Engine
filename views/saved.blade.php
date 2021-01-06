@extends('layouts.app')
@section('content')
<h3>
Saved Items
</h3>

<?php

// require '/Users/anuradhamantena/WP/vendor/autoload.php';
// // require 'vendor/autoload.php';
// // use Elasticsearch\ClientBuilder;
// $client = Elasticsearch\ClientBuilder::create()
// //->setHosts($hosts)
// ->build();
$url = $_SERVER['HTTP_REFERER'];
$thisID= auth()->user()->id;
$title=Request('title');
$sourceURL=Request('sourceURL');
$description=Request('description');
$publisher=Request('publisher');

echo "$title";

$mysqli = new mysqli("127.0.0.1", "admin", "monarchs", "amant");
$link = mysqli_connect("127.0.0.1", "admin", "monarchs", "amant");

$sql = "INSERT INTO save (user_id, title, url, description_abstract, publisher) VALUES ('$thisID','$title','$sourceURL','$description','$publisher')";
if(mysqli_query($link, $sql)){
    echo "Successful";
    } 
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>
@endsection
