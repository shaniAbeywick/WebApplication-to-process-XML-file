<?php

//read.php

$feed_url = "https://www.bookbrowse.com/rss/book_news.rss";


$object = new DOMDocument();

$object->load($feed_url);

$content = $object->getElementsByTagName("item");


?>

<!DOCTYPE html>
<html>
 <head>
  <title>Write RSS Feed in PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
  
       <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">Write RSS Feed in PHP</h2>
   <br />

   <?php
    
   foreach($content as $row)
   {
     require'vendor/autoload.php';
     $client = new MongoDB\Client("mongodb://localhost:27017");
     $collection = $client->booksdb->data;
     $result= $collection->insertOne(['title' => $row->getElementsByTagName("title")->item(0)->nodeValue,'description' => $row->getElementsByTagName("description")->item(0)->nodeValue,'link'=>$row->getElementsByTagName("link")->item(0)->nodeValue,'category' => $row->getElementsByTagName("category")->item(0)->nodeValue, 'pubDate' => $row->getElementsByTagName("pubDate")->item(0)->nodeValue  ]);

     echo "Inserted with Object ID '{$result->getInsertedId()}'";

        
    
   }

   echo "Successfully Added to MongoDB You can seen the result accessing with localhost/27017 !!!";

   ?>
  </div>
 </body>
</html>