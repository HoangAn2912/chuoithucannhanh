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
        
        if (!regex.test(supplierName)) {
            const message = $('<div class="validation-message name-message">Tên nhà cung cấp phải là chữ cái!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } else {
            isValid = true;
        }

        updateSubmitButton();
    }
    $("#supplierName").on("input blur", CheckSupplierName);

    function CheckSupplierPhone() {
        const $input = $("#supplierPhone");
        const supplierPhone = $input.val().trim();
        const regex = /^0[0-9]{9,11}$/;
        
        $(".phone-message").remove();
        
        if (!regex.test(supplierPhone)) {
            const message = $('<div class="validation-message phone-message">Số điện thoại không hợp lệ!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } else {
            isValid = true;
        }

        updateSubmitButton();
    }
    $("#supplierPhone").on("input blur", CheckSupplierPhone);

    function CheckPrice() {
        const $input = $("#price");
        const price = parseFloat($input.val());
        
        $(".price-message").remove();
        
        if (isNaN(price) || price < 1000) {
            const message = $('<div class="validation-message price-message">Đơn giá tối thiểu phải từ nghìn đồng trở lên!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } else {
            isValid = true;
        }

        updateSubmitButton();
    }

    $("#price").on("input blur", CheckPrice);

    function CheckEmail() {
        const $input = $("#supplierEmail");
        const supplierEmail = $input.val().trim();
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        $(".email-message").remove();
        
        if (!regex.test(supplierEmail)) {
            const message = $('<div class="validation-message email-message">Email không hợp lệ!</div>');
            $input.parent().append(message);
            message.fadeIn();
            isValid = false;
        } else {
            isValid = true;
        }

        updateSubmitButton();
    }
    $("#supplierEmail").on("input blur", CheckEmail);
    
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