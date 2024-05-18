let open_modal_editVBPhong = document.getElementById("open_modal_editVBPhong");
let modal_container_editVBPhong = document.getElementById("modal-container-editVBPhong");
// let confirm_editVBPhong = document.getElementById("confirm_modal_editVBPhong");
let close_icon_editVBPhong = document.getElementById("close-icon-editVBPhong");

document.querySelectorAll(".open_modal_editVBPhong").forEach(function(open_modal_editVBPhong) {
    // Thêm sự kiện click cho mỗi phần tử
    open_modal_editVBPhong.addEventListener("click", function() {
        
        modal_container_editVBPhong.classList.add("show");
    });
});

// confirm_editVBPhong.addEventListener("click", function() {
//     modal_container_editVBPhong.classList.remove("show");
// });

close_icon_editVBPhong.addEventListener("click", function() {
    modal_container_editVBPhong.classList.remove("show");
});




