<?php require("../db/db.php");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#"><b>Admin</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ms-auto" style="font-size:18px">
        <li class="nav-item">
          <a class="nav-link" href="/admin/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/admin/gift.php">Gifts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/users.php">Users</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container" style="margin-top:20px;background-color:white;border:1px solid #ddd;border-radius:10px">
    <div style="padding-top:10px">
          <div class="list-group list-group-flush">
            <h3 class="list-group-item list-group-item-action active" aria-current="true" style="border-radius:10px">
            <div class="row">
              <div class="col-11">
                Current Orders : 
              </div>
              <div class="col-1">
                <button data-bs-toggle="modal" data-bs-target="#myModal" style="background:none;border:none;color:white">+</button>
              </div>
            </div>
            </h3>
              
            <table class="table" style="color:black;text-align:center">
              <tr>
                <th>id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
              </tr>
              <?php 
            $sql = "SELECT * FROM gift order by id DESC";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                ?>

              <tr style="height:50px">
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['rate']?></td>
                <td><?php echo $row['stack']?></td>
                <td style="color:black;text-align:center">
                    <a href="/admin/action/delgift.php?id=<?php echo$row['id']?>"><input type="button" value="&#128465;" style="background:white;border:none"></a>
                </td>
              </tr>

              <?php
              }
            }
            ?>
          
            </table>
          </div>
    </div>
</div>
          

       


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">File</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="/admin/newgift.php" enctype="multipart/form-data"  class="container" method="POST">

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="name">
              <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="floatingPassword" placeholder="Password" name="price">
              <label for="floatingPassword">Price</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="stock">
              <label for="floatingInput">Stock</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword" placeholder="Password" name="dis">
              <label for="floatingPassword">Discription</label>
            </div>
            <div class="form-floating mb-3">
              <input type="file" name="image" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">File</label>
            </div>
            <div class="d-grid">
              <input type="submit" class="btn btn-primary btn-login text-uppercase fw-bold" name="submit" value="Upload">
            </div>
        </form>
      </div>

    </div>
  </div>
</div>
    
</body>
</html>