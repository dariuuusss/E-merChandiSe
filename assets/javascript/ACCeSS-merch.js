document.addEventListener("DOMContentLoaded", () => {
    const gridItems = document.querySelectorAll(".grid-item");
    const purchaseModal = new bootstrap.Modal(document.getElementById("purchaseModal"));
    const modalTitle = document.getElementById("purchaseModalLabel");
    const num = document.querySelector(".quantity");

    gridItems.forEach(item => {
        item.addEventListener("click", () => {
            const productName = item.getAttribute("data-product-name");
            modalTitle.textContent = `Purchase ${productName}`;
            purchaseModal.show();
        });
    });
});

    // const plus = document.querySelector(".plus"),
    //     minus = document.querySelector(".minus"),
    //     num = document.querySelector(".quantity");

    //     let a = 0;

    //     plus.addEventListener("click", () => {
    //             a++;
    //             num.innerText = a;
    //     });

    //     minus.addEventListener("click", () => {
    //         if(a >= 1){
    //             a--;
    //             num.innerText = a;
    //         }
    //     });