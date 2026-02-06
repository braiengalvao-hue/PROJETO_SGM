<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Manutenção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="container d-flex justify-content-center align-items-center vh-100">

    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-8 col-lg-4">

            <div class="card border-0 shadow p-4">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary-subtle p-3 rounded-circle text-primary">
                            <i class="bi bi-tools fs-4"></i>
                        </div>
                    </div>
                    <h5 class="card-title text-center fw-bold">Acesso SGM</h5>
                    <p class="text-center text-muted mb-4 small">Entre com suas credenciais</p>

                    <form id="formLogin">
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="seu@email" required>
                        </div>

                        <div class="mb-4">
                            <label for="senha" class="form-label fw-bold small">Senha</label>
                           <input type="password" class="form-control" id="senha" name="senha" placeholder="******" required>
                        </div>

                        <button class="btn btn-primary w-100">Entrar</button>
                        <div id="mensagem" class="mt-3 text-center text-danger small"></div>

                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none text-secondary">Esqueceu a senha?</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>