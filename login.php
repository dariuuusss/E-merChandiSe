<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
    <!-- <img src="assets/images/Background-logo/astro.png" alt="" width="300px" height="auto"> -->
    <div class="container" id="container">
        <form action="#">
        <h1>LogIn</h1>
            <div class="input-box">
                <label for="username">Username </label>
                <input type="text" id="username" class="text-field" placeholder="Enter your username">
            </div>
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" id="password" class="text-field" placeholder="Enter your password">
            </div>
            <div class="input-box">
                <button type="submit" id="login">Login</button>
            </div>
            <br>
            <div class="input-box">
                <p>Don't have an account yet?</p><br>
                <button id="register-log">Create account</button>
            </div>
        </form>
    </div>
    <div class="modal-register">
        <form action="">
        <div class="close-btn">&times;</div>
        <h1>Register</h1>
            <div class="input-box">
                <label for="email-reg">Email</label>
                <input type="text" id="email-reg" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <label for="contact-reg">Contact #</label>
                <input type="text" id="contact-reg" placeholder="Enter your contact number" required>
            </div>
            <div class="input-box">
                <label for="username-reg">Username</label>
                <input type="text" id="username-reg" placeholder="Enter your username" required>
            </div>
            <div class="input-box">
                <label for="password-reg">Password</label>
                <input type="password" id="password-reg" placeholder="Enter your password" required>
            </div>
            <div class="input-box" id="submit">
                <button class="register">Register</button>
            </div>
        </form>
    </div>
    <script src="login.js"></script>
</body>
</html>