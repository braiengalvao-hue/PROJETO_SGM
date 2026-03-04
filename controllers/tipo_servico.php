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
        $sql = "SELECT * FROM tipos_servico";
        $tipo_servico = [];
        $res = $conn->query($sql);
        if($res){
            while($row = $res->fetch_assoc()){
                $tipo_servico[] = $row;
            }
        }
        echo json_encode(["seccess" => true, "data" => $tipo_servico]);
        exit;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'));

        if(!isset($data->nome) || !isset($data->descricao)){
            echo json_decode(["success" => true, "messagem" => "Dados invalidos para cadastrar um tipo de serviço"]);
            exit;
        }

        $nome = trim($data->nome);
        $descricao = trim($data->descricao);

        $sql= "INSERT INTO tipos_servico (nome, descricao) VALUES('$nome', '$descricao')";

        if($conn->query($sql) === TRUE){
            echo json_encode(["success" => true, "message" => "Tipo de servico Cadastrado com sucesso."]);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents('php://input'));

        if(!isset($data->id)|| !isset($data->nome) || !isset($data->descricao)){
            echo json_encode(["success" => false, "message" => "Dados invalidos"]);
            exit;
        }

        $id = $data->id;
        $nome = $data->nome;
        $descricao = $data->descricao;

        $sql = "UPDATE tipos_servico SET nome = '$nome', descricao = '$descricao' WHERE id_tipo = $id";

        if($conn->query($sql) === TRUE){
            echo json_encode(["success" => true, "message" => "TIpo de servico Atualizado com sucesso"]);
            exit;
        } else{
            echo json_encode(["success" => false, "message" => "Erro ao Atualizar o tipo de servico"]);
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
        $sql = "DELETE FROM tipos_servico WHERE id_tipo = $id";

        if($conn->query($sql) === TRUE){
            echo json_encode(["success" => true, "message" => "Tipo de servico deletado com sucesso."]);
             exit;           
        }
        break;

    default:
        echo json_encode(["success" => true, "message" => "Nenhum metodo selecionado."]);
        exit;
}