<?php
session_start();
if(!isset($_SESSION['user_id']) || $_SESSION['user_perfil'] !== 'solicitante') {
    header('Location: login.php');
    exit;
}   
?>


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

    <nav class="navbar navbar-expand-lg bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand"  style="color: #fff;" href="#">SGM - Painel do Solicitante</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <span class="text-white me-2">Olá Maria Solicitante</span>
                    <a class="btn btn-outline-light btn-sm m-3 mt-0 mb-0" type="button" href="controllers/logout.php">Sair</a>
                </div>
            </div>
        </div>
    </nav>
    
    <main class="container">

        <section class=" col col-6 row g-3 mb-4 w-100">

            <div class="d-flex w-100 align-items-center justify-content-around">
                <h5 class="card-title mb-0">Minha fila de trabalho</h5>
                <span></span>
                <button type="button" class="btn btn-success" style="width: 200px;" onclick="window.location.href='solicitante_abrir_chamado.php'"> + Nova Solicitação</button>
            </div>

        </section>

        <section class="col-6 w-100">

            <table id="tabelaChamados" class="table table-striped border border-dark-subtle shadow p-5 rounded-2" style="overflow: hidden;">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Local</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                    <th scope="row">1</th>
                    <td>foto</td>
                    <td>Sala de Informatica</td>
                    <td>Problema grande com problemas grandes</td>
                    <td>03/04/2008</td>
                    <td><span class="btn btn-secondary"> FECHADO</span></td>
                    </tr>
                </tbody>
            </table>

        </section>
        
        

    </main>

    <div class="modal fade" id="modalFoto" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-0">
        <img src="" id="imgModal" class="img-fluid rounded" alt="Foto do Chamado">
      </div>
    </div>
  </div>
</div>

    <script>
        async function carregarChamados() {
            try {
                const response = await fetch('controllers/chamados_solicitante_controller.php');
                const chamados = await response.json();
                
                
                const lista = document.querySelector('#tabelaChamados tbody');
                const cores = { 
                    'aberto': 'bg-secondary', 
                    'agendado': 'bg-info', 
                    'em_execucao': 'bg-warning', 
                    'concluido': 'bg-success', 
                    'fechado': 'bg-dark' 
                };

                // Geramos as linhas
                const rows = await Promise.all(chamados.map(async c => {
                    const respAnexos = await fetch(`controllers/anexos_controller.php?id_chamado=${c.id_chamado}`);
                    const anexos = await respAnexos.json();
                    
                    const thumbHtml = anexos.length > 0 ?
                        `<img src="assets/uploads/${anexos[0].caminho_arquivo}" style="width:50px; cursor:pointer;" onclick="verFoto('${anexos[0].caminho_arquivo}')">` :
                        '<i class="bi bi-image text-muted"></i>';

                    return `<tr>    
                        <td>#${c.id_chamado}</td>
                        <td>${thumbHtml}</td>
                        <td>${c.bloco_nome} - ${c.ambiente_nome}</td>
                        <td>${c.descricao_problema.substring(0,30)}...</td>
                        <td>${new Date(c.data_abertura).toLocaleDateString('pt-BR')}</td>
                        <td><span class="badge ${cores[c.status] || 'bg-primary'}">${c.status.toUpperCase()}</span></td>
                    </tr>`;
                }));

                // Inserimos no HTML
                lista.innerHTML = rows.join('');
                
            } catch (error) {
                console.error("Erro ao carregar chamados:", error);
            }
        }

        function verFoto(url) {
            const modalEl = document.getElementById('modalFoto');
            if(modalEl) {
                document.getElementById('imgModal').src ='assets/uploads/'+ url;
                new bootstrap.Modal(modalEl).show();
            } else {
                alert("Modal de foto não encontrado no HTML!");
            }
        }

        carregarChamados();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>