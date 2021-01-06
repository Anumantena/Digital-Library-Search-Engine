@extends('layouts.app')
@section('content')
<div class="container">
<h3>
Search History
</h3>
</div>
<?php
echo '
<table class="table table-stripped" id="dt1">
<thead>
<th>Id</th>
<th>Keyword</th>
</thead>
';
// foreach( $users ?? '' as $user){
// echo "<tr><td>".$user->title."<a role='button' class='btn btn-link' href='".$user->identifier_sourceurl."' target='_blank'>Click for more details</a></td><td>".$user->contributor_author."</td><td>".$user->degree_grantor."</td><td>".$user->publisher."</td></tr>";
foreach( $users ?? '' as $source){
// $id= (isset($source['_source']['id'])? $source['_source']['id'] : "");
// $keyword= (isset($source['_source']['keyword'])? $source['_source']['keyword'] : "");
echo "<tr>
<td>".$source->id."</td>
<td>".$source->keyword."</td>
</tr>";
}
echo "</table>";
?>
@endsection

