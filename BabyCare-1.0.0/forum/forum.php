<?php
require("../include/conexao.php");
?>

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
</head>

<body>
   
 <?php
        require("../include/spinner.php");

    require("../include/navbarlogado.php");
    require("../include/botoesperfilpesquisa.php");
    require("../include/modalsearch.php");
    ?>
    <!-- Modal de Confirmação de Postagem -->
    <div class="modal fade" id="confirmPostModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Publicação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja publicar este post?</p>
                    <div class="preview-post border p-3 mt-3">
                        <h6 id="preview-title"></h6>
                        <p id="preview-content" class="mb-2"></p>
                        <small class="text-muted">Tags: <span id="preview-tags"></span></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="confirmPostBtn">Publicar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Posts Salvos -->
    <div class="modal fade" id="savedPostsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Seus Posts Salvos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="savedPostsContainer">
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $salvos = $mysqli->query("SELECT p.* FROM posts_salvos s 
                                             JOIN forum_posts p ON s.post_id = p.id 
                                             WHERE s.user_id = $user_id ORDER BY s.data_salvo DESC");
                    if ($salvos->num_rows > 0) {
                        while ($s = $salvos->fetch_assoc()) {
                            echo "<div class='border p-3 mb-2'><h6>{$s['titulo']}</h6><p>{$s['conteudo']}</p></div>";
                        }
                    } else {
                        echo "<div class='text-center py-5'>
                                <i class='fas fa-bookmark fa-3x text-muted mb-3'></i>
                                <p>Nenhum post salvo ainda</p>
                              </div>";
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

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
                        <form action="process_post.php" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="titulo" placeholder="Título do post" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" name="conteudo" rows="3" placeholder="O que você gostaria de compartilhar?" required></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="tags" placeholder="Tags (separadas por vírgula)">
                            </div>
                            <button type="submit" class="btn btn-primary">Publicar</button>
                        </form>
                    </div>

                    <!-- Lista de Posts -->
         
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Forum End -->

    <!-- Saved Posts Button -->
    <button class="btn btn-primary saved-posts-btn rounded-pill shadow" data-bs-toggle="modal" data-bs-target="#savedPostsModal">
        <i class="fas fa-bookmark me-2"></i> Posts salvos
    </button>

    <?php
    require("../include/copyright.php");
    require("../include/bibliotecajava.php");
    ?>
</body>
</html>
