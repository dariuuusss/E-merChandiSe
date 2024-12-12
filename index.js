// Admin credentials for each department
document.querySelector("#adminLoginBtn").addEventListener("click", function (e) {
    e.preventDefault();
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const errorElement = document.querySelector(".error-message");

    if (username === "" || password === "") {
        errorElement.textContent = "Username and password cannot be empty.";
        errorElement.style.display = "block";
        return;
    } else{
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
                    errorElement.textContent = "You are not an Admin!";
                    errorElement.style.display = "block";
                }
            } else {
                // Display error message
                errorElement.textContent = data.message;
                errorElement.style.display = "block";
            }
        })
        .catch((error) => console.error(error));
    }

    
});