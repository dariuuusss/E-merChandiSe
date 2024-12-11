<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="check.php" method="POST">
            <h1>LogIn</h1>

            <div class="input-box">
                <label for="username">Username </label>
                <input type="text" id="username" name="username" placeholder="Enter your username" value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>">
            </div>
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
            </div>
            <?php
                session_start(); // Start the session

                // Retrieve and display the error message, if it exists, then clear it
                $error = isset($_SESSION['error']) ? $_SESSION['error'] : ''; 
                unset($_SESSION['error']); // Clear the error after displaying it
            ?>

                <!-- Display the error message here if it is set -->
            <?php if (!empty($error)): ?>
                <p style="color: red;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            
            <div class="input-box">
                <button type="submit" id="login">Login</button>
            </div>
            <div class="input-box">
                <p>Don't have an account yet?</p>
                <button class="register-btn" id="register">Create account</button>
            </div>
        </form>
    </div>
</body>
</html>
