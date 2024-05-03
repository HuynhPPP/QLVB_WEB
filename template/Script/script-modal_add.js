let open_modal_addVB = document.getElementById("open_modal_addVB");
let modal_container_addVB = document.getElementById("modal-container-addVB");
let confirm_addVB = document.getElementById("confirm_modal_addVB");
let close_icon_addVB = document.getElementById("close-icon-addVB");

open_modal_addVB.addEventListener("click", function() {
    modal_container_addVB.classList.add("show");
});

confirm_addVB.addEventListener("click", function() {
    modal_container_addVB.classList.remove("show");
});

close_icon_addVB.addEventListener("click", function() {
    modal_container_addVB.classList.remove("show");
});




