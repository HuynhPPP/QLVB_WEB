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


$("#form-add-vbphong").validate({
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
        idphong:{
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
        idphong:{
            required: "Bạn chưa chọn phòng !",
        }
    },

    submitHandler: function(form) {
      form.submit();
    }
});


$("#form-edit-vbphong").validate({
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
        idphong:{
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
        idphong:{
            required: "Bạn chưa chọn phòng !",
        }
    },

    submitHandler: function(form) {
      form.submit();
    }
});