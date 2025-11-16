<?php
require_once __DIR__ . '/../framework/servicos/despesasService.php';


$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$itemsPerPage = 5;

$data = carregarDespesas($page, $itemsPerPage);
$expensesPage = $data['expenses'];
$totalPages = $data['totalPages'];
$totalItems = $data['totalItems'];
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberShop ERP - Despesas</title>
    <link rel="stylesheet" href="../estilos/styles.css">
</head>

<body>
    <div class="container">

        <?php include '../componentes/menu.php' ?>

        <main class="main-content">
            <div class="view-header">
                <h2>Despesas</h2>
                <form method="GET" action="" style="display: flex; gap: 0.5rem; align-items: center; margin-left: auto;">
                    <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" placeholder="Pesquisar por despesa" class="input-search" />
                    <button type="submit" class="btn btn-primary">Procurar</button>
                </form>
                <button class="btn btn-primary" id="add-expense-btn">Adicionar Despesa</button>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Observações</th>
                            <th>Tipo</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th>Total de parcelas</th>
                            <th>Parcelas pagas</th>
                            <th>Data de Vencimento</th>
                        </tr>
                    </thead>
                    <tbody id="expenses-tbody">
                        <?php
                        require_once __DIR__ . '/../framework/enums/enumeradores.php';

                        foreach ($expensesPage as $exp): ?>
                            <tr>
                                <td><?= htmlspecialchars($exp->id) ?></td>
                                <td><?= htmlspecialchars($exp->notes) ?></td>
                                <td><?= htmlspecialchars($exp->recurrence->getDescription()) ?></td>
                                <td>R$ <?= number_format($exp->amount, 2, ',', '.') ?></td>
                                <td><?= htmlspecialchars($exp->status->getDescription()) ?></td>
                                <td><?= htmlspecialchars($exp->totalInstallments) ?></td>
                                <td><?= htmlspecialchars($exp->paidInstallments) ?></td>
                                <td><?= $exp->dueDate->format('d/m/Y H:i') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="pagination" id="appointments-pagination">
                <button class="btn btn-secondary" <?= $page === 1 ? 'disabled' : '' ?> onclick="location.href='?page=<?= $page - 1 ?>'">Anterior</button>

                <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                    <?php if ($p == $page): ?>
                        <button class="btn btn-primary active" disabled><?= $p ?></button>
                    <?php else: ?>
                        <button class="btn btn-secondary" onclick="location.href='?page=<?= $p ?>'"><?= $p ?></button>
                    <?php endif; ?>
                <?php endfor; ?>

                <button class="btn btn-secondary" <?= $page === $totalPages ? 'disabled' : '' ?> onclick="location.href='?page=<?= $page + 1 ?>'">Próximo</button>
            </div>
            
            <div class="pagination" id="expenses-pagination"></div>
            <div id="expense-modal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Adicionar Despesa</h3>
                        <button class="modal-close" id="close-modal">&times;</button>
                    </div>
                    <form id="expense-form">
                        <div class="form-group">
                            <label for="expense-description">Descrição</label>
                            <input type="text" id="expense-description" required>
                        </div>
                        <div class="form-group">
                            <label for="expense-category">Categoria</label>
                            <select id="expense-category" required>
                                <option value="Aluguel">Aluguel</option>
                                <option value="Salários">Salários</option>
                                <option value="Produtos">Produtos</option>
                                <option value="Utilities">Utilities</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expense-value">Valor (R$)</label>
                            <input type="number" id="expense-value" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="expense-type">Tipo</label>
                            <select id="expense-type" required>
                                <option value="Única">Única</option>
                                <option value="Parcelada">Parcelada</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expense-date">Data</label>
                            <input type="date" id="expense-date" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="cancel-btn">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('expense-modal');
            const addExpenseBtn = document.getElementById('add-expense-btn');
            const closeModalBtn = document.getElementById('close-modal');
            const cancelBtn = document.getElementById('cancel-btn');
            const expenseForm = document.getElementById('expense-form');

            addExpenseBtn.addEventListener('click', () => {
                modal.classList.add('active');
            });

            closeModalBtn.addEventListener('click', closeModal);
            cancelBtn.addEventListener('click', closeModal);

            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });

            function closeModal() {
                modal.classList.remove('active');
                expenseForm.reset();
            }

            expenseForm.addEventListener('submit', (e) => {
                e.preventDefault();
                // Aqui você pode processar o envio da despesa

                // Após processar, fecha o modal e limpa o form:
                closeModal();
            });
        });
    </script>

</body>

</html>