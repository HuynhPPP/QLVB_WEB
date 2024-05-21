
// Khởi tạo form validation
$("#form-send-mail").validate({
    rules: {
        "mail": {
            required: true
        },
        tieude: {
            required: true
        },
        noidung: {
            required: true
        }
    },
    messages: {
        "mail": {
            required: "Bạn chưa chọn mail !"
        },
        tieude: {
            required: "Bạn chưa nhập tiêu đề !"
        },
        noidung: {
            required: "Bạn chưa nhập nội dung !"
        }
    },
    submitHandler: function(form) {
        form.submit();
    }
});


