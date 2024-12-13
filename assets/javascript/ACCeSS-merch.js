document.addEventListener("DOMContentLoaded", () => {
    const gridItems = document.querySelectorAll(".grid-item");
    const purchaseModal = new bootstrap.Modal(document.getElementById("purchaseModal"));
    const modalTitle = document.getElementById("purchaseModalLabel");
    const productNameInput = document.getElementById("productName");
    const errorElement = document.querySelector(".error-message");
    const plus = document.querySelector(".plus");
    const minus = document.querySelector(".minus");
    const itemQuantityInput = document.getElementById("itemQuantityDisplay");
    //const itemQuantityDisplay = document.getElementById("itemQuantityDisplay");
    //const num = document.querySelector(".quantity");
    const num = document.getElementById("itemQuantity");
    let quantity = 0; // Initialize quantity
    const RemoveSize = document.getElementById("selectedSizeDisplay");
    // Event listener for grid items
    gridItems.forEach(item => {
        item.addEventListener("click", () => {
            const productName = item.getAttribute("data-product-name");
            modalTitle.textContent = `Purchase ${productName}`;
            productNameInput.value = productName;

            clearErrorMessage();
            clearQuantity();
            clearSize();
            purchaseModal.show();
        });
    });

    // Clear error message
    function clearErrorMessage() {
        errorElement.textContent = ''; // Clear the text
        errorElement.style.display = 'none'; // Hide the error element
    }

    // Clear quantity display
    function clearQuantity() {
        quantity = 0; // Reset quantity variable
        updateQuantityDisplay(); // Update display
    }

    function clearSize(){
        RemoveSize.innerText = `Selected Size: none`;
    }

    // Update quantity display
    function updateQuantityDisplay() {
        num.innerText = quantity;
        itemQuantityInput.value = quantity; // Update hidden input
    }

    // Increase quantity
    plus.addEventListener("click", () => {
        quantity++;
        updateQuantityDisplay();
    });

    // Decrease quantity
    minus.addEventListener("click", () => {
        if (quantity > 0) {
            quantity--;
            updateQuantityDisplay();
        }
    });

    // Set product size
    window.setSize = function(size) {
        document.getElementById("productSize").value = size; // Set the size in hidden input
        // Optionally, you can also update the display to show the selected size
        const sizeDisplay = document.getElementById("selectedSizeDisplay"); // Assuming you have an element to show the selected size
        if (sizeDisplay) {
            sizeDisplay.innerText = `Selected Size: ${size}`;
        }
    };

    // Handle form submission
    document.getElementById('purchaseForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Create a FormData object to send the form data
        const formData = new FormData(this);

        // Send the data using fetch
        fetch('buy.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            errorElement.textContent = data;    
            errorElement.style.display = "block";
            if (data === "Item added to order!") {
                alert("Success!");
                // Optionally redirect or perform other actions
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});