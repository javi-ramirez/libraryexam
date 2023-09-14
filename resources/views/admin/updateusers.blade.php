@include ('layouts.header')

<!-- Main container -->
<main class="full-box main-container">

    @include ('layouts.menu')

    <section class="full-box page-content">
        
        @include ('layouts.nav')

        <!-- Page header -->
        <div class="full-box page-header">
            <h3 class="text-left">
                <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; {{$dataUser[0]->name}}
            </h3>
        </div>
        <div class="container-fluid">
            <ul class="full-box list-unstyled page-nav-tabs">
                <li>
                    <a href="dashboard"><class="active"><i class="fas fa-home fa-fw"></i> &nbsp; DASHBOARD</a>
                </li>
            </ul>
        </div>

        @include ('components.flash_alerts')
        
        <!--CONTENT-->
        <div class="container-fluid">
           
            <section id="addUser">
                <!--CONTENT-->
                <div class="container-fluid">
                    <form method="post" class="form-neon needs-validation" autocomplete="off" id="formEditUser" enctype="multipart/form-data">
				    {{csrf_field()}}
                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> &nbsp; Account information</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <input type="hidden" name="idUserEdit" id="idUserEdit" value="{{$dataUser[0]->id}}"> 
                                        <div class="form-group">
                                            <label for="txtNameUserEdit" class="bmd-label-floating">Name</label>
                                            <input type="text" class="form-control" name="txtNameUserEdit" id="txtNameUserEdit" maxlength="255" value="{{$dataUser[0]->name}}">
                                            <div class="invalid-feedback" id="invalid-nameUserEdit">
                                                Please choose a Name.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtEmailUserEdit" class="bmd-label-floating">Email</label>
                                            <input type="text" class="form-control" name="txtEmailUserEdit" id="txtEmailUserEdit" maxlength="255" value="{{$dataUser[0]->email}}">
                                            <div class="invalid-feedback" id="invalid-emailUserEdit">
                                                Please choose a Email.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtPasswordUserEdit" class="bmd-label-floating">Current password</label>
                                            <input type="password" class="form-control" name="txtPasswordUserEdit" id="txtPasswordUserEdit" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-passwordUserEdit">
                                                Please choose a Current password.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtNewPasswordUserEdit" class="bmd-label-floating">New password</label>
                                            <input type="password" class="form-control" name="txtNewPasswordUserEdit" id="txtNewPasswordUserEdit" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-newpasswordUserEdit">
                                                Please choose a New password.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br><br><br>
                        <p class="text-center" style="margin-top: 40px;">
                            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; OLD VALUES</button>
                            &nbsp; &nbsp;
                            <button type="submit" class="btn btn-raised btn-info btn-sm" formaction="btnEditUser" id="btnUserEdit"><i class="far fa-save"></i> &nbsp; SAVE</button>
                        </p>
                    </form>
                </div>
            </section>
        </div>
    </section>
</main>

@include ('layouts.footer')