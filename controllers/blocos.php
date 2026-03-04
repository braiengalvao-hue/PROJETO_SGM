<?php
session_start();
require_once '../models/database.php';
header('Content-Type: application/json');

if(!isset($_SESSION['user_id']) || $_SESSION['user_perfil'] !== 'gestor') {
    echo json_encode(['success' => false, 'msg' => 'Acesso negado.' ]);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        $sql = "SELECT blocos.id_bloco, blocos.nome, blocos.descricao FROM blocos";
        
        $res = $conn->query($sql);
        $blocos = [];

        if($res){
            while($row = $res->fetch_assoc()){
                $blocos[] = $row;
            }
        }
        echo json_encode(["success" => true, "data" => $blocos]);
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'));

        if(!isset($data->nome) || !isset($data->descricao)){
            echo json_encode(["success" => false, "message" => "Dados invalidos, reenvie o nome e a descricao."]);
            exit;
        }

        $nome = trim($data->nome);
        $descricao = trim($data->descricao);

        $sql = "INSERT INTO blocos (nome, descricao) VALUES ('$nome', '$descricao')";

        if($conn->query($sql) === TRUE){
            echo json_encode(["success" => true, "message" => "Bloco cadastrado com sucesso"]);
            exit;
        } else{
            echo json_encode(["success" => false, "message" => "Erro ao cadastrar bloco"]);
            exit;
        }

    case 'PUT':
        $data = json_decode(file_get_contents('php://input'));

        if(!isset($data->nome) || !isset($data->descricao) || !isset($data->id)){
            echo json_encode(["success" => false, "message" => "Dados invalidos, reenvie o id, o nome e a descricao."]);
            exit;
        }

        $id = (int) $data->id;
        $nome =trim($data->nome);
        $descricao = trim($data->descricao);

        $sql ="UPDATE blocos SET blocos.nome = '$nome', blocos.descricao = '$descricao' WHERE id_bloco = $id";

        if($conn->query($sql) === TRUE){
            echo json_encode(["success" => true, "message" => "Bloco Atualizado com sucesso"]);
            exit;
        } else{
            echo json_encode(["success" => false, "message" => "Erro ao Atualizar bloco"]);
            exit;
        }
        break;

    case 'DELETE':
        $data = json_decode(file_get_contents('php://input'));

        if(!isset($data->id)){
             echo json_encode(["success" => false, "message" => "Dados invalidos, reenvie o id."]);
             exit;
        }
        $id = (int) $data->id;
        $sql = "DELETE FROM blocos WHERE id_bloco = $id";

        if($conn->query($sql) === TRUE){
            echo json_encode(["success" => true, "message" => "Bloco deletado com sucesso."]);
             exit;           
        }
        break;

    default:
        echo json_encode(["success" => true, "message" => "Nenhum metodo selecionado."]);
        exit;           
}
