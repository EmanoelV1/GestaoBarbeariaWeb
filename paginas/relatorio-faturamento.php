<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberShop ERP - Relatório de Faturamento</title>
    <link rel="stylesheet" href="../estilos/styles.css">
</head>

<body>
    <div class="container">

        <?php include '../componentes/menu.php' ?>

        <main class="main-content">
            <div id="reports-view" class="view active">
                <div class="view-header">
                    <h2>Relatórios Financeiros</h2>
                </div>
                <div class="reports-container">
                    <div class="report-card">
                        <div class="report-card-header">
                            <h3>Faturamento Total</h3>
                            <span class="icon">💵</span>
                        </div>
                        <div class="report-card-value">R$ 45.750,00</div>
                        <div class="report-card-footer">+12% em relação ao mês anterior</div>
                    </div>
                    <div class="report-card">
                        <div class="report-card-header">
                            <h3>Despesas Totais</h3>
                            <span class="icon">💸</span>
                        </div>
                        <div class="report-card-value">R$ 18.300,00</div>
                        <div class="report-card-footer">+5% em relação ao mês anterior</div>
                    </div>
                    <div class="report-card">
                        <div class="report-card-header">
                            <h3>Lucro Líquido</h3>
                            <span class="icon">📈</span>
                        </div>
                        <div class="report-card-value">R$ 27.450,00</div>
                        <div class="report-card-footer">+18% em relação ao mês anterior</div>
                    </div>
                    <div class="report-card">
                        <div class="report-card-header">
                            <h3>Agendamentos</h3>
                            <span class="icon">📅</span>
                        </div>
                        <div class="report-card-value">342</div>
                        <div class="report-card-footer">+8% em relação ao mês anterior</div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>