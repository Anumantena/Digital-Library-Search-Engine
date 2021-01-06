@extends('layouts.app')
@section('content')
<div class="container">
<h3>
Saved Items
</h3>
</div>
<?php

$title= (isset($source['_source']['title'])? $source['_source']['title'] : "");
$URL = (isset($source['_source']['identifier_uri']) ? $source['_source']['identifier_uri'] : ""); 
$abs = (isset($source['_source']['description_abstract']) ? $source['_source']['description_abstract'] : ""); 

echo '
<table class="table table-stripped" id="dt1">
<thead>
<th>Title</th>
<th>Author</th>
<th>University</th>
<th>Publisher</th>
<th>Option</th>
</thead>
';
foreach( $users ?? '' as $source){
    echo "<tr>
    <td><a role='button' class='btn btn-link' href='".$source->identifier_uri."' target='_blank'>".$source->title."</a></br>".$source->description_abstract."</td>
    <td>".$source->author."</td>
    <td>".$source->degree_grantor."</td>
    <td>".$source->publisher."</td>
    <td><a href = 'delete/{{ $source->id }}'>Delete</a></td>
    </tr>";
}
echo "</table>";


?>
@endsection



