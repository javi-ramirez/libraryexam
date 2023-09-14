window.onload = function () {

    //Hide alerts after 5 seconds
    setTimeout(function() {
        var alertElement = document.querySelector('.alert');
        alertElement.style.display = 'none';
    }, 5000);
};

function resertDateToday(input){
    var dateInput = document.getElementById(input);
    // Date format ISO yyyy-mm-dd
    var dateToday = new Date().toISOString().slice(0, 10);
    dateInput.value = dateToday;
}


/* Functions to show and hide sections */
function showAddBook(){
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

function showListBook(){
    document.getElementById('listBook').style.display = 'block';
    document.getElementById('addBook').style.display = 'none';
}

function showAddCategory(){
    document.getElementById('addCategory').style.display = 'block';
    document.getElementById('listCategory').style.display = 'none';
}

function showListCategory(){
    document.getElementById('listCategory').style.display = 'block';
    document.getElementById('addCategory').style.display = 'none';
}

function showAddLoan(){
    document.getElementById('addLoan').style.display = 'block';
    document.getElementById('listLoan').style.display = 'none';
    document.getElementById('returnLoan').style.display = 'none';
}

function showListLoan(){
    document.getElementById('listLoan').style.display = 'block';
    document.getElementById('addLoan').style.display = 'none';
    document.getElementById('returnLoan').style.display = 'none';
}

function showReturnLoan(){
    document.getElementById('returnLoan').style.display = 'block';
    document.getElementById('listLoan').style.display = 'none';
    document.getElementById('addLoan').style.display = 'none';
}

function showAddUser(){
    document.getElementById('addUser').style.display = 'block';
    document.getElementById('listUser').style.display = 'none';
}

function showListUser(){
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

function cleanFormAddUser(){
    $('#txtNameUser').val("");
    $('#txtEmailUser').val("");
    $('#txtPasswordUser').val("");
}

function cleanFormAddCategory(){
    $('#txtNameCategory').val("");
    $('#txtDescriptionCategory').val("");
}

function cleanFormAddLoan(){
    $('#txtBookLoan').val("0");

    $("#bookNotAvailable").css("display", "nose");
    $("#bookAvailable").css("display", "none");
                        
}