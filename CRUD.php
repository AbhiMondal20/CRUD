<?php
session_start();
if(!isset($_SESSION['login_tab']) || $_SESSION['login_tab']!=true){
    header("location: login.php");
    exit;
}

?>

<?php


$insert = false;
$update = false;
$delete = false;
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "itab_notes";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
   <link href="/CRUD/icon.jpg" rel="icon">
    <title>iTab Notes</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
  </head>
  <body>
    



    
    <!-- editv modal -->
  <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edits Notes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container my-4">
        <form action="CRUD.php" method="POST">
        <input type="hidden" name="snoEdit" id="snoEdit">
          
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><h1> Add Notes</h1></label>
            <input type="text" class="form-control" id="edits_notes" name="edit_notes" required aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"><h3>Description</h3>
            </label>
            <textarea class="form-control" id="edits_desc"  name="edit_desc" rows="10"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
</form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
    <!-- <h1>iTab</h1> -->





    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">iTab Notes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link">Srvices</a>
        </li>
</ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      <ul>
      <li class="nav-item">
          <a class="nav-link" href="http://localhost/website/signup.php">Logout</a>
        </li>
</ul>

    </div>
  </div>
</nav>


<?php
if($insert){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> Your data is insert successfully.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
else{
  // echo "Error".mysqli_error($conn);
}
?>

  


<!-- form -->
<div class="container my-4">
<form action="CRUD.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><h1>Add Notes</h1></label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="add_notes" required aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><h3>Description</h3>
    </label>
    <textarea class="form-control" id="exampleInputPassword1" required name="desc_notes" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<hr>

</div>






<div class="container">
  
  
<table class="table table-striped" id="myTable" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Notes</th>
      <th scope="col">Description</th>
      <!-- <th scope="col">Date & Time</th> -->
      <th scope="col">Action</th>

    </tr>
    
  </thead>
  <tbody>



<?php







        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if (isset( $_POST['snoEdit'])){
            // Update the record
             $Sno = $_POST["snoEdit"];
              $_add_notes = $_POST["edit_notes"];
              $_desc_notes = $_POST["edit_desc"];
              // UPDATE 
              $sql = "UPDATE `itab` SET `add_notes`='$_add_notes', `desc_notes` = '$_desc_notes' WHERE `itab`.`S.No` = $Sno";
              //  $sql = "UPDATE `itab` SET `add_notes`='$_add_notes' `desc_notes`='$_desc_notes' WHERE `S.No` = $Sno";
               $result = mysqli_query($conn, $sql);
               if(!$result){
                 echo "We could not update the record successfully".mysqli_error($conn);
               }else{
                //  echo "Update Records Successfully";
               }

          }
          
             else{             
              $_add_notes = $_POST['add_notes'];
              $_desc_notes =$_POST['desc_notes'];
            
              $sql = "INSERT INTO `itab` ( `add_notes`, `desc_notes`, `date and time`) VALUES ('$_add_notes', '$_desc_notes', current_timestamp())";
              $result = mysqli_query($conn, $sql);
              if($result){
              $insert = true;
              }          
            }

        
        }


                  $sql = "SELECT * FROM `itab`";
                  $result = mysqli_query($conn, $sql);
                  $Sno  = 0;
                  while($row = mysqli_fetch_assoc($result)){
                    $Sno = $Sno + 1;
                    echo "<tr >
                          <th scope='row'>". $Sno ."</th>
                          <td>" . $row['add_notes'] . "</td>
                          <td >" .$row['desc_notes'] . "</td>
                         
                          <td > <button class=' edit btn btn-primary' id=".$row['S.No']." type='submit' >Edit</button>  &nbsp;&nbsp; <button class= 'delete btn btn-primary' id=d".$row['S.No']." type='submit'>Delete</button> </td>
                          </tr>";
                      // echo  "&nbsp; &nbsp; Id No. &nbsp; &nbsp; ". $row['S.No']. " &nbsp; &nbsp; Notes &nbsp; &nbsp;" . $row['add_notes'] . " &nbsp; &nbsp; Description &nbsp; &nbsp;" . $row['desc_notes'] . "Date And Time&nbsp; &nbsp; " . $row['date and time'];
                      // echo "<br>";
              }
            
          // delete file
          if(isset($_GET['delete'])){
            $sno = $_GET['delete'];
            $delete = true;
            $sql = "DELETE FROM `itab` WHERE `itab`.`S.No` = $sno";
            $result = mysqli_query($conn, $sql);
          }
?>




  </tbody>
</table>

</div>


<!-- <div class="container"> -->

      














<!-- </div> -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
      <script>
      edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        // console.log("edit ");
        tr = e.target.parentNode.parentNode;
        add_notes = tr.getElementsByTagName("td")[0].innerText;
        add_desc = tr.getElementsByTagName("td")[1].innerText;
        console.log(add_notes, add_desc);
        edits_notes.value = add_notes;
        edits_desc.value = add_desc;
        snoEdit.value = e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle');
      })
    })
    </script>
    
<!-- Delete Button script -->
    <script>
    
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/CRUD/CRUD.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
    </script>

<script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>

<script src="script.js">
  
</script>
  </body>
</html>