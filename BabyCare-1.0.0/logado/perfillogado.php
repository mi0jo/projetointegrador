<?php
session_start();


// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: ../deslogado/login.php');
    exit();
}

include("../include/conexao.php");
$stmt = $mysqli->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();


// Processar upload de foto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto_perfil'])) {
    $uploadDir = '../uploads/avatars/';
    
    // Criar diretório se não existir
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    
    $fileName = 'user_' . $_SESSION['user_id'] . '_' . time() . '_' . uniqid();
    $fileExtension = strtolower(pathinfo($_FILES['foto_perfil']['name'], PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    
    if (in_array($fileExtension, $allowedExtensions)) {
        $filePath = $uploadDir . $fileName . '.' . $fileExtension;
        
        // Verificar se é uma imagem válida
        $check = getimagesize($_FILES['foto_perfil']['tmp_name']);
        if ($check !== false) {
            // Mover arquivo para o diretório
            if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $filePath)) {
                // Atualizar no banco de dados
                $foto_path = 'uploads/avatars/' . $fileName . '.' . $fileExtension;
                
                // Verificar se a coluna foto_perfil existe, se não, criar
                $checkColumn = $mysqli->query("SHOW COLUMNS FROM users LIKE 'foto_perfil'");
                if ($checkColumn->num_rows == 0) {
                    $mysqli->query("ALTER TABLE users ADD COLUMN foto_perfil VARCHAR(255) NULL");
                }
                
                $updateSql = "UPDATE users SET foto_perfil = ? WHERE id = ?";
                $updateStmt = $mysqli->prepare($updateSql);
                $updateStmt->bind_param("si", $foto_path, $_SESSION['user_id']);
                
                if ($updateStmt->execute()) {
                    $_SESSION['success_message'] = "Foto de perfil atualizada com sucesso!";
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                } else {
                    $_SESSION['error_message'] = "Erro ao atualizar foto no banco de dados.";
                }
                $updateStmt->close();
            } else {
                $_SESSION['error_message'] = "Erro ao fazer upload do arquivo.";
            }
        } else {
            $_SESSION['error_message'] = "O arquivo não é uma imagem válida.";
        }
    } else {
        $_SESSION['error_message'] = "Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
    }
}

// Buscar dados do usuário no banco de dados
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Usuário não encontrado
    session_destroy();
    header('Location: ../deslogado/login.php');
    exit();
}

$user = $result->fetch_assoc();
$stmt->close();

// Definir foto padrão se não tiver
$foto_perfil = isset($user['foto_perfil']) && !empty($user['foto_perfil']) ? '../' . $user['foto_perfil'] : '../img/image.png';

// Formatar dados
$nome_completo = $user['nome'];
$email = $user['email'];

// Verificar se a coluna Data_Nascimento existe e formatar
if (isset($user['Data_Nascimento']) && !empty($user['Data_Nascimento'])) {
    $data_nascimento = date('d/m/Y', strtotime($user['Data_Nascimento']));
} else {
    $data_nascimento = 'Não informada';
}

// Verificar se a coluna data_cadastro existe
if (isset($user['data_cadastro']) && !empty($user['data_cadastro'])) {
    $data_cadastro = date('F Y', strtotime($user['data_cadastro']));
} else {
    // Se não tiver data_cadastro, usar a data atual
    $data_cadastro = date('F Y');
}

// Buscar estatísticas reais do banco
// Total de ciclos menstruais
$sql_ciclos = "SELECT COUNT(*) as total FROM calendario_menstrual WHERE user_id = ?";
$stmt_ciclos = $mysqli->prepare($sql_ciclos);
$stmt_ciclos->bind_param("i", $user_id);
$stmt_ciclos->execute();
$result_ciclos = $stmt_ciclos->get_result();
$total_ciclos = $result_ciclos->fetch_assoc()['total'] ?? 0;
$stmt_ciclos->close();

