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

        <div class="row g-2 justify-content-center mb-3 w-100">
            <div class="d-flex align-items-center justify-content-center gap-2 row" style="width: 100%;">

            <a class="btn btn-secondary " type="button" href="gestor_chamados.php" style="width: 30%;"><i class="bi bi-list-ul"></i> Gerenciar Chamados</a>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 30%;"><i class="bi bi-eye"></i> Vizualizar </button>

            </div> 
        </div>
            
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">O que deseja vizualizar?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                            <div>
            <div class="row g-2 justify-content-center mb-3">
            <div class="col-12 col-sm-auto mb-3">
                <a href="vizualizar_ambientes.php" class="btn btn-outline-secondary"> Ambientes</a>
            </div>

            <div class="col-12 col-sm-auto">
                <a href="vizualizar_blocos.php " class="btn btn-outline-secondary"> Blocos</a>
            </div>

            <div class="col-12 col-sm-auto">
                <a href="vizualizar_tipos_servicos.php" class="btn btn-outline-secondary"> Tipos de serviços</a>
            </div>

            <div class="col-12 col-sm-auto">
                <a href="vizualizar_usuarios.php" class="btn btn-outline-secondary"> Usuários</a>
            </div>

        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </main>

    <div class="container-fluid text-white py-3">

        </div>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>