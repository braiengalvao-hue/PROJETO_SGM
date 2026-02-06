<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnico DashBoard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

        <nav class="navbar navbar-expand-lg bg-dark mb-4" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="gestor_dashboard.php">SGM | Gestão Adiministrativa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 g-3">
                    </ul>
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <a class="btn text-white me-2">Chamados</a>
                    <a class="btn text-secondary me-2" href="">Locais</a>
                    <a class="btn btn-outline-light btn-sm" type="button" href="controllers/logout.php">Sair</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container">

        <section class=" col col-6 row g-3 mb-4 w-100">

            <div class="d-flex w-100 align-items-center justify-content-start">
                <h5 class="card-title mb-0">Todos os Chamados</h5>
            </div>

            <div class="d-flex w-100 align-items-center justify-content-start gap-3">
                
                <button type="button" class="btn btn-outline-secondary">Todos</button>
                <button type="button" class="btn btn-outline-primary">Abertos</button>
                <button type="button" class="btn btn-outline-warning">Em Execução</button>
                <button type="button" class="btn btn-outline-success">Concluídos</button>

            </div>

        </section>

        <section class="col-6 w-100">

            <table class="table table-striped border border-dark-subtle shadow p-5 rounded-2" style="overflow: hidden;">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Local</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Data</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                    <th scope="row">1</th>
                    <td>foto</td>
                    <td>Sala de Informatica</td>
                    <td>Problema grande com problemas grandes</td>
                    <td>🟡 Média</td>
                    <td>03/04/2008</td>
                    <td><span class="btn btn-secondary"> FECHADO</span></td>
                    <td><span class="btn btn-primary"><i class="bi bi-eye"></i>  Gerenciar</span></td>
                    </tr>
                </tbody>
            </table>

        </section>
        
        

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>