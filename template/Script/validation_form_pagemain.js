$("#form-add-khoa").validate({
    rules:{
        tenkhoa:{
            required: true
        }
        
    },
    messages: {
        tenkhoa:{
            required: "Bạn chưa nhập tên khoa !",
        }
        
    },

    submitHandler: function(form) {
      form.submit();
    }
});


$("#form-add-loaivb").validate({
    rules:{
        loaivanban:{
            required: true
        }
    },
    messages: {
        loaivanban:{
            required: "Bạn chưa nhập loại văn bản !",
        }
    },

    submitHandler: function(form) {
      form.submit();
    }
});