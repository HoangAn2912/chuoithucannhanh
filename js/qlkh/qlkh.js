let customers = [
    { id: 1, name: 'Khách hàng 1', address: 'Địa chỉ 1', email: 'email1@example.com', password: 'password1', phone: '0934xxxxxx' },
    { id: 2, name: 'Khách hàng 2', address: 'Địa chỉ 2', email: 'email2@example.com', password: 'password2', phone: '0934xxxxxx' },
    { id: 3, name: 'Khách hàng 3', address: 'Địa chỉ 3', email: 'email3@example.com', password: 'password3', phone: '0934xxxxxx' },
];

function renderTable() {
    const tableBody = document.querySelector('#customerTable tbody');
    tableBody.innerHTML = '';
    customers.forEach((customer, index) => {
        const row = `
            <tr>
                <td>${index + 1}</td>
                <td>${customer.name}</td>
                <td>${customer.address}</td>
                <td>${customer.email}</td>
                <td>********</td>
                <td>${customer.phone}</td>
                <td><button onclick="editCustomer(${customer.id})">Sửa</button></td>
            </tr>
        `;
        tableBody.innerHTML += row;
    });
}

function editCustomer(id) {
    const customer = customers.find(c => c.id === id);
    if (customer) {
        document.getElementById('editId').value = customer.id;
        document.getElementById('editName').value = customer.name;
        document.getElementById('editAddress').value = customer.address;
        document.getElementById('editEmail').value = customer.email;
        document.getElementById('editPassword').value = customer.password;
        document.getElementById('editPhone').value = customer.phone;
        document.getElementById('editForm').style.display = 'block';
        document.getElementById('successMessage').style.display = 'none';
    }
}

function cancelEdit() {
    document.getElementById('editForm').style.display = 'none';
    document.getElementById('successMessage').style.display = 'none';
    document.getElementById('customerForm').reset();
}

document.getElementById('customerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const id = parseInt(document.getElementById('editId').value);
    const name = document.getElementById('editName').value;
    const address = document.getElementById('editAddress').value;
    const email = document.getElementById('editEmail').value;
    const password = document.getElementById('editPassword').value;
    const phone = document.getElementById('editPhone').value;

    const index = customers.findIndex(c => c.id === id);
    if (index !== -1) {
        customers[index] = { id, name, address, email, password, phone };
        renderTable();
        document.getElementById('successMessage').style.display = 'block';
        setTimeout(() => {
            document.getElementById('successMessage').style.display = 'none';
            document.getElementById('editForm').style.display = 'none';
        }, 2000);
    }
});

// Initial render
renderTable();