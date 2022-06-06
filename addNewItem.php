<!DOCTYPE html>

<html>

<head>

  <title>Web Development-1</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>


</head>

<body>

  <!--navbar-->
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link" href="generateXML.php">Export XML</a>
          </li>
          <button type="button" class="btn btn-outline-dark" onclick="getDataFromDb()">View Book News Using
            Ajax</button>


        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" id="category" name="Category" placeholder="Enter category" aria-label="Search">
          <button class="btn btn-outline-success" type="submit" onclick="getCategory()">Search </button>
        </form>
      </div>
    </div>
  </nav>
  <!--navbar-->
  <div class="container"> <!--container-->
    <br />
    <div class="row"> <!--row-->
      <div class="col-xl-8 offset-xl-2">
    <div class="card "  >  <!--col-->

      <div class="card-body">
        <h5 class="card-title">Add New Book News to Database</h5>
        
        
        <!--form for data insert-->

        <form action="itemHandle.php" method="post">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="Title" >
          
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" id="description" name="Description" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Link</label>
            <input type="text" class="form-control" id="link" name="Link" >
          </div>
          <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="Category" >
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" >Add Book News</button>
          </div>
          
        </form>


        <!--form-->
      </div>
    </div>
    </div>  <!--col-->



  </div> <!--row-->
</div><!--container-->
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