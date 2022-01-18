<?php


    $_SERVER = "localhost";
    $username = "root";
    $password = "";
    $database = "itab_notes";


    $conn = mysqli_connect($_SERVER, $username, $password, $database );
    if(!$conn){
      die("Connection failed <br>". mysqli_connect_error($conn));
    }else{
      // echo "Connection Successfully <br>";
    }
    $sql = "INSERT INTO `data_22` (`data`, `descript`, `date and time`) VALUES ( 'hello', 'world', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your data  insert successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else{
        echo "Error".mysqli_error($conn);
    }





?>