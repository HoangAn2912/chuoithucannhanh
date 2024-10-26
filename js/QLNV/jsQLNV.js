function toggleForm() {  
    const form = document.getElementById('employeeForm');  
    const overlay = document.getElementById('overlay');  
    const isVisible = form.style.display === 'block';  
    form.style.display = isVisible ? 'none' : 'block';  
    overlay.style.display = isVisible ? 'none' : 'block';   
}

function toggleDetailForm() {  
    const detailForm = document.getElementById('employeeDetail');  
    const overlay = document.getElementById('overlayDetail');  
    const isVisible = detailForm.style.display === 'block';  
    detailForm.style.display = isVisible ? 'none' : 'block';  
    overlay.style.display = isVisible ? 'none' : 'block';  
}
