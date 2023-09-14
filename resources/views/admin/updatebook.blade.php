@include ('layouts.header')

<!-- Main container -->
<main class="full-box main-container">

    @include ('layouts.menu')

    <section class="full-box page-content">
        
        @include ('layouts.nav')
        
        <!-- Page header -->
        <div class="full-box page-header">
            <h3 class="text-left">
                <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; UPDATE BOOKS
            </h3>
        </div>
        <div class="container-fluid">
            <ul class="full-box list-unstyled page-nav-tabs">
                <li>
                    <a href="books"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; RETURN LIST</a>
                </li>
            </ul>
        </div>
        
        @include ('components.flash_alerts')
        
        <!--CONTENT-->
        <div class="container-fluid">
            <section id="editBook" >
                <!--CONTENT-->
                <div class="container-fluid">
                    <form method="post" class="form-neon needs-validation" autocomplete="off" id="formEditBook" enctype="multipart/form-data">
				    {{csrf_field()}}
                        <fieldset>
                            <legend><i class="far fa-edit"></i> &nbsp; Book information</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <input type="hidden" name="idBookEdit" id="idBookEdit" value="{{$dataBook[0]->id}}">
                                        <div class="form-group">
                                            <label for="txtNameEdit" class="bmd-label-floating">Name</label>
                                            <input type="text" class="form-control" name="txtNameEdit" id="txtNameEdit" maxlength="255" value="{{$dataBook[0]->name}}">
                                            <div class="invalid-feedback" id="invalid-nameEdit">
                                                Please choose a Name.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtPublishedDateEdit" class="bmd-label-floating">Published date</label>
                                            <input type="date" class="form-control" name="txtPublishedDateEdit" id="txtPublishedDateEdit" value="{{$dataBook[0]->published_date}}">
                                            <div class="invalid-feedback" id="invalid-publishedEdit">
                                                Please choose a Published Date.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtAuthorEdit" class="bmd-label-floating">Author</label>
                                            <input type="text" class="form-control" name="txtAuthorEdit" id="txtAuthorEdit" maxlength="255" value="{{$dataBook[0]->author}}">
                                            <div class="invalid-feedback" id="invalid-authorEdit">
                                                Please choose a Author.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtCategoryEdit" class="bmd-label-floating">Category(ies)</label>
                                            
                                            <input class="form-control" type='text'
                                            data-search-in='name'
                                            data-visible-properties='["name","description"]'
                                            data-selection-required='true'
                                            data-value-property='id'
                                            data-min-length='0'
                                            data-toggle-selected='true'
                                            id='txtCategoryEdit'
                                            multiple='multiple'
                                            name='txtCategoryEdit'>

                                            <div class="invalid-feedback" id="invalid-categoriesEdit">
                                                Please choose a Category(ies).
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br><br><br>
                        <p class="text-center" style="margin-top: 40px;">
                            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-arrow-alt-circle-left"></i> &nbsp; OLD VALUES</button>
                            &nbsp; &nbsp;
                            <button type="submit" class="btn btn-raised btn-info btn-sm" formaction="btnBookEdit" id="btnBookEdit"><i class="far fa-save"></i> &nbsp; SAVE</button>
                        </p>
                    </form>
                </div>
            </section>
            
        </div>
    </section>

</main>

<script>

</script>

@include ('layouts.footer')