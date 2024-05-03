let open_modal_loaiVB = document.getElementById("open_modal_loaiVB");
let modal_container_loaiVB = document.getElementById("modal-container-loaiVB");

let close_icon_addLoaiVB = document.getElementById("close-icon-addLoaiVB");

open_modal_loaiVB.addEventListener("click", function() {
    modal_container_loaiVB.classList.add("show");
});



close_icon_addLoaiVB.addEventListener("click", function() {
    modal_container_loaiVB.classList.remove("show");
});
