<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor DashBoard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg bg-dark mb-4" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#">SGM | Gestão Adiministrativa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <span class="text-white me-2">Olá, Admin Gestor</span>
                    <a class="btn btn-outline-light btn-sm" type="button" href="controllers/logout.php">Sair</a>
                </div>
            </div>
        </div>
    </nav>
    
    <main class="container">
        <div class="row g-3 mb-4">
            <div class="col-12 col-md-4">
                <div class="card text-bg-primary h-100">
                    <div class="card-header">Novas solicitações</div>
                    <div class="card-body">
                        <h5 class="card-title fs-2">0</h5>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card text-bg-warning h-100">
                    <div class="card-header text-white">Em atendimento</div>
                    <div class="card-body">
                        <h5 class="card-title fs-2 text-white">0</h5>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card text-bg-danger h-100">
                    <div class="card-header">Críticos / Urgentes</div>
                    <div class="card-body">
                        <h5 class="card-title fs-2">0</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-2 justify-content-center">
            <div class="col-12 col-sm-auto">
                <a class="btn btn-secondary w-100" type="button" href="gestor_chamados.php"><i class="bi bi-list-ul"></i> Gerenciar Todos os Chamados</a>
            </div>
            <div class="col-12 col-sm-auto">
                <a class="btn btn-outline-info w-100"> <i class="bi bi-geo-alt"></i> Configurar Ambientes</a>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>