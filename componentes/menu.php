<?php

//+++++++++++++++++++++++++++++++++++++++++
// Pega o nome da página atual no servidor
//+++++++++++++++++++++++++++++++++++++++++
$paginaAtual = basename($_SERVER['SCRIPT_NAME']);

?>

<nav class="sidebar bg-light border-end">
    <div class="sidebar-header p-3 border-bottom">
        <h5 class="mb-1 fw-semibold">Barbearia ERP</h5>
        <small class="text-muted">Sistema de Gestão</small>
    </div>
    <div class="p-3">
        <h6 class="text-muted text-uppercase small mb-3">Menu Principal</h6>
        <ul class="nav flex-column gap-1">
             <li class="nav-item">
                <a class="nav-link <?php echo ($paginaAtual == 'index.php') ? 'active' : ''; ?>" href="index.php">
                    <i class="bi bi-house-heart-fill me-2"></i>
                    Inicio
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($paginaAtual == 'agendamentos.php') ? 'active' : ''; ?>" href="agendamentos.php">
                    <i class="bi bi-calendar-check me-2"></i>
                    Agendamentos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($paginaAtual == 'produtos.php') ? 'active' : ''; ?>" href="produtos.php">
                    <i class="bi bi-box-seam me-2"></i>
                    Produtos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($paginaAtual == 'despesas.php') ? 'active' : ''; ?>" href="despesas.php">
                    <i class="bi bi-receipt me-2"></i>
                    Despesas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($paginaAtual == 'relatorio-faturamento.php') ? 'active' : ''; ?>" href="relatorio-faturamento.php">
                    <i class="bi bi-bar-chart me-2"></i>
                    Faturamento
                </a>
            </li>
        </ul>
    </div>
</nav>

<script src="../scripts/script.js"></script>