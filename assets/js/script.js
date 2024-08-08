


    document.addEventListener('DOMContentLoaded', function () {
        const items = document.querySelectorAll('.catalogue-item');
        const modal = document.getElementById('descriptionModal');
        const modalTitle = document.getElementById('modal-title');
        const modalDescription = document.getElementById('modal-description');
        const closeButton = document.querySelector('.close-button');
    
        items.forEach(item => {
            item.addEventListener('click', () => {
                const title = item.getAttribute('data-title');
                const description = item.getAttribute('data-description');
    
                modalTitle.textContent = title;
                modalDescription.textContent = description;
    
                modal.style.display = 'block';
            });
        });
    
        closeButton.addEventListener('click', () => {
            modal.style.display = 'none';
        });
    
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        })
    })
