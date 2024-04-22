let open_modal_khoa = document.getElementById("open_modal_khoa");
let modal_container_addKhoa = document.getElementById("modal-container-addKhoa");
// let confirm_addKhoa = document.getElementById("confirm_modal_addKhoa");
let close_icon_addKhoa = document.getElementById("close-icon-addKhoa");

open_modal_khoa.addEventListener("click", function() {
    modal_container_addKhoa.classList.add("show");
});

// confirm_addKhoa.addEventListener("click", function() {
//     modal_container_addKhoa.classList.remove("show");
// });

close_icon_addKhoa.addEventListener("click", function() {
    modal_container_addKhoa.classList.remove("show");
});