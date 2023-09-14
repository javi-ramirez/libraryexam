@include ('layouts.header')

<!-- Main container -->
<main class="full-box main-container">

    @include ('layouts.menu')

    <section class="full-box page-content">
        
        @include ('layouts.nav')
        
        <!-- Page header -->
        <div class="full-box page-header">
            <h3 class="text-left">
                <i class="fas fa-book fa-fw"></i> &nbsp; BOOKS
            </h3>
        </div>
        <div class="container-fluid">
            <ul class="full-box list-unstyled page-nav-tabs">
                <li>
                    <a onclick="showAddBook()"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD BOOK</a>
                </li>
                <li>
                    <a onclick="showListBook()"><class="active" href="item-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST</a>
                </li>
            </ul>
        </div>
        
        @include ('components.flash_alerts')
        
        <!--CONTENT-->
        <div class="container-fluid">
            <section id="listBook">
                <div class="table-responsive">
                    <table class="table table-dark table-sm custom-table">
                        <thead>
                            <tr class="text-center roboto-medium">
                                <th>ID</th>
                                <th>NAME</th>
                                <th>AUTHOR</th>
                                <th>CATEGORIES</th>
                                <th>PUBLISHED DATE</th>
                                <th>STATUS</th>
                                <th>USER</th>
                                <th>UPDATE</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataBooks as $book)
                            
                            <tr class="text-center" >
                                <td>{{$book->id}}</td>
                                <td>{{$book->name}}</td>
                                <td>{{$book->author}}</td>
                                <td>{{$book->categories}}</td>
                                <td>{{$book->published_date}}</td>
                                <td>{{$book->status}}</td>
                                <td>{{$book->user}}</td>
                                <td>
                                    <form method="post" autocomplete="off" id="formShowBook{{$book->id}}" enctype="multipart/form-data">
				                    {{csrf_field()}}
                                        <input type="hidden" name="idBookShow" value="{{$book->id}}">
                                        <button type="submit" class="btn btn-success" formaction="updatebook" id="btnBookShow{{$book->id}}"><i class="fas fa-sync-alt"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-warning delete-button" id="btnBookDelete{{$book->id}}" data-id="{{$book->id}}"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination justify-content-center"> 
                    {{ $dataBooks->links()}}
                </div>

                
            </section>
           
            <section id="addBook" >
                <!--CONTENT-->
                <div class="container-fluid">
                    <form method="post" class="form-neon needs-validation" autocomplete="off" id="formAddBook" enctype="multipart/form-data">
				    {{csrf_field()}}
                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> &nbsp; Book information</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtName" class="bmd-label-floating">Name</label>
                                            <input type="text" class="form-control" name="txtName" id="txtName" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-name">
                                                Please choose a Name.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtPublishedDate" class="bmd-label-floating">Published date</label>
                                            <input type="date" class="form-control" name="txtPublishedDate" id="txtPublishedDate">
                                            <div class="invalid-feedback" id="invalid-published">
                                                Please choose a Published Date.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtAuthor" class="bmd-label-floating">Author</label>
                                            <input type="text" class="form-control" name="txtAuthor" id="txtAuthor" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-author">
                                                Please choose a Author.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtCategory" class="bmd-label-floating">Category(ies)</label>
                                            <!--<select multiple class="form-control" name="txtCategory" id="txtCategory">
                                                <option value="0" selected="" disabled="">Select a category</option>
                                                @foreach ($dataCategories as $category)
                                                    <option value="{{$category->id}}" title="{{$category->desscription}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>-->
                                            
                                           <input class="form-control" type='text'
                                            data-search-in='name'
                                            data-visible-properties='["name","description"]'
                                            data-selection-required='true'
                                            data-value-property='id'
                                            data-min-length='0'
                                            data-toggle-selected='true'
                                            id='txtCategory'
                                            multiple='multiple'
                                            name='txtCategory'>
                                            <div class="invalid-feedback" id="invalid-categories">
                                                Please choose a Category(ies).
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br><br><br>
                        <p class="text-center" style="margin-top: 40px;">
                            <button type="reset" class="btn btn-raised btn-secondary btn-sm" onclick="cleanFormAddBook()"><i class="fas fa-paint-roller"></i> &nbsp; CLEAN</button>
                            &nbsp; &nbsp;
                            <button type="submit" class="btn btn-raised btn-info btn-sm" formaction="btnAddBook" id="btnBookAdd"><i class="far fa-save"></i> &nbsp; SAVE</button>
                        </p>
                    </form>
                </div>
            </section>
        </div>
    </section>

</main>

@include ('layouts.footer')