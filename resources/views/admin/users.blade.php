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
                    <a onclick="hideListUsers()"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD USER</a>
                </li>
                <li>
                    <a onclick="hideAddUsers()"><class="active" href="item-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST</a>
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
                    <form action="" class="form-neon" autocomplete="off">
                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> &nbsp; User information</legend>
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
                                            <label for="txtAuthor" class="bmd-label-floating">Email</label>
                                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="txtAuthor" id="txtAuthor" maxlength="255">
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