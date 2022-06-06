<?php

//read.php

$feed_url = "https://www.bookbrowse.com/rss/book_news.rss";

//https://www.feedforall.com/sample.xml
$object = new DOMDocument();

$object->load($feed_url);

$content = $object->getElementsByTagName("item");


?>

<!DOCTYPE html>
<html>
 <head>
  
  
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
  
       <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        
       
 </head>
 <body>
   <!--navbar-->
 <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="rssread.php">Book News RSS Feed</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="addNewItem.php">Insert new Book News Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="generateXML.php" >Export XML</a>
              </li>
              <button type="button" class="btn btn-outline-dark" onclick="getDataFromDb()">View Book News Using Ajax</button>
         
          
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" id="category" name="category"   placeholder="Search Category"  aria-label="Search">
            
            </form>
            <button class="btn btn-outline-success" type="submit" onclick="getCategory()">Search</button>
       
      </div>
    </div>
  </nav>
 <!--navbar-->
 
  <div class="container">
   <br />
   
   <br />

   <div style="min-width:1000px" id="outputData" >
   </div>
   <button type="button" class="btn btn-outline-dark" onclick="location.href = 'rsswrite.php'">Add XML to Database</button>

   

   <?php
    
   foreach($content as $row)
   {

    echo '<div class="card" style="width: 1400px;padding:5%"> ';
    echo '<div class="card-header">';
    echo          '<h5 class="card-header-title" style="font-size: 36px;">' . $row->getElementsByTagName("title")->item(0)->nodeValue . '</h5>';
    echo  '</div>';
    echo '<div class="card-content">';
    echo           '<p class="content"> ' . $row->getElementsByTagName("description")->item(0)->nodeValue . ' </p> ';
//     echo           '<p class="content"> ' . $row->getElementsByTagName("category")->item(0)->nodeValue . ' </p> ';
    echo           '<p class="content"> ' . $row->getElementsByTagName("pubDate")->item(0)->nodeValue . ' </p> ';
    echo           '<a href="' . $row->getElementsByTagName("link")->item(0)->nodeValue . ' " class="btn btn-primary">Link</a>';
    echo  '</div>';
    echo'</div>';
    
   }

   ?>
   
   
  </div>
  <script>
      function getDataFromDb() {
            alert("View all stock data from mongodb using ajax");
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("outputData").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getdata.php", true);
            xhttp.send();
        }
      function getCategory() {
        var data= document.getElementsByID('category').value;
        var xhttp =new XMLHttpRequest();
        xhttp.onreadystatechange =function () {
          if(this.readyState ==4 && this.status==200){
            document.getElementById("outputData").innerHTML=this.responseText;

          }
          
        };
        xhttp.open("GET","filterCategory.php?q="+data,true);
        xhttp.send();
        
      }  
  </script>
 </body>
</html>