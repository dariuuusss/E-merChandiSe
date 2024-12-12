<?php
session_start(); // Start the session

ini_set('display_errors', 1); // Enable error reporting
error_reporting(E_ALL); // Report all types of errors

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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

        // Prepare and execute the query
        $stmt = $pdo->prepare("SELECT * FROM credentials WHERE username = :username");
        $stmt->bindParam(':username', $inputUsername, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $inputPassword === $user['password']) {
            // Set session variables
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Store role in session


            if (strpos($user['username'], 'adminCSC') !== false) {
                $_SESSION['department'] = 'CSC';
                http_response_code(200);
                echo json_encode(['message' => 'Login successful', 'isAdmin' => $user['role'] === 'admin']);
            } elseif (strpos($user['username'], 'adminCHESS') !== false) {
                $_SESSION['department'] = 'CHESS';
                http_response_code(200);
                echo json_encode(['message' => 'Login successful', 'isAdmin' => $user['role'] === 'admin']);
            } elseif (strpos($user['username'], 'adminSYMBIO') !== false) {
                $_SESSION['department'] = 'SYMBIO';
                http_response_code(200);
                echo json_encode(['message' => 'Login successful', 'isAdmin' => $user['role'] === 'admin']);
            } elseif (strpos($user['username'], 'adminACCESS') !== false) {
                $_SESSION['department'] = 'ACCESS';
                http_response_code(200);
                echo json_encode(['message' => 'Login successful', 'isAdmin' => $user['role'] === 'admin']);
            } elseif (strpos($user['username'], 'adminCIRCUITS') !== false) {
                $_SESSION['department'] = 'CIRCUITS';
                http_response_code(200);
                echo json_encode(['message' => 'Login successful', 'isAdmin' => $user['role'] === 'admin']);
            } elseif (strpos($user['username'], 'adminSTORM') !== false) {
                $_SESSION['department'] = 'STORM';
                http_response_code(200);
                echo json_encode(['message' => 'Login successful', 'isAdmin' => $user['role'] === 'admin']);
            } else {
                $_SESSION['department'] = 'all';
                http_response_code(200);
                echo json_encode(['message' => 'Login successful', 'isAdmin' => $user['role'] === 'admin']);
            }



        } else {
            // Return error response
            http_response_code(401);
            echo json_encode(['message' => 'Wrong username or password']);
        }

    // If there is an error, return error response
    if (!empty($error)) {
        http_response_code(400);
        echo json_encode(['message' => $error]);
    }
}
?>


