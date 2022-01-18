
<?php


$_SERVER = "localhost";
$userbname = "root";
$password = "";
$database = "login";


$conn = mysqli_connect($_SERVER, $userbname, $password, $database );
if(!$conn){
die(" Connection was failed..<br>"). mysqli_connect_error($conn);
}else{
// echo "Connection Successfully...<br>";
}
?>