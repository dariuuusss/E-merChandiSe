<?php
session_start(); // Start the session

ini_set('display_errors', 1); // Enable error reporting
error_reporting(E_ALL); // Report all types of errors

$host = "localhost"; 
$dbname = "e-merchandise"; 
$username = "root";
$password = '';

$error = ''; // Initialize error variable

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

    // Validate inputs
    if (empty($inputUsername) || empty($inputPassword)) {
        $error = "Username and password cannot be empty.";
    } else {
        // Prepare and execute the query
        $stmt = $pdo->prepare("SELECT * FROM credentials WHERE username = :username");
        $stmt->bindParam(':username', $inputUsername, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $inputPassword === $user['password']) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Store role in session

            if (strpos($user['username'], 'adminCSC') !== false) {
                $_SESSION['department'] = 'CSC';
            } elseif (strpos($user['username'], 'adminCHESS') !== false) {
                $_SESSION['department'] = 'CHESS';
            } elseif (strpos($user['username'], 'adminSYMBIO') !== false) {
                $_SESSION['department'] = 'SYMBIO';
            } elseif (strpos($user['username'], 'adminACCESS') !== false) {
                $_SESSION['department'] = 'ACCESS';
            } elseif (strpos($user['username'], 'adminCIRCUITS') !== false) {
                $_SESSION['department'] = 'CIRCUITS';
            } elseif (strpos($user['username'], 'adminSTORM') !== false) {
                $_SESSION['department'] = 'STORM';
            } else {
                $_SESSION['department'] = 'all';
            }
            
            // Redirect based on user role
            if ($_SESSION['role'] === 'admin') {
                // Redirect admin to admin dashboard
                header("Location: admin/admin.php");
                exit();
            } else if ($_SESSION['role'] === 'user') {
                // Redirect regular user to user dashboard
                header("Location: index.php");
                exit();
            }
        } else {
            $error = "Wrong username or password.";
        }
    }

    // If there is an error, store it in the session and redirect back to the login page
    if (!empty($error)) {
        $_SESSION['error'] = $error; // Store error in session
        header("Location: login.php");
        exit();
    }
}
?>
