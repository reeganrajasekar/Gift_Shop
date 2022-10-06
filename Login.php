
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="bg-image"></div>
<div class="container bg-text">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-3 shadow rounded-400 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light " ><b>Login</b></h5>
              <h5 style="color:red;"><?php
if(isset($_GET['r'])){
  echo $_GET['r']."!";
}
?></h5>
            <form action="/signin.php" method="POST">
              <div class="form-floating mb-3">
                <input type="email" required name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address<span style="color:red"> *</span></label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" required name="passwd" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password<span style="color:red"> *</span></label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" style="background:red" type="submit">Sign
                  in</button>
              </div>
              <hr class="my-4">
                <h5 class="card-title text-center">Don't have an account? <a href="./signup.php" style="color:red">Signup!</a></h5>  
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("/img/slide.jpg");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.bg-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}

  </style>
    
</body>
</html>