<?php

include 'connectDB.php';

if(isset($_POST['signUp'])){
  $username = $_POST[''];
  $contacts = $_POST[''];
  $email = $_POST[''];
  $password = $_POST[''];

  $checkUsername = "SELECT * From credentials where username = '$username'";
  $result=$conn->query($checkUsername);
  if($result->num_rows>0){
    echo "User already exists!";
  } else{
    $insertQuery = "INSERT INTO credentials(username, contact_number, email, password) VALUES ($username, $contacts, $email, $password)";
    
    if($conn->query($insertQuery)==TRUE){
      header("location: login.php");
    } else{
      echo "Error:" .$conn->error;
    }

  }
}

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql="SELECT * From credentials where username = '$username' and password = '$password";

  if($result->num_rows>0){
    session_start();
    $row=&$result->fetch_assoc();
    $_SESSION['username']=$row['username'];
    header("Location: index.php");
    exit();
  } else{
    echo "Wrong username or password.";
  }

}
?>