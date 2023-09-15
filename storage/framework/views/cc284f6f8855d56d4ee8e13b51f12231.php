<?php if( session('message') ): ?>        
    <?php $__env->startComponent( 'components.alert' ); ?>
        <?php $__env->slot( 'class', 'success' ); ?>
        <?php $__env->slot( 'name', 'Success' ); ?>
        <?php $__env->slot( 'message', session('message') ); ?>
    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if(session('info')): ?>
    <?php $__env->startComponent( 'components.alert' ); ?>
        <?php $__env->slot( 'class', 'info' ); ?>
        <?php $__env->slot( 'name', 'Information' ); ?>
        <?php $__env->slot( 'message', session('info') ); ?>
    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if(session('warning')): ?>
    <?php $__env->startComponent( 'components.alert' ); ?>
        <?php $__env->slot( 'class', 'warning' ); ?>
        <?php $__env->slot( 'name', 'Warning' ); ?>
        <?php $__env->slot( 'message', session('warning') ); ?>
    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if(session('danger')): ?>
    <?php $__env->startComponent( 'components.alert' ); ?>
        <?php $__env->slot( 'class', 'danger' ); ?>
        <?php $__env->slot( 'name', 'Danger' ); ?>
        <?php $__env->slot( 'message', session('danger') ); ?>
    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if( $errors->any() ): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__env->startComponent( 'components.alert' ); ?>
            <?php $__env->slot( 'class', 'danger' ); ?>
            <?php $__env->slot( 'name', 'Error' ); ?>
            <?php $__env->slot( 'message', $error ); ?>
        <?php echo $__env->renderComponent(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH D:\Archivos de programa\xampp\htdocs\libraryexam\resources\views/components/flash_alerts.blade.php ENDPATH**/ ?>