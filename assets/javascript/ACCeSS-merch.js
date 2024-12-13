document.addEventListener("DOMContentLoaded", () => {
    const gridItems = document.querySelectorAll(".grid-item");
    const purchaseModal = new bootstrap.Modal(document.getElementById("purchaseModal"));
    const modalTitle = document.getElementById("purchaseModalLabel");
    const num = document.querySelector(".quantity");
    const productNameInput = document.getElementById("productName");

    gridItems.forEach(item => {
        item.addEventListener("click", () => {
            
            const productName = item.getAttribute("data-product-name");
            modalTitle.textContent = `Purchase ${productName}`;
            productNameInput.value = productName;

            clearErrorMessage();

            purchaseModal.show();
            
        });
    });
});
let quantity = 0;
const errorElement = document.querySelector(".error-message");

function clearErrorMessage() {
    errorElement.textContent = ''; // Clear the text
    errorElement.style.display = 'none'; // Hide the error element
}


    const plus = document.querySelector(".plus"),
   minus = document.querySelector(".minus"),
   num = document.querySelector(".quantity"),
   itemQuantityInput = document.getElementById("itemQuantity"),
   itemQuantityDisplay = document.getElementById("itemQuantityDisplay");

   plus.addEventListener("click", () => {
       quantity++;
       num.innerText = quantity;
       itemQuantityInput.value = quantity; // Update hidden input
       itemQuantityDisplay.innerText = quantity; // Update display
   });

   minus.addEventListener("click", () => {
       if (quantity >= 1) {
           quantity--;
           num.innerText = quantity;
           itemQuantityInput.value = quantity; // Update hidden input
           itemQuantityDisplay.innerText = quantity; // Update display
       }
   });

   function setSize(size) {
       document.getElementById("productSize").value = size; // Set the size in hidden input
   }   

   let isRegistered = false;
// Assuming you have a function to handle the form submission
document.getElementById('purchaseForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Create a FormData object to send the form data
    var formData = new FormData(this);

    
        const goback = document.getElementById("submit");
        // Send the data using fetch
        fetch('buy.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data === 'Item Successfully Purchased!') {
                errorElement.textContent = data;    
                errorElement.style.display = "block";
                goback.textContent = "Return to Log In page.";
                // Optionally redirect or perform other actions
            } else {
                // Handle error messages
                errorElement.textContent = data;
                errorElement.style.display = "block";
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while processing your request: ' + error.message);
        });
    
});