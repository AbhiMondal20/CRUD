<?php


// post data in db
// if($_SERVER['REQUEST_METHOD']=='POST'){
//     $name =$_POST['name'];
//     $email = $_POST['email'];
//     $phone_number = $number['phone_number'];
//     $address = $address['address'];





        // conneciton to db  
        $_SERVER = "localhost";
        $username = "root";
        $password = "";
        $database = "itab_notes";


        $conn = mysqli_connect($_SERVER, $username, $password, $database);
        if(!$conn){
            die
            ("Connection failed" . mysqli_connect_error($conn));
            }
            else{
                echo" Connaction Successfully...<br>";
            }


            // insert data to db



            $sql = "INSERT INTO `demo` ( `name`, `password`, `date and time`) VALUES ( 'abhijit', '257854', current_timestamp())";
            // $sql = "INSERT INTO 'SRD' ('a','abhi@gmail.com','8101202074','siliguri') values ('$name','$email','$phone_number','$address')";


            $result = mysqli_query($conn, $sql);
            if($result){
                echo  "Data insert successfully<br>";
            }
            else{
                echo "data was not insert <br>".mysqli_error($conn);
            
            }


            $sql = "SELECT * FROM `demo`";
            $result = mysqli_query($conn, $sql);
            
            while($row = mysqli_fetch_assoc($result)){
                echo  "&nbsp; &nbsp; Id No. &nbsp; &nbsp; ". $row['S.No']. " &nbsp; &nbsp; Name &nbsp; &nbsp;" . $row['name'] . " &nbsp; &nbsp; Password &nbsp; &nbsp;" . $row['password'] . "Date And Time&nbsp; &nbsp; " . $row['date and time'];
                echo "<br>";
            }
?>