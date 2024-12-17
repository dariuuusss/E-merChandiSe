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
            <h1 class="fs-4" id="adminTitle">Admin Dashboard</h1>
            <a href="../index.php" class="btn btn-danger" id="logout-btn">Logout</a>
        </div>
    </header>

    <!-- Admin Content -->
    <div class="container my-5">
            
        <p>Here you can manage merchandise orders, update content, and monitor activity.</p>

        <!-- Example Table of Orders -->
        <div class="table-responsive">
            <table class="table table-bordered" id="data-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Item</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be populated by JavaScript from check.php -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/javascript/admin.js"></script>

    <!-- JavaScript for fetching and displaying data -->
    <script>
        // Fetch data from PHP script using AJAX
        // Fetch data from PHP script using AJAX
        function fetchData() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "fetch&write.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Parse the JSON response
                    var data = JSON.parse(xhr.responseText);

                    // Update the title
                    
                    var titleElement = document.getElementById('adminTitle');

                    if(data.department == 'all'){
                        document.title = `Admin Dashboard`;
                        titleElement.textContent = document.title;
                        titleElement.style.display = "block";
                    } else{
                        document.title = `${data.department} Admin Dashboard`;
                        titleElement.textContent = document.title;
                        titleElement.style.display = "block";
                    }
                    

                    // Get the table body element
                    var tableBody = document.getElementById('data-table').getElementsByTagName('tbody')[0];
                    tableBody.innerHTML = '';  // Clear any existing data

                    // Loop through the data and create rows
                    if (data.sales) {
                        data.sales.forEach(function(row) {
                            var tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td>` + row.order_id + `</td>
                                <td>` + row.costumer_name + `</td>
                                <td>` + row.item + `</td>
                                <td>` + row.size + `</td>
                                <td>` + row.quantity + `</td>
                                <td>` + row.date + `</td>
                            `;
                            tableBody.appendChild(tr);
                        });
                    } else {
                        console.log("No sales data found.");
                    }
                }
            };
            xhr.send();
        }

        // Call fetchData when the page loads
        window.addEventListener('load', function() {
            fetchData();
        });
    </script>
</body>

</html>
