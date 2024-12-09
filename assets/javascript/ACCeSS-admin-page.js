// Example for handling ACCeSS orders
document.querySelectorAll('.btn-success').forEach(button => {
    button.addEventListener('click', () => {
        alert('Order marked as completed!');
        // Add logic to update order status
    });
});

document.querySelectorAll('.btn-danger').forEach(button => {
    button.addEventListener('click', () => {
        if (confirm('Are you sure you want to delete this order?')) {
            alert('Order deleted!');
            // Add logic to remove the order
        }
    });
});
