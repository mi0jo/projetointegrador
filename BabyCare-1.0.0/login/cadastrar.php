<?php
session_start();
include("../include/conexao.php");

if (!$mysqli) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coletar e sanitizar dados do formulário
    $nome = trim($_POST['nome'] ?? '');
    $sobrenome = trim($_POST['sobrenome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $confirmar_senha = $_POST['confirmar_senha'] ?? '';
    $nascimento = $_POST['nascimento'] ?? '';
    $termos = isset($_POST['termos']);

    // Array para armazenar erros
    $errors = [];

    // Armazenar dados do formulário para repopular em caso de erro
    $_SESSION['form_data'] = [
        'nome' => $nome,
        'sobrenome' => $sobrenome,
        'email' => $email,
        'nascimento' => $nascimento
    ];

    // Validações
    if (empty($nome)) {
        $errors[] = "Nome é obrigatório";
    }

    if (empty($sobrenome)) {
        $errors[] = "Sobrenome é obrigatório";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email inválido";
    }

    if (strlen($senha) < 8) {
        $errors[] = "A senha deve ter pelo menos 8 caracteres";
    } elseif (!preg_match('/[A-Za-z]/', $senha) || !preg_match('/[0-9]/', $senha)) {
        $errors[] = "A senha deve conter letras e números";
    }

    if ($senha !== $confirmar_senha) {
        $errors[] = "As senhas não coincidem";
    }

    if (empty($nascimento)) {
        $errors[] = "Data de nascimento é obrigatória";
    }

    if (!$termos) {
        $errors[] = "Você deve aceitar os termos de serviço";
    }

    // Se não há erros, prosseguir com o cadastro
    if (empty($errors)) {
        // Verificar se email já existe
        $check_sql = "SELECT user_id FROM users WHERE email = ?";
        $check_stmt = $mysqli->prepare($check_sql);
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        
        if ($check_result->num_rows > 0) {
            $errors[] = "Este email já está cadastrado";
        } else {
            // Combinar nome e sobrenome
            $nome_completo = $nome . ' ' . $sobrenome;
            
            // Inserir usuário no banco
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $insert_sql = "INSERT INTO users (nome, email, Data_Nascimento, senha, tipo) VALUES (?, ?, ?, ?, 'user')";
            $insert_stmt = $mysqli->prepare($insert_sql);
            $insert_stmt->bind_param("ssss", $nome_completo, $email, $nascimento, $senha_hash);
            
            if ($insert_stmt->execute()) {
                // Limpar dados do formulário da sessão
                unset($_SESSION['form_data']);
                
                // Redirecionar para página de sucesso
                $_SESSION['cadastro_sucesso'] = "Cadastro realizado com sucesso! Faça login para acessar sua conta.";
                header('Location: ../deslogado/login.php');
                exit();
            } else {
                $errors[] = "Erro ao cadastrar usuário. Tente novamente.";
            }
            
            $insert_stmt->close();
        }
        $check_stmt->close();
    }

    // Se há erros, redirecionar de volta ao formulário
    if (!empty($errors)) {
        $_SESSION['cadastro_errors'] = $errors;
        header('Location: ../deslogado/cadastro.php');
        exit();
    }
} else {
    // Se não for POST, redirecionar para o formulário
    header('Location: ../deslogado/cadastro.php');
    exit();
}
?>