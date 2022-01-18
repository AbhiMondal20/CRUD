


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
  <link rel="icon" href="logo.jpg">
  <title>SignUp Pages</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="logo.jpg" height="25rem" width="25rem"> ABC School</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              About
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link">Blog</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <ul>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
</ul>
      </div>
    </div>
  </nav>

  <?php 
?>



<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $arr = true;
  require 'connection.php';

        $name = $_POST['name'];
        $sname = $_POST['sname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $exists = false;
        
     if(($password == $cpassword) && $exists ==false){



        
        ///insert data in user
        
        
        $sql = "INSERT INTO `login_tab` ( `name`, `sname`, `email`, `password`,`cpassword`, `date_time`) VALUES ( '$name', '$sname', '$email', '$password', '$cpassword', current_timestamp())";
        $result = mysqli_query($conn , $sql);
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success</strong> Your Acount Created & You can login
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
          
        }
      }
      else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> Password do not match.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }




      
    }




?>
<br>
<br>
  <h2 align="center">SignUp to our Website </h2>

  <div class="container my-4">
    <form action="" method="post">
    <!-- <div class="image"><img src="pic3.jpg"></div> -->

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required  id="name" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Surname</label>
        <input type="text" class="form-control" id="sname"  name="sname" required aria-describedby="emailHelp">

      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required id="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Your email is Your User Id</div>

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" name="password" class="form-label">Password</label>
        <input type="password" name="password" required class="form-control" id="password">
      </div>
       <div class="mb-3">
        <label for="exampleInputPassword1" name="password" class="form-label">Confirm Password</label>
        <input type="password" name="cpassword" required class="form-control" id="password">
      </div>
     
      <button type="submit" class="btn btn-primary">Sign UP</button>

    </form>

  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>