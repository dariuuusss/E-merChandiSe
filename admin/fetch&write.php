<?php
session_start();  // Start the session

// Check if the department is set in the session
if (isset($_SESSION['department'])) {
    $department = $_SESSION['department'];
} else {
    // Handle case where department is not set
    echo json_encode(["error" => "Department not set in session."]);
    exit();
}

$host = "localhost";
$dbname = "e-merchandise";
$username = "root";
$password = '';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // If the user is an admin, show all data (regardless of department)
    if ($department === 'all') {
        $stmt = $pdo->prepare("SELECT order_id, costumer_name, item, size, quantity, date FROM sales");
    } else {
        // If the user is not an admin, filter by their department
        $stmt = $pdo->prepare("SELECT order_id, costumer_name, item, size, quantity, date FROM sales WHERE department = :department");
        $stmt->bindParam(':department', $department, PDO::PARAM_STR);
    }

    $stmt->execute();
    $sales = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the sales data as JSON
    echo json_encode(["department" => $department, "sales" => $sales]);

} catch (PDOException $e) {
    echo json_encode(["error" => "Database connection failed: " . $e->getMessage()]);
}
?>
