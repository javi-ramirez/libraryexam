<!-- Nav lateral -->
<section class="full-box nav-lateral">
    <div class="full-box nav-lateral-bg show-nav-lateral"></div>
    <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
            <i class="far fa-times-circle show-nav-lateral"></i>
            <img src="<?php echo $_ENV['APP_STORAGE'] ?>assets/avatar/Avatar.png" class="img-fluid" alt="Avatar">
            <figcaption class="roboto-medium text-center">
            {{$dataUser[0]->name}} <br><small class="roboto-condensed-light">{{$dataUser[0]->email}}</small>
            </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>
        <nav class="full-box nav-lateral-menu">
            <ul>
                <li>
                    <a href="dashboard"><i class="fas fa-home fa-fw"></i> &nbsp; Dashboard</a>
                </li>

                <li>
                    <a href="books" class="nav-btn-submenu"><i class="fas fa-book fa-fw"></i> &nbsp; Books</a>
                </li>

                <li>
                    <a href="#" class="nav-btn-submenu"><i class="fas fa-book-reader fa-fw"></i> &nbsp; Loan History</a>
                </li>

                <li>
                    <a href="#" class="nav-btn-submenu"><i class="fas fa-bookmark fa-fw"></i> &nbsp; Categories</a>
                </li>

                <li>
                    <a href="#" class="nav-btn-submenu"><i class="fas fa-user fa-fw"></i> &nbsp; Users</a>
                </li>
            </ul>
        </nav>
    </div>
</section>