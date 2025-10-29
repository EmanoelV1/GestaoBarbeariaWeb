// Sidebar toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('main');

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            sidebar.classList.toggle('show');
            mainContent.classList.toggle('expanded');
        });
    }

    // Approve/Reject button interactions (for demonstration)
    const approveButtons = document.querySelectorAll('.btn-primary');
    const rejectButtons = document.querySelectorAll('.btn-danger');

    approveButtons.forEach(button => {
        if (button.textContent.includes('Aprovar')) {
            button.addEventListener('click', function() {
                alert('Agendamento aprovado com sucesso!');
            });
        }
    });

    rejectButtons.forEach(button => {
        if (button.textContent.includes('Rejeitar')) {
            button.addEventListener('click', function() {
                if (confirm('Tem certeza que deseja rejeitar este agendamento?')) {
                    alert('Agendamento rejeitado.');
                }
            });
        }
    });
});
