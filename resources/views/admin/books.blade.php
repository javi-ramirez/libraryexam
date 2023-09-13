@include ('layouts.header')

<!-- Main container -->
<main class="full-box main-container">

    @include ('layouts.menu')

    <section class="full-box page-content">
        <nav class="full-box navbar-info">
            <a href="#" class="float-left show-nav-lateral">
                <i class="fas fa-exchange-alt"></i>
            </a>
            <a href="user-update.html">
                <i class="fas fa-user-cog"></i>
            </a>
            <a href="#" class="btn-exit-system">
                <i class="fas fa-power-off"></i>
            </a>
        </nav>
        <!-- Page header -->
        <div class="full-box page-header">
            <h3 class="text-left">
                <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; BOOKS
            </h3>
        </div>
        <div class="container-fluid">
            <ul class="full-box list-unstyled page-nav-tabs">
                <li>
                    <a onclick="hideListBook()"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD BOOK</a>
                </li>
                <li>
                    <a onclick="hideAddBook()"><class="active" href="item-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST</a>
                </li>
            </ul>
        </div>
        
        <!--CONTENT-->
        <div class="container-fluid">
            <section id="listBook">
                <div class="table-responsive">
                    <table class="table table-dark table-sm">
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
                            @foreach ($dataBooks as $book)
                            
                            <tr class="text-center" >
                                <td>{{$book->id}}</td>
                                <td>{{$book->name}}</td>
                                <td>{{$book->author}}</td>
                                <td>{{$book->categories}}</td>
                                <td>{{$book->published_date}}</td>
                                <td>{{$book->status}}</td>
                                <td>{{$book->user}}</td>
                                <td>
                                    <a href="item-update.html" class="btn btn-success">
                                        <i class="fas fa-sync-alt"></i> 
                                    </a>
                                </td>
                                <td>
                                    <form action="">
                                        <button type="button" class="btn btn-warning">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination justify-content-center"> 
                    {{ $dataBooks->links()}}
                </div>

                
            </section>
           
            <section id="addBook">
                agregar
            </section>
            
        </div>
    </section>

</main>

@include ('layouts.footer')