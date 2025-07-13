document.addEventListener('DOMContentLoaded', () => {
    const addCollectionButton = document.querySelector('#addCollectionButton');

    addCollectionButton.addEventListener('click', () => {
        console.log('Add Collection button clicked');
    });

    const collections = document.querySelector('#collections');
    const collectionItems = document.querySelectorAll('.collection-item');

    collectionItems.forEach(item => {
        item.addEventListener('click', () => {
            window.location.href = '/collection/' + item.dataset.id;
        });
    });

});