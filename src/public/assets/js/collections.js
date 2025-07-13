document.addEventListener('DOMContentLoaded', () => {
    const addCollectionButton = document.querySelector('#addCollectionButton');

    if (addCollectionButton) {
        addCollectionButton.addEventListener('click', () => {
            console.log('Add Collection button clicked');
        });
    }

    const collections = document.querySelector('#collections');
    const collectionItems = document.querySelectorAll('.collection-item');

    if (collectionItems.length > 0) {
        collectionItems.forEach(item => {
            item.addEventListener('click', (event) => {
                if (event.target.closest('.delete-btn, form')) {
                    return;
                }
                window.location.href = '/collection/' + item.dataset.id;
            });
        });
    }

    const deleteButtons = document.querySelectorAll('.delete-btn');
    if (deleteButtons.length > 0) {
        deleteButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                event.stopPropagation();
                if (confirm('Are you sure you want to delete this collection?')) {
                    const form = button.closest('form');
                    if (form) {
                        form.submit();
                    }
                }
            });
        });
    }
});