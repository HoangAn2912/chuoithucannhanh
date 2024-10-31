let totalAmount = 0;  
const orderItems = {};  

function addToOrder(itemName, itemPrice) {  
    if (!orderItems[itemName]) {  
        orderItems[itemName] = { price: itemPrice, quantity: 1 };  
    } else {  
        orderItems[itemName].quantity += 1;  
    }  
    
    totalAmount += itemPrice;  
    updateOrderList();  
}  

function updateOrderList() {  
    const orderList = document.getElementById('order-list');  
    orderList.innerHTML = '';  

    for (const item in orderItems) {  
        const { price, quantity } = orderItems[item];  
        const listItem = document.createElement('div');  
        listItem.innerHTML = `${item} - ${price}đ x ${quantity} <button onclick="removeFromOrder('${item}')">-</button>`;  
        orderList.appendChild(listItem);  
    }  

    document.getElementById('total-price').textContent = totalAmount;  
}  

function removeFromOrder(itemName) {  
    if (orderItems[itemName]) {  
        totalAmount -= orderItems[itemName].price;  
        orderItems[itemName].quantity -= 1;  

        if (orderItems[itemName].quantity <= 0) {  
            delete orderItems[itemName];  
        }  

        updateOrderList();  
    }  
}  

function processOrder() {  
    if (totalAmount === 0) {  
        alert("Vui lòng chọn món ăn trước khi thanh toán!");  
    } else {  
        alert("Đơn hàng đã được thanh toán. Tổng tiền: " + totalAmount + "đ");  
        // Reset order  
        totalAmount = 0;  
        for (const item in orderItems) {  
            delete orderItems[item];  
        }  
        updateOrderList();  
    }  
}