<?php
class value_insert{
function OpenCon()
{ 
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}
}

// $user = " ihsan ";
// $email ="ihsan@gmail.com";
// $username = " aqib ";
// $password = "1234";
// $gender = "male";
// $birthday = "23 feb 1998";

function value($conn,$user,$email,$username,$password,$gender,$birthday)
{
    $sql = "INSERT INTO user (user,email,username,password,gender,birthday)
VALUES ('$user','$email','$username','$password','$gender','$birthday')";
$res = $conn->query($sql);//execute query
if($res)
{ echo "new record inserted"; }
else
{ echo "error occurred". $conn->error; }
$conn -> close();
}

function CloseCon($conn)
 {
 $conn -> close();
 }

};

?>