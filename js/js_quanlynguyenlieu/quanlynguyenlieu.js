$(document).ready(function() {
    function closeIngredient() {
        $("#ingredient").hide();
    }
    $(".close-btn").on("click", closeIngredient);

    const $form = $("#ingredientForm");
    const $submitButton = $form.find(".btn-update");
    let isValid = true;

    function updateSubmitButton() {
        $submitButton.prop('disabled', !isValid);
    }

    function CheckSupplierName() {
        const $input = $("#supplierName");
        const supplierName = $input.val().trim();
        const regex = /^[A-Za-zÀ-ỹ\s]+$/;
        
        $(".name-message").remove();

        if (supplierName === "") {
            const message = $('<div class="validation-message name-message">Vui lòng nhập tên nhà cung cấp!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } 
        else if (!regex.test(supplierName)) {
            const message = $('<div class="validation-message name-message">Tên nhà cung cấp phải là chữ cái!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        }else{
            isValid = true;
        }

        updateSubmitButton();
    }
    $("#supplierName").on("blur", CheckSupplierName);

    function CheckIngredientName() {
        const $input = $("#name");
        const IngredientName = $input.val().trim();
        const regex = /^[A-Za-zÀ-ỹ\s]+$/;
        
        $(".iname-message").remove();
        if (IngredientName === "") {
            const message = $('<div class="validation-message iname-message">Vui lòng nhập tên nguyên liệu!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } 
        else if (!regex.test(IngredientName)) {
            const message = $('<div class="validation-message iname-message">Tên nguyên liệu phải là chữ cái!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } else {
            isValid = true;
        }

        updateSubmitButton();
    }
    $("#name").on("blur", CheckIngredientName);

    function CheckUnit() {
        const $input = $("#unit");
        const unit = $input.val().trim();
        const regex =  /^[A-Za-zÀ-ỹ\s]+$/;
        
        $(".unit-message").remove();
        if (unit === "") {
            const message = $('<div class="validation-message unit-message">Vui lòng nhập tên nguyên liệu!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } 
        else if (!regex.test(unit)) {
            const message = $('<div class="validation-message unit-message">Đơn vị tính phải là chữ cái!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } else {
            isValid = true;
        }

        updateSubmitButton();
    }
    $("#unit").on("blur", CheckUnit);

    function CheckSupplierPhone() {
        const $input = $("#supplierPhone");
        const supplierPhone = $input.val().trim();
        const regex = /^0[0-9]{9,11}$/;
        
        $(".phone-message").remove();
        if (supplierPhone  === "") {
            const message = $('<div class="validation-message  phone-message">Vui lòng nhập số điện thoại nhà cung cấp!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } 
        else if (!regex.test(supplierPhone)) {
            const message = $('<div class="validation-message phone-message">Số điện thoại không hợp lệ!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } else {
            isValid = true;
        }

        updateSubmitButton();
    }
    $("#supplierPhone").on("blur", CheckSupplierPhone);

    function CheckPrice() {
        const $input = $("#price");
        const price = parseFloat($input.val());
        
        $(".price-message").remove();
        if (price  === "") {
            const message = $('<div class="validation-message  price-message">Vui lòng nhập giá nguyên liệu!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } 
        else if (isNaN(price) || price < 1000) {
            const message = $('<div class="validation-message price-message">Đơn giá tối thiểu phải từ nghìn đồng trở lên!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } else {
            isValid = true;
        }

        updateSubmitButton();
    }

    $("#price").on("blur", CheckPrice);

    function CheckEmail() {
        const $input = $("#supplierEmail");
        const supplierEmail = $input.val().trim();
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        $(".email-message").remove();
        if (supplierEmail  === "") {
            const message = $('<div class="validation-message  email-message">Vui lòng email nhà cung cấp!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } 
        else if (!regex.test(supplierEmail)) {
            const message = $('<div class="validation-message email-message">Email không hợp lệ!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } else {
            isValid = true;
        }

        updateSubmitButton();
    }
    $("#supplierEmail").on("blur", CheckEmail);
    
    $form.on("submit", function(e) {
        CheckEmail();
        CheckPrice();
        CheckSupplierName();
        CheckSupplierPhone();
        
        if (!isValid) {
            e.preventDefault();
        }
    });
});