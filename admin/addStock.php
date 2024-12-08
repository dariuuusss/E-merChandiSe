<?php
// Database connection
//trace item
//add item
//increase quantity
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/**
 * Adds stock to the warehouse.
 * If the item exists, increments its stock.
 * If the item is new, adds it as a new row.
 *
 * @param string $item The name of the item.
 * @param string $size The size of the item.
 * @param int $quantity The quantity to add.
 * @param string $department The department of the item.
 * @param mysqli $conn Database connection.
 * @return string Success or error message.
 */
function addOrIncrementStock($item, $size, $quantity, $department, $conn) {
    // Check if the item already exists in the warehouse
    $sql = "SELECT stock FROM warehouse WHERE item = ? AND size = ? AND department = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $item, $size, $department);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Item exists, increment the stock
        $updateSQL = "UPDATE warehouse SET stock = stock + ? WHERE item = ? AND size = ? AND department = ?";
        $updateStmt = $conn->prepare($updateSQL);
        $updateStmt->bind_param("isss", $quantity, $item, $size, $department);
        if ($updateStmt->execute()) {
            return "Stock updated successfully for item: $item.";
        } else {
            return "Error updating stock: " . $conn->error;
        }
    } else {
        // Item is new, insert it into the warehouse
        $insertSQL = "INSERT INTO warehouse (item, size, stock, department) VALUES (?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSQL);
        $insertStmt->bind_param("ssis", $item, $size, $quantity, $department);
        if ($insertStmt->execute()) {
            return "New item added to warehouse: $item.";
        } else {
            return "Error adding new item: " . $conn->error;
        }
    }
}

// Example usage
$item = "junmar";
$size = "M";
$quantity = 10;
$department = "access";
echo addOrIncrementStock($item, $size, $quantity, $department, $conn);

$conn->close();
?>
