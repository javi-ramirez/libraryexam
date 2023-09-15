<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Main container -->
<main class="full-box main-container">

    <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="full-box page-content">
        
        <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <!-- Page header -->
        <div class="full-box page-header">
            <h3 class="text-left">
                <i class="fas fa-book fa-fw"></i> &nbsp; BOOKS
            </h3>
        </div>
        <div class="container-fluid">
            <ul class="full-box list-unstyled page-nav-tabs">
                <li>
                    <a onclick="showAddBook()"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD BOOK</a>
                </li>
                <li>
                    <a onclick="showListBook()"><class="active" href="item-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST</a>
                </li>
            </ul>
        </div>
        
        <?php echo $__env->make('components.flash_alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <!--CONTENT-->
        <div class="container-fluid">
            <section id="listBook">
                <div class="table-responsive">
                    <table class="table table-dark table-sm custom-table">
                        <thead>
                            <tr class="text-center roboto-medium">
                                <th>ID</th>
                                <th>NAME</th>
                                <th>AUTHOR</th>
                                <th>CATEGORIES</th>
                                <th>PUBLISHED DATE</th>
                                <th>STATUS</th>
                                <th>USER</th>
                                <th>UPDATE</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $dataBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr class="text-center" >
                                <td><?php echo e($book->id); ?></td>
                                <td><?php echo e($book->name); ?></td>
                                <td><?php echo e($book->author); ?></td>
                                <td><?php echo e($book->categories); ?></td>
                                <td><?php echo e($book->published_date); ?></td>
                                <td><?php echo e($book->status); ?></td>
                                <td><?php echo e($book->user); ?></td>
                                <td>
                                    <form method="post" autocomplete="off" id="formShowBook<?php echo e($book->id); ?>" enctype="multipart/form-data">
				                    <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="idBookShow" value="<?php echo e($book->id); ?>">
                                        <button type="submit" class="btn btn-success" formaction="updatebook" id="btnBookShow<?php echo e($book->id); ?>"><i class="fas fa-sync-alt"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-warning delete-button" id="btnBookDelete<?php echo e($book->id); ?>" data-id="<?php echo e($book->id); ?>"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination justify-content-center"> 
                    <?php echo e($dataBooks->links()); ?>

                </div>

                
            </section>
           
            <section id="addBook" >
                <!--CONTENT-->
                <div class="container-fluid">
                    <form method="post" class="form-neon needs-validation" autocomplete="off" id="formAddBook" enctype="multipart/form-data">
				    <?php echo e(csrf_field()); ?>

                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> &nbsp; Book information</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtName" class="bmd-label-floating">Name</label>
                                            <input type="text" class="form-control" name="txtName" id="txtName" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-name">
                                                The name is not valid. It must not contain numbers or special characters.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtPublishedDate" class="bmd-label-floating">Published date</label>
                                            <input type="date" class="form-control" name="txtPublishedDate" id="txtPublishedDate">
                                            <div class="invalid-feedback" id="invalid-published">
                                                Please choose a Published Date.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtAuthor" class="bmd-label-floating">Author</label>
                                            <input type="text" class="form-control" name="txtAuthor" id="txtAuthor" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-author">
                                                The author is not valid. It must not contain numbers or special characters.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtCategory" class="bmd-label-floating">Category(ies)</label>
                                            <!--<select multiple class="form-control" name="txtCategory" id="txtCategory">
                                                <option value="0" selected="" disabled="">Select a category</option>
                                                <?php $__currentLoopData = $dataCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>" title="<?php echo e($category->desscription); ?>"><?php echo e($category->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>-->
                                            
                                           <input class="form-control" type='text'
                                            data-search-in='name'
                                            data-visible-properties='["name","description"]'
                                            data-selection-required='true'
                                            data-value-property='id'
                                            data-min-length='0'
                                            data-toggle-selected='true'
                                            id='txtCategory'
                                            multiple='multiple'
                                            name='txtCategory'>
                                            <div class="invalid-feedback" id="invalid-categories">
                                                Please choose a Category(ies).
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br><br><br>
                        <p class="text-center" style="margin-top: 40px;">
                            <button type="reset" class="btn btn-raised btn-secondary btn-sm" onclick="cleanFormAddBook()"><i class="fas fa-paint-roller"></i> &nbsp; CLEAN</button>
                            &nbsp; &nbsp;
                            <button type="submit" class="btn btn-raised btn-info btn-sm" formaction="btnAddBook" id="btnBookAdd"><i class="far fa-save"></i> &nbsp; SAVE</button>
                        </p>
                    </form>
                </div>
            </section>
        </div>
    </section>

</main>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Archivos de programa\xampp\htdocs\libraryexam\resources\views/admin/books.blade.php ENDPATH**/ ?>