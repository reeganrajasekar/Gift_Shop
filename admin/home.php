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
<body style="background-color:whitesmoke">
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#"><b>Admin</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ms-auto" style="font-size:18px">
        <li class="nav-item">
          <a class="nav-link active" href="/admin/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/gift.php">Gifts</a>
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
            Current Orders : 
            </h3>
            <table class="table" style="color:black;text-align:center">
              
              <?php 
		$pay=0;
                  $sql = "SELECT * from orders where payment!='null' and stat!='100' order by id DESC";
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                    ?>

<tr>
                <th>Order id</th>
                <th>Product</th>
                <th>User</th>
                <th>Mobile</th>
                <th>Progress</th>
                <th>Action</th>
              </tr>

              <?php
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    $user = $row['userid'];
                    $gift = $row['giftid'];
                    $sql = "SELECT * from gift where id='$gift'";
                    $add = $conn->query($sql);
                    if ($add->num_rows > 0) {
                      while($data = $add->fetch_assoc()) {
			$pay = $pay+$data['rate'];
                        $proname = $data['name'];
                      }
                    }
                    $sql = "SELECT * from user where id='$user'";
                    $add = $conn->query($sql);
                    if ($add->num_rows > 0) {
                      while($data = $add->fetch_assoc()) {
                        $uname = $data['name'];
                        $mob = $data['mob'];
                      }
                    }

                      
              ?>
              <tr style="height:50px">
                <td><?php echo$row['id'] ;?></td>
                <td><?php echo$proname ;?></td>
                <td><?php echo$uname ;?></td>
                <td><?php echo$mob ;?></td>
                <td>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width:<?php echo$row['stat'] ;?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo$row['stat'] ;?>%</div>
                  </div>
                </td> 
                <td style="color:black;text-align:center">
                  <a href="/admin/order.php?id=<?php echo$row['id'] ;?>"><button style="background:none;border:none">&rarr;</button></a>
                </td>
              </tr>
            <?php
             }
              }else{
                  echo"<p style='text-align:center;padding:10px'>There is No Orders!</p><hr>";
              }
                  ?>
            </table>
          </div>
    </div>
</div>
<br>

<div class="container" style="margin-top:20px;background-color:white;border:1px solid #ddd;border-radius:10px">
    <div style="padding-top:10px">
          <div class="list-group list-group-flush">
            <h3 class="list-group-item list-group-item-action active" aria-current="true" style="border-radius:10px">
            Delivered Orders : 
            </h3>
            <table class="table" style="color:black;text-align:center">

              <?php 
                  $sql = "SELECT * from orders where stat='100' order by id DESC";
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                  // output data of each row
                  ?>

<tr>
                <th>Order id</th>
                <th>Product</th>
                <th>User</th>
                <th>Mobile</th>
                <th>Status</th>
              </tr>

              <?php
                  while($row = $result->fetch_assoc()) {
                    $user = $row['userid'];
                    $gift = $row['giftid'];
                    $sql = "SELECT * from gift where id='$gift'";
                    $add = $conn->query($sql);
                    if ($add->num_rows > 0) {
                      while($data = $add->fetch_assoc()) {
                        $proname = $data['name'];
                      }
                    }
                    $sql = "SELECT * from user where id='$user'";
                    $add = $conn->query($sql);
                    if ($add->num_rows > 0) {
                      while($data = $add->fetch_assoc()) {
                        $uname = $data['name'];
                        $mob = $data['mob'];
                      }
                    }

                      
              ?>
              <tr style="height:50px">
                <td><?php echo$row['id'] ?></td>
                <td><?php echo$proname ?></td>
                <td><?php echo$uname ?></td>
                <td><?php echo$mob ?></td>
                <td style="color:<?php if ($row['remark']=='Delivered') {
                  echo"green";
                } else {
                  echo"red";
                }?>
                "><?php echo$row['remark'] ?></td> 
              </tr>
              <?php
             }
              }else{
                  echo"<p style='text-align:center;padding:10px'>No Orders!</p><hr>";
              }
                  ?>
            </table>
          </div>
    </div>
</div>
</body>
</html>