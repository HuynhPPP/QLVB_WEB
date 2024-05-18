$("#form-add-vbphong").validate({
    rules:{
        tieude:{
            required: true
        },
        noidung:{
            required: true
        },
        idloaivb:{
            required: true
        },
        idphong:{
            required: true
        },
        ngayky:{
            required: true
        },
    },
    messages: {
        tieude:{
            required: "Bạn chưa nhập tiêu đề !",
        },
        noidung:{
            required: "Bạn chưa nhập nội dung !",
        },
        idloaivb:{
            required: "Bạn chưa chọn loại văn bản !",
        },
        idphong:{
            required: "Bạn chưa chọn phòng !",
        },
        ngayky:{
            required: "Bạn chưa chọn ngày đăng !",
        }
    },

    submitHandler: function(form) {
      form.submit();
    }
});


$("#form-edit-vbphong").validate({
    rules:{
        tieude:{
            required: true
        },
        noidung:{
            required: true
        },
        idloaivb:{
            required: true
        },
        idphong:{
            required: true
        },
        ngayky:{
            required: true
        },
    },
    messages: {
        tieude:{
            required: "Bạn chưa nhập tiêu đề !",
        },
        noidung:{
            required: "Bạn chưa nhập nội dung !",
        },
        idloaivb:{
            required: "Bạn chưa chọn loại văn bản !",
        },
        idphong:{
            required: "Bạn chưa chọn phòng !",
        },
        ngayky:{
            required: "Bạn chưa chọn ngày đăng !",
        }
    },

    submitHandler: function(form) {
      form.submit();
    }
});