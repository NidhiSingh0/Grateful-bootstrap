<?php
session_start();
if(isset($_SESSION["username"])){
  header("Location:home.html");
  exit();
}
servername="localhost";
$username="root";
$password="";
$dbname="Gratefugarden";

$conn=new mysqli($servername, $username,$password,$dbname);

if($conn->connect_error){
  die("Connection failed:".$conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"]==="Post"){
  $username=$_POST["username"];
  $password=$_POST["password"];

  $query="SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result=$conn->query($query);
  if($result->num_rows===1){
    header('Location:home.php');
  }else{
    echo '<script>alert("Invalid username or password")</script>';
  }
}
$conn->close();
?>