// Total de posts no fórum
$sql_posts = "SELECT COUNT(*) as total FROM forum_posts WHERE autor_id = ?";
$stmt_posts = $mysqli->prepare($sql_posts);
$stmt_posts->bind_param("i", $user_id);
$stmt_posts->execute();
$result_posts = $stmt_posts->get_result();
$total_posts = $result_posts->fetch_assoc()['total'] ?? 0;
$stmt_posts->close();

// Total de curtidas nas matérias
$sql_curtidas = "SELECT COUNT(*) as total FROM curtidas_materias WHERE user_id = ?";
$stmt_curtidas = $mysqli->prepare($sql_curtidas);
$stmt_curtidas->bind_param("i", $user_id);
$stmt_curtidas->execute();
$result_curtidas = $stmt_curtidas->get_result();
$total_curtidas = $result_curtidas->fetch_assoc()['total'] ?? 0;
$stmt_curtidas->close();


$mysqli->close();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Meu Perfil - BleedWithDignity</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="perfil, usuário, configurações" name="keywords">
    <meta content="Gerencie seu perfil e preferências no BleedWithDignity" name="description">
 <?php
   require("../include/referenciashead.php");
   ?>
    <style>
      
    </style>
</head>

<body>
     <?php
      require("../include/spinner.php");
       require("../include/navbarlogado.php");
             require("../include/botoesperfilpesquisa.php");
 require("../include/modalsearch.php");
        ?>
                </div>
            </nav>
        </div>
    </div>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Meu Perfil</h1>
            <p class="text-white">Gerencie suas informações e preferências</p>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Profile Content Start -->
    <div class="container-fluid py-5">
        <div class="container profile-container">
             <?php if (isset($_SESSION['success_message'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['success_message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['error_message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>

            <div class="profile-header wow fadeIn" data-wow-delay="0.1s">
<div class="avatar-container position-relative">
                    <img src="<?php echo $foto_perfil; ?>" alt="Avatar" class="profile-avatar" id="profileAvatar">
                    <button type="button" class="btn btn-primary btn-sm position-absolute bottom-0 end-0 rounded-circle" 
                            style="width: 40px; height: 40px;" data-bs-toggle="modal" data-bs-target="#uploadPhotoModal">
                        <i class="fas fa-camera"></i>
                    </button>
                </div>
                <h2 class="text-dark mt-3"><?php echo htmlspecialchars(explode(' ', $nome_completo)[0]); ?></h2>
                <p class="text-muted">membro desde <?php echo strtolower($data_cadastro); ?></p>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="profile-card wow fadeIn" data-wow-delay="0.2s">
                        <div class="profile-card-header">
                            <h5 class="mb-0"><i class="fas fa-user-circle me-2"></i>Informações Pessoais</h5>
                        </div>
                        <div class="profile-card-body">
                            <div class="profile-info-item">
                                <div class="profile-info-label">Nome completo</div>
<div class="text-dark"><?php echo htmlspecialchars($nome_completo); ?></div>                            </div>
                            <div class="profile-info-item">
                                <div class="profile-info-label">Email</div>
                               <div class="text-dark"><?php echo htmlspecialchars($email); ?></div>
                            </div>

                            <div class="profile-info-item">
                                <div class="profile-info-label">Data de nascimento</div>
                                <div class="text-dark"><?php echo $data_nascimento; ?></div>
                            </div>

                            <div class="profile-info-item">
                                <div class="profile-info-label">Tipo de conta</div>
                                                                <div class="text-dark"><?php echo ucfirst($user['tipo']); ?></div>

                            </div>
                            <button class="btn btn-outline-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                <i class="fas fa-edit me-2"></i>Editar informações
                            </button>
                        </div>
                    </div>

                    <div class="profile-card wow fadeIn" data-wow-delay="0.3s">
                        <div class="profile-card-header">
                            <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Estatísticas</h5>
                        </div>
                        <div class="profile-card-body">
                            <div class="row text-center">
                                <div class="col-6 stats-item">
                                    <div class="stats-number"><?php echo $total_ciclos; ?></div>
                                    <div class="stats-label">Ciclos registrados</div>
                                </div>
                                
                                <div class="col-6 stats-item">
                                    <div class="stats-number"><?php echo $total_posts; ?></div>
                                    <div class="stats-label">Posts no fórum</div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mb-4">
                    <div class="profile-card wow fadeIn" data-wow-delay="0.2s">
                        <div class="profile-card-header">
                            <ul class="nav nav-pills card-header-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#configuracoes" data-bs-toggle="tab"><i class="fas fa-cog me-2"></i>Configurações</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#notificacoes" data-bs-toggle="tab"><i class="fas fa-bell me-2"></i>Notificações</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#privacidade" data-bs-toggle="tab"><i class="fas fa-lock me-2"></i>Privacidade</a>
                                </li>
                              
                            </ul>
                        </div>
                        <div class="profile-card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="configuracoes">
                                    <h5 class="mb-4">Configurações da Conta</h5>
                                    
                                   
                                    
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Preferências do calendário</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="notifyPeriod" checked>
                                            <label class="form-check-label" for="notifyPeriod">Notificar sobre início previsto do período</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="notifyOvulation" checked>
                                            <label class="form-check-label" for="notifyOvulation">Notificar sobre período fértil</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="showSymptoms" checked>
                                            <label class="form-check-label" for="showSymptoms">Mostrar histórico de sintomas</label>
                                        </div>
                                    </div>
                                    

                                    <button class="btn btn-primary">Salvar alterações</button>
                                </div>
                                
                                <div class="tab-pane fade" id="notificacoes">
                                    <h5 class="mb-4">Configurações de Notificação</h5>
                                    
                                    <div class="mb-4">
                                        <h6>Notificações por email</h6>
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" id="emailReminders" checked>
                                            <label class="form-check-label" for="emailReminders">Lembretes do ciclo menstrual</label>
                                        </div>
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" id="emailNewsletter" checked>
                                            <label class="form-check-label" for="emailNewsletter">Newsletter com dicas</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="emailCommunity">
                                            <label class="form-check-label" for="emailCommunity">Atividades da comunidade</label>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h6>Notificações no aplicativo</h6>
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" id="appReminders" checked>
                                            <label class="form-check-label" for="appReminders">Lembretes do ciclo</label>
                                        </div>
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" id="appSymptoms" checked>
                                            <label class="form-check-label" for="appSymptoms">Registro de sintomas</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="appForum" checked>
                                            <label class="form-check-label" for="appForum">Atividades no fórum</label>
                                        </div>
                                    </div>
                                    
                                    <button class="btn btn-primary">Salvar preferências</button>
                                </div>
                                
                                <div class="tab-pane fade" id="privacidade">
                                    <h5 class="mb-4">Configurações de Privacidade</h5>
                                    
                                
                                    <div class="mb-4">
                                        <h6>Compartilhamento de dados</h6>
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" id="shareAnonymousData" checked>
                                            <label class="form-check-label" for="shareAnonymousData">Compartilhar dados anônimos para pesquisa</label>
                                        </div>
                                        <small class="text-muted">Seus dados pessoais nunca serão compartilhados</small>
                                    </div>
                                    
                                    <div class="alert alert-warning">
                                        <h6><i class="fas fa-exclamation-triangle me-2"></i>Excluir conta</h6>
                                        <p class="mb-2">Ao excluir sua conta, todos os seus dados serão permanentemente removidos.</p>
                                        <button class="btn btn-sm btn-outline-danger">Excluir minha conta</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Content End -->
     <!-- Modal de Confirmação -->
<div class="modal fade" id="changesSavedModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <i class="fas fa-check-circle text-success mb-3" style="font-size: 3rem;"></i>
                <h5 class="mb-3">Alterações salvas com sucesso!</h5>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
 <div class="modal fade" id="uploadPhotoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Alterar Foto de Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="uploadPhotoForm" method="POST" enctype="multipart/form-data">
                        <div class="text-center mb-4">
                            <img src="<?php echo $foto_perfil; ?>" alt="Preview" class="img-thumbnail" id="photoPreview" style="max-width: 200px; max-height: 200px; object-fit: cover;">
                        </div>
                        
                        <div class="mb-3">
                            <label for="foto_perfil" class="form-label">Selecionar imagem</label>
                            <input type="file" class="form-control" id="foto_perfil" name="foto_perfil" accept="image/*" required>
                            <div class="form-text">
                                Formatos permitidos: JPG, JPEG, PNG, GIF. Tamanho máximo: 2MB.
                            </div>
                        </div>
                        
                        <div class="alert alert-info">
                            <small>
                                <i class="fas fa-info-circle me-2"></i>
                                A imagem será redimensionada para 200x200 pixels.
                            </small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" form="uploadPhotoForm" class="btn btn-primary">
                        <i class="fas fa-upload me-2"></i>Fazer Upload
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Edição de Perfil -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Informações Pessoais</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProfileForm">
                        <div class="mb-3">
                            <label for="editNome" class="form-label">Nome completo</label>
                            <input type="text" class="form-control" id="editNome" value="<?php echo htmlspecialchars($user['nome']); ?>">

                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" value="<?php echo htmlspecialchars($email); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="editNascimento" class="form-label">Data de nascimento</label>
                            <input type="date" class="form-control" id="editNascimento" value="<?php echo isset($user['Data_Nascimento']) ? $user['Data_Nascimento'] : ''; ?>">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="saveProfileChanges()">Salvar alterações</button>
                </div>
            </div>
        </div>
    </div>


      <?php
      require("../include/copyright.php");
 require("../include/bibliotecajava.php");

   ?>

    
    <script>
$(document).ready(function() {
        // Ativa as abas
        $('.nav-pills a').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        });

        $(document).on('click', '.btn-primary', function() {
            if($(this).text().toLowerCase().includes('salvar')) {
                $('#changesSavedModal').modal('show');
                
                setTimeout(function() {
                    $('#changesSavedModal').modal('hide');
                }, 2000);
            }
        });
    });

    // Preview da imagem antes do upload
    document.getElementById('foto_perfil').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('photoPreview');
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
        }
        
        if (file) {
            reader.readAsDataURL(file);
        }
    });

    // Validação do tamanho do arquivo
    document.getElementById('uploadPhotoForm').addEventListener('submit', function(e) {
        const fileInput = document.getElementById('foto_perfil');
        const file = fileInput.files[0];
        
        if (file) {
            // Verificar tamanho (2MB)
            if (file.size > 2 * 1024 * 1024) {
                e.preventDefault();
                alert('O arquivo é muito grande. O tamanho máximo permitido é 2MB.');
                return false;
            }
            
            // Verificar tipo
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!allowedTypes.includes(file.type)) {
                e.preventDefault();
                alert('Tipo de arquivo não permitido. Use apenas JPG, PNG ou GIF.');
                return false;
            }
        }
    });

    // Fechar modal após upload bem-sucedido
    <?php if (isset($_SESSION['success_message'])): ?>
        $(document).ready(function() {
            $('#uploadPhotoModal').modal('hide');
        });
    <?php endif; ?>

   function saveProfileChanges() {
    let nome = document.getElementById("editNome").value;
    let email = document.getElementById("editEmail").value;
    let nascimento = document.getElementById("editNascimento").value;

    let formData = new FormData();
    formData.append("nome", nome);
    formData.append("email", email);
    formData.append("nascimento", nascimento);

    fetch("../login/update_perfil.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {

            // Atualiza visualmente sem reload (opcional)
            document.querySelector(".profile-info-item:nth-child(1) div:nth-child(2)").innerText = nome;
            document.querySelector(".profile-info-item:nth-child(2) div:nth-child(2)").innerText = email;

            alert("Informações atualizadas!");

            // Fecha modal
            let modal = bootstrap.Modal.getInstance(document.getElementById('editProfileModal'));
            modal.hide();

            // Recarregar a página (garante consistência)
            location.reload();
        } else {
            alert("Erro: " + data.message);
        }
    })
    .catch(error => {
        console.error("Erro:", error);
        alert("Erro ao enviar dados");
    });
}
    </script>
</body>
</html>