@extends('layouts.app')

@section('content')


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <h3>Add New Data</h3>
    <br>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


</head>
<body> 

<div class="form-box">
          <label for="title"><b>Title</b></label>
		  <input type ="text" class="search" name="title" >
        
        </div>
<div class="form-box">
          <label for="author"><b>Author</b></label>
		<input type ="text" class="search" name="author" > 
           </div>
<div class="form-box">
          <label for="name"><b>University</b></label>
		<input type ="text" class="search" name="university" > 
           </div>
<div class="form-box">
         <label for="unv"><b>Name of the degree</b></label>
		<input type ="text" class="search" name="degree_name" > 
           </div>
<div class="form-box">        
  <input type ="file" name="image"/>
  <br>
  <!-- <button class ="search-btn" type="submit"> Choose a file</button> -->
  <input type = "submit"/>
  <!-- <button class ="search-btn" type="submit"> Submit</button> -->
  
   </form>
    </div>
   </body>


<?php

if(isset($_FILES['image'])){
    $errors= array();
    $file_name =$_FILES['image']['name'];
    $file_size = $FILES['image']['size'];
    $file_tmp = $FILES['image']['tmp_name'];
    $file_type = $FILES['image']['type'];
    $file_ext = strtolower(end(explode('.',$FILES['image']['name'])));

    $extensions = array("jpeg", "jpg", "png");

    if(in_array($file_ext, $extensions) === false) {
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    if($file_size > 2097152){
        $errors[]="File size must be exactely 2MB";
    }
    if(empty($errors)==true){
        move_uploaded_file($file_tmp, "images/".$file_name);
        echo "Success";
    }else{
        print_r($errors);
    }
}

?>
@endsection