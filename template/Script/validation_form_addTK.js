$("#form_add_account").validate({
    rules:{
        taikhoan:{
            required: true
        },
        matkhau:{
            required: true
        },
        mail:{
            required: true
        },
        loaitaikhoan:{
            required: true
        },
        idkhoa:{
            required: true
        },
    },
    messages: {
        taikhoan:{
            required: "Bạn chưa nhập tài khoản !",
        },
        matkhau:{
            required: "Bạn chưa nhập mật khẩu !",
        },
        mail:{
            required: "Bạn chưa nhập mail !",
        },
        loaitaikhoan:{
            required: "Vui lòng chọn quyền !",
        },
        idkhoa:{
            required: "Vui lòng chọn khoa !",
        }
    },

    submitHandler: function(form) {
      form.submit();
    }
});

$("#form_edit_account").validate({
    rules:{
        taikhoan:{
            required: true
        },
        matkhau:{
            required: true
        },
        mail:{
            required: true
        },
        loaitaikhoan:{
            required: true
        },
        idkhoa:{
            required: true
        },
    },
    messages: {
        taikhoan:{
            required: "Bạn chưa nhập tài khoản !",
        },
        matkhau:{
            required: "Bạn chưa nhập mật khẩu !",
        },
        mail:{
            required: "Bạn chưa nhập mail !",
        },
        loaitaikhoan:{
            required: "Vui lòng chọn quyền !",
        },
        idkhoa:{
            required: "Vui lòng chọn khoa !",
        }
    },

    submitHandler: function(form) {
      form.submit();
    }
});
