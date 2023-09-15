<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Main container -->
<main class="full-box main-container">

    <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="full-box page-content">
    
        <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page header -->
        <div class="full-box page-header">
            <h3 class="text-left">
                <i class="fas fa-book-reader fa-fw"></i> &nbsp; LOANS
            </h3>
        </div>
        <div class="container-fluid">
            <ul class="full-box list-unstyled page-nav-tabs">
                <li>
                    <a onclick="showAddLoan()"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD LOAN</a>
                </li>
                <li>
                    <a onclick="showListLoan()"><class="active" href="item-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST</a>
                </li>
                <li>
                    <a onclick="showReturnLoan()"><i class="fas fa-book-reader fa-fw"></i> &nbsp; MY LOANS</a>
                </li>
            </ul>
        </div>
        
        <?php echo $__env->make('components.flash_alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!--CONTENT-->
        <div class="container-fluid">
            <section id="listLoan">
                <div class="table-responsive">
                    <table class="table table-dark table-sm custom-table">
                        <thead>
                            <tr class="text-center roboto-medium">
                                <th>ID</th>
                                <th>USER</th>
                                <th>BOOK</th>
                                <th>LOAN DATE</th>
                                <th>STATUS</th>
                                <th>RETURN DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $dataLoans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr class="text-center" >
                                <td><?php echo e($loan->id); ?></td>
                                <td><?php echo e($loan->userName); ?></td>
                                <td><?php echo e($loan->bookName); ?></td>
                                <td><?php echo e($loan->loan_date); ?></td>
                                <td><?php echo e($loan->status); ?></td>
                                <td><?php echo e($loan->return_date); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination justify-content-center"> 
                    <?php echo e($dataLoans->links()); ?>

                </div>
            </section>
           
            <section id="addLoan">
                <!--CONTENT-->
                <div class="container-fluid">
                    <form method="post" class="form-neon needs-validation" autocomplete="off" id="formAddLoan" enctype="multipart/form-data">
				    <?php echo e(csrf_field()); ?>

                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> &nbsp; Loan information</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtUserLoan" class="bmd-label-floating">User</label>
                                            <label class="form-control" name="txtUserLoan" id="txtUserLoan"><?php echo e($dataUser[0]->name); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtBookLoan" class="bmd-label-floating">Book</label>
                                            <select class="form-control" name="txtBookLoan" id="txtBookLoan">
                                                <option value="0" selected="">Select a book</option>
                                                <?php $__currentLoopData = $dataBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($book->id); ?>"><?php echo e($book->name); ?> - <?php echo e($book->author); ?></option>
    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="invalid-feedback" id="invalid-bookLoan">
                                                Please choose a Book.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label for="chkNotification" class="bmd-label-floating">Availability.</label>
                                            <br>
                                            <span id="bookNotAvailable" class="textNotAvailable">
                                                Book not available. Click on Notify me when the book is available to receive a notification.
                                            </span>
                                            <span id="bookAvailable" class="textAvailable">
                                                Available book. You can request the loan.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br><br><br>
                        <p class="text-center" style="margin-top: 40px;">
                            <span id="sectionButtonAddLoan">
                                <button type="reset" class="btn btn-raised btn-secondary btn-sm" onclick="cleanFormAddLoan()"><i class="fas fa-paint-roller"></i> &nbsp; CLEAN</button>
                                &nbsp; &nbsp;
                                <button type="submit" class="btn btn-raised btn-info btn-sm" formaction="btnAddLoan" id="btnLoanAdd"><i class="far fa-save"></i> &nbsp; Apply for a loan</button>
                                &nbsp; &nbsp;
                            </span>
                            <span id="sectionButtonNotiLoan">
                                <button type="submit" class="btn btn-raised btn-secondary btn-sm notification-button" formaction="btnAddNotification" ><i class="fas fa-bell"></i> &nbsp; NOTIFY ME</button>
                            </span>
                        </p>
                    </form>
                </div>
            </section>
            
            <section id="returnLoan">
                <div class="table-responsive">
                    <table class="table table-dark table-sm custom-table">
                        <thead>
                            <tr class="text-center roboto-medium">
                                <th>ID</th>
                                <th>BOOK</th>
                                <th>LOAN DATE</th>
                                <th>RETURN LOAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $dataLoansUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loanUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr class="text-center" >
                                <td><?php echo e($loanUser->id); ?></td>
                                <td><?php echo e($loanUser->bookName); ?></td>
                                <td><?php echo e($loanUser->loan_date); ?></td>
                                <td>
                                    <button type="submit" class="btn btn btn-success returnLoan-button" id="btnReturnLoan<?php echo e($loanUser->id); ?>" data-id="<?php echo e($loanUser->id); ?>"><i class="fas fa-sync-alt"></i></button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination justify-content-center"> 
                    <?php echo e($dataLoansUser->links()); ?>

                </div>
            </section>
        </div>
    </section>

</main>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Archivos de programa\xampp\htdocs\libraryexam\resources\views/admin/loans.blade.php ENDPATH**/ ?>