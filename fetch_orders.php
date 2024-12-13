<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Assuming you have a database connection in db_connection.php
$username = $_SESSION['username']; // Get the username from the session

// Initialize arrays to hold the fetched data
$orders = [];
$pending = [];
$sales = [];

// Fetch orders
$orderQuery = "SELECT item, size, quantity, amount, department FROM orders WHERE costumer_name = ?";
$stmt = $conn->prepare($orderQuery);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $row['order_details'] = "Not yet ordered"; // Set order details
    $orders[] = $row;
}

// Fetch pending orders
$pendingQuery = "SELECT item, size, quantity, amount, department FROM pending WHERE costumer_name = ?";
$stmt = $conn->prepare($pendingQuery);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $row['order_details'] = "Pending"; // Set order details
    $pending[] = $row;
}

// Fetch completed sales
$salesQuery = "SELECT item, size, quantity, amount, department FROM sales WHERE costumer_name = ?";
$stmt = $conn->prepare($salesQuery);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $row['order_details'] = "Completed"; // Set order details
    $sales[] = $row;
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Return the data as an associative array
echo json_encode(['orders' => $orders, 'pending' => $pending, 'sales' => $sales]);
?>