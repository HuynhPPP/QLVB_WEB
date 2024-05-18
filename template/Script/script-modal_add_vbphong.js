let open_modal_addVBPhong = document.getElementById("open_modal_addVBPhong");
let modal_container_addVBPhong = document.getElementById("modal-container-addVBPhong");
// let confirm_modal_addVBPhong = document.getElementById("confirm_modal_addVBPhong");
let close_icon_addVBPhong = document.getElementById("close-icon-addVBPhong");

open_modal_addVBPhong.addEventListener("click", function() {
    modal_container_addVBPhong.classList.add("show");
});

// confirm_modal_addVBPhong.addEventListener("click", function() {
//     modal_container_addVBPhong.classList.remove("show");
// });

close_icon_addVBPhong.addEventListener("click", function() {
    modal_container_addVBPhong.classList.remove("show");
});




