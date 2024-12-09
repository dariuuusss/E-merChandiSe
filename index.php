<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/images/Background-logo/astro.png">
    <title>College of Science</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <!-- Header Section -->
    <header class="transparent-header text-white py-3">
        <div class="container d-flex align-items-center">
            <div class="d-flex align-items-center">
                <div class="logo me-3">
                    <img src="assets/images/Background-logo/astro.png" alt="College of Science Logo" height="40">
                </div>
                <div class="title">
                    <h1 class="m-0 fs-4">College of Science</h1>
                </div>
            </div>
            <nav class="ms-auto">
                <ul class="nav">
                    <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>

                    <!-- Dropdown for Merch -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Merch
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="merch-files/csc2.php">CSC Merch</a></li>
                            <li><a class="dropdown-item" href="merch-files/circuits.php">CircuITs Merch</a></li>
                            <li><a class="dropdown-item" href="merch-files/symbiosis.php">SymBIOsis Merch</a></li>
                            <li><a class="dropdown-item" href="merch-files/access.php">ACCeSS Merch</a></li>
                            <li><a class="dropdown-item" href="merch-files/storm.php">Storm Merch</a></li>
                            <li><a class="dropdown-item" href="merch-files/chess.php">Chess Merch</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown for External Pages -->
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

    <!-- Admin Login Modal -->
    <div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminModalLabel">Admin Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="adminLoginForm">
                        <div class="mb-3">
                            <label for="adminEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="adminEmail" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="adminPassword" placeholder="Enter your password" required>
                        </div>
                        <div id="adminError"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="adminLoginBtn">Login</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <main class="d-flex justify-content-center align-items-center min-vh-100 pt-5">
        <div class="container">

            <div class="row g-4 justify-content-center">
                <!-- Individual Merchandise Items -->
                <div class="col-md-3">
                    <a href="merch-files/Chess.php" class="item">
                        <div class="placeholder"></div>
                        <img src="assets/images/chess/Chess-shirt.jpg" alt="Chess Shirt" class="img-fluid">
                        <div class="caption">Chess Shirt</div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="merch-files/csc2.php" class="item">
                        <div class="placeholder"></div>
                        <img src="assets/images/csc/CSC-shirt.jpg" alt="CSC Shirt" class="img-fluid">
                        <div class="caption">CSC Shirt</div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="merch-files/circuITs.php" class="item">
                        <div class="placeholder"></div>
                        <img src="assets/images/circuits/Circuits-shirt.jpg" alt="Circuits Shirt" class="img-fluid">
                        <div class="caption">CircuITs Shirt</div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="merch-files/Storm.php" class="item">
                        <div class="placeholder"></div>
                        <img src="assets/images/Storm/Storm-shirt2.jpg" alt="Storm Shirt" class="img-fluid">
                        <div class="caption">Storm Shirt</div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="merch-files/SymBIOsis.php" class="item">
                        <div class="placeholder"></div>
                        <img src="assets/images/Symbio/Symbio-lanyard.jpg" alt="Symbio Lanyard" class="img-fluid">
                        <div class="caption">Symbio Lanyard</div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="merch-files/ACCeSS.php" class="item">
                        <div class="placeholder"></div>
                        <img src="assets/images/ACCeSS/ACCeSS-shirt2.jpg" alt="ACCeSS Shirt" class="img-fluid">
                        <div class="caption">ACCeSS Shirt</div>
                    </a>
                </div>
            </div>
        </div>
    </main>


    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
</body>

</html>
