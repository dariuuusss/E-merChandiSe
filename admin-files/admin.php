<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>
    <!-- Header Section -->
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="fs-4">Admin Dashboard</h1>
            <a href="../index.php" class="btn btn-danger" id="logout-btn" >Logout</a>
        </div>
    </header>

    <!-- Admin Content -->
    <div class="container my-5">
        <h2>Welcome, Admin!</h2>
        <p>Here you can manage merchandise orders, update content, and monitor activity.</p>

        <!-- Example Table of Orders -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Item</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>101</td>
                        <td>Jane Doe</td>
                        <td>CSC T-Shirt</td>
                        <td>M</td>
                        <td>2</td>
                        <td>Pending</td>
                        <td>
                            <button class="btn btn-sm btn-success" id="success-btn">Mark Completed</button>
                            <button class="btn btn-sm btn-danger" id="delete-btn">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>102</td>
                        <td>John Smith</td>
                        <td>CircuITs Hoodie</td>
                        <td>L</td>
                        <td>1</td>
                        <td>Completed</td>
                        <td>
                            <button class="btn btn-sm btn-danger" id="delete-btn">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/javascript/admin.js"></script>
</body>

</html>