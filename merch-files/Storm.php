<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College of Science</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/merch-style.css">
</head>
<body>

    <!-- Header Section -->
    <header class="transparent-header text-white py-3">
        <div class="container d-flex align-items-center">
            <div class="d-flex align-items-center">
                <div class="logo me-3">
                    <img src="../assets/images/background-logo/astro.png" alt="College of Science Logo" height="40">
                </div>
                <div class="title">
                    <h1 class="m-0 fs-4">College of Science: STORM</h1>
                </div>
            </div>
            <nav class="ms-auto">
                <ul class="nav">
                    <li class="nav-item"><a href="../index.php" class="nav-link text-white">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Merch
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="csc2.php">CSC Merch</a></li>
                            <li><a class="dropdown-item" href="CircuITs.php">CircuITs Merch</a></li>
                            <li><a class="dropdown-item" href="SymBIOsis.php">SymBIOsis Merch</a></li>
                            <li><a class="dropdown-item" href="ACCeSS.php">ACCeSS Merch</a></li>
                            <li><a class="dropdown-item" href="Storm.php">Storm Merch</a></li>
                            <li><a class="dropdown-item" href="Chess.php">Chess Merch</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pages
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                            <li><a class="dropdown-item" href="https://www.facebook.com/ACCeSSBicolU" target="_blank">ACCeSS Facebook</a></li>
                            <li><a class="dropdown-item" href="https://www.facebook.com/BUCS.CollegeStudentCouncil" target="_blank">CSC Facebook</a></li>
                            <li><a class="dropdown-item" href="https://www.facebook.com/bucscircuits" target="_blank">CircuITs Facebook</a></li>
                            <li><a class="dropdown-item" href="https://www.facebook.com/BUChemicalScienceSociety" target="_blank">Chess Facebook</a></li>
                            <li><a class="dropdown-item" href="https://www.facebook.com/busymbiosis1977" target="_blank">Symbio Facebook</a></li>
                            <li><a class="dropdown-item" href="https://www.facebook.com/bicolu.storm" target="_blank">Storm Facebook</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#adminModal">Admin</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Product Grid Section -->
    <section class="my-5">
        <div class="horizontal-grid-container">
            <!-- Product 1 -->
            <div class="grid-item" data-product-name="Globalized Tshirt" data-product-price="P285">
                <img src="../assets/images/Storm/Storm-shirt2.jpg" alt="Product 1">
                <div class="title">Globalized Tshirt</div>
                <div class="price">P285</div>
            </div>
            <!-- Product 2 -->
            <div class="grid-item" data-product-name="Reversible Lanyard" data-product-price="P159">
                <img src="../assets/images/Storm/Storm-Lanyard.jpg" alt="Product 2">
                <div class="title">Reversible Lanyard</div>
                <div class="price">P159</div>
            </div>
            <!-- Product 3 -->
            <div class="grid-item" data-product-name="Programmer's Bag" data-product-price="P199">
                <img src="../assets/images/Storm/Storm-bag.jpg" alt="Product 3">
                <div class="title">Programmer's Bag</div>
                <div class="price">P199</div>
            </div>
        </div>
    </section>

    <!-- Purchase Modal -->
    <div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="purchaseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="purchaseModalLabel">Purchase Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="purchaseForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" required>
                        </div>
                        <div class="mb-3">
                            <label for="paymentMethod" class="form-label">Payment Method</label>
                            <select class="form-select" id="paymentMethod" required>
                                <option value="gcash">GCash</option>
                                <option value="cash">Cash</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" form="purchaseForm">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="ACCeSS-merch.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
