<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_GET['confirmar']) && $_GET['confirmar'] == 'sim') {
    session_destroy();
    header("Location: ../login.php");
    exit;
}
$nome_usuario = isset($_SESSION['user_nome']) ? $_SESSION['user_nome'] : 'Usuário';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGM - Sair do Sistema</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body class="bg-light">


<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow border-0" style="border-radius: 15px;">
                <div class="card-body p-5 text-center">
                    <div class="mb-4">
                        <i class="bi bi-person-walking text-primary" style="font-size: 3rem;"></i>
                    </div>
                    
                    <h3 class="fw-bold text-dark mb-3">
                        <?php echo explode(' ', trim($nome_usuario))[0]; ?>, já quer sair?
                    </h3>
                    

                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button onclick="history.back()" class="btn btn-outline-secondary px-4 py-2" style="border-radius: 10px;">
                            Não, continuar aqui
                        </button>
                        
                        <a href="logout.php?confirmar=sim" class="btn btn-danger px-4 py-2" style="border-radius: 10px;">
                            Sim, sair agora
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>