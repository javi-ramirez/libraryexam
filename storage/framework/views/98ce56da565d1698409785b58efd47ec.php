<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Main container -->
<main class="full-box main-container">

    <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="full-box page-content">
        
        <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page header -->
        <div class="full-box page-header">
            <h3 class="text-left">
                <i class="fas fa-bookmark fa-fw"></i> &nbsp; CATEGORIES
            </h3>
        </div>
        <div class="container-fluid">
            <ul class="full-box list-unstyled page-nav-tabs">
                <li>
                    <a onclick="showAddCategory()"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD CATEGORY</a>
                </li>
                <li>
                    <a onclick="showListCategory()"><class="active" href="item-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST</a>
                </li>
            </ul>
        </div>

        <?php echo $__env->make('components.flash_alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <!--CONTENT-->
        <div class="container-fluid">
            <section id="listCategory">
                <div class="table-responsive">
                    <table class="table table-dark table-sm custom-table">
                        <thead>
                            <tr class="text-center roboto-medium">
                                <th>ID</th>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>UPDATE</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $dataCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr class="text-center" >
                                <td><?php echo e($category->id); ?></td>
                                <td><?php echo e($category->name); ?></td>
                                <td><?php echo e($category->description); ?></td>
                                <td>
                                    <form method="post" autocomplete="off" id="formShowCategory<?php echo e($category->id); ?>" enctype="multipart/form-data">
				                    <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="idCategoryShow" value="<?php echo e($category->id); ?>">
                                        <button type="submit" class="btn btn-success" formaction="updatecategory" id="btnCategoryShow<?php echo e($category->id); ?>"><i class="fas fa-sync-alt"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-warning deleteCategory-button" id="btnCategoryDelete<?php echo e($category->id); ?>" data-id="<?php echo e($category->id); ?>"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination justify-content-center"> 
                    <?php echo e($dataCategories->links()); ?>

                </div>

                
            </section>
           
            <section id="addCategory">
                <!--CONTENT-->
                <div class="container-fluid">
                    <form method="post" class="form-neon needs-validation" autocomplete="off" id="formAddCategory" enctype="multipart/form-data">
				    <?php echo e(csrf_field()); ?>

                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> &nbsp; Category information</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtNameCategory" class="bmd-label-floating">Name</label>
                                            <input type="text" class="form-control" name="txtNameCategory" id="txtNameCategory" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-nameCategory">
                                                The name is not valid. It must not contain numbers or special characters.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtDescriptionCategory" class="bmd-label-floating">Description</label>
                                            <input type="text" class="form-control" name="txtDescriptionCategory" id="txtDescriptionCategory" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-descriptionCategory">
                                                Please enter a Description.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br><br><br>
                        <p class="text-center" style="margin-top: 40px;">
                            <button type="reset" class="btn btn-raised btn-secondary btn-sm" onclick="cleanFormAddCategory()"><i class="fas fa-paint-roller"></i> &nbsp; CLEAN</button>
                            &nbsp; &nbsp;
                            <button type="submit" class="btn btn-raised btn-info btn-sm"  formaction="btnAddCategory" id="btnCategoryAdd"><i class="far fa-save"></i> &nbsp; SAVE</button>
                        </p>
                    </form>
                </div>
            </section>
            
        </div>
    </section>

</main>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Archivos de programa\xampp\htdocs\libraryexam\resources\views/admin/categories.blade.php ENDPATH**/ ?>