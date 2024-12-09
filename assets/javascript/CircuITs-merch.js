document.addEventListener("DOMContentLoaded", () => {
    const gridItems = document.querySelectorAll(".grid-item");
    const purchaseModal = new bootstrap.Modal(document.getElementById("purchaseModal"));
    const modalTitle = document.getElementById("purchaseModalLabel");

    gridItems.forEach(item => {
        item.addEventListener("click", () => {
            const productName = item.getAttribute("data-product-name");
            modalTitle.textContent = `Purchase ${productName}`;
            purchaseModal.show();
        });
    });
});
