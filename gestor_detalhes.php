<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_perfil'] !== 'gestor') {
    header('Location: index.php');
    exit;
}

if (!isset($_GET['id'])) {
    die("ID do chamado não informado.");
}

$id = intval($_GET['id']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor - Detalhes do Chamado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<main class="container py-4">

    <nav class="mb-4">
        <a class="btn btn-outline-secondary" href="gestor_chamados.php">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </nav>

    <div class="row g-4">

        <!-- Dados do Chamado -->
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-white">
                    <strong>Dados da Solicitação</strong>
                </div>
                <div id="detalhesChamado" class="card-body">
                    Carregando...
                </div>
            </div>

            <div id="areaFechamento" class="mt-3"></div>
        </div>

        <!-- Gerenciar -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <strong>Gerenciar Chamado</strong>
                </div>

                <div class="card-body">
                    <form id="formAtribuir">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Técnico responsável</label>
                            <select id="selectTecnico" class="form-select" required>
                                <option value="">Selecione...</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Prioridade</label>
                            <select id="prioridade" class="form-select" required>
                                <option value="baixa">Baixa</option>
                                <option value="media">Média</option>
                                <option value="alta">Alta</option>
                                <option value="urgente">Urgente</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Data prevista</label>
                            <input type="date" id="data_prevista" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Confirmar Atribuição
                        </button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Modal Foto -->
<div class="modal fade" id="modalFoto" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center bg-dark">
                <img id="imgModal" class="img-fluid">
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const chamadoId = <?= $id ?>;

function verFoto(url) {
    document.getElementById('imgModal').src = 'assets/uploads/'+url;
    new bootstrap.Modal(document.getElementById('modalFoto')).show();
}

async function carregarDados() {
    try {

        // Técnicos
        const resTec = await fetch('controllers/usuarios.php');
        const tecnicos = await resTec.json();
        const select = document.getElementById('selectTecnico');
        select.innerHTML = '<option value="">Selecione...</option>';

        if (Array.isArray(tecnicos)) {
            tecnicos.forEach(t => {
                select.innerHTML += `<option value="${t.id_usuario}">${t.nome}</option>`;
            });
        }

        // Chamado
        const resChamado = await fetch(`controllers/chamado.php?id=${chamadoId}`);
        const c = await resChamado.json();

        document.getElementById('detalhesChamado').innerHTML = `
            <p><strong>Status:</strong> <span class="badge bg-secondary">${c.status?.toUpperCase() || ''}</span></p>
            <p><strong>Descrição:</strong> ${c.descricao_problema || ''}</p>
            <p><strong>Local:</strong> ${c.bloco_nome || ''} - ${c.ambiente_nome || ''}</p>
            <p><strong>Solicitante:</strong> ${c.solicitante_nome || ''}</p>
            <p><strong>Abertura:</strong> ${c.data_abertura ? new Date(c.data_abertura).toLocaleString() : ''}</p>
            <div id="fotosContainer"></div>
        `;

        if (c.id_tecnico) select.value = c.id_tecnico;
        if (c.prioridade) document.getElementById('prioridade').value = c.prioridade;
        if (c.data_previsao_conclusao) document.getElementById('data_prevista').value = c.data_previsao_conclusao;

        // Anexos
        const resAnexos = await fetch(`controllers/anexos_controller.php?id_chamado=${chamadoId}`);
        const anexos = await resAnexos.json();

        if (Array.isArray(anexos) && anexos.length > 0) {
            let html = '<hr><h6>Evidências:</h6><div class="row">';
            anexos.forEach(arq => {
                html += `
                    <div class="col-4 text-center mb-2">
                        <img src="./assets/uploads/${arq.caminho_arquivo}" class="img-fluid rounded"
                             style="cursor:pointer; max-height:120px; object-fit:cover;"
                             onclick="verFoto('${arq.caminho_arquivo}')">
                        <small class="text-muted d-block">
                            ${arq.tipo_anexo === 'abertura' ? 'Abertura' : 'Conclusão'}
                        </small>
                    </div>
                `;
            });
            document.getElementById('fotosContainer').innerHTML = html + '</div>';
        }

    } catch (erro) {
        console.error(erro);
        document.getElementById('detalhesChamado').innerHTML =
            '<div class="alert alert-danger">Erro ao carregar dados.</div>';
    }
}

document.getElementById('formAtribuir').onsubmit = async (e) => {
    e.preventDefault();

    const res = await fetch('controllers/atribuir_chamado.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
            id_chamado: chamadoId,
            id_tecnico: document.getElementById('selectTecnico').value,
            prioridade: document.getElementById('prioridade').value,
            data_prevista: document.getElementById('data_prevista').value
        })
    });

    const retorno = await res.json();
    if (retorno.success) {
        window.location.href = 'gestor_chamados.php';
    } else {
        alert("Erro ao atribuir chamado.");
    }
};

carregarDados();
</script>

</body>
</html>