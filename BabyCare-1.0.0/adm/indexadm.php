<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Painel Admin - BleedWithDignity</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="admin, painel, administrador" name="keywords">
    <meta content="Painel de administração do BleedWithDignity" name="description">

    <?php
   require("../include/referenciashead.php");
   ?>
    
</head>

<body>
     <?php
   require("../include/spinner.php");
   ?>

    <!-- Navbar Start -->
    <div class="container-fluid border-bottom bg-light wow fadeIn" data-wow-delay="0.1s">
        <div class="container topbar bg-primary d-none d-lg-block py-2" style="border-radius: 0 40px">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">admin@bleedwithdignity.com</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-instagram text-secondary"></i></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light navbar-expand-xl py-3">
                <a class="navbar-brand"><h1 class="text-primary display-6">BleedWith<span class="text-secondary">Dignity</span></h1></a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav d-flex flex-row mx-auto align-items-center">
                        <a href="indexadm.php" class="nav-item nav-link mx-2">Painel Admin</a>
                        <div class="nav-item dropdown mx-2">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Gerenciar</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="#usuarios" class="dropdown-item">Usuários</a>
                                <a href="#conteudo" class="dropdown-item">Conteúdo</a>
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
                                <h5 class="mt-3">BleedWithDignity</h5>
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
                                    <a class="nav-link" href="#conteudo"><i class="fas fa-file-alt me-2"></i> Conteúdo</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link" href="#forum"><i class="fas fa-comments me-2"></i> Moderar Fórum</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link" href="#configuracoes"><i class="fas fa-cog me-2"></i> Configurações</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i> Sair</a>
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
                        <div class="row wow fadeIn" data-wow-delay="0.2s">
                            <div class="col-md-4 mb-4">
                                <div class="admin-stats">
                                    <div class="stats-number">1,248</div>
                                    <div class="stats-label">Usuários Ativos</div>
                                    <div class="small text-success"><i class="fas fa-arrow-up me-1"></i> 12% este mês</div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="admin-stats">
                                    <div class="stats-number">328</div>
                                    <div class="stats-label">Novos Posts</div>
                                    <div class="small text-success"><i class="fas fa-arrow-up me-1"></i> 8% este mês</div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="admin-stats">
                                    <div class="stats-number">24</div>
                                    <div class="stats-label">Reportes</div>
                                    <div class="small text-danger"><i class="fas fa-arrow-down me-1"></i> 3% este mês</div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activity -->
                        <div class="profile-card wow fadeIn admin-card mb-4" data-wow-delay="0.3s">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-bell me-2"></i>Atividade Recente</h5>
                            </div>
                            <div class="profile-card-body">
                                <div class="table-responsive">
                                    <table class="table admin-table">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Usuário</th>
                                                <th>Ação</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>10/05/2023</td>
                                                <td>Ana Silva</td>
                                                <td>Novo post no fórum</td>
                                                <td><span class="badge bg-success">Aprovado</span></td>
                                            </tr>
                                            <tr>
                                                <td>09/05/2023</td>
                                                <td>Carlos Souza</td>
                                                <td>Comentário reportado</td>
                                                <td><span class="badge bg-warning">Pendente</span></td>
                                            </tr>
                                            <tr>
                                                <td>08/05/2023</td>
                                                <td>Mariana Lima</td>
                                                <td>Cadastro novo</td>
                                                <td><span class="badge bg-success">Ativo</span></td>
                                            </tr>
                                            <tr>
                                                <td>07/05/2023</td>
                                                <td>Admin</td>
                                                <td>Atualização de conteúdo</td>
                                                <td><span class="badge bg-info">Concluído</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Alerts -->
                        <div class="profile-card wow fadeIn admin-card admin-alert mb-4" data-wow-delay="0.4s">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Alertas</h5>
                            </div>
                            <div class="profile-card-body">
                                <div class="alert alert-warning mb-3">
                                    <strong>5 comentários</strong> aguardando moderação no fórum
                                </div>
                                <div class="alert alert-danger">
                                    <strong>2 usuários</strong> reportados por conduta inadequada
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
                                        <button class="btn btn-success w-100">
                                            <i class="fas fa-file-upload me-2"></i>Publicar Conteúdo
                                        </button>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <button class="btn btn-warning w-100">
                                            <i class="fas fa-envelope me-2"></i>Enviar Notificação
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Users Section -->
                    <section id="usuarios" class="content-section" style="display:none;">
                        <h2 class="mb-4 wow fadeIn" data-wow-delay="0.1s"><i class="fas fa-users me-2"></i>Gerenciar Usuários</h2>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Pesquisar usuários...">
                                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="profile-card wow fadeIn admin-card">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-list me-2"></i>Lista de Usuários</h5>
                            </div>
                            <div class="profile-card-body">
                                <div class="table-responsive">
                                    <table class="table admin-table">
                                        <thead>
                                            <tr>
                                                <th>Avatar</th>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>Registro</th>
                                                <th>Status</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="https://randomuser.me/api/portraits/women/68.jpg" class="user-avatar" alt="User"></td>
                                                <td>Ana Silva</td>
                                                <td>ana@example.com</td>
                                                <td>15/04/2023</td>
                                                <td><span class="badge bg-success">Ativo</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                                    <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-ban"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="https://randomuser.me/api/portraits/men/45.jpg" class="user-avatar" alt="User"></td>
                                                <td>Carlos Souza</td>
                                                <td>carlos@example.com</td>
                                                <td>22/03/2023</td>
                                                <td><span class="badge bg-warning">Pendente</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                                    <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="https://randomuser.me/api/portraits/women/90.jpg" class="user-avatar" alt="User"></td>
                                                <td>Mariana Lima</td>
                                                <td>mariana@example.com</td>
                                                <td>10/05/2023</td>
                                                <td><span class="badge bg-success">Ativo</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                                    <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-ban"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="https://randomuser.me/api/portraits/men/40.jpg" class="user-avatar" alt="User"></td>
                                                <td>João Oliveira</td>
                                                <td>joao@example.com</td>
                                                <td>05/05/2023</td>
                                                <td><span class="badge bg-danger">Banido</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                                    <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-4">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Próximo</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-6 mb-4">
                                <div class="profile-card wow fadeIn admin-card">
                                    <div class="profile-card-header">
                                        <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Estatísticas de Usuários</h5>
                                    </div>
                                    <div class="profile-card-body">
                                        <canvas id="userStatsChart" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="profile-card wow fadeIn admin-card">
                                    <div class="profile-card-header">
                                        <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i>Novos Registros</h5>
                                    </div>
                                    <div class="profile-card-body">
                                        <canvas id="userRegistrationsChart" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    

                    <!-- Content Section -->
                    <section id="conteudo" class="content-section" style="display:none;">
                        <h2 class="mb-4 wow fadeIn" data-wow-delay="0.1s"><i class="fas fa-file-alt me-2"></i>Gerenciar Conteúdo</h2>
                        
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <div class="btn-group" role="group">
                                    
                                </div>
                            </div>
                            <div class="col-md-4 text-end">
                                <button class="btn btn-success"><i class="fas fa-plus me-2"></i>Novo Conteúdo</button>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="card content-card h-100">
                                    <img src="../img/saudefeminina.png" class="card-img-top" alt="Conteúdo">
                                    <div class="card-body">
                                        <span class="badge bg-info mb-2">Artigo</span>
                                        <h5 class="card-title">Como lidar com a endometriose</h5>
                                        <p class="card-text">Um guia completo sobre os sintomas, diagnóstico e tratamento da endometriose.</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">Publicado: 12/05/2023</small>
                                            <span class="badge bg-success">Ativo</span>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-top-0">
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-4">
                                <div class="card content-card h-100">
                                    <img src="../img/exercicios.jpg" class="card-img-top" alt="Conteúdo">
                                    <div class="card-body">
                                        <span class="badge bg-warning mb-2">Vídeo</span>
                                        <h5 class="card-title">Exercícios para alívio menstrual</h5>
                                        <p class="card-text">Sequência de exercícios que ajudam a aliviar as cólicas menstruais.</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">Publicado: 08/05/2023</small>
                                            <span class="badge bg-success">Ativo</span>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-top-0">
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-4">
                                <div class="card content-card h-100">
                                    <img src="../img/saude sexual.jpg" class="card-img-top" alt="Conteúdo">
                                    <div class="card-body">
                                        <span class="badge bg-secondary mb-2">Podcast</span>
                                        <h5 class="card-title">Conversas sobre saúde íntima</h5>
                                        <p class="card-text">Episódio com especialista discutindo tabus sobre saúde menstrual.</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">Publicado: 05/05/2023</small>
                                            <span class="badge bg-warning">Rascunho</span>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-top-0">
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="profile-card wow fadeIn admin-card mb-4">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Estatísticas de Conteúdo</h5>
                            </div>
                            <div class="profile-card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <canvas id="contentViewsChart" height="200"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                        <canvas id="contentTypesChart" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="profile-card wow fadeIn admin-card">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-calendar me-2"></i>Agendamento de Conteúdo</h5>
                            </div>
                            <div class="profile-card-body">
                                <div class="table-responsive">
                                    <table class="table admin-table">
                                        <thead>
                                            <tr>
                                                <th>Título</th>
                                                <th>Tipo</th>
                                                <th>Data de Publicação</th>
                                                <th>Status</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Novos métodos contraceptivos</td>
                                                <td><span class="badge bg-info">Artigo</span></td>
                                                <td>20/05/2023</td>
                                                <td><span class="badge bg-primary">Agendado</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                                    <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Entrevista com ginecologista</td>
                                                <td><span class="badge bg-warning">Vídeo</span></td>
                                                <td>25/05/2023</td>
                                                <td><span class="badge bg-primary">Agendado</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                                    <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Forum Section -->
                    <section id="forum" class="content-section" style="display:none;">
                        <h2 class="mb-4 wow fadeIn" data-wow-delay="0.1s"><i class="fas fa-comments me-2"></i>Moderar Fórum</h2>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary active">Todos</button>
                                    <button type="button" class="btn btn-primary">Reportados</button>
                                    <button type="button" class="btn btn-primary">Pendentes</button>
                                    <button type="button" class="btn btn-primary">Aprovados</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Pesquisar no fórum...">
                                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="profile-card wow fadeIn admin-card mb-4">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Posts Reportados</h5>
                            </div>
                            <div class="profile-card-body">
                                <div class="forum-post reported">
                                    <div class="d-flex justify-content-between">
                                        <h6><strong>Linguagem inadequada</strong></h6>
                                        <small class="text-danger">3 reportes</small>
                                    </div>
                                    <p>"Esse produto é uma merda, não funciona pra nada!"</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small><strong>Postado por:</strong> Usuário123 (15/05/2023)</small>
                                        <div>
                                            <button class="btn btn-sm btn-success"><i class="fas fa-check"></i> Aprovar</button>
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Remover</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="forum-post reported">
                                    <div class="d-flex justify-content-between">
                                        <h6><strong>Informação médica incorreta</strong></h6>
                                        <small class="text-danger">5 reportes</small>
                                    </div>
                                    <p>"Tomar esse remédio em dose dupla cura a endometriose em uma semana"</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small><strong>Postado por:</strong> Anonimo2023 (14/05/2023)</small>
                                        <div>
                                            <button class="btn btn-sm btn-success"><i class="fas fa-check"></i> Aprovar</button>
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Remover</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="profile-card wow fadeIn admin-card mb-4">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-clock me-2"></i>Posts Pendentes</h5>
                            </div>
                            <div class="profile-card-body">
                                <div class="forum-post">
                                    <h6><strong>Dúvida sobre cólicas intensas</strong></h6>
                                    <p>"Estou tendo cólicas muito fortes que não passam com remédio comum, o que fazer?"</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small><strong>Postado por:</strong> MariaS (16/05/2023)</small>
                                        <div>
                                            <button class="btn btn-sm btn-success"><i class="fas fa-check"></i> Aprovar</button>
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Remover</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="forum-post">
                                    <h6><strong>Recomendação de ginecologista</strong></h6>
                                    <p>"Alguém pode recomendar um bom ginecologista em São Paulo especializado em endometriose?"</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small><strong>Postado por:</strong> CarlaR (16/05/2023)</small>
                                        <div>
                                            <button class="btn btn-sm btn-success"><i class="fas fa-check"></i> Aprovar</button>
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Remover</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="profile-card wow fadeIn admin-card">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Estatísticas do Fórum</h5>
                            </div>
                            <div class="profile-card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <canvas id="forumActivityChart" height="200"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                        <canvas id="forumReportsChart" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Settings Section -->
                    <section id="configuracoes" class="content-section" style="display:none;">
                        <h2 class="mb-4 wow fadeIn" data-wow-delay="0.1s"><i class="fas fa-cog me-2"></i>Configurações</h2>
                        
                        <div class="profile-card wow fadeIn admin-card mb-4">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-globe me-2"></i>Configurações Gerais</h5>
                            </div>
                            <div class="profile-card-body">
                                <div class="settings-option">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>Nome do Site</h6>
                                            <p class="small text-muted mb-0">O nome que aparece no cabeçalho e no título</p>
                                        </div>
                                        <input type="text" class="form-control w-50" value="BleedWithDignity">
                                    </div>
                                </div>
                                
                                <div class="settings-option">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>Email de Contato</h6>
                                            <p class="small text-muted mb-0">Email exibido publicamente para contato</p>
                                        </div>
                                        <input type="email" class="form-control w-50" value="contato@bleedwithdignity.com">
                                    </div>
                                </div>
                                
                                <div class="settings-option">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>Manutenção do Site</h6>
                                            <p class="small text-muted mb-0">Colocar o site em modo manutenção</p>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="maintenanceSwitch">
                                            <label class="form-check-label" for="maintenanceSwitch">Ativar</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="settings-option">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>Mensagem de Manutenção</h6>
                                            <p class="small text-muted mb-0">Mensagem exibida quando o site está em manutenção</p>
                                        </div>
                                        <textarea class="form-control w-50">Estamos realizando melhorias no site. Volte em breve!</textarea>
                                    </div>
                                </div>
                                
                                <div class="text-end mt-3">
                                    <button class="btn btn-primary" onclick="return confirm('Tem certeza que deseja salvar as configurações gerais?')">Salvar Configurações</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="profile-card wow fadeIn admin-card mb-4">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-users-cog me-2"></i>Configurações de Usuários</h5>
                            </div>
                            <div class="profile-card-body">
                                <div class="settings-option">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>Registro de Novos Usuários</h6>
                                            <p class="small text-muted mb-0">Permitir que novos usuários se cadastrem</p>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="registrationSwitch" checked>
                                            <label class="form-check-label" for="registrationSwitch">Ativar</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="settings-option">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>Moderação de Conteúdo</h6>
                                            <p class="small text-muted mb-0">Exigir aprovação para posts no fórum</p>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="moderationSwitch" checked>
                                            <label class="form-check-label" for="moderationSwitch">Ativar</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="settings-option">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>Idade Mínima</h6>
                                            <p class="small text-muted mb-0">Idade mínima para registro no site</p>
                                        </div>
                                        <select class="form-select w-25">
                                            <option>13</option>
                                            <option selected>16</option>
                                            <option>18</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="text-end mt-3">
                                   <button class="btn btn-primary" onclick="return confirm('Tem certeza que deseja salvar as configurações de usuários?')">Salvar Configurações</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="profile-card wow fadeIn admin-card">
                            <div class="profile-card-header">
                                <h5 class="mb-0"><i class="fas fa-shield-alt me-2"></i>Segurança</h5>
                            </div>
                            <div class="profile-card-body">
                                <div class="settings-option">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>Forçar HTTPS</h6>
                                            <p class="small text-muted mb-0">Redirecionar todas as conexões HTTP para HTTPS</p>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="httpsSwitch" checked>
                                            <label class="form-check-label" for="httpsSwitch">Ativar</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="settings-option">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>Backup Automático</h6>
                                            <p class="small text-muted mb-0">Fazer backup automático diário do banco de dados</p>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="backupSwitch" checked>
                                            <label class="form-check-label" for="backupSwitch">Ativar</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="settings-option">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>Alterar Senha</h6>
                                            <p class="small text-muted mb-0">Alterar senha de administrador</p>
                                        </div>
                                        <button class="btn btn-warning" onclick="return confirm('Tem certeza que deseja alterar a senha de administrador?')">Alterar Senha</button>
                                    </div>
                                </div>
                                
                                <div class="text-end mt-3">
                                    <button class="btn btn-primary" onclick="return confirm('Tem certeza que deseja salvar as configurações de segurança?')">Salvar Configurações</button>
                                </div>
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
    // Ativar tooltips
    $('[data-toggle="tooltip"]').tooltip();
    
    // Simular carregamento de dados
    $('#loadReports').click(function() {
        $('#spinner').addClass('show');
        setTimeout(function() {
            $('#spinner').removeClass('show');
            alert('Dados de reportes carregados!');
        }, 1500);
    });
    
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
    
    // Adicionar confirmações para ações de usuários
    $('.btn-danger').on('click', function() {
        return confirm('Tem certeza que deseja executar esta ação?');
    });
    
    // Adicionar confirmações para ações de moderação
    $('.forum-post .btn-success').on('click', function() {
        return confirm('Tem certeza que deseja aprovar este post?');
    });
    
    $('.forum-post .btn-danger').on('click', function() {
        return confirm('Tem certeza que deseja remover este post?');
    });
    
    // Adicionar confirmações para ações de conteúdo
    $('.content-card .btn-danger').on('click', function() {
        return confirm('Tem certeza que deseja excluir este conteúdo?');
    });
    
    // Inicializar gráficos
    if($('#userStatsChart').length) {
        var ctx = document.getElementById('userStatsChart').getContext('2d');
        var userStatsChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Ativos', 'Inativos', 'Banidos', 'Pendentes'],
                datasets: [{
                    data: [856, 120, 24, 48],
                    backgroundColor: [
                        '#28a745',
                        '#6c757d',
                        '#dc3545',
                        '#ffc107'
                    ]
                }]
            }
        });
    }
    
    if($('#userRegistrationsChart').length) {
        var ctx = document.getElementById('userRegistrationsChart').getContext('2d');
        var userRegistrationsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai'],
                datasets: [{
                    label: 'Novos usuários',
                    data: [120, 190, 170, 210, 180],
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    fill: true
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
    
    if($('#contentViewsChart').length) {
        var ctx = document.getElementById('contentViewsChart').getContext('2d');
        var contentViewsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Como lidar com a endometriose', 'Exercícios para alívio menstrual', 'Conversas sobre saúde íntima', 'Novos métodos contraceptivos'],
                datasets: [{
                    label: 'Visualizações',
                    data: [1250, 980, 750, 620],
                    backgroundColor: '#17a2b8'
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
    
    if($('#contentTypesChart').length) {
        var ctx = document.getElementById('contentTypesChart').getContext('2d');
        var contentTypesChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Artigos', 'Vídeos', 'Podcasts', 'Guias'],
                datasets: [{
                    data: [15, 8, 5, 3],
                    backgroundColor: [
                        '#6f42c1',
                        '#fd7e14',
                        '#20c997',
                        '#6610f2'
                    ]
                }]
            }
        });
    }
    
    if($('#forumActivityChart').length) {
        var ctx = document.getElementById('forumActivityChart').getContext('2d');
        var forumActivityChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                datasets: [{
                    label: 'Posts',
                    data: [45, 60, 55, 70, 65, 40, 30],
                    backgroundColor: '#28a745'
                }, {
                    label: 'Comentários',
                    data: [120, 150, 140, 180, 160, 90, 70],
                    backgroundColor: '#17a2b8'
                }]
            }
        });
    }
    
    if($('#forumReportsChart').length) {
        var ctx = document.getElementById('forumReportsChart').getContext('2d');
        var forumReportsChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ['Linguagem', 'Spam', 'Informação incorreta', 'Conteúdo ofensivo', 'Outros'],
                datasets: [{
                    data: [15, 8, 12, 10, 5],
                    backgroundColor: [
                        '#dc3545',
                        '#fd7e14',
                        '#ffc107',
                        '#6c757d',
                        '#343a40'
                    ]
                }]
            }
        });
    }
});
    </script>
</body>
</html>