<?php
session_start();

// Verificar se o usuário é admin
if (!isset($_SESSION['user_id']) || $_SESSION['tipo'] !== 'admin') {
    header('Location: ../deslogado/login.php');
    exit();
}

include("../include/conexao.php");

// Buscar dados do admin
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();
$stmt->close();

// Buscar estatísticas reais
// Total de usuários
$sql_users = "SELECT COUNT(*) as total FROM users";
$result_users = $mysqli->query($sql_users);
$total_users = $result_users->fetch_assoc()['total'];

// Usuários ativos (últimos 30 dias) - usando data_postagem como referência
$sql_active_users = "SELECT COUNT(DISTINCT autor_id) as total FROM forum_posts WHERE data_postagem >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result_active_users = $mysqli->query($sql_active_users);
$active_users = $result_active_users->fetch_assoc()['total'];

// Total de posts no fórum
$sql_posts = "SELECT COUNT(*) as total FROM forum_posts";
$result_posts = $mysqli->query($sql_posts);
$total_posts = $result_posts->fetch_assoc()['total'];



// Posts pendentes (não temos coluna 'moderado', então vamos contar todos)
$sql_pending = "SELECT COUNT(*) as total FROM forum_posts";
$result_pending = $mysqli->query($sql_pending);
$pending_posts_count = $result_pending->fetch_assoc()['total'];

// Buscar usuários recentes
$sql_recent_users = "SELECT user_id, nome, email, Data_Nascimento, tipo FROM users ORDER BY user_id DESC LIMIT 10";
$result_recent_users = $mysqli->query($sql_recent_users);
$recent_users = [];
while ($row = $result_recent_users->fetch_assoc()) {
    $recent_users[] = $row;
}



// Buscar todos os usuários para gerenciamento
$sql_all_users = "SELECT user_id, nome, email, Data_Nascimento, tipo FROM users ORDER BY user_id DESC";
$result_all_users = $mysqli->query($sql_all_users);
$all_users = [];
while ($row = $result_all_users->fetch_assoc()) {
    $all_users[] = $row;
}



// Buscar posts do fórum para moderação
$sql_forum_posts = "SELECT fp.id, fp.titulo, fp.conteudo, fp.data_postagem, u.nome as autor 
                    FROM forum_posts fp 
                    JOIN users u ON fp.autor_id = u.user_id 
                    ORDER BY fp.data_postagem DESC 
                    LIMIT 10";
