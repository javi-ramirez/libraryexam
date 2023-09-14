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
                    <a href="categories"><class="active"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; RETURN LIST</a>
                </li>
            </ul>
        </div>

        @include ('components.flash_alerts')
        
        <!--CONTENT-->
        <div class="container-fluid">
           
            <section id="addCategory">
                <!--CONTENT-->
                <div class="container-fluid">
                    <form method="post" class="form-neon needs-validation" autocomplete="off" id="formEditCategory" enctype="multipart/form-data">
				    {{csrf_field()}}
                        <fieldset>
                            <legend><i class="far fa-edit"></i> &nbsp; Category information</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <input type="hidden" name="idCategoryEdit" id="idCategoryEdit" value="{{$dataCategories[0]->id}}">
                                        <div class="form-group">
                                            <label for="txtNameCategoryEdit" class="bmd-label-floating">Name</label>
                                            <input type="text" class="form-control" name="txtNameCategoryEdit" id="txtNameCategoryEdit" maxlength="255" value="{{$dataCategories[0]->name}}">
                                            <div class="invalid-feedback" id="invalid-nameCategoryEdit">
                                                Please choose a Name.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtDescriptionCategoryEdit" class="bmd-label-floating">Description</label>
                                            <input type="text" class="form-control" name="txtDescriptionCategoryEdit" id="txtDescriptionCategoryEdit" maxlength="255" value="{{$dataCategories[0]->description}}">
                                            <div class="invalid-feedback" id="invalid-descriptionCategoryEdit">
                                                Please choose a Description.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br><br><br>
                        <p class="text-center" style="margin-top: 40px;">
                            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; CLEAN</button>
                            &nbsp; &nbsp;
                            <button type="submit" class="btn btn-raised btn-info btn-sm"  formaction="btnCategoryEdit" id="btnCategoryEdit"><i class="far fa-save"></i> &nbsp; SAVE</button>
                        </p>
                    </form>
                </div>
            </section>
            
        </div>
    </section>

</main>

@include ('layouts.footer')