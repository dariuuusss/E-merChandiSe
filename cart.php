<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background: #333;
            color: #fff;
            height: 100vh;
            transition: width 0.3s;
        }
        .sidebar.hidden {
            width: 0;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px;
            text-align: center;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .toggle-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background: #333;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            background: #77aaff;
            color: #fff;
            padding: 10px;
        }
        .section form input, .section form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
        .section form input[type="submit"] {
            background: #333;
            color: #fff;
            border: 0;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
    <div class="container">
        <div class="sidebar" id="sidebar">
            <ul>
                <li><a href="#orders">Orders</a></li>
                <li><a href="#pending">Pending</a></li>
                <li><a href="#completed">Completed</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div id="orders" class="section">
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
                        <!-- Completed orders will go here -->
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
    </div>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('hidden');
        }
    </script>
</body>
</html>
