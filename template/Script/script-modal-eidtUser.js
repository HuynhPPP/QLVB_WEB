let open_modal_editUser = document.getElementById("open_modal_editUser");
let modal_container_editUser = document.getElementById("modal-container-editUser");
// let confirm_editUser = document.getElementById("confirm_modal_editUser");
let close_icon_editUser = document.getElementById("close-icon-editUser");

document.querySelectorAll(".open_modal_editUser").forEach(function(open_modal_editUser) {
    // Thêm sự kiện click cho mỗi phần tử
    open_modal_editUser.addEventListener("click", function() {
        
        modal_container_editUser.classList.add("show");
    });
});

// confirm_editUser.addEventListener("click", function() {
//     modal_container_editUser.classList.remove("show");
// });

close_icon_editUser.addEventListener("click", function() {
    modal_container_editUser.classList.remove("show");
});