<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"></path>
            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"></path>
            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"></path>
        </svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="nav-link px-2 link-dark">Home</a></li>
        <li><a href="../index.php?tasks=1" class="nav-link px-2 link-dark">Tasks</a></li>
        <li><a href="../index.php?activities=1" class="nav-link px-2 link-dark">Activities</a></li>
        <li><a href="../index.php?info=1" class="nav-link px-2 link-dark">About</a></li>
    </ul>



    <div class="col-md-3 text-end">
        <?php
        if($_SESSION['username'])
        {
            echo('<a class="btn btn-outline-primary me-2" href="../task.php?profile=1" role="button">'.$_SESSION['login'].'</a>');
            echo('<a class="btn btn-outline-primary me-2" href="../task.php?logout=1" role="button">Logout</a>');
        }
        else
        {
            echo('<a class="btn btn-outline-primary me-2" href="../task.php?login=1" role="button">Login</a>');
            echo('<a class="btn btn-outline-primary me-2" href="../task.php?register=1" role="button">Sign-up</a>');
        }
        ?>
    </div>
</header>