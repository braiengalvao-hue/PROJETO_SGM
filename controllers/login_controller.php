<?php
// Inclui o arquivo que faz a conexão com o banco de dados ($conn)
require '../models/database.php';

// Inicia uma sessão (permite armazenar dados do usuário que persistem entre páginas)
session_start();

// Define que a resposta desse script será no formato JSON (padrão para APIs/JavaScript)
header('Content-Type: application/json');

// Lê o corpo da requisição (útil quando os dados são enviados via fetch/axios em JSON)
$dadosBrutos = file_get_contents("php://input");

// Decodifica a string JSON para um objeto PHP
$data = json_decode($dadosBrutos);

// Verifica se os dados existem e se o e-mail e a senha foram enviados
if(!$data || !isset($data->senha) || !isset($data->email)){
    echo json_encode(["success" => false, "message" => "Dados inválidos."]);
    exit; // Interrompe a execução caso falte algo
}

// Limpa o e-mail para evitar SQL Injection (escape de caracteres especiais)
$email = $conn->real_escape_string($data->email);

// Remove espaços em branco extras no início e fim da senha
$senha = trim($data->senha);

// Monta a instrução SQL para buscar os dados do usuário pelo e-mail
$sql = "SELECT id_usuario, nome, senha_hash, perfil, ativo FROM usuarios WHERE email = '$email' LIMIT 1";

// Executa a query no banco de dados
$result = $conn->query($sql);

// Verifica se a consulta retornou exatamente 1 registro
if($result && $result->num_rows === 1){
    
    // Transforma o resultado do banco em um array associativo
    $user = $result->fetch_assoc();
    
    // Pega o hash da senha que está armazenado no banco
    $hashDoBanco = trim($user['senha_hash']);

    // Compara a senha digitada com o hash criptografado do banco
    if(password_verify($senha, $hashDoBanco)){
        
        // Se a senha estiver correta, salva as informações essenciais na Sessão
        $_SESSION['user_id'] = $user['id_usuario'];
        $_SESSION['user_nome'] = $user['nome'];
        $_SESSION['user_perfil'] = $user['perfil'];

        // Retorna sucesso para o front-end
        echo json_encode(["success" => true, "perfil" => $user['perfil']]);
    }
    else{
        // Se a senha não bater, retorna erro
        echo json_encode(['success' => false, "message" => "Senha incorreta."]);
        exit;
    }
} else {
    // Se o e-mail não existir no banco, retorna erro
    echo json_encode(['success' => false, "message" => "Usuário não encontrado."]);
    exit;
}