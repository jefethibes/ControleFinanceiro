<?php 
    include("../../session/session.php");
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="../home/home.php"><i class="bi bi-house"></i> Home<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=""><i class="bi bi-graph-down"></i> Gastos<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../proventos/proventos.php?log=list"><i class="bi bi-cash"></i> Proventos<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../investimentos/investimentos.php?log=list"><i class="bi bi-bar-chart-line"></i> Investimentos<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../empresas/empresas.php?log=list"><i class="bi bi-house-door"></i> Empresas<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../users/users.php?log=list"><i class="bi bi-people"></i> Usuários<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <?php echo '<a class="nav-link" href="../../session/logout.php?token='.md5(session_id()).'"><i class="bi bi-box-arrow-right"></i> Logout</a>'; ?>
        </li>
    </ul>
</nav>