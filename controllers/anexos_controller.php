<?php
require_once '../models/database.php';
header('Content-Type: application/json');   
session_start();

if(!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'msg' => 'Acesso negado.' ]);
    exit;
}

$id_chamado = $_GET['id_chamado'];
if (!$id_chamado) {
    echo json_encode(['success' => false, 'msg' => 'ID do chamado não fornecido.' ]);
    exit;
}

$sql = "SELECT   chamados_anexos.caminho_arquivo, chamados_anexos.tipo_anexo, chamados_anexos.id_chamado
        FROM chamados_anexos INNER JOIN chamados ON chamados.id_chamado = chamados_anexos.id_chamado
        WHERE chamados.id_chamado = $id_chamado";

$res = $conn->query($sql);
$dados = $res->fetch_all(MYSQLI_ASSOC);
echo json_encode($dados);