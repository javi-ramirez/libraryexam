<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Main container -->
<main class="full-box main-container">

    <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="full-box page-content">
        
        <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page header -->
        <div class="full-box page-header">
            <h3 class="text-left">
                <i class="fas fa-user fa-fw"></i> &nbsp; <?php echo e($dataUser[0]->name); ?>

            </h3>
        </div>
        <div class="container-fluid">
            <ul class="full-box list-unstyled page-nav-tabs">
                <li>
                    <a href="dashboard"><class="active"><i class="fas fa-home fa-fw"></i> &nbsp; DASHBOARD</a>
                </li>
            </ul>
        </div>

        <?php echo $__env->make('components.flash_alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <!--CONTENT-->
        <div class="container-fluid">
           
            <section id="addUser">
                <!--CONTENT-->
                <div class="container-fluid">
                    <form method="post" class="form-neon needs-validation" autocomplete="off" id="formEditUser" enctype="multipart/form-data">
				    <?php echo e(csrf_field()); ?>

                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> &nbsp; Account information</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <input type="hidden" name="idUserEdit" id="idUserEdit" value="<?php echo e($dataUser[0]->id); ?>"> 
                                        <div class="form-group">
                                            <label for="txtNameUserEdit" class="bmd-label-floating">Name</label>
                                            <input type="text" class="form-control" name="txtNameUserEdit" id="txtNameUserEdit" maxlength="255" value="<?php echo e($dataUser[0]->name); ?>">
                                            <div class="invalid-feedback" id="invalid-nameUserEdit">
                                                The name is not valid. It must not contain numbers or special characters.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="txtEmailUserEdit" class="bmd-label-floating">Email</label>
                                            <input type="text" class="form-control" name="txtEmailUserEdit" id="txtEmailUserEdit" maxlength="255" value="<?php echo e($dataUser[0]->email); ?>">
                                            <div class="invalid-feedback" id="invalid-emailUserEdit">
                                                The e-mail is not valid. Please enter a valid format. Example: info@dominio.com
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="txtPhoneUserEdit" class="bmd-label-floating">Phone</label>
                                            <input type="text" class="form-control" name="txtPhoneUserEdit" id="txtPhoneUserEdit" maxlength="10" value="<?php echo e($dataUser[0]->phone); ?>">
                                            <div class="invalid-feedback" id="invalid-phoneUserEdit">
                                                The telephone number must be exactly 10 digits long and contain only numbers.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtPasswordUserEdit" class="bmd-label-floating">Current password</label>
                                            <input type="password" class="form-control" name="txtPasswordUserEdit" id="txtPasswordUserEdit" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-passwordUserEdit">
                                                Verify that the password has at least 8 characters, at least one uppercase letter, at least one lowercase letter, at least one digit, at least one special character, at least one uppercase letter, at least one lowercase letter, at least one digit, at least one special character.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtNewPasswordUserEdit" class="bmd-label-floating">New password</label>
                                            <input type="password" class="form-control" name="txtNewPasswordUserEdit" id="txtNewPasswordUserEdit" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-newpasswordUserEdit">
                                                Verify that the password has at least 8 characters, at least one uppercase letter, at least one lowercase letter, at least one digit, at least one special character, at least one uppercase letter, at least one lowercase letter, at least one digit, at least one special character.
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
                            &nbsp; &nbsp;
                            <button type="reset" class="btn btn-raised btn-warning btn-sm deleteUser-button" data-id="<?php echo e($dataUser[0]->id); ?>"><i class="fas fa-trash"></i> &nbsp; DELETE ACCOUNT</button>
                        </p>
                    </form>
                </div>
            </section>
        </div>
    </section>
</main>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Archivos de programa\xampp\htdocs\libraryexam\resources\views/admin/updateusers.blade.php ENDPATH**/ ?>