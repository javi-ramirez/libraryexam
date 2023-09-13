@include ('layouts.header')

<!-- Main container -->
<main class="full-box main-container">

    @include ('layouts.menu')

    <section class="full-box page-content">
    
        @include ('layouts.nav')

        <!-- Page header -->
        <div class="full-box page-header">
            <h3 class="text-left">
                <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LOANS
            </h3>
        </div>
        <div class="container-fluid">
            <ul class="full-box list-unstyled page-nav-tabs">
                <li>
                    <a onclick="hideListLoans()"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD LOAN</a>
                </li>
                <li>
                    <a onclick="hideAddLoans()"><class="active" href="item-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST</a>
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
                    <form action="" class="form-neon" autocomplete="off">
                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> &nbsp; Book information</legend>
                            <div class="container-fluid">
                                <div class="row">
                                <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="txtName" class="bmd-label-floating">Name</label>
                                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="txtName" id="txtName" maxlength="255">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="txtAuthor" class="bmd-label-floating">Author</label>
                                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="txtAuthor" id="txtAuthor" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="txtPublishedDate" class="bmd-label-floating">Published date</label>
                                            <input type="date" class="form-control" name="txtPublishedDate" id="txtPublishedDate">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="item_estado" class="bmd-label-floating">Estado</label>
                                            <select class="form-control" name="item_estado" id="item_estado">
                                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                                <option selected="" value="Habilitado">Habilitado</option>
                                                <option value="Deshabilitado">Deshabilitado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="item_detalle" class="bmd-label-floating">Detalle</label>
                                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9()- ]{1,190}" class="form-control" name="item_detalle" id="item_detalle" maxlength="190">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br><br><br>
                        <p class="text-center" style="margin-top: 40px;">
                            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; CLEAN</button>
                            &nbsp; &nbsp;
                            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; SAVE</button>
                        </p>
                    </form>
                </div>
            </section>
            
        </div>
    </section>

</main>

@include ('layouts.footer')