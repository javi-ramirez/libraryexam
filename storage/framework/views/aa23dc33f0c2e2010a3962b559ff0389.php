<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Main container -->
<main class="full-box main-container">

    <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="full-box page-content">
        
        <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page header -->
        <div class="full-box page-header">
            <h3 class="text-left">
                <i class="fas fa-user fa-fw"></i> &nbsp; USERS
            </h3>
        </div>
        <div class="container-fluid">
            <ul class="full-box list-unstyled page-nav-tabs">
                <li>
                    <a onclick="showAddUser()"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD USER</a>
                </li>
                <li>
                    <a onclick="showListUser()"><class="active" href="item-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST</a>
                </li>
            </ul>
        </div>

        <?php echo $__env->make('components.flash_alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <!--CONTENT-->
        <div class="container-fluid">
            <section id="listUser">
                <div class="table-responsive">
                    <table class="table table-dark table-sm custom-table">
                        <thead>
                            <tr class="text-center roboto-medium">
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $dataUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr class="text-center" >
                                <td><?php echo e($user->id); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->phone); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination justify-content-center"> 
                    <?php echo e($dataUsers->links()); ?>

                </div>

                
            </section>
           
            <section id="addUser">
                <!--CONTENT-->
                <div class="container-fluid">
                    <form method="post" class="form-neon needs-validation" autocomplete="off" id="formAddUser" enctype="multipart/form-data">
				    <?php echo e(csrf_field()); ?>

                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> &nbsp; User information</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtNameUser" class="bmd-label-floating">Name</label>
                                            <input type="text" class="form-control" name="txtNameUser" id="txtNameUser" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-nameUser">
                                                The name is not valid. It must not contain numbers or special characters.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtEmailUser" class="bmd-label-floating">Email</label>
                                            <input type="text" class="form-control" name="txtEmailUser" id="txtEmailUser" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-emailUser">
                                                The e-mail is not valid. Please enter a valid format. Example: info@dominio.com
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtPhoneUser" class="bmd-label-floating">Phone</label>
                                            <input type="text" class="form-control" name="txtPhoneUser" id="txtPhoneUser" maxlength="10">
                                            <div class="invalid-feedback" id="invalid-phoneUser">
                                                The telephone number must be exactly 10 digits long and contain only numbers.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtPasswordUser" class="bmd-label-floating">Password</label>
                                            <input type="password" class="form-control" name="txtPasswordUser" id="txtPasswordUser" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-passwordUser">
                                                Verify that the password has at least 8 characters, at least one uppercase letter, at least one lowercase letter, at least one digit, at least one special character, at least one uppercase letter, at least one lowercase letter, at least one digit, at least one special character.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br><br><br>
                        <p class="text-center" style="margin-top: 40px;">
                            <button type="reset" class="btn btn-raised btn-secondary btn-sm" onclick="cleanFormAddUser()"><i class="fas fa-paint-roller"></i> &nbsp; CLEAN</button>
                            &nbsp; &nbsp;
                            <button type="submit" class="btn btn-raised btn-info btn-sm" formaction="btnAddUser" id="btnUserAdd"><i class="far fa-save"></i> &nbsp; SAVE</button>
                        </p>
                    </form>
                </div>
            </section>
        </div>
    </section>
</main>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Archivos de programa\xampp\htdocs\libraryexam\resources\views/admin/users.blade.php ENDPATH**/ ?>