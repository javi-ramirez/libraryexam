@include ('layouts.header')

<!-- Main container -->
<main class="full-box main-container">

    @include ('layouts.menu')

    <section class="full-box page-content">
        
        @include ('layouts.nav')

        <!-- Page header -->
        <div class="full-box page-header">
            <h3 class="text-left">
                <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; CATEGORIES
            </h3>
        </div>
        <div class="container-fluid">
            <ul class="full-box list-unstyled page-nav-tabs">
                <li>
                    <a onclick="showAddCategory()"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD CATEGORY</a>
                </li>
                <li>
                    <a onclick="showListCategory()"><class="active" href="item-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST</a>
                </li>
            </ul>
        </div>

        @include ('components.flash_alerts')
        
        <!--CONTENT-->
        <div class="container-fluid">
            <section id="listCategory">
                <div class="table-responsive">
                    <table class="table table-dark table-sm custom-table">
                        <thead>
                            <tr class="text-center roboto-medium">
                                <th>ID</th>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>UPDATE</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataCategories as $category)
                            
                            <tr class="text-center" >
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    <a href="item-update.html" class="btn btn-success">
                                        <i class="fas fa-sync-alt"></i> 
                                    </a>
                                </td>
                                <td>
                                    <form action="">
                                        <button type="button" class="btn btn-warning">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination justify-content-center"> 
                    {{ $dataCategories->links()}}
                </div>

                
            </section>
           
            <section id="addCategory">
                <!--CONTENT-->
                <div class="container-fluid">
                    <form method="post" class="form-neon needs-validation" autocomplete="off" id="formAddCategory" enctype="multipart/form-data">
				    {{csrf_field()}}
                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> &nbsp; Category information</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtNameCategory" class="bmd-label-floating">Name</label>
                                            <input type="text" class="form-control" name="txtNameCategory" id="txtNameCategory" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-nameCategory">
                                                Please choose a Name.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtDescriptionCategory" class="bmd-label-floating">Description</label>
                                            <input type="text" class="form-control" name="txtDescriptionCategory" id="txtDescriptionCategory" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-descriptionCategory">
                                                Please choose a Description.
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
                            <button type="submit" class="btn btn-raised btn-info btn-sm"  formaction="btnAddCategory" id="btnCategoryAdd"><i class="far fa-save"></i> &nbsp; SAVE</button>
                        </p>
                    </form>
                </div>
            </section>
            
        </div>
    </section>

</main>

@include ('layouts.footer')