<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="home.php"><i class="bi bi-house"></i> Home<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=""><i class="bi bi-graph-down"></i> Gastos<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=""><i class="bi bi-cash"></i> Investimentos<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=""><i class="bi bi-bar-chart-line"></i> Trades<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=""><i class="bi bi-house-door"></i> Empresas<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="users.php?log=null"><i class="bi bi-people"></i> Usuários<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <?php echo '<a class="nav-link" href="../controllers/logout.php?token='.md5(session_id()).'"><i class="bi bi-box-arrow-right"></i> Logout</a>'; ?>
        </li>
    </ul>
</nav>