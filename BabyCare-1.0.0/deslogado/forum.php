<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Fórum - BleedWithDignity</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <?php
      require("../include/referenciashead.php");
      ?>
        <style>
          
        </style>
    </head>

    <body>

        <?php
      require("../include/spinner.php");

   require("../include/navbardeslogado.php");
   require("../include/modalperfildeslogado.php");
       require("../include/modalsearch.php");

   ?>
        
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4">Fórum</h1>
                <p class="text-white">Compartilhe experiências, tire dúvidas e converse sobre saúde menstrual</p>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Forum Start -->
        <div class="container-fluid py-5 bg-light">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!-- New Post Form -->
                        <div id="new-post-form" class="wow fadeIn" data-wow-delay="0.1s">
                            <h4 class="mb-4">Criar novo post</h4>
                            <form id="post-form">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="post-title" placeholder="Título do post" required>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" id="post-content" rows="3" placeholder="O que você gostaria de compartilhar?" required></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Publicar</button>
                            </form>
                        </div>

                        <!-- Filter Options -->
                        <div class="d-flex justify-content-between mb-4 wow fadeIn" data-wow-delay="0.2s">
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Filtrar por
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                    <li><a class="dropdown-item" href="#">Mais recentes</a></li>
                                    <li><a class="dropdown-item" href="#">Mais populares</a></li>
                                    <li><a class="dropdown-item" href="#">Sem respostas</a></li>
                                </ul>
                            </div>
                            <div>
                            </div>
                        </div>

                       
                                
                               
        <!-- Forum End -->

        <!-- Saved Posts Button -->
        <button class="btn btn-primary saved-posts-btn rounded-pill shadow">
            <i class="fas fa-bookmark me-2"></i> Posts salvos
        </button>

         <?php
      require("../include/copyright.php");

   ?>


        <script>

       document.addEventListener('DOMContentLoaded', function () {
    const isLoggedIn = false; 

    // Referência ao modal de login
    const loginModal = new bootstrap.Modal(document.getElementById('loginRequiredModal'));

    // Função para exibir o modal caso o usuário não esteja logado
    function checkLogin(event) {
        if (!isLoggedIn) {
            loginModal.show();
            if (event) {
                event.preventDefault();
                event.stopPropagation();
            }
            return false;
        }
        return true;
    }

    // Bloquear envio de novo post se não estiver logado
    const postForm = document.getElementById('post-form');
    if (postForm) {
        postForm.addEventListener('submit', function (e) {
            if (!checkLogin(e)) return;
            alert('Post enviado (simulado).');
        });
    }

    // Bloquear envio de comentários se não estiver logado
    document.querySelectorAll('.comment-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            if (!checkLogin(e)) return;
            alert('Comentário enviado (simulado).');
        });
    });

    // Spinner: esconde após carregamento
    window.addEventListener('load', function () {
        const spinner = document.getElementById('spinner');
        if (spinner) {
            spinner.classList.remove('show');
            spinner.style.display = 'none';
        }
    });
});

</script>

    <div class="modal fade" id="loginRequiredModal" tabindex="-1" aria-labelledby="loginRequiredModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="loginRequiredModalLabel">Acesso Restrito</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <i class="fas fa-lock fa-4x text-primary mb-3"></i>
                    <h4 class="mb-3">Você precisa estar logado</h4>
                    <p>Para acessar o Fórum, faça login ou crie uma conta.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Mais tarde</button>
                    <a href="login.php" class="btn btn-primary">Fazer Login</a>
                </div>
            </div>
        </div>
    </div>


      <?php
       require("../include/bibliotecajava.php");
      ?>

    

    </body>

</html>