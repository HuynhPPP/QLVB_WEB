let open_modal_edit_loaivb = document.getElementById("open_modal_editLoaiVB");
let modal_container_editloaivb = document.getElementById("modal-container-editLoaiVB");
let confirm_editloaivb = document.getElementById("confirm_modal_editLoaiVB");
let close_icon_editloaivb = document.getElementById("close-icon-editLoaiVB");

open_modal_edit_loaivb.addEventListener("click", function() {
    modal_container_editloaivb.classList.add("show");
});

confirm_editloaivb.addEventListener("click", function() {
    modal_container_editloaivb.classList.remove("show");
});

close_icon_editloaivb.addEventListener("click", function() {
    modal_container_editloaivb.classList.remove("show");
});