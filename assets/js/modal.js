function modalExcluir(id) {
    var modal = document.getElementById("modalExcluir");
    var body = document.querySelector("body");
    body.classList.add("none-scroll");
    modal.style.display = "block";

    modal.innerHTML = `
        <div class="modal-content position-absolute top-50 start-50 translate-middle" style="width: 400px; padding: 20px; text-align: center;">
            <h2>Confirmar Exclusão</h2>
            <p>Tem certeza que deseja excluir o item ${id}?</p>
            <button class="btn btn-danger mb-2" onclick="confirmarExclusao()">Excluir</button>
            <button class="btn btn-secondary" onclick="fecharModalExcluir()">Cancelar</button>
        </div>
    `;
}

function fecharModalExcluir() {
    var modal = document.getElementById("modalExcluir");
    modal.style.display = "none";
    document.querySelector("body").classList.remove("none-scroll");
}

function confirmarExclusao() {
    alert("Item excluído com sucesso!");
    fecharModalExcluir();
}

function modalEditar(id) {
    var modal = document.getElementById("modalEditar");
    var body = document.querySelector("body");
    body.classList.add("none-scroll");
    modal.style.display = "block";

    let conteudo = "";

    // ID 1: AMBIENTE
    if (id == 1) {
        conteudo = `
        <div class="modal-content position-absolute top-50 start-50 translate-middle" style="width: 400px; padding: 20px; text-align: center;">
            <h2>Editar Ambiente</h2>
            <form class="form-group text-start">
                <div class="mb-3">
                    <label class="form-label">Nome do Ambiente</label>
                    <input type="text" class="form-control" placeholder="Nome do Ambiente">
                </div>
                <div class="mb-3">
                    <label class="form-label">Bloco</label>
                    <select class="form-select">
                        <option value="">Selecione o Bloco</option>
                        <option value="blocoA">Bloco A</option>
                        <option value="blocoB">Bloco B</option>
                        <option value="blocoC">Bloco C</option>
                    </select>
                </div>
            </form>
            <div class="mt-3">
                <button class="btn btn-primary" onclick="alert('Salvo!')">Atualizar</button>
                <button class="btn btn-secondary" onclick="fecharModalEditar()">Fechar</button>
            </div>
        </div>`;
    } 
    // ID 2: BLOCO
    else if (id == 2) {
        conteudo = `
        <div class="modal-content position-absolute top-50 start-50 translate-middle" style="width: 400px; padding: 20px; text-align: center;">
            <h2>Editar Bloco</h2>
            <form class="text-start">
                <div class="mb-3">
                    <label class="form-label">Nome do Bloco</label>
                    <input type="text" class="form-control" placeholder="Nome do Bloco">
                </div>
                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
            </form>
            <div class="mt-3">
                <button class="btn btn-primary" onclick="alert('Salvo!')">Atualizar</button>
                <button class="btn btn-secondary" onclick="fecharModalEditar()">Fechar</button>
            </div>
        </div>`;
    }
    // ID 3: TIPOS DE SERVIÇO
    else if (id == 3) {
        conteudo = `
        <div class="modal-content position-absolute top-50 start-50 translate-middle" style="width: 400px; padding: 20px; text-align: center;">
            <h2>Editar Tipo de Serviço</h2>
            <form class="text-start">
                <div class="mb-3">
                    <label class="form-label">Nome do Tipo de Serviço</label>
                    <input type="text" class="form-control" placeholder="Ex: Elétrica">
                </div>
                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
            </form>
            <div class="mt-3">
                <button class="btn btn-primary" onclick="alert('Salvo!')">Atualizar</button>
                <button class="btn btn-secondary" onclick="fecharModalEditar()">Fechar</button>
            </div>
        </div>`;
    }
    // ID 4: USUÁRIO
    else if (id == 4) {
        conteudo = `
        <div class="modal-content position-absolute top-50 start-50 translate-middle" style="width: 450px; padding: 20px; text-align: center;">
            <h2>Editar Usuário</h2>
            <form class="text-start">
                <div class="mb-3">
                    <label class="form-label">Nome do Usuário</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Perfil</label>
                    <select class="form-select">
                        <option value="admin">Administrador</option>
                        <option value="user">Usuário</option>
                        <option value="tec">Técnico</option>
                    </select>
                </div>
            </form>
            <div class="mt-3">
                <button class="btn btn-primary" onclick="alert('Salvo!')">Atualizar</button>
                <button class="btn btn-secondary" onclick="fecharModalEditar()">Fechar</button>
            </div>
        </div>`;
    }

    modal.innerHTML = conteudo;
}

function fecharModalEditar() {
    var modal = document.getElementById("modalEditar");
    modal.style.display = "none";
    document.querySelector("body").classList.remove("none-scroll");
}