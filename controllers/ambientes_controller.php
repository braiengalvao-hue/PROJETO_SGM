<?php
session_start();
require_once '../models/database.php';
header('Content-Type: application/json');

if(!isset($_SESSION['user_id']) || $_SESSION['user_perfil'] !== 'gestor') {
    echo json_encode(['success' => false, 'msg' => 'Acesso negado.' ]);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method){
    case 'GET':
        $sql = "SELECT ambientes.id_ambiente, ambientes.nome, ambientes.id_bloco,
            blocos.nome FROM ambientes LEFT JOIN blocos on ambientes.id_bloco = blocos.id_bloco ORDER BY ambientes.nome ";
        
        $res = $conn->query($sql);
        $ambientes = [];

        if($res){
            while($row = $res->fetch_assoc()){
                $ambientes[] = $row;
            }
        }
        echo json_encode(["success" => true, "data" => $ambientes]);
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"));

        if(!isset($data->nome) || !isset($data->id_bloco)){
            echo json_encode(["success" => false, "message" => "Dados incompletos. Informe o nome e o id_bloco"]);
        }
        $nome = $conn->real_escape_string(trim($data->nome));
        $id_bloco = (int) $data->id_bloco;

        $sql = "INSERT INTO ambientes (ambientes.nome, ambientes.id_bloco) 	VALUES ('$nome', $id_bloco)";

        

        if($conn->query($sql) === TRUE){
             echo json_encode(["success" => true, "message" => "Ambiente criado com suceso!"]);
        } else{
            echo json_encode(["success" => false, "message" => "Erro ao criar ambiente: " . $conn->error]);
        }
        break;
    case 'PUT':
        $data = json_decode(file_get_contents("php://input"));

        if(!isset($data->id_ambiente) || !isset($data->nome)){
            echo json_encode(["success" => false, "message" => "Dados incompletos para atualização."]);
            exit;
        }
        $id_ambiente = (int) $data->id_ambiente;
        $nome = $conn->real_escape_string(trim($data->nome));
        $id_bloco = (int)  $data->id_bloco;

        $sql = "UPDATE ambientes SET ambientes.nome = '$nome', ambientes.id_bloco = $id_bloco WHERE ambientes.id_ambiente = $id_ambiente";

        if($conn->query($sql) === TRUE){
            echo json_encode(["success" => true, "message" => "Ambiente atualizado com suceso!"]);
        } else{
            echo json_encode(["success" => false, "message" => "Erro ao atualizar ambiente: " . $conn->error]);
        }
        break;
    case 'DELETE':
         $data = json_decode(file_get_contents("php://input"));

         if(!isset($data->id_ambiente)){
            echo json_encode(["success" => false, "message" => "Dados incompletos para atualização."]);
            exit;
        }
        $id_ambiente = (int) $data->id_ambiente;

        $sql = "DELETE   FROM ambientes WHERE id_ambiente = $id_ambiente";
        
        if($conn->query($sql) === TRUE){
            echo json_encode(["success" => true, "message" => "Ambiente deletado com suceso!"]);
        } else{
            echo json_encode(["success" => false, "message" => "Erro ao deletar ambiente: " . $conn->error]);
        }
    
        default:
        echo json_encode(["success" => true, "message" => "Nenhum metodo selecionado."]);
        exit;   
}