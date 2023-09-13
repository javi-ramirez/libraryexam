@include ('layouts.header')
 
<!-- Main container -->
<main class="full-box main-container">

    @include ('layouts.menu')

    <!-- Page content -->
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
                    <p>{{$recordsBooks}} Records</p>
                </div>
            </a>

            <a href="reservation-list.html" class="tile">
                <div class="tile-tittle">Loan History</div>
                <div class="tile-icon">
                    <i class="fas fa-book-reader fa-fw"></i>
                    <p>{{$recordsLoans}} Records</p>
                </div>
            </a>
            
            <a href="company.html" class="tile">
                <div class="tile-tittle">Categories</div>
                <div class="tile-icon">
                    <i class="fas fa-bookmark fa-fw"></i>
                    <p>{{$recordsCategories}} Records</p>
                </div>
            </a>
            
            <a href="client-new.html" class="tile">
                <div class="tile-tittle">Users</div>
                <div class="tile-icon">
                    <i class="fas fa-user fa-fw"></i>
                    <p>{{$recordsUsers}} Records</p>
                </div>
            </a>
        </div>
    </section>
</main>

@include ('layouts.footer')