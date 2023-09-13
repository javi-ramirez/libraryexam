window.onload = function () {

    //Hide alerts after 5 seconds
    setTimeout(function() {
        var alertElement = document.querySelector('.alert');
        alertElement.style.display = 'none';
    }, 5000);

    if ((window.location.href).substring(0, 47) === 'http://localhost/libraryexam/public/admin/books') {
        hideAddBook();
        resertDateToday('txtPublishedDate');
    }else if ((window.location.href).substring(0, 52) === 'http://localhost/libraryexam/public/admin/categories') {
        hideAddCategory();
    }else if ((window.location.href).substring(0, 47) === 'http://localhost/libraryexam/public/admin/loans') {
        hideAddLoans();
    }else if ((window.location.href).substring(0, 47) === 'http://localhost/libraryexam/public/admin/users') {
        hideAddUsers();
    }
};

function resertDateToday(input){
    var dateInput = document.getElementById(input);
    // Date format ISO yyyy-mm-dd
    var dateToday = new Date().toISOString().slice(0, 10);
    dateInput.value = dateToday;
}


/* Functions to show and hide sections */
function hideListBook(){
    document.getElementById('addBook').style.display = 'block';
    document.getElementById('listBook').style.display = 'none';

    $.ajax({
        url: 'getListCategories',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#txtCategory').flexdatalist({
                data: data,
                multiple: true,
            });
        },
        error: function() {
            console.log('Error in obtaining data.');
        }
    });
}

function hideAddBook(){
    document.getElementById('listBook').style.display = 'block';
    document.getElementById('addBook').style.display = 'none';
}

function hideListCategory(){
    document.getElementById('addCategory').style.display = 'block';
    document.getElementById('listCategory').style.display = 'none';
}

function hideAddCategory(){
    document.getElementById('listCategory').style.display = 'block';
    document.getElementById('addCategory').style.display = 'none';
}

function hideListLoans(){
    document.getElementById('addLoan').style.display = 'block';
    document.getElementById('listLoan').style.display = 'none';
}

function hideAddLoans(){
    document.getElementById('listLoan').style.display = 'block';
    document.getElementById('addLoan').style.display = 'none';
}

function hideListUsers(){
    document.getElementById('addUser').style.display = 'block';
    document.getElementById('listUser').style.display = 'none';
}

function hideAddUsers(){
    document.getElementById('listUser').style.display = 'block';
    document.getElementById('addUser').style.display = 'none';
}

/* Clean forms inputs  */
function cleanFormAddBook(){
    $('#txtName').val("");
    resertDateToday('txtPublishedDate');
    $('#txtAuthor').val("");
    $('#txtCategory').val("0");
}