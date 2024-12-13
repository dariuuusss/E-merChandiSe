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
                    <h1 class="m-0 fs-4">College of Science: CSC</h1>
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
            <div class="grid-item" data-product-name="CSC Shirt" data-product-price="P280">
                <img src="../assets/images/csc/CSC-shirt.jpg" alt="Product 1">
                <div class="title">CSC Shirt</div>
                <div class="price">P280</div>
            </div>
            <!-- Product 2 -->
            <div class="grid-item" data-product-name="CSC Sirong Syentista Shirt" data-product-price="P270">
                <img src="../assets/images/csc/CSC-shirt2.jpg" alt="Product 2">
                <div class="title">CSC Sirong Syentista Shirt</div>
                <div class="price">P270</div>
            </div>
            <!-- Product 3 -->
            <div class="grid-item" data-product-name="CSC Sticker" data-product-price="P10">
                <img src="../assets/images/csc/CSC-sticker.jpg" alt="Product 3">
                <div class="title">CSC-sticker</div>
                <div class="price">P10</div>
            </div>

            <!-- Product 4 -->
            <div class="grid-item" data-product-name="CSC Sticker 2" data-product-price="P10">
                <img src="../assets/images/csc/CSC-sticker2.jpg" alt="Product 3">
                <div class="title">CSC-sticker II</div>
                <div class="price">P10</div>
            </div>

            <!-- Product 5 -->
            <div class="grid-item" data-product-name="CSC Sticker 3" data-product-price="P10">
                <img src="../assets/images/csc/CSC-sticker3.jpg" alt="Product 3">
                <div class="title">CSC-sticker III</div>
                <div class="price">P10</div>
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
                    <!-- Form for purchase -->
                    <form id="purchaseForm" action="buy.php" method="post">
                        <input type="hidden" name="productName" id="productName" value="">
                        <input type="hidden" name="productSize" id="productSize" value=""> <!-- Hidden input for size -->
                        <input type="hidden" name="quantity" id="itemQuantityDisplay" value="0"> <!-- Hidden input for quantity -->
                        <div class="quantity-label">
                            <p>Quantity</p>
                        </div>
                        <div class="quantity-container">
                            <span class="minus" >&#x2212;</span>
                            <span class="quantity" id="itemQuantity">0</span>
                            <span class="plus" >&#x002B;</span>
                        </div>
                        <div class="sizes">
                            <div class="sizes-label">
                                <p>Sizes</p>
                            </div>
                            <span class="size" onclick="setSize('XS')">XS</span>
                            <span class="size" onclick="setSize('S')">S</span>
                            <span class="size" onclick="setSize('M')">M</span>
                            <span class="size" onclick="setSize('L')">L</span>
                            <span class="size" onclick="setSize('XL')">XL</span>
                            <span class="size" onclick="setSize('XXL')">XXL</span>
                        </div>
                        <div id="selectedSizeDisplay">Selected Size: None</div>
                        
                        <div class="modal-footer">
                        <div class="error-message" style="display: none;"></div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- Submit button -->
                            <button type="submit" class="btn btn-primary" form="purchaseForm">Add</button>
                        </div>
                    </form>
                </div>
                    
                </div>
            </div>
        </div>

    <!-- JS -->
    <script src="../assets/javascript/ACCeSS-merch.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
