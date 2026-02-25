<?php
require_once '../models/database.php';
header('Content-Type: application/json');   
session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['user_perfil'] !== 'gestor') {
    echo json_encode(['success' => false, 'msg' => 'Acesso negado.' ]);
    exit;
}

// Pega o status do filtro (se houver)
$status = isset($_GET['status']) ? $_GET['status'] : '';
$where = "";
if (!empty($status)) {
    // Escapa para evitar SQL Injection básico
    $status_safe = $conn->real_escape_string($status);
    $where = " WHERE chamados.status = '$status_safe'";
}

// SQL ajustado com os aliases corretos para o JavaScript
$sql = "SELECT 
            c.id_chamado, 
            u.nome as solicitante_nome, 
            a.nome as ambiente_nome, 
            b.nome as bloco_nome, 
            c.prioridade, 
            c.status,
            t.nome as tecnico_nome
        FROM chamados c
        INNER JOIN usuarios u ON u.id_usuario = c.id_solicitante
        INNER JOIN ambientes a ON a.id_ambiente = c.id_ambiente
        INNER JOIN blocos b ON b.id_bloco = a.id_bloco
        LEFT JOIN usuarios t ON t.id_usuario = c.id_tecnico
        $where
        ORDER BY c.id_chamado DESC";

$res = $conn->query($sql);
if (!$res) {
    echo json_encode(["error" => $conn->error]);
    exit;
}

$dados = $res->fetch_all(MYSQLI_ASSOC);
echo json_encode($dados);