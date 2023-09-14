@include ('layouts.header')

<!-- Main container -->
<main class="full-box main-container">

    @include ('layouts.menu')

    <section class="full-box page-content">
        
        @include ('layouts.nav')

        <!-- Page header -->
        <div class="full-box page-header">
            <h3 class="text-left">
                <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; USERS
            </h3>
        </div>
        <div class="container-fluid">
            <ul class="full-box list-unstyled page-nav-tabs">
                <li>
                    <a onclick="showAddUser()"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD USER</a>
                </li>
                <li>
                    <a onclick="showListUser()"><class="active" href="item-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST</a>
                </li>
            </ul>
        </div>

        @include ('components.flash_alerts')
        
        <!--CONTENT-->
        <div class="container-fluid">
            <section id="listUser">
                <div class="table-responsive">
                    <table class="table table-dark table-sm custom-table">
                        <thead>
                            <tr class="text-center roboto-medium">
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataUsers as $user)
                            
                            <tr class="text-center" >
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination justify-content-center"> 
                    {{ $dataUsers->links()}}
                </div>

                
            </section>
           
            <section id="addUser">
                <!--CONTENT-->
                <div class="container-fluid">
                    <form method="post" class="form-neon needs-validation" autocomplete="off" id="formAddUser" enctype="multipart/form-data">
				    {{csrf_field()}}
                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> &nbsp; User information</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="txtNameUser" class="bmd-label-floating">Name</label>
                                            <input type="text" class="form-control" name="txtNameUser" id="txtNameUser" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-nameUser">
                                                Please choose a Name.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="txtEmailUser" class="bmd-label-floating">Email</label>
                                            <input type="text" class="form-control" name="txtEmailUser" id="txtEmailUser" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-emailUser">
                                                Please choose a Email.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="txtPasswordUser" class="bmd-label-floating">Password</label>
                                            <input type="password" class="form-control" name="txtPasswordUser" id="txtPasswordUser" maxlength="255">
                                            <div class="invalid-feedback" id="invalid-passwordUser">
                                                Please choose a Password.
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
                            <button type="submit" class="btn btn-raised btn-info btn-sm" formaction="btnAddUser" id="btnUserAdd"><i class="far fa-save"></i> &nbsp; SAVE</button>
                        </p>
                    </form>
                </div>
            </section>
        </div>
    </section>
</main>

@include ('layouts.footer')