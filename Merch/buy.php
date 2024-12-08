<?php
//check stock
//remove from warehouse
//move to sales
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

/**
 * Check item availability and move to sales if sufficient stock exists.
 *
 * @param string $item The name of the item.
 * @param int $quantity The quantity to check and move.
 * @param mysqli $conn Database connection.
 * @return string Success or error message.
 */
function checkAndMoveItem($item, $quantity, $conn) {
    // Check item availability in the warehouse
    $sql = "SELECT * FROM warehouse WHERE item = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $item);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        return "Item not found in warehouse.";
    }

    $row = $result->fetch_assoc();
    if ($row['stock'] < $quantity) {
        return "Insufficient stock. Available: " . $row['stock'];
    }

    // Begin a transaction
    $conn->begin_transaction();

    try {
        // Remove the item or reduce the stock from the warehouse
        if ($row['stock'] == $quantity) {
            $deleteSQL = "DELETE FROM warehouse WHERE item = ?";
            $deleteStmt = $conn->prepare($deleteSQL);
            $deleteStmt->bind_param("s", $item);
            $deleteStmt->execute();
        } else {
            $updateSQL = "UPDATE warehouse SET stock = stock - ? WHERE item = ?";
            $updateStmt = $conn->prepare($updateSQL);
            $updateStmt->bind_param("is", $quantity, $item);
            $updateStmt->execute();
        }

        // Insert into sales table
        $insertSQL = "INSERT INTO sales (order_id, costumer_name, item, size, quantity, department) VALUES (?, ?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSQL);
        $insertStmt->bind_param(
            "ssis",
            $row['item'],
            $row['size'],
            $quantity,
            $row['department']
        );
        $insertStmt->execute();

        // Commit transaction
        $conn->commit();
        return "Item successfully moved to sales.";
    } catch (Exception $e) {
        // Rollback transaction in case of error
        $conn->rollback();
        return "Error: " . $e->getMessage();
    }
}

// Example usage
$item = "junmar";
$quantity = 5;
echo checkAndMoveItem($item, $quantity, $conn);

$conn->close();
?>