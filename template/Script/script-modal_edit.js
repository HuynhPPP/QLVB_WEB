let open_modal_editVBKHOA = document.getElementById("open_modal_editVBKHOA");
let modal_container_editVBKHOA = document.getElementById("modal-container-editVBKHOA");
let confirm_editVBKHOA = document.getElementById("confirm_modal_editVBKHOA");
let close_icon_editVBKHOA = document.getElementById("close-icon-editVBKHOA");

document.querySelectorAll(".open_modal_editVBKHOA").forEach(function(open_modal_editVBKHOA) {
    // Thêm sự kiện click cho mỗi phần tử
    open_modal_editVBKHOA.addEventListener("click", function() {
        
        modal_container_editVBKHOA.classList.add("show");
    });
});
confirm_editVBKHOA.addEventListener("click", function() {
    modal_container_editVBKHOA.classList.remove("show");
});

close_icon_editVBKHOA.addEventListener("click", function() {
    modal_container_editVBKHOA.classList.remove("show");
});




