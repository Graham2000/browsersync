window.addEventListener('DOMContentLoaded', () => {


    const bookmarks = document.querySelector('#bookmarks');
    const bookmarkItems = document.querySelectorAll('.bookmark-item');


    const addBookmarkButton = document.querySelector('#addBookmarkButton');

    addBookmarkButton.addEventListener('click', () => {
        console.log('Add Bookmark button clicked');
    });
});