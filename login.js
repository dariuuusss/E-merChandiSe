/*const logInform=document.getElementById('container');
const registerForm=document.getElementById('register');
const loginBUtton=document.getElementById('login');
const registerButton=document.getElementById('register-log');


registerButton.addEventListener('click',function() {
    logInform.style.display="none";
    registerForm.style.display="block";
});


*/
document.querySelector("#register-log").addEventListener("click", function () {
    console.log("Opening modal...");
    document.querySelector(".modal-register").classList.add("active");
    document.getElementById("container").style.filter = "blur(5px)";
});

document.querySelector(".modal-register .close-btn").addEventListener("click", function () {
    console.log("Closing modal...");
    document.querySelector(".modal-register").classList.remove("active");
    document.getElementById("container").style.filter = "none";
});
const loginButton = document.getElementById('login');


document.querySelector("#login").addEventListener("click", function (e) {
    e.preventDefault();
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const errorElement = document.querySelector(".error-message");

    if (username === "" || password === "") {
        errorElement.textContent = "Username and password cannot be empty.";
        errorElement.style.display = "block";
        return;
    }

    fetch("check.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `username=${username}&password=${password}`,
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.message === "Login successful") {
            if (data.isAdmin) {
                // Redirect to admin.php
                window.location.href = "admin/admin.php";
            } else {
                // Redirect to index.php
                window.location.href = "index.php";
            }
        } else {
            // Display error message
            errorElement.textContent = data.message;
            errorElement.style.display = "block";
        }
    })
    .catch((error) => console.error(error));
});
