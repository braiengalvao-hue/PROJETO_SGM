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

    <nav class="navbar navbar-expand-lg bg-success mb-4">
        <div class="container">
            <a class="navbar-brand"  style="color: #fff;" href="#">SGM | João tecnico</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <span class="text-white me-2"></span>
                    <a class="btn btn-outline-light btn-sm m-3 mt-0 mb-0" type="button" href="controllers/logout.php">Sair</a>
                </div>
            </div>
        </div>
    </nav>
    
    <main class="container col">

        <section class=" col col-6 row g-3 mb-4">
             <h5 class="card-title">Minha fila de trabalho</h5>
        </section>


        <section class=" col-6 row g-3 mb-4">
             <h5 class="card-title">Nenhum trabalho a fazer</h5>
        </section>

        

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>