<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Barbearia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../estilos/estilo.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex overflow-hidden">
        
        <!-- Componente Sidebar -->
      <?php include '../componentes/menu.php'; ?>

        <main class="flex-fill overflow-hidden">
            <header class="bg-white border-bottom p-3 overflow-hidden">
                <button class="btn btn-light btn-sm" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
            </header>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
