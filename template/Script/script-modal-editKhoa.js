let open_modal_edit = document.getElementById("open_modal_editKhoa");
let modal_container_editKhoa = document.getElementById("modal-container-editKhoa");
let confirm_editKhoa = document.getElementById("confirm_modal_editKhoa");
let close_icon_editKhoa = document.getElementById("close-icon-editKhoa");

open_modal_edit.addEventListener("click", function() {
    modal_container_editKhoa.classList.add("show");
});

confirm_editKhoa.addEventListener("click", function() {
    modal_container_editKhoa.classList.remove("show");
});

close_icon_editKhoa.addEventListener("click", function() {
    modal_container_editKhoa.classList.remove("show");
});