<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="cart.css">
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a onclick="showSection('orders')">Orders</a></li>
            <li><a onclick="showSection('pending')">Pending</a></li>
            <li><a onclick="showSection('completed')">Completed</a></li>
        </ul>
    </div>
    <div class="container">
        <div id="orders" class="section active">
            <h2>Orders</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Details</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div id="pending" class="section">
            <h2>Pending</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Details</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Pending orders will go here -->
                </tbody>
            </table>
        </div>
        <div id="completed" class="section">
            <h2>Completed</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Details</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Completed orders will go here -->
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.add('active');
        }
    </script>
</body>
</html>
