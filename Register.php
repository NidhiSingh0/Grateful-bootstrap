<?php
$servername="localhost";
$username="root";
$password="";
$dbname="Gratefugarden";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
  die("connection failed: ".mysqli_connect_error());
}
if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $number=$_POST['number'];

  $sql="INSERT INTO user(username, email,password, number) VALUES(?,?,?,?)";
  $stmt=mysqli_prepare($conn,$sql);

  if($stmt){
    mysqli_stmt_bind_param($stmt,"ssssis",$username,$password,$email,$number);

      if(mysqli_stmt_execute($stmt)){
        header('Location:login.php');
      }else{
        echo "Error: ".mysqli_error($conn);
      }
  }else{
    echo "Error preparing statement: ".mysqli_error($conn);
  }
  mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>
