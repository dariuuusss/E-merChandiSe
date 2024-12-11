const loginButton = document.getElementById('login');

// Add a click event listener to the login button
loginButton.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent the default form submission behavior

    // Define the target page URL
    const dashboard = 'index.php'; // Replace with your desired page URL

    // Redirect to the target page
    window.location.href = dashboard;
});