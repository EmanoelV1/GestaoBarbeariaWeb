<?php

//+++++++++++++++++++++++++++++++++++++++++
// Pega o nome da página atual no servidor
//+++++++++++++++++++++++++++++++++++++++++
$paginaAtual = basename($_SERVER['SCRIPT_NAME']);

?>
<aside class="sidebar">
    <div class="sidebar-header">
        <h1 class="sidebar-title">Gestão de Barbearia ERP</h1>
    </div>
    <nav class="sidebar-nav">
        <a href="index.php" class="nav-button <?php echo ($paginaAtual == 'index.php') ? 'active' : ''; ?>">
            <span class="icon">🏠</span>Início
        </a>
        <a href="agendamentos.php"><button class="nav-button <?php echo ($paginaAtual == 'agendamentos.php') ? 'active' : ''; ?>"><span class="icon">📅</span>Agendamentos</button></a>
        <a href="produtos.php"><button class="nav-button <?php echo ($paginaAtual == 'produtos.php') ? 'active' : ''; ?>"><span class="icon">📦</span>Produtos</button></a>
        <a href="despesas.php"><button class="nav-button <?php echo ($paginaAtual == 'despesas.php') ? 'active' : ''; ?>"><span class="icon">💰</span>Despesas</button></a>
        <a href="relatorio-faturamento.php"><button class="nav-button <?php echo ($paginaAtual == 'relatorio-faturamento.php') ? 'active' : ''; ?>"><span class="icon">📊</span>Relatórios</button></a>
    </nav>
</aside>