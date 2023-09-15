<!-- Nav lateral -->
<section class="full-box nav-lateral">
    <div class="full-box nav-lateral-bg show-nav-lateral"></div>
    <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
            <i class="far fa-times-circle show-nav-lateral"></i>
            <img src="<?php echo $_ENV['APP_STORAGE'] ?>assets/avatar/Avatar.png" class="img-fluid" alt="Avatar">
            <figcaption class="roboto-medium text-center">
            <?php echo e($dataUser[0]->name); ?> <br><small class="roboto-condensed-light"><?php echo e($dataUser[0]->email); ?></small>
            </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>
        <nav class="full-box nav-lateral-menu">
            <ul>
                <li>
                    <a href="dashboard"><i class="fas fa-home fa-fw"></i> &nbsp; Dashboard</a>
                </li>

                <li>
                    <a href="books"><i class="fas fa-book fa-fw"></i> &nbsp; Books</a>
                </li>

                <li>
                    <a href="loans"><i class="fas fa-book-reader fa-fw"></i> &nbsp; Loan History</a>
                </li>

                <li>
                    <a href="categories"><i class="fas fa-bookmark fa-fw"></i> &nbsp; Categories</a>
                </li>

                <li>
                    <a href="users"><i class="fas fa-user fa-fw"></i> &nbsp; Users</a>
                </li>
            </ul>
        </nav>
    </div>
</section><?php /**PATH D:\Archivos de programa\xampp\htdocs\libraryexam\resources\views/layouts/menu.blade.php ENDPATH**/ ?>