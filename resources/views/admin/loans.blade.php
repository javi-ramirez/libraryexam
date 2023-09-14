@include ('layouts.header')

<!-- Main container -->
<main class="full-box main-container">

    @include ('layouts.menu')

    <section class="full-box page-content">
    
        @include ('layouts.nav')

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
        
        @include ('components.flash_alerts')

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
                            @foreach ($dataLoans as $loan)
                            
                            <tr class="text-center" >
                                <td>{{$loan->id}}</td>
                                <td>{{$loan->userName}}</td>
                                <td>{{$loan->bookName}}</td>
                                <td>{{$loan->loan_date}}</td>
                                <td>{{$loan->status}}</td>
                                <td>{{$loan->return_date}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination justify-content-center"> 
                    {{ $dataLoans->links()}}
                </div>
            </section>
           
            <section id="addLoan">
                <!--CONTENT-->
                <div class="container-fluid">
                    <form method="post" class="form-neon needs-validation" autocomplete="off" id="formAddLoan" enctype="multipart/form-data">
				    {{csrf_field()}}
                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> &nbsp; Loan information</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtUserLoan" class="bmd-label-floating">User</label>
                                            <label class="form-control" name="txtUserLoan" id="txtUserLoan">{{$dataUser[0]->name}}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="txtBookLoan" class="bmd-label-floating">Book</label>
                                            <select class="form-control" name="txtBookLoan" id="txtBookLoan">
                                                <option value="0" selected="">Select a book</option>
                                                @foreach ($dataBooks as $book)
                                                    <option value="{{$book->id}}">{{$book->name}} - {{$book->author}}</option>
    
                                                @endforeach
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
                            @foreach ($dataLoansUser as $loanUser)
                            
                            <tr class="text-center" >
                                <td>{{$loanUser->id}}</td>
                                <td>{{$loanUser->bookName}}</td>
                                <td>{{$loanUser->loan_date}}</td>
                                <td>
                                    <button type="submit" class="btn btn btn-success returnLoan-button" id="btnReturnLoan{{$loanUser->id}}" data-id="{{$loanUser->id}}"><i class="fas fa-sync-alt"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination justify-content-center"> 
                    {{ $dataLoansUser->links()}}
                </div>
            </section>
        </div>
    </section>

</main>

@include ('layouts.footer')