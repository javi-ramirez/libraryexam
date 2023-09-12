@include ('layouts.header')

<div class="login-container">
    <div class="login-content">
        <p class="text-center">
            <img src="<?php echo $_ENV['APP_STORAGE'] ?>assets/icons/image-icon.png" class="img-fluid" alt="Logo" width="50%" height="50%">      
        </p>
        
        <p class="text-center">
            Sing in
            @include ('components.flash_alerts')
        </p>
        <form method="post" action="btnValidateLogin" enctype="multipart/form-data">
        {{csrf_field()}}	
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

@include ('layouts.footer')