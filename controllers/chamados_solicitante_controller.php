<?php
require_once '../models/database.php';
header('Content-Type: application/json');   
session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['user_perfil'] !== 'solicitante') {
    echo json_encode(['success' => false, 'msg' => 'Acesso negado.' ]);
    exit;
}
$sql = "SELECT  chamados.id_chamado, ambientes.nome as 'ambiente',chamados.descricao_problema, chamados.data_abertura, chamados.status 
FROM chamados 
INNER JOIN usuarios ON usuarios.id_usuario = chamados.id_solicitante
INNER JOIN ambientes ON ambientes.id_ambiente = chamados.id_ambiente
ORDER BY chamados.id_chamado ASC";


$res = $conn->query($sql);
$dados = $res->fetch_all(MYSQLI_ASSOC);
echo json_encode($dados);
