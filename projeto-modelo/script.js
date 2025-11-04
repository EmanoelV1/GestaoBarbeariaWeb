// Mock Data
const appointmentsData = [
    { id: 1, client: "João Silva", service: "Corte de Cabelo", datetime: "2024-01-15 10:00", status: "pending" },
    { id: 2, client: "Maria Santos", service: "Barba", datetime: "2024-01-15 11:00", status: "approved" },
    { id: 3, client: "Pedro Oliveira", service: "Corte + Barba", datetime: "2024-01-15 14:00", status: "pending" },
    { id: 4, client: "Ana Costa", service: "Corte de Cabelo", datetime: "2024-01-16 09:00", status: "pending" },
    { id: 5, client: "Carlos Mendes", service: "Barba", datetime: "2024-01-16 10:30", status: "approved" },
    { id: 6, client: "Lucia Ferreira", service: "Corte + Barba", datetime: "2024-01-16 15:00", status: "rejected" },
    { id: 7, client: "Roberto Lima", service: "Corte de Cabelo", datetime: "2024-01-17 11:00", status: "pending" },
    { id: 8, client: "Fernanda Rocha", service: "Barba", datetime: "2024-01-17 13:00", status: "approved" },
    { id: 9, client: "Marcos Alves", service: "Corte + Barba", datetime: "2024-01-18 10:00", status: "pending" },
    { id: 10, client: "Patricia Gomes", service: "Corte de Cabelo", datetime: "2024-01-18 14:00", status: "pending" },
    { id: 11, client: "Ricardo Souza", service: "Barba", datetime: "2024-01-19 09:30", status: "approved" },
    { id: 12, client: "Juliana Martins", service: "Corte + Barba", datetime: "2024-01-19 11:30", status: "pending" }
];

const productsData = [
    { id: 1, name: "Pomada Modeladora", category: "Cabelo", price: 45.90, stock: 23 },
    { id: 2, name: "Shampoo Anti-Resíduo", category: "Cabelo", price: 32.50, stock: 45 },
    { id: 3, name: "Óleo para Barba", category: "Barba", price: 38.00, stock: 8 },
    { id: 4, name: "Cera Modeladora", category: "Cabelo", price: 42.00, stock: 18 },
    { id: 5, name: "Bálsamo Pós-Barba", category: "Barba", price: 28.90, stock: 32 },
    { id: 6, name: "Gel Fixador", category: "Cabelo", price: 25.50, stock: 56 },
    { id: 7, name: "Navalha Profissional", category: "Equipamento", price: 89.90, stock: 3 },
    { id: 8, name: "Tesoura de Corte", category: "Equipamento", price: 125.00, stock: 12 },
    { id: 9, name: "Pente Profissional", category: "Equipamento", price: 18.50, stock: 34 },
    { id: 10, name: "Escova de Cabelo", category: "Equipamento", price: 22.00, stock: 28 },
    { id: 11, name: "Spray Fixador", category: "Cabelo", price: 31.90, stock: 15 },
    { id: 12, name: "Sabonete para Barba", category: "Barba", price: 24.50, stock: 19 }
];

const expensesData = [
    { id: 1, description: "Aluguel da Loja", category: "Aluguel", value: 3500.00, type: "Parcelada", date: "2024-01-01" },
    { id: 2, description: "Conta de Luz", category: "Utilities", value: 450.00, type: "Única", date: "2024-01-05" },
    { id: 3, description: "Salário Funcionário 1", category: "Salários", value: 2500.00, type: "Parcelada", date: "2024-01-10" },
    { id: 4, description: "Salário Funcionário 2", category: "Salários", value: 2500.00, type: "Parcelada", date: "2024-01-10" },
    { id: 5, description: "Compra de Produtos", category: "Produtos", value: 1200.00, type: "Única", date: "2024-01-12" },
    { id: 6, description: "Marketing Digital", category: "Marketing", value: 800.00, type: "Parcelada", date: "2024-01-15" },
    { id: 7, description: "Conta de Água", category: "Utilities", value: 150.00, type: "Única", date: "2024-01-18" },
    { id: 8, description: "Manutenção Equipamentos", category: "Outros", value: 350.00, type: "Única", date: "2024-01-20" },
    { id: 9, description: "Internet", category: "Utilities", value: 120.00, type: "Parcelada", date: "2024-01-22" },
    { id: 10, description: "Material de Limpeza", category: "Outros", value: 180.00, type: "Única", date: "2024-01-25" },
    { id: 11, description: "Impostos", category: "Outros", value: 950.00, type: "Única", date: "2024-01-28" },
    { id: 12, description: "Anúncios Facebook", category: "Marketing", value: 400.00, type: "Única", date: "2024-01-30" }
];

// Pagination state
const state = {
    appointments: { currentPage: 1, itemsPerPage: 5 },
    products: { currentPage: 1, itemsPerPage: 5 },
    expenses: { currentPage: 1, itemsPerPage: 5 }
};

// Helper functions
function getStatusBadge(status) {
    const statusMap = {
        pending: 'Pendente',
        approved: 'Aprovado',
        rejected: 'Rejeitado'
    };
    return `<span class="status-badge ${status}">${statusMap[status]}</span>`;
}

function getStockStatus(stock) {
    if (stock > 20) return { text: 'Em estoque', class: 'in-stock' };
    if (stock > 10) return { text: 'Estoque baixo', class: 'low-stock' };
    return { text: 'Crítico', class: 'critical' };
}

