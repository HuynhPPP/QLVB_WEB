$("#form_add_vbkhoa").validate({
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
        idkhoa:{
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
        idkhoa:{
            required: "Bạn chưa chọn khoa !",
        },
        ngayky:{
            required: "Bạn chưa chọn ngày đăng !",
        }
    },

    submitHandler: function(form) {
      form.submit();
    }
});


$("#form_edit_vbkhoa").validate({
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
        idkhoa:{
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
        idkhoa:{
            required: "Bạn chưa chọn khoa !",
        },
        ngayky:{
            required: "Bạn chưa chọn ngày đăng !",
        }
    },

    submitHandler: function(form) {
      form.submit();
    }
});