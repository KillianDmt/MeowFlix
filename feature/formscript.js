
function showForm(formId) {
    // Hide all forms
    let forms = document.querySelectorAll('form');
    forms.forEach(function (form) {
        form.style.display = 'none';
    });

    // Show the selected form
    let selectedForm = document.getElementById(formId);
    if (selectedForm) {
        selectedForm.style.display = 'block';
    }

    // Update event listeners for all alternate-signin links
    let swapLinks = document.querySelectorAll(".alternate-signin a");
    swapLinks.forEach(addClick);
}

function addClick(link) {
    link.addEventListener('click', (event) => {
        event.preventDefault();  // Prevent default link behavior
        let formId = link.getAttribute('data-form-id');
        showForm(formId);
    });
}

// Function to get the 'form' query parameter
function getFormParam() {
    let params = new URLSearchParams(window.location.search);
    return params.get('form');
}

// Initialize event listeners for all alternate-signin links
document.addEventListener('DOMContentLoaded', () => {
    let swapLinks = document.querySelectorAll(".alternate-signin a");
    swapLinks.forEach(addClick);

    // Check the 'form' query parameter to determine which form to show
    let formParam = getFormParam();
    if (formParam === 'register') {
        showForm('form2');
    } else {
        showForm('form1');
    }
});