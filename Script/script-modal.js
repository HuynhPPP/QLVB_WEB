let open_modal = document.getElementById("open_modal");
let modal_container = document.getElementById("modal-container-2");
let confirm = document.getElementById("confirm_modal");
let close_icon = document.getElementById("close-icon");

open_modal.addEventListener("click", function() {
    modal_container.classList.add("show");
});

confirm.addEventListener("click", function() {
    modal_container.classList.remove("show");
});

close_icon.addEventListener("click", function() {
    modal_container.classList.remove("show");
});
