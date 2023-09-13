window.onload = function () {

    if ((window.location.href).substring(0, 47) === 'http://localhost/libraryexam/public/admin/books') {

        // Form Add Book
        const formAddBook = document.getElementById("formAddBook");
        const name = document.getElementById("txtName");
        const published_date = document.getElementById("txtPublishedDate");
        const author = document.getElementById("txtAuthor");
        const category = document.getElementById("txtCategory");
        const saveButton = document.getElementById("btnBookAdd");

        // Event click Add Book
        saveButton.addEventListener("click", function() {
            if (
                name.value.trim() === "" || 
                published_date.value.trim() === "" || 
                author.value.trim() === "" ||
                category.value.trim() === ""
            ) {
                alert("All fields are required. Please fill them out.");
            } else {
                formAddBook.submit();
            }
        });
        
    }else if ((window.location.href).substring(0, 52) === 'http://localhost/libraryexam/public/admin/categories') {
        hideAddCategory();
    }else if ((window.location.href).substring(0, 47) === 'http://localhost/libraryexam/public/admin/loans') {
        hideAddLoans();
    }else if ((window.location.href).substring(0, 47) === 'http://localhost/libraryexam/public/admin/users') {
        hideAddUsers();
    }
};

