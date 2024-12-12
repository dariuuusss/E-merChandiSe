<?php


$host = "localhost"; 
$dbname = "e-merchandise"; 
$username = "root";
$password = '';


try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
if (isset($_POST['username']) && isset($_POST['contacts']) && isset($_POST['email']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $contacts = $_POST['contacts'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $checkUsername = "SELECT * From credentials where username = '$username'";
  $result = $pdo->query($checkUsername);

  if ($result->rowCount() > 0) {
      echo "User  already exists!";
  } else {
      $insertQuery = "INSERT INTO credentials(username, contact_number, email, password) VALUES (:username, :contacts, :email, :password)";
      $stmt = $pdo->prepare($insertQuery);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':contacts', $contacts);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':password', $password);

      if ($stmt->execute()) {
        echo "Registered Succesfully!";
      } else {
        echo "Error: " . $pdo->errorInfo()[2];
      }
  }
}
?>