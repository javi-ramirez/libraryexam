window.onload = function () {

    if ((window.location.href).substring(0, 47) === 'http://localhost/libraryexam/public/admin/books') {
        showListBook();
        resertDateToday('txtPublishedDate');

        // Form Add Book
        const formAddBook = document.getElementById("formAddBook");
        const name = document.getElementById("txtName");
        const published_date = document.getElementById("txtPublishedDate");
        const author = document.getElementById("txtAuthor");
        const category = document.getElementById("txtCategory");
        const saveButton = document.getElementById("btnBookAdd");

        // Event click Add Book
        formAddBook.addEventListener("submit", function(event) {
            if (
                name.value.trim() === "" || 
                published_date.value.trim() === "" || 
                author.value.trim() === "" ||
                category.value.trim() === ""
            ) {
                event.preventDefault(); //Prevents the form from being submitted if the fields are not complete

                if (!name.value) {
                    $("#invalid-name").css("display", "block");
                    $("#txtName").addClass("is-invalid");
                } else {
                    $("#invalid-name").css("display", "none");
                    $("#txtName").removeClass("is-invalid");
                }
        
                if (!published_date.value) {
                    $("#invalid-published").css("display", "block");
                    $("#txtPublishedDate").addClass("is-invalid");
                } else {
                    $("#invalid-published").css("display", "none");
                    $("#txtPublishedDate").removeClass("is-invalid");
                }

                if (!author.value) {
                    $("#invalid-author").css("display", "block");
                    $("#txtAuthor").addClass("is-invalid");
                } else {
                    $("#invalid-author").css("display", "none");
                    $("#txtAuthor").removeClass("is-invalid");
                }

                if (!category.value) {
                    $("#invalid-categories").css("display", "block");
                    $("#txtCategory").addClass("is-invalid");
                } else {
                    $("#invalid-categories").css("display", "none");
                    $("#txtCategory").removeClass("is-invalid");
                }
            }
        });

        name.addEventListener("change", function(event) {
            if (!name.value) {
                $("#invalid-name").css("display", "block");
                $("#txtName").addClass("is-invalid");
            } else {
                $("#invalid-name").css("display", "none");
                $("#txtName").removeClass("is-invalid");
            }
        });

        published_date.addEventListener("change", function(event) {
            if (!published_date.value) {
                $("#invalid-published").css("display", "block");
                $("#txtPublishedDate").addClass("is-invalid");
            } else {
                $("#invalid-published").css("display", "none");
                $("#txtPublishedDate").removeClass("is-invalid");
            }
        });

        author.addEventListener("change", function(event) {
            if (!author.value) {
                $("#invalid-author").css("display", "block");
                $("#txtAuthor").addClass("is-invalid");
            } else {
                $("#invalid-author").css("display", "none");
                $("#txtAuthor").removeClass("is-invalid");
            }
        });

        category.addEventListener("change", function(event) {
            if (!category.value) {
                $("#invalid-categories").css("display", "block");
                $("#txtCategory").addClass("is-invalid");
            } else {
                $("#invalid-categories").css("display", "none");
                $("#txtCategory").removeClass("is-invalid");
            }
        });
    
        
    }else if ((window.location.href).substring(0, 52) === 'http://localhost/libraryexam/public/admin/categories') {
        showListCategory();

        // Form Add Category
        const formAddCategory = document.getElementById("formAddCategory");
        const name = document.getElementById("txtNameCategory");
        const description = document.getElementById("txtDescriptionCategory");

        // Event click Add Category
        formAddCategory.addEventListener("submit", function(event) {
            if (
                name.value.trim() === "" || 
                description.value.trim() === "" 
            ) {
                event.preventDefault(); //Prevents the form from being submitted if the fields are not complete

                if (!name.value) {
                    $("#invalid-nameCategory").css("display", "block");
                    $("#txtNameCategory").addClass("is-invalid");
                } else {
                    $("#invalid-nameCategory").css("display", "none");
                    $("#txtNameCategory").removeClass("is-invalid");
                }
        
                if (!description.value) {
                    $("#invalid-descriptionCategory").css("display", "block");
                    $("#txtDescriptionCategory").addClass("is-invalid");
                } else {
                    $("#invalid-descriptionCategory").css("display", "none");
                    $("#txtDescriptionCategory").removeClass("is-invalid");
                }
            }
        });

        name.addEventListener("change", function(event) {
            if (!name.value) {
                $("#invalid-nameCategory").css("display", "block");
                $("#txtNameCategory").addClass("is-invalid");
            } else {
                $("#invalid-nameCategory").css("display", "none");
                $("#txtNameCategory").removeClass("is-invalid");
            }
        });

        description.addEventListener("change", function(event) {
            if (!description.value) {
                $("#invalid-descriptionCategory").css("display", "block");
                $("#txtDescriptionCategory").addClass("is-invalid");
            } else {
                $("#invalid-descriptionCategory").css("display", "none");
                $("#txtDescriptionCategory").removeClass("is-invalid");
            }
        });

    }else if ((window.location.href).substring(0, 47) === 'http://localhost/libraryexam/public/admin/loans') {
        showListLoan();
    }else if ((window.location.href).substring(0, 47) === 'http://localhost/libraryexam/public/admin/users') {
        showListUser();

        // Form Add User
        const formAddUser = document.getElementById("formAddUser");
        const name = document.getElementById("txtNameUser");
        const email = document.getElementById("txtEmailUser");
        const password = document.getElementById("txtPasswordUser");

        // Event click Add User
        formAddUser.addEventListener("submit", function(event) {
            if (
                name.value.trim() === "" || 
                email.value.trim() === "" || 
                password.value.trim() === "" 
            ) {
                event.preventDefault(); //Prevents the form from being submitted if the fields are not complete

                if (!name.value) {
                    $("#invalid-nameUser").css("display", "block");
                    $("#txtNameUser").addClass("is-invalid");
                } else {
                    $("#invalid-nameUser").css("display", "none");
                    $("#txtNameUser").removeClass("is-invalid");
                }
        
                if (!email.value) {
                    $("#invalid-emailUser").css("display", "block");
                    $("#txtEmailUser").addClass("is-invalid");
                } else {
                    $("#invalid-emailUser").css("display", "none");
                    $("#txtEmailUser").removeClass("is-invalid");
                }

                if (!password.value) {
                    $("#invalid-passwordUser").css("display", "block");
                    $("#txtPasswordUser").addClass("is-invalid");
                } else {
                    $("#invalid-passwordUser").css("display", "none");
                    $("#txtPasswordUser").removeClass("is-invalid");
                }
            }
        });

        name.addEventListener("change", function(event) {
            if (!name.value) {
                $("#invalid-nameUser").css("display", "block");
                $("#txtNameUser").addClass("is-invalid");
            } else {
                $("#invalid-nameUser").css("display", "none");
                $("#txtNameUser").removeClass("is-invalid");
            }
        });

        email.addEventListener("change", function(event) {
            if (!email.value) {
                $("#invalid-emailUser").css("display", "block");
                $("#txtEmailUser").addClass("is-invalid");
            } else {
                $("#invalid-emailUser").css("display", "none");
                $("#txtEmailUser").removeClass("is-invalid");
            }
        });

        password.addEventListener("change", function(event) {
            if (!password.value) {
                $("#invalid-passwordUser").css("display", "block");
                $("#txtPasswordUser").addClass("is-invalid");
            } else {
                $("#invalid-passwordUser").css("display", "none");
                $("#txtPasswordUser").removeClass("is-invalid");
            }
        });

    }else if ((window.location.href).substring(0, 52) === 'http://localhost/libraryexam/public/admin/updatebook') {
        $.ajax({
            url: 'getListCategories',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#txtCategoryEdit').flexdatalist({
                    data: data,
                    multiple: true,
                });

            },
            error: function() {
                console.log('Error in obtaining data.');
            }
        });

        // Form Edit Book
        const formEditBook = document.getElementById("formEditBook");
        const name = document.getElementById("txtNameEdit");
        const published_date = document.getElementById("txtPublishedDateEdit");
        const author = document.getElementById("txtAuthorEdit");
        const category = document.getElementById("txtCategoryEdit");

        // Event click Edit Book
        formEditBook.addEventListener("submit", function(event) {
            if (
                name.value.trim() === "" || 
                published_date.value.trim() === "" || 
                author.value.trim() === "" ||
                category.value.trim() === ""
            ) {
                event.preventDefault(); //Prevents the form from being submitted if the fields are not complete

                if (!name.value) {
                    $("#invalid-nameEdit").css("display", "block");
                    $("#txtNameEdit").addClass("is-invalid");
                } else {
                    $("#invalid-nameEdit").css("display", "none");
                    $("#txtNameEdit").removeClass("is-invalid");
                }
        
                if (!published_date.value) {
                    $("#invalid-publishedEdit").css("display", "block");
                    $("#txtPublishedDateEdit").addClass("is-invalid");
                } else {
                    $("#invalid-publishedEdit").css("display", "none");
                    $("#txtPublishedDateEdit").removeClass("is-invalid");
                }

                if (!author.value) {
                    $("#invalid-authorEdit").css("display", "block");
                    $("#txtAuthorEdit").addClass("is-invalid");
                } else {
                    $("#invalid-authorEdit").css("display", "none");
                    $("#txtAuthorEdit").removeClass("is-invalid");
                }

                if (!category.value) {
                    $("#invalid-categoriesEdit").css("display", "block");
                    $("#txtCategoryEdit").addClass("is-invalid");
                } else {
                    $("#invalid-categoriesEdit").css("display", "none");
                    $("#txtCategoryEdit").removeClass("is-invalid");
                }
            }
        });

        name.addEventListener("change", function(event) {
            if (!name.value) {
                $("#invalid-nameEdit").css("display", "block");
                $("#txtNameEdit").addClass("is-invalid");
            } else {
                $("#invalid-nameEdit").css("display", "none");
                $("#txtNameEdit").removeClass("is-invalid");
            }
        });

        published_date.addEventListener("change", function(event) {
            if (!published_date.value) {
                $("#invalid-publishedEdit").css("display", "block");
                $("#txtPublishedDateEdit").addClass("is-invalid");
            } else {
                $("#invalid-publishedEdit").css("display", "none");
                $("#txtPublishedDateEdit").removeClass("is-invalid");
            }
        });

        author.addEventListener("change", function(event) {
            if (!author.value) {
                $("#invalid-authorEdit").css("display", "block");
                $("#txtAuthorEdit").addClass("is-invalid");
            } else {
                $("#invalid-authorEdit").css("display", "none");
                $("#txtAuthorEdit").removeClass("is-invalid");
            }
        });

        category.addEventListener("change", function(event) {
            if (!category.value) {
                $("#invalid-categoriesEdit").css("display", "block");
                $("#txtCategoryEdit").addClass("is-invalid");
            } else {
                $("#invalid-categoriesEdit").css("display", "none");
                $("#txtCategoryEdit").removeClass("is-invalid");
            }
        });
    }
};

