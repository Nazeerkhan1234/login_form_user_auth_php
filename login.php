<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  // Retrieve form data
  $username=$_POST['username'];
  $password=$_POST['password'];
  
  // Database Connection
  $host="localhost";
  $dbusername="root";
  $dbpassword="";
  $dbname="authentication";
  $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
  if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error );
  }
  
  // Validate Login Authentication
  $query="SELECT * FROM login WHERE username='$username' AND password='$password'";
  $result=$conn->query($query);
  if($result->num_rows==1){
    //login success
    header("Location: success.html");
    exit();
  }else{
    // login failed
    header("Location: error.html");
    exit();
  }
}
?>