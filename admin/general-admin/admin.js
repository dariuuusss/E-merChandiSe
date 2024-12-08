// Example for handling order actions
document.getElementById('success-btn').addEventListener('click', () => {
    button.addEventListener('click', () => {
        alert('Order marked as completed!');
        // Add logic to update the order status in your database or UI
    });
});



document.getElementById('delete-btn').addEventListener('click', () => {
    button.addEventListener('click', () => {
        if (confirm('Are you sure you want to delete this order?')) {
            alert('Order deleted!');
            // Add logic to remove the order from your database or UI
        }
    });
});

// Specific handling for logout button
document.getElementById('logout-btn').addEventListener('click', () => {
    if (confirm('Are you sure you want to log out?')) {
        // Add logic for logging out (e.g., redirect to login page or clear session data)
    }
});