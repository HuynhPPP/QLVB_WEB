$("#formLogin_validation").validate({
    rules:{
        TaiKhoan:{
            required: true
        },
        MatKhau:{
            required: true
        }
    },
    messages: {
        TaiKhoan:{
            required: "Vui lòng không để trống !",
        },
        MatKhau:{
            required: "Vui lòng không để trống !",
        }
    },

    submitHandler: function(form) {
      form.submit();
    }
   });