<?php
session_start();
require_once '../models/database.php';
header('Content-Type: application/json');   

if(!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Acesso negado.']);
    exit;
}

$id_solicitante = $_SESSION['user_id'];
$id_ambiente = $_POST['id_ambiente'] ;
$id_tipo = $_POST['id_tipo'];
$descricao = $conn->real_escape_string($_POST['descricao']);

if(!$id_ambiente || !$id_tipo || empty($descricao)) {
    echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios.']);
    exit;
}


$sql = "INSERT INTO chamados (descricao_problema, id_solicitante, id_ambiente, id_tipo_servico) VALUES ('$descricao', $id_solicitante, $id_ambiente, $id_tipo)";
if ($conn->query($sql) === TRUE) {
    $id_chamado = $conn->insert_id;

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $diretorio = '../assets/uploads/';
        
        if (!is_dir($diretorio)) mkdir($diretorio, 0777, true);
        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $nome_arquivo = "abertura_". uniqid(). "." . $extensao;
        $caminho_final = $diretorio . $nome_arquivo;
        if(move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_final)) {
            $sqlFoto = "INSERT INTO chamados_anexos (id_chamado, caminho_arquivo) VALUES ($id_chamado, '$nome_arquivo')";
            $conn->query($sqlFoto);
        }
    }

    echo json_encode(['success' => true, 'message' => "Chamado #$id_chamado criado com sucesso!"]);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao criar chamado: ' . $conn->error]);
}