// Render functions
function renderAppointments() {
    const { currentPage, itemsPerPage } = state.appointments;
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const currentData = appointmentsData.slice(startIndex, endIndex);

    const tbody = document.getElementById('appointments-tbody');
    tbody.innerHTML = currentData.map(apt => `
        <tr>
            <td>${apt.id}</td>
            <td>${apt.client}</td>
            <td>${apt.service}</td>
            <td>${apt.datetime}</td>
            <td>${getStatusBadge(apt.status)}</td>
            <td>
                <div class="btn-group">
                    <button class="btn btn-success btn-sm" onclick="approveAppointment(${apt.id})" ${apt.status !== 'pending' ? 'disabled' : ''}>
                        Aprovar
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="rejectAppointment(${apt.id})" ${apt.status !== 'pending' ? 'disabled' : ''}>
                        Rejeitar
                    </button>
                </div>
            </td>
        </tr>
    `).join('');

    renderPagination('appointments', appointmentsData.length);
}

function renderProducts() {
    const { currentPage, itemsPerPage } = state.products;
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const currentData = productsData.slice(startIndex, endIndex);

    const tbody = document.getElementById('products-tbody');
    tbody.innerHTML = currentData.map(product => {
        const stockStatus = getStockStatus(product.stock);
        return `
            <tr>
                <td>${product.id}</td>
                <td>${product.name}</td>
                <td>${product.category}</td>
                <td>R$ ${product.price.toFixed(2)}</td>
                <td>
                    <span class="status-badge ${stockStatus.class}">${stockStatus.text}</span>
                    (${product.stock})
                </td>
            </tr>
        `;
    }).join('');

    renderPagination('products', productsData.length);
}

function renderExpenses() {
    const { currentPage, itemsPerPage } = state.expenses;
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const currentData = expensesData.slice(startIndex, endIndex);

    const tbody = document.getElementById('expenses-tbody');
    tbody.innerHTML = currentData.map(expense => `
        <tr>
            <td>${expense.id}</td>
            <td>${expense.description}</td>
            <td>${expense.category}</td>
            <td>R$ ${expense.value.toFixed(2)}</td>
            <td>${expense.type}</td>
            <td>${new Date(expense.date).toLocaleDateString('pt-BR')}</td>
        </tr>
    `).join('');

    renderPagination('expenses', expensesData.length);
}

function renderPagination(type, totalItems) {
    const { currentPage, itemsPerPage } = state[type];
    const totalPages = Math.ceil(totalItems / itemsPerPage);
    const container = document.getElementById(`${type}-pagination`);

    let html = `
        <button onclick="changePage('${type}', ${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}>
            Anterior
        </button>
    `;

    for (let i = 1; i <= totalPages; i++) {
        html += `
            <button class="${i === currentPage ? 'active' : ''}" onclick="changePage('${type}', ${i})">
                ${i}
            </button>
        `;
    }

    html += `
        <button onclick="changePage('${type}', ${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''}>
            Próximo
        </button>
    `;

    container.innerHTML = html;
}

// Event handlers
function changePage(type, page) {
    const totalPages = Math.ceil(
        (type === 'appointments' ? appointmentsData : 
         type === 'products' ? productsData : expensesData).length / 
        state[type].itemsPerPage
    );

    if (page < 1 || page > totalPages) return;

    state[type].currentPage = page;

    if (type === 'appointments') renderAppointments();
    else if (type === 'products') renderProducts();
    else if (type === 'expenses') renderExpenses();
}

function approveAppointment(id) {
    const appointment = appointmentsData.find(apt => apt.id === id);
    if (appointment) {
        appointment.status = 'approved';
        renderAppointments();
    }
}

function rejectAppointment(id) {
    const appointment = appointmentsData.find(apt => apt.id === id);
    if (appointment) {
        appointment.status = 'rejected';
        renderAppointments();
    }
}

// Navigation
document.querySelectorAll('.nav-button').forEach(button => {
    button.addEventListener('click', () => {
        const view = button.dataset.view;

        // Update active button
        document.querySelectorAll('.nav-button').forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        // Update active view
        document.querySelectorAll('.view').forEach(v => v.classList.remove('active'));
        document.getElementById(`${view}-view`).classList.add('active');

        // Render data for the view
        if (view === 'appointments') renderAppointments();
        else if (view === 'products') renderProducts();
        else if (view === 'expenses') renderExpenses();
    });
});

// Modal handling
const modal = document.getElementById('expense-modal');
const addExpenseBtn = document.getElementById('add-expense-btn');
const closeModalBtn = document.getElementById('close-modal');
const cancelBtn = document.getElementById('cancel-btn');
const expenseForm = document.getElementById('expense-form');

addExpenseBtn.addEventListener('click', () => {
    modal.classList.add('active');
});

closeModalBtn.addEventListener('click', () => {
    modal.classList.remove('active');
    expenseForm.reset();
});

cancelBtn.addEventListener('click', () => {
    modal.classList.remove('active');
    expenseForm.reset();
});

modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.remove('active');
        expenseForm.reset();
    }
});

expenseForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const newExpense = {
        id: expensesData.length + 1,
        description: document.getElementById('expense-description').value,
        category: document.getElementById('expense-category').value,
        value: parseFloat(document.getElementById('expense-value').value),
        type: document.getElementById('expense-type').value,
        date: document.getElementById('expense-date').value
    };

    expensesData.push(newExpense);
    renderExpenses();
    modal.classList.remove('active');
    expenseForm.reset();
});

// Initialize
renderAppointments();
