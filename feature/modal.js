// variables
const listItems = document.querySelectorAll('.item');
const closeBtn = document.querySelector('.close-modal');
const modal = document.querySelector('.modal');

// Add click event listener to each item
listItems.forEach(item => {
    item.addEventListener('click', (e) => {
        // Get the clicked item's data 
        const title = item.getAttribute('data-title');
        const author = item.getAttribute('data-author');
        const description = item.getAttribute('data-description');
        const videoUrl = item.getAttribute('data-video-url');

        // Update modal content
        document.querySelector('.modal .title').textContent = title;
        document.querySelector('.modal .author').textContent = author;
        document.querySelector('.modal .modal-descriptions p').textContent = description;
        document.querySelector('.modal .video-player').src = videoUrl;

        // thx to this I save the current title film into the hidden input that will be send by the form to the db
        document.querySelector('input[name="videotitle"]').value = title;
        // Show the modal
        modal.style.display = 'grid';
    });
});

// close button
closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});

