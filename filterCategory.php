<?php

$category = $_GET["q"];
 echo $category;
      require'vendor/autoload.php';
      $client = new MongoDB\Client("mongodb://localhost:27017");
      $collection = $client->booksdb->data;

    

    $result = $collection->find([
        'category' => $category
    ]);
    foreach($result as $item){
        
       
    echo '<div class="card" style="width: 400px;"> ';
    echo '<div class="card-body">';
    echo          '<h5 class="card-title" style="font-size: 36px;">' . $item["title"] . '</h5>';
    echo           '<p class="card-text"> ' . $item["description"]  . ' </p> ';
    echo           '<p class="card-text"> ' . $item["category"] . ' </p> ';
    echo           '<p class="card-text"> ' . $item["pubDate"] . ' </p> ';
    echo           '<a href="' . $item["link"] . ' " class="btn btn-primary">Link</a>';
    echo        '</div>
    </div>';

    if(!$item){
        echo "No category Founded!!!";
    }
    }
    
  

?>