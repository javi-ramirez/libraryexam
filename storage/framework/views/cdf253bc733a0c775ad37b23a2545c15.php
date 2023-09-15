<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="login-container">
    <div class="login-content">
        <p class="text-center">
            <img src="<?php echo $_ENV['APP_STORAGE'] ?>assets/icons/image-icon.png" class="img-fluid" alt="Logo" width="50%" height="50%">      
        </p>
        
        <p class="text-center">
            Sing in
            <?php echo $__env->make('components.flash_alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </p>
        <form method="post" action="btnValidateLogin" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>	
            <div class="form-group">
                <label for="txtEmail" class="bmd-label-floating"><i class="fas fa-user-secret"></i> &nbsp; Email</label>
                <input type="text" class="form-control" id="txtEmail" name="txtEmail" title="Username should only contain lowercase letters. e.g. john" maxlength="255">
            </div>
            <div class="form-group">
                <label for="txtPassword" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp; Password</label>
                <input type="password" class="form-control" id="txtPassword" name="txtPassword" maxlength="255">
            </div>
            <button class="btn-login text-center">LOG IN</button>
        </form>
    </div>
</div>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Archivos de programa\xampp\htdocs\libraryexam\resources\views/auth/login.blade.php ENDPATH**/ ?>