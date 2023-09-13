window.onload = function () {
    // Verifica si la URL actual coincide con la URL específica que deseas
    if (window.location.href === 'http://localhost/libraryexam/public/admin/books') {
        hideAddBook();
    }
};


function hideListBook(){
    document.getElementById('addBook').style.display = 'block';
    document.getElementById('listBook').style.display = 'none';
}

function hideAddBook(){
    document.getElementById('listBook').style.display = 'block';
    document.getElementById('addBook').style.display = 'none';
}