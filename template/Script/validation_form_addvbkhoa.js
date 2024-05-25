$.validator.addMethod("noMultipleSpaces", function(value, element) {
    return this.optional(element) || !/\s{2,}/.test(value);
}, "Không được chứa nhiều hơn một khoảng trắng liên tiếp.");

$.validator.addMethod("normalText", function(value, element) {
    return this.optional(element) || /^[a-zA-Z0-9\s.,!?'"ÀÁẢÃẠĂẰẮẲẴẶÂẦẤẨẪẬĐÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴàáảãạăằắẳẵặâầấẩẫậđèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵ]*$/

    .test(value);
}, "Chỉ chấp nhận văn bản bình thường (không chứa ký tự đặc biệt hoặc dấu xuống dòng).");

$.validator.addMethod("firstCharAlphanumeric", function(value, element) {
    return this.optional(element) || /^[a-zA-Z0-9À-ỹ]/
    .test(value);
}, "Ký tự đầu tiên phải là chữ cái hoặc số.");



$("#form_add_vbkhoa").validate({
    rules:{
        tieude:{
            required: true,
            normalText: true,
            noMultipleSpaces: true,
            firstCharAlphanumeric: true
        },
        noidung:{
            required: true,  
            noMultipleSpaces: true,
            firstCharAlphanumeric: true
        },
        idloaivb:{
            required: true
        },
        idkhoa:{
            required: true
        }
    },
    messages: {
        tieude:{
            required: "Bạn chưa nhập tiêu đề !",
            normalText: "Tiêu đề không được chứa các kí tự đặc biệt !",
            noMultipleSpaces: "Tiêu đề không được chứa nhiều hơn một khoảng trắng liên tiếp !",
            firstCharAlphanumeric: "Ký tự đầu tiên của tiêu đề phải là chữ cái hoặc số."
        },
        noidung:{
            required: "Bạn chưa nhập nội dung !",
            noMultipleSpaces: "Nội dung không được chứa nhiều hơn một khoảng trắng liên tiếp !"
        },
        idloaivb:{
            required: "Bạn chưa chọn loại văn bản !",
        },
        idkhoa:{
            required: "Bạn chưa chọn khoa !",
        }
    },

    submitHandler: function(form) {
      form.submit();
    }
});



$("#form_edit_vbkhoa").validate({
    rules:{
        tieude:{
            required: true,
            normalText: true,
            noMultipleSpaces: true,
            firstCharAlphanumeric: true
        },
        noidung:{
            required: true,  
            noMultipleSpaces: true,
            firstCharAlphanumeric: true
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
            normalText: "Tiêu đề không được chứa các kí tự đặc biệt !",
            noMultipleSpaces: "Tiêu đề không được chứa nhiều hơn một khoảng trắng liên tiếp !",
            firstCharAlphanumeric: "Ký tự đầu tiên của tiêu đề phải là chữ cái hoặc số."
        },
        noidung:{
            required: "Bạn chưa nhập nội dung !",
            noMultipleSpaces: "Nội dung không được chứa nhiều hơn một khoảng trắng liên tiếp !"
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