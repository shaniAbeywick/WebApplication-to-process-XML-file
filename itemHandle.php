<?php
$title = $_POST["Title"];
$description = $_POST["Description"];
$link = $_POST["Link"];
$category = $_POST["Category"];
$date = date("Y-m-d h:i:sa");


require'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->booksdb->data;

$result = $collection->insertOne( [ 
    'title' => $title  , 
    'description' => $description, 
    'link' => $link, 
    'category' => $category, 
    'pubDate' => $date 
     ] );
     echo "Added to mongoDB !!!";



?>