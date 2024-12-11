document.querySelector("#register-log").addEventListener("click", function () {
    console.log("Opening modal...");
    document.querySelector(".modal-register").classList.add("active");
    document.getElementById("container").style.filter = "blur(5px)";
});

document.querySelector(".modal-register .close-btn").addEventListener("click", function () {
    console.log("Closing modal...");
    document.querySelector(".modal-register").classList.remove("active");
    document.getElementById("container").style.filter = "none";
});
