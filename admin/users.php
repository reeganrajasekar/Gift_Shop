<?php require("../db/db.php");?>
<!DOCTYPE html>
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
          <a class="nav-link" href="/admin/gift.php">Gifts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/admin/users.php">Users</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
<div class="container" style="margin-top:20px;background-color:white;border:1px solid #ddd;border-radius:10px">
    <div style="padding-top:10px">
          <div class="list-group list-group-flush">
            <h3 class="list-group-item list-group-item-action active" aria-current="true" style="border-radius:10px">
            CUsers : 
            </h3>
            <table class="table" style="color:black;text-align:center">
              <tr>
                <th>User id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
              <?php 
                  $sql = "SELECT * from user order by id DESC";
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      
              ?>
              <tr style="height:50px">
                <td><?php echo$row['id'] ;?></td>
                <td><?php echo$row['name'] ;?></td>
                <td><?php echo$row['email'] ;?></td>
                <td><?php echo$row['mob'] ;?></td>
                <td><?php echo$row['addr'] ;?></td>
                <td style="color:black;text-align:center">
                    <a href="/admin/action/deluser.php?id=<?php echo$row['id']?>"><input type="button" value="&#128465;" style="background:white;border:none"></a>
                </td>
              </tr>
            <?php
             }
              }else{
                  echo"<p style='text-align:center;padding:10px'>No Users!</p><hr>";
              }
                  ?>
            </table>
          </div>
    </div>
</div>
    
</body>
</html>