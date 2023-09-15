<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
<!-- Main container -->
<main class="full-box main-container">

    <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Page content -->
    <section class="full-box page-content">
        
        <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page header -->
        <div class="full-box page-header">
            <h3 class="text-left">
                <i class="fas fa-home fa-fw"></i> &nbsp; DASHBOARD
            </h3>
            <p class="text-justify">
                Library, universal knowledge at your fingertips. Library, inspiration on every shelf. Library, much more than what you had imagined. Library, much more than books.
            </p>
        </div>
        
        <!-- Content -->
        <div class="full-box tile-container">

            <a href="books" class="tile">
                <div class="tile-tittle">Books</div>
                <div class="tile-icon">
                    <i class="fas fa-book fa-fw"></i>
                    <p><?php echo e($recordsBooks); ?> Records</p>
                </div>
            </a>

            <a href="loans" class="tile">
                <div class="tile-tittle">Loan History</div>
                <div class="tile-icon">
                    <i class="fas fa-book-reader fa-fw"></i>
                    <p><?php echo e($recordsLoans); ?> Records</p>
                </div>
            </a>
            
            <a href="categories" class="tile">
                <div class="tile-tittle">Categories</div>
                <div class="tile-icon">
                    <i class="fas fa-bookmark fa-fw"></i>
                    <p><?php echo e($recordsCategories); ?> Records</p>
                </div>
            </a>
            
            <a href="users" class="tile">
                <div class="tile-tittle">Users</div>
                <div class="tile-icon">
                    <i class="fas fa-user fa-fw"></i>
                    <p><?php echo e($recordsUsers); ?> Records</p>
                </div>
            </a>
        </div>
    </section>
</main>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Archivos de programa\xampp\htdocs\libraryexam\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>