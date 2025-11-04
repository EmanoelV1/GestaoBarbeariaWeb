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
                <button class="btn btn-primary" id="add-expense-btn">Adicionar Despesa</button>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                            <th>Tipo</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody id="expenses-tbody"></tbody>
                </table>
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