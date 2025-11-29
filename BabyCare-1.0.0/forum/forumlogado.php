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
                </div>
            </nav>
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
                        <form id="post-form" action="process_post.php" method="POST">
    <div class="mb-3">
        <input type="text" class="form-control" name="titulo" placeholder="Título do post" required>
    </div>
    <div class="mb-3">
        <textarea class="form-control" name="conteudo" rows="3" placeholder="O que você gostaria de compartilhar?" required></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Publicar</button>
</form>

                    </div>

                            <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Filtrar por
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                <li><a class="dropdown-item" href="?filter=recentes">Mais recentes</a></li>
                                <li><a class="dropdown-item" href="?filter=populares">Mais populares</a></li>
                                <li><a class="dropdown-item" href="?filter=sem_respostas">Sem respostas</a></li>
                            </ul>
                            </div>


        <!-- Lista de Posts -->
<div class="mt-5">
<!-- Lista de Posts -->
<div class="mt-5">
<?php

$filter = $_GET['filter'] ?? 'recentes';

if ($filter === 'populares') {
    // Ordena por número de respostas (mais populares)
    $sql = "SELECT p.*, u.nome AS autor, COUNT(r.id) AS total_respostas
            FROM forum_posts p
            JOIN users u ON p.autor_id = u.user_id
            LEFT JOIN forum_respostas r ON p.id = r.post_id
            GROUP BY p.id
            ORDER BY total_respostas DESC";
} elseif ($filter === 'sem_respostas') {
    // Apenas posts sem respostas
    $sql = "SELECT p.*, u.nome AS autor
            FROM forum_posts p
            JOIN users u ON p.autor_id = u.user_id
            LEFT JOIN forum_respostas r ON p.id = r.post_id
            WHERE r.id IS NULL
            ORDER BY p.data_postagem DESC";
} else {
    // Mais recentes (padrão)
    $sql = "SELECT p.*, u.nome AS autor
            FROM forum_posts p
            JOIN users u ON p.autor_id = u.user_id
            ORDER BY p.data_postagem DESC";
}

$posts = $mysqli->query($sql);

if (!$posts) {
    echo "Erro na consulta de posts: " . $mysqli->error;
} elseif ($posts->num_rows > 0) {
    while ($row = $posts->fetch_assoc()) {
        $dataUTC = new DateTime($row['data_postagem'], new DateTimeZone('UTC'));
         $dataUTC->setTimezone(new DateTimeZone('America/Sao_Paulo'));
        $dataFormatada = $dataUTC->format('d/m/Y H:i');
        echo "<div class='card mb-3'>
                <div class='card-body'>
                    <h5>" . htmlspecialchars($row['titulo']) . "</h5>
                    <p>" . nl2br(htmlspecialchars($row['conteudo'])) . "</p>
                    <small class='text-muted'>Por " . htmlspecialchars($row['autor']) . " em {$dataFormatada}</small>";
                    
        // Respostas
        $respostas = $mysqli->query("SELECT r.*, u.nome AS autor 
                                     FROM forum_respostas r 
                                     JOIN users u ON r.autor_id = u.user_id 
                                     WHERE r.post_id = {$row['id']} 
                                     ORDER BY r.data DESC");

        if ($respostas && $respostas->num_rows > 0) {
            echo "<div class='mt-3'><h6>Respostas:</h6>";
            while ($resp = $respostas->fetch_assoc()) {
                echo "<p><b>" . htmlspecialchars($resp['autor']) . ":</b> " . nl2br(htmlspecialchars($resp['conteudo'])) . "</p>";
            }
            echo "</div>";
        }

        // Form resposta
        echo "<form action='process_resposta.php' method='POST' class='mt-2'>
                <input type='hidden' name='post_id' value='{$row['id']}'>
                <textarea name='conteudo' class='form-control mb-2' rows='2' placeholder='Responder...' required></textarea>
                <button type='submit' class='btn btn-primary btn-sm'>Enviar resposta</button>
              </form>
            </div>
          </div>";
    }
} else {
    echo "<p>Nenhum post encontrado.</p>";
}
?>
</div>


</div>

</div>


     <?php
      require("../include/copyright.php");
 require("../include/bibliotecajava.php");
   ?>

</body>
</html>