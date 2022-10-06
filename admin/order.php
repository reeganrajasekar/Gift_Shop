
<?php require("../db/db.php");?>
<?php 
$id = $_GET['id'];
    $sql = "SELECT * from orders where id='$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user = $row['userid'];
        $gift = $row['giftid'];
        $stat = $row['stat'];
        $remark = $row['remark'];
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
            $addr = $data['addr'];
            }
        }

    }
}
        
?>
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
<div class="container " style="background:white;border-radius:10px;margin-top:10px">
<form action="/admin/action/editorder.php" method="get">
        <h3 style="padding-top:10px;margin-left:20px"><?php echo$proname?></h3>
        <input type="hidden" name="id" value="<?php echo$id?>">
        <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="name" value="<?php echo$uname?>">
            <label for="floatingInput">User Name</label>
        </div>
        <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="name" value="<?php echo$mob?>">
            <label for="floatingInput">User Mobile No</label>
        </div>
        <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="name" value="<?php echo$addr?>">
            <label for="floatingInput">Address</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-control" name="remark" id="sel1">
                <option value="<?php echo$remark?>"><?php echo$remark?></option>
                <option value="Ordered">Ordered</option>
                <option value="Packed">Packed</option>
                <option value="Shipped">Shipped</option>
                <option value="On the way">On the way</option>
                <option value="Delivered">Delivered</option>
            </select>
            <label for="sel1">Remark</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-control" name="stat" id="sel1">
                <option value="<?php echo$stat?>"><?php echo$stat?></option>
                <option value="10">10</option>
                <option value="30">30</option>
                <option value="60">60</option>
                <option value="80">80</option>
                <option value="100">100</option>
            </select>
            <label for="sel1">Remark</label>
        </div>
        <div class="row">
            <div class="col-8"></div>
            <div class="col-2">
            <div class="d-grid">
            <a href="/admin/action/cancel.php?id=<?php echo$id?>"><input type="button" class="btn btn-danger btn-login text-uppercase fw-bold" name="submit" value="Cancel"></a>
            </div>
            </div>
            <div class="col-2">
            <div class="d-grid">
            <input type="submit" class="btn btn-primary btn-login text-uppercase fw-bold" name="submit" value="Update">
            </div>
            </div>
        </div>
</form>
        
</div>


</body>
</html>
