$.validator.addMethod("noMultipleSpaces", function(value, element) {
    return this.optional(element) || !/\s{2,}/.test(value);
}, "Không được chứa nhiều hơn một khoảng trắng liên tiếp.");

$.validator.addMethod("checkmail", function(value, element) {
    return this.optional(element) ||  /^(([^<>()[\]\\.,;:\s@\"]{2,})|(\".+\"))@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value);
}, "");



$("#formLogin_validation").validate({
    rules:{
        TaiKhoan:{
            required: true,
            noMultipleSpaces: true
        },
        MatKhau:{
            required: true
        }
    },
    messages: {
        TaiKhoan:{
            required: "Vui lòng không để trống !",
            noMultipleSpaces: "Không được chứa khoảng trắng !",
        },
        MatKhau:{
            required: "Vui lòng không để trống !",
        }
    },

    submitHandler: function(form) {
      form.submit();
    }
   });


$("#form_enterMail").validate({
rules:{
    mail:{
        checkmail: true,
        noMultipleSpaces: true
    }
},
messages: {
    mail:{
        checkmail: "Mail không đúng định dạng !",
        noMultipleSpaces: "Hãy nhập mail hợp lệ !"
        
    }
},

submitHandler: function(form) {
    form.submit();
}
});