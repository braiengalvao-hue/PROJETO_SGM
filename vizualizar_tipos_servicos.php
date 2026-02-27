
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SGM - Visualizar Ambientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="gestor_dashboard.php">SGM Admin</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link active" href="vizualizar_tipos_servicos.php">Tipos de serviço</a>
            <a class="nav-link" href="gestor_chamados.php">Chamados</a>
            <a class="nav-link" href="controllers/logout.php">Sair</a>
        </div>
    </div>
</nav>


<div class="container">



    <div class="w-100 d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-4">Todos os Tipos de serviços</h2>   
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"> 
        <i class="bi bi-plus-circle"></i> Cadastrar Tipo de Serviço</button>
    </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Tipos de Serviço</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome do Tipo de Serviço</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nome do Tipo de Serviço">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Descrição do Tipo de Serviço</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            <div class="row g-2 justify-content-center mb-3">
        </div>


        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Cadastrar</button>
                </div>
                </div>
            </div>
            </div>



    <div class="card shadow">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nome do serviço</th>
                        <th>Descrição</th>
                        <th>Editar</th>
                        <th> Excluir</th>
                    </tr>
                </thead>
                <tbody id="tabelaGeral">
                    <th>1</th>
                    <td>Hidraulica</td>
                    <td>Manutenção hidráulica em ambientes</td>
                    <script>var ambienteId = 3;</script>
                    <td><a onclick="modalEditar(ambienteId)" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a></td>
                    <td><a onclick="modalExcluir(ambienteId)" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a></td>
                </tbody>
            </table>
        </div>
    </div>
    <div>

    </div>
</div>

<div id="modalEditar" class="modal"></div>
<div id="modalExcluir" class="modal"></div>


<script src="assets/js/modal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>