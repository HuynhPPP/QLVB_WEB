let open_modal_addUser = document.getElementById("open_modal_addUser");
let modal_container_addUser = document.getElementById("modal-container-addUser");
// let confirm_addUser = document.getElementById("confirm_modal_addUser");
let close_icon_addUser = document.getElementById("close-icon-addUser");

open_modal_addUser.addEventListener("click", function() {
    modal_container_addUser.classList.add("show");
});

// confirm_addUser.addEventListener("click", function() {
//     modal_container_addUser.classList.remove("show");
// });

close_icon_addUser.addEventListener("click", function() {
    modal_container_addUser.classList.remove("show");
});