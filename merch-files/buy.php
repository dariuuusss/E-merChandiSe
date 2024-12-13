<?php
session_start(); // Start the session

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
$item = $_POST['productName'];
$size = $_POST['size'];
$quantity = (int)$_POST['quantity'];

// Assuming user credentials are stored in session
if (!isset($_SESSION['username'])) {
    die("User  not logged in.");
}

$username = $_SESSION['username']; // Fetch user ID from session
$sql = "SELECT username,  contact_number, email FROM credentials WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $customerName = $user['username'];
    $customerEmail = $user['email'];
    $customerPhone = $user['contact_number'];
} else {
    die("User  credentials not found.");
}
function checkAndMoveItem($item, $size, $quantity, $customerEmail, $customerPhone, $customerName, $conn) {
    // Check item availability in the warehous
    if ($quantity == '' || $quantity<1){
      echo "No orders detected!";
    } else{
    $sql = "SELECT department, stock, price FROM warehouse WHERE item = ? AND size = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $item, $size);
    $stmt->execute();
    $result = $stmt->get_result();
    
    
    if ($result->num_rows === 0) {
      echo "Item Out of Stock.";
      return;
    }
    $row = $result->fetch_assoc();

    if ($row === null) {
      echo "Item Out of Stock.";
      return;
    }
    $department = $row['department'];
    $availableStock = $row['stock'];
    $amount = $row['price'];

    $total = $amount * $quantity;    
    
    if($availableStock < $quantity){
      echo "Insufficient Stock.";
      return;
    } else{
        // Begin a transaction
        $conn->begin_transaction();

        try {
            // Remove the item or reduce the stock from the warehouse
            if ($availableStock == $quantity) {
                $deleteSQL = "DELETE FROM warehouse WHERE item = ? AND size = ?";
                $deleteStmt = $conn->prepare($deleteSQL);
                $deleteStmt->bind_param("ss", $item, $size);
                $deleteStmt->execute();
                $deleteStmt->close();
            } else {
                $updateSQL = "UPDATE warehouse SET stock = stock - ? WHERE item = ? AND size = ?";
                $updateStmt = $conn->prepare($updateSQL);
                $updateStmt->bind_param("iss", $quantity, $item, $size);
                $updateStmt->execute();
                $updateStmt->close();
            }

            // Insert into sales table
            $insertSQL = "INSERT INTO sales (costumer_name, email_address, phone_number, item, size, quantity, department, amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $conn->prepare($insertSQL);
            $insertStmt->bind_param(
                "sssssisi",
                $customerName,
                $customerEmail, // Assuming username is the order_id
                $customerPhone, // Assuming user_name is stored in session
                $item,
                $size,
                $quantity,
                $department,
                $total // Assuming department is stored in session
            );
            
            if (!$insertStmt->execute()) {
              echo "Error: " . $insertStmt->error;
            } else {
              echo "Item Successfully Purchased!";
            }
            // Commit transaction
            $conn->commit();
          } catch (Exception $e) {
              // Rollback transaction in case of error
              $conn->rollback();
              return "Error: " . $e->getMessage();
          }
      }

    }
  }
  
  // Call the function and echo the result
  echo checkAndMoveItem($item, $size, $quantity, $customerEmail, $customerPhone, $customerName, $conn);
  
  // Close the database connection
  $conn->close();
  ?>