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
                        <th>Item Name</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Department</th>
                        <th>Order Details</th>
                    </tr>
                </thead>
                <tbody id="orders-body">

                </tbody>
            </table>
        </div>
        <div id="pending" class="section">
            <h2>Pending</h2>
            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Department</th>
                        <th>Order Details</th>
                    </tr>
                </thead>
                <tbody id="pending-body">
                    <!-- Pending orders will go here -->
                </tbody>
            </table>
        </div>
        <div id="completed" class="section">
            <h2>Completed</h2>
            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Department</th>
                        <th>Order Details</th>
                    </tr>
                </thead>
                <tbody id="completed-body">
                    <!-- Completed orders will go here -->
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // Function to fetch data from fetch_orders.php
        function fetchData() {
            fetch('fetch_orders.php')
                .then(response => response.json())
                .then(data => {
                    populateTable('orders-body', data.orders);
                    populateTable('pending-body', data.pending);
                    populateTable('completed-body', data.sales);
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        // Function to populate table with data
        function populateTable(tableId, items) {
            const tableBody = document.getElementById(tableId);
            tableBody.innerHTML = ''; // Clear existing rows
            items.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.item}</td>
                    <td>${item.size}</td>
                    <td>${item.quantity}</td>
                    <td>${item.amount}</td>
                    <td>${item.department}</td>
                    <td>${item.order_details}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        // Fetch data when the page loads
        window.onload = fetchData;

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
