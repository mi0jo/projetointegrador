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
            <div class="profile-header wow fadeIn" data-wow-delay="0.1s">
                <img src="../img/chuuu.jpg" alt="Avatar" class="profile-avatar">
                <h2>Maria Silva</h2>
                <p class="text-muted">membro desde junho de 2023</p>
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
                                <div>Maria da Silva</div>
                            </div>
                            <div class="profile-info-item">
                                <div class="profile-info-label">Email</div>
                                <div>maria.silva@exemplo.com</div>
                            </div>
                            <div class="profile-info-item">
                                <div class="profile-info-label">Data de nascimento</div>
                                <div>15/03/1990</div>
                            </div>
                            <div class="profile-info-item">
                                <div class="profile-info-label">Gênero</div>
                                <div>Feminino</div>
                            </div>
                            <button class="btn btn-outline-primary w-100 mt-3">Editar informações</button>
                        </div>
                    </div>

                    <div class="profile-card wow fadeIn" data-wow-delay="0.3s">
                        <div class="profile-card-header">
                            <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Estatísticas</h5>
                        </div>
                        <div class="profile-card-body">
                            <div class="row text-center">
                                <div class="col-6 stats-item">
                                    <div class="stats-number">28</div>
                                    <div class="stats-label">Ciclos registrados</div>
                                </div>
                                <div class="col-6 stats-item">
                                    <div class="stats-number">2</div>
                                    <div class="stats-label">Anos de uso</div>
                                </div>
                                <div class="col-6 stats-item">
                                    <div class="stats-number">87%</div>
                                    <div class="stats-label">Previsão correta</div>
                                </div>
                                <div class="col-6 stats-item">
                                    <div class="stats-number">42</div>
                                    <div class="stats-label">Sintomas registrados</div>
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
                                        <label class="form-label">Alterar foto de perfil</label>
                                        <input type="file" class="form-control">
                                    </div>
                                    
                                    
                                    
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
                                        <h6>Visibilidade do perfil</h6>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="profileVisibility" id="visibilityPublic">
                                            <label class="form-check-label" for="visibilityPublic">Público</label>
                                        </div>
                                        
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="profileVisibility" id="visibilityPrivate">
                                            <label class="form-check-label" for="visibilityPrivate">Privado</label>
                                        </div>
                                    </div>
                                    
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
    
    // Simulação de upload de foto
    $('input[type="file"]').change(function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                $('.profile-avatar').attr('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
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
    </script>
</body>
</html>