$result_forum_posts = $mysqli->query($sql_forum_posts);
$forum_posts = [];
while ($row = $result_forum_posts->fetch_assoc()) {
    $forum_posts[] = $row;
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Painel Admin - BleedWithDignity</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="admin, painel, administrador" name="keywords">
    <meta content="Painel de administração do BleedWithDignity" name="description">
    <?php require("../include/referenciashead.php"); ?>
    

</head>

<body>
    <?php require("../include/spinner.php"); ?>

    <!-- Navbar Start -->
    <div class="container-fluid border-bottom bg-light wow fadeIn" data-wow-delay="0.1s">
        <div class="container topbar bg-primary d-none d-lg-block py-2" style="border-radius: 0 40px">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i>
                        <a href="#" class="text-white">admin@bleedwithdignity.com</a>
                    </small>
                </div>
                <div class="top-link pe-2">
                    <a href="" class="btn btn-light btn-sm-square rounded-circle">
                        <i class="fab fa-instagram text-secondary"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light navbar-expand-xl py-3">
                <a href="indexadm.php" class="navbar-brand">
                    <h1 class="text-primary display-6">BleedWith<span class="text-secondary">Dignity</span></h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav d-flex flex-row mx-auto align-items-center">
                        <div class="nav-item dropdown mx-2">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Gerenciar</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="#usuarios" class="dropdown-item">Usuários</a>
                                <a href="#forum" class="dropdown-item">Fórum</a>
                            </div>
                        </div>
                        <a href="#configuracoes" class="nav-item nav-link mx-2">Configurações</a>
                    </div>
                    <div class="d-flex me-4">
                        <div id="phone-tada" class="d-flex align-items-center justify-content-center">
                            <span class="admin-badge">ADMIN</span>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Painel Administrativo</h1>
            <p class="text-white">Gerencie o sistema BleedWithDignity</p>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Admin Content Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 mb-4">
                    <div class="profile-card wow fadeIn admin-card" data-wow-delay="0.1s">
                        <div class="profile-card-header">
                            <h5 class="mb-0"><i class="fas fa-user-shield me-2"></i>Admin</h5>
                        </div>
                        <div class="profile-card-body">
                            <div class="text-center mb-4">
                                <img src="../img/logo.png" alt="Admin" class="profile-avatar">
                                <h5 class="mt-3"><?php echo htmlspecialchars($admin['nome']); ?></h5>
                                <p class="text-muted small">Super Administrador</p>
                            </div>
                            
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2">
                                    <a class="nav-link active" href="#dashboard"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link" href="#usuarios"><i class="fas fa-users me-2"></i> Usuários</a>
                                </li>
                                
                                <li class="nav-item mb-2">
                                    <a class="nav-link" href="#forum"><i class="fas fa-comments me-2"></i> Moderar Fórum</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link" href="#configuracoes"><i class="fas fa-cog me-2"></i> Configurações</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link text-danger" href="../login/logout.php">
                                        <i class="fas fa-sign-out-alt me-2"></i> Sair
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-md-9">
                    <!-- Dashboard Section -->
                    <section id="dashboard" class="content-section">
                        <h2 class="mb-4 wow fadeIn" data-wow-delay="0.1s"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h2>
                        
                        <!-- Stats Row -->
                        <div class="row stats-row wow fadeIn" data-wow-delay="0.2s">
                            <div class="col-md-3 mb-4">
                                <div class="admin-stats">
                                    <div class="stats-number"><?php echo $total_users; ?></div>
                                    <div class="stats-label">Total de Usuários</div>
                                    <div class="small text-success"><i class="fas fa-users me-1"></i> Cadastrados</div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4">
                                <div class="admin-stats">
                                    <div class="stats-number"><?php echo $active_users; ?></div>
                                    <div class="stats-label">Usuários Ativos</div>
                                    <div class="small text-info"><i class="fas fa-user-check me-1"></i> Últimos 30 dias</div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4">
                                <div class="admin-stats">
                                    <div class="stats-number"><?php echo $total_posts; ?></div>
                                    <div class="stats-label">Posts no Fórum</div>
                                    <div class="small text-warning"><i class="fas fa-comments me-1"></i> Discussões</div>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Recent Users -->
                        <div class="profile-card wow fadeIn admin-card mb-4" data-wow-delay="0.3s">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-users me-2"></i>Usuários Recentes</h5>
                            </div>
                            <div class="profile-card-body">
                                <div class="table-responsive">
                                    <table class="table admin-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>Data Nasc.</th>
                                                <th>Tipo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($recent_users as $user): ?>
                                            <tr>
                                                <td><?php echo $user['user_id']; ?></td>
                                                <td><?php echo htmlspecialchars($user['nome']); ?></td>
                                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                                <td><?php echo !empty($user['Data_Nascimento']) ? date('d/m/Y', strtotime($user['Data_Nascimento'])) : 'Não informada'; ?></td>
                                                <td>
                                                    <span class="badge bg-<?php echo $user['tipo'] == 'admin' ? 'danger' : 'success'; ?>">
                                                        <?php echo ucfirst($user['tipo']); ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        

                        <!-- Quick Actions -->
                        <div class="profile-card wow fadeIn admin-card" data-wow-delay="0.5s">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-bolt me-2"></i>Ações Rápidas</h5>
                            </div>
                            <div class="profile-card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <a href="#usuarios" class="btn btn-primary w-100">
                                            <i class="fas fa-user-plus me-2"></i>Gerenciar Usuários
                                        </a>
                                    </div>
                                    
                                    <div class="col-md-4 mb-3">
                                        <a href="#forum" class="btn btn-warning w-100">
                                            <i class="fas fa-comments me-2"></i>Moderar Fórum
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Users Section -->
                    <section id="usuarios" class="content-section" style="display:none;">
                        <h2 class="mb-4 wow fadeIn" data-wow-delay="0.1s"><i class="fas fa-users me-2"></i>Gerenciar Usuários</h2>
                        
                        <div class="profile-card wow fadeIn admin-card">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-list me-2"></i>Lista de Usuários</h5>
                            </div>
                            <div class="profile-card-body">
                                <div class="table-responsive">
                                    <table class="table admin-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>Data Nasc.</th>
                                                <th>Tipo</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($all_users as $user): ?>
                                            <tr>
                                                <td><?php echo $user['user_id']; ?></td>
                                                <td><?php echo htmlspecialchars($user['nome']); ?></td>
                                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                                <td><?php echo !empty($user['Data_Nascimento']) ? date('d/m/Y', strtotime($user['Data_Nascimento'])) : 'Não informada'; ?></td>
                                                <td>
                                                    <span class="badge bg-<?php echo $user['tipo'] == 'admin' ? 'danger' : 'success'; ?>">
                                                        <?php echo ucfirst($user['tipo']); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" onclick="viewUser(<?php echo $user['user_id']; ?>)">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                   
                                                    <?php if($user['user_id'] != $_SESSION['user_id']): ?>
                                                    <button class="btn btn-sm btn-danger" onclick="deleteUser(<?php echo $user['user_id']; ?>)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>

                    
                    <!-- Forum Section -->
                    <section id="forum" class="content-section" style="display:none;">
                        <h2 class="mb-4 wow fadeIn" data-wow-delay="0.1s"><i class="fas fa-comments me-2"></i>Moderar Fórum</h2>
                        
                        <div class="profile-card wow fadeIn admin-card mb-4">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-list me-2"></i>Posts do Fórum</h5>
                            </div>
                            <div class="profile-card-body">
                                <?php if(empty($forum_posts)): ?>
                                    <p class="text-center text-muted">Nenhum post no fórum.</p>
                                <?php else: ?>
                                    <?php foreach($forum_posts as $post): ?>
                                    <div class="forum-post">
                                        <h6><strong><?php echo htmlspecialchars($post['titulo']); ?></strong></h6>
                                        <p><?php echo htmlspecialchars(substr($post['conteudo'], 0, 150)) . '...'; ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small>
                                                <strong>Autor:</strong> <?php echo htmlspecialchars($post['autor']); ?> | 
                                                <strong>Data:</strong> <?php echo date('d/m/Y H:i', strtotime($post['data_postagem'])); ?>
                                            </small>
                                            <div>
                                                <button class="btn btn-sm btn-success" onclick="approvePost(<?php echo $post['id']; ?>)">
                                                    <i class="fas fa-check"></i> Manter
                                                </button>
                                                <button class="btn btn-sm btn-danger" onclick="rejectPost(<?php echo $post['id']; ?>)">
                                                    <i class="fas fa-times"></i> Remover
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>

                    <!-- Settings Section -->
                    <section id="configuracoes" class="content-section" style="display:none;">
                        <h2 class="mb-4 wow fadeIn" data-wow-delay="0.1s"><i class="fas fa-cog me-2"></i>Configurações</h2>
                        
                        <div class="profile-card wow fadeIn admin-card">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-users-cog me-2"></i>Configurações do Sistema</h5>
                            </div>
                            <div class="profile-card-body">
                                <form method="POST" action="admin_actions.php">
                                    <div class="settings-option">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6>Manutenção do Sistema</h6>
                                                <p class="small text-muted mb-0">Colocar o site em modo manutenção</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="maintenance_mode" id="maintenanceSwitch">
                                                <label class="form-check-label" for="maintenanceSwitch">Ativar</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="settings-option">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6>Registro de Novos Usuários</h6>
                                                <p class="small text-muted mb-0">Permitir que novos usuários se cadastrem</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="allow_registration" id="registrationSwitch" checked>
                                                <label class="form-check-label" for="registrationSwitch">Ativar</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-end mt-3">
                                        <button type="submit" name="save_settings" class="btn btn-primary">
                                            Salvar Configurações
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- Admin Content End -->



                
    <?php
    require("../include/copyright.php");
    require("../include/bibliotecajava.php");
    ?>

    <script>
    $(document).ready(function() {
        // Mostrar seção correta baseada no hash da URL
        function showSection() {
            $('.content-section').hide();
            var hash = window.location.hash || '#dashboard';
            $(hash).show();
            
            // Ativar link correto no menu
            $('.nav-link').removeClass('active');
            $('.nav-link[href="' + hash + '"]').addClass('active');
        }
        
        showSection();
        $(window).on('hashchange', showSection);
        
        // Navegação pelo menu lateral
        $('.nav-link').on('click', function(e) {
            e.preventDefault();
            var target = $(this).attr('href');
            window.location.hash = target;
        });
    });

    // Funções para ações administrativas
    function viewUser(userId) {
        alert('Visualizar usuário ID: ' + userId);
        // Implementar visualização de usuário
    }

   

    function deleteUser(userId) {
        if(confirm('Tem certeza que deseja excluir este usuário?')) {
            window.location.href = 'admin_actions.php?action=delete_user&user_id=' + userId;
        }
    }

    function approvePost(postId) {
        if(confirm('Tem certeza que deseja manter este post?')) {
            // Post é mantido (não faz nada, pois não temos sistema de moderação ainda)
            alert('Post mantido no fórum.');
        }
    }

    function rejectPost(postId) {
        if(confirm('Tem certeza que deseja remover este post?')) {
            window.location.href = 'admin_actions.php?action=delete_post&post_id=' + postId;
        }
    }
      
    </script>
</body>
</html>