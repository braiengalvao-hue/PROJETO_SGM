<?php
session_start();
require_once '../models/database.php';
header('Content-Type: application/json');

$acao = $_GET['acao'] ?? '';

if ($acao === 'listar_blocos') {    
    $res = $conn->query("SELECT id_bloco,nome FROM blocos");
    $blocos = $res->fetch_all(MYSQLI_ASSOC);
    echo json_encode($blocos);  
} 

elseif ($acao === 'listar_ambientes') {
    $idBloco = (int)($_GET['id_bloco'] ?? 0);   
    $stmt = $conn->prepare("SELECT id_ambiente, nome FROM ambientes WHERE id_bloco = ?");
    $stmt->bind_param("i", $idBloco);
    $stmt->execute();
    echo json_encode($stmt->get_result()->fetch_all(MYSQLI_ASSOC));
}

elseif ($acao === 'listar_tipos') {
    $res = $conn->query("SELECT id_tipo, nome FROM tipos_servico");
    $tipos = $res->fetch_all(MYSQLI_ASSOC);
    echo json_encode($tipos);
}
else {
    echo json_encode(['error' => 'Ação inválida']);
}