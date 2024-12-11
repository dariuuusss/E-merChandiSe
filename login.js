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

// Add a click event listener to the login button
loginButton.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent the default form submission behavior

    // Define the target page URL
    const dashboard = 'index.php'; // Replace with your desired page URL

    // Redirect to the target page
    window.location.href = dashboard;
});