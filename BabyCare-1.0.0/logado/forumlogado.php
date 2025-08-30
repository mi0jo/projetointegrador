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
                    <div class="text-center py-5">
                        <i class="fas fa-bookmark fa-3x text-muted mb-3"></i>
                        <p>Nenhum post salvo ainda</p>
                    </div>
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
                        <form id="post-form">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="post-title" placeholder="Título do post" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" id="post-content" rows="3" placeholder="O que você gostaria de compartilhar?" required></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="post-tags" placeholder="Tags (separadas por vírgula)">
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
                            <input type="text" class="form-control" placeholder="Buscar no fórum...">
                        </div>
                    </div>

                    <!-- Posts List -->
                    <div id="posts-container">
                        <!-- Post 1 -->
                        <div class="forum-post bg-white p-4 wow fadeIn" data-wow-delay="0.3s" id="post-1">
                            <div class="d-flex mb-3">
                                <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="User" class="user-avatar me-3">
                                <div>
                                    <h5 class="mb-1">Dúvida sobre absorventes reutilizáveis</h5>
                                    <p class="text-muted small mb-0">Postado por <strong>Ana Silva</strong> em 15/06/2023</p>
                                </div>
                            </div>
                            <p class="mb-3">Olá pessoal, estou pensando em migrar para absorventes reutilizáveis para reduzir meu impacto ambiental, mas tenho algumas dúvidas sobre higienização e durabilidade. Alguém aqui já usa e pode compartilhar experiências?</p>
                            
                            <div class="mb-3">
                                <span class="tag">sustentabilidade</span>
                                <span class="tag">absorventes</span>
                                <span class="tag">dúvidas</span>
                            </div>
                            
                            <div class="post-actions d-flex">
                                <div class="action-btn like-btn active">
                                    <i class="fas fa-heart me-1"></i> <span>24</span>
                                </div>
                                <div class="action-btn comment-btn">
                                    <i class="fas fa-comment me-1"></i> <span>8</span>
                                </div>
                                <div class="action-btn save-btn active ms-auto">
                                    <i class="fas fa-bookmark me-1"></i> Salvo
                                </div>
                            </div>
                            
                            <!-- Comments Section -->
                            <div class="comments-section">
                                <div class="comment">
                                    <div class="d-flex">
                                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User" class="user-avatar me-3" style="width: 40px; height: 40px;">
                                        <div>
                                            <strong>Maria Oliveira</strong>
                                            <p class="small text-muted mb-1">16/06/2023</p>
                                            <p>Uso há 6 meses e amo! No começo é estranho, mas você se acostuma. Lavo na máquina com água fria e sabão neutro. Dura cerca de 2 anos se cuidar bem.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="comment">
                                    <div class="d-flex">
                                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="User" class="user-avatar me-3" style="width: 40px; height: 40px;">
                                        <div>
                                            <strong>Carla Santos</strong>
                                            <p class="small text-muted mb-1">15/06/2023</p>
                                            <p>Recomendo começar com um kit pequeno para testar antes de investir em vários. Eu tenho 5 e já é suficiente para meu fluxo moderado.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <form class="comment-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Adicione um comentário...">
                                            <button class="btn btn-primary" type="submit">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Post 2 -->
                        <div class="forum-post bg-white p-4 wow fadeIn" data-wow-delay="0.4s" id="post-2">
                            <div class="d-flex mb-3">
                                <img src="https://randomuser.me/api/portraits/women/25.jpg" alt="User" class="user-avatar me-3">
                                <div>
                                    <h5 class="mb-1">Como lidar com cólicas intensas?</h5>
                                    <p class="text-muted small mb-0">Postado por <strong>Juliana Costa</strong> em 12/06/2023</p>
                                </div>
                            </div>
                            <p class="mb-3">Gostaria de compartilhar que sofro com cólicas muito fortes que me impedem de trabalhar nos primeiros dias da menstruação. Já tentei vários remédios e chás, mas nada parece ajudar muito. Alguém tem alguma dica ou passou por algo parecido?</p>
                            
                            <div class="mb-3">
                                <span class="tag">cólicas</span>
                                <span class="tag">saúde</span>
                                <span class="tag">dicas</span>
                            </div>
                            
                            <div class="post-actions d-flex">
                                <div class="action-btn like-btn">
                                    <i class="fas fa-heart me-1"></i> <span>15</span>
                                </div>
                                <div class="action-btn comment-btn">
                                    <i class="fas fa-comment me-1"></i> <span>5</span>
                                </div>
                                <div class="action-btn save-btn ms-auto">
                                    <i class="fas fa-bookmark me-1"></i> Salvar
                                </div>
                            </div>
                            
                            <!-- Comments Section (hidden by default) -->
                            <div class="comments-section">
                                <div class="comment">
                                    <div class="d-flex">
                                        <img src="https://randomuser.me/api/portraits/women/50.jpg" alt="User" class="user-avatar me-3" style="width: 40px; height: 40px;">
                                        <div>
                                            <strong>Fernanda Lima</strong>
                                            <p class="small text-muted mb-1">13/06/2023</p>
                                            <p>Juliana, já considerou a possibilidade de endometriose? Eu tinha cólicas horríveis e descobri que era isso. Depois do diagnóstico e tratamento, melhorou muito.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <form class="comment-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Adicione um comentário...">
                                            <button class="btn btn-primary" type="submit">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                    <nav aria-label="Page navigation" class="mt-5 wow fadeIn" data-wow-delay="0.6s">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Próxima</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Forum End -->

    <!-- Saved Posts Button -->
    <button class="btn btn-primary saved-posts-btn rounded-pill shadow">
        <i class="fas fa-bookmark me-2"></i> Posts salvos
    </button>

     <?php
      require("../include/copyright.php");
 require("../include/bibliotecajava.php");
   ?>

    
    <script>
        $(document).ready(function() {
            // Array para armazenar posts salvos
            let savedPosts = [
                {
                    id: "post-1",
                    title: "Dúvida sobre absorventes reutilizáveis",
                    content: "Olá pessoal, estou pensando em migrar para absorventes reutilizáveis para reduzir meu impacto ambiental, mas tenho algumas dúvidas sobre higienização e durabilidade. Alguém aqui já usa e pode compartilhar experiências?",
                    html: document.getElementById('post-1').innerHTML
                }
            ];
            
            // Toggle comments section
            $('.comment-btn').click(function(e) {
                e.preventDefault();
                $(this).closest('.forum-post').find('.comments-section').slideToggle();
            });
            
            // Botão de like
            $('.like-btn').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                let countElement = $(this).find('span');
                let currentCount = parseInt(countElement.text());
                if ($(this).hasClass('active')) {
                    countElement.text(currentCount + 1);
                } else {
                    countElement.text(currentCount - 1);
                }
            });
            
            // Botão salvar
            $(document).on('click', '.save-btn', function(e) {
                e.preventDefault();
                const post = $(this).closest('.forum-post');
                const postId = post.attr('id');
                
                const isActive = $(this).hasClass('active');
                $(this).toggleClass('active');
                
                if(isActive) {
                    // Remove dos salvos
                    savedPosts = savedPosts.filter(p => p.id !== postId);
                    $(this).html('<i class="fas fa-bookmark me-1"></i> Salvar');
                } else {
                    // Adiciona aos salvos
                    savedPosts.push({
                        id: postId,
                        title: post.find('h5').text(),
                        content: post.find('p:not(.text-muted)').first().text(),
                        html: post.html()
                    });
                    $(this).html('<i class="fas fa-bookmark me-1"></i> Salvo');
                }
                
                // Atualiza contador
                Toastify({
                    text: isActive ? "Post removido dos salvos" : "Post salvo com sucesso!",
                    duration: 2000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: isActive ? "#6c757d" : "#17a2b8",
                }).showToast();
            });
            
            // Comentários
            $('.comment-form').submit(function(e) {
                e.preventDefault();
                let commentText = $(this).find('input').val();
                if (commentText.trim() !== '') {
                    let newComment = `
                        <div class="comment">
                            <div class="d-flex">
                                <img src="https://randomuser.me/api/portraits/women/${Math.floor(Math.random() * 100)}.jpg" alt="User" class="user-avatar me-3" style="width: 40px; height: 40px;">
                                <div>
                                    <strong>Você</strong>
                                    <p class="small text-muted mb-1">Agora</p>
                                    <p>${commentText}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    $(this).closest('.comments-section').find('.comment-form').before(newComment);
                    $(this).find('input').val('');
                    
                    // update na quantidade de comentários
                    let commentCountElement = $(this).closest('.forum-post').find('.comment-btn span');
                    let currentCount = parseInt(commentCountElement.text());
                    commentCountElement.text(currentCount + 1);
                }
            });
            
            // Formulário de novo post
            $('#post-form').submit(function(e) {
                e.preventDefault();
                
                const title = $('#post-title').val().trim();
                const content = $('#post-content').val().trim();
                const tags = $('#post-tags').val();
                
                if(title && content) {
                    // Preenche o preview
                    $('#preview-title').text(title);
                    $('#preview-content').text(content);
                    $('#preview-tags').text(tags || 'Nenhuma tag');
                    
                    // Mostra modal de confirmação
                    $('#confirmPostModal').modal('show');
                } else {
                    Toastify({
                        text: "Por favor, preencha todos os campos obrigatórios",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#dc3545",
                    }).showToast();
                }
            });
            
            // Confirmação de postagem
            $('#confirmPostBtn').click(function() {
                const title = $('#post-title').val();
                const content = $('#post-content').val();
                const tags = $('#post-tags').val();
                const postId = 'post-' + Date.now();
                
                // Cria o novo post
                const newPost = `
                    <div class="forum-post bg-white p-4 wow fadeIn" id="${postId}">
                        <div class="d-flex mb-3">
                            <img src="../img/chuuu.jpg" alt="User" class="user-avatar me-3">
                            <div>
                                <h5 class="mb-1">${title}</h5>
                                <p class="text-muted small mb-0">Postado por <strong>Você</strong> agora</p>
                            </div>
                        </div>
                        <p class="mb-3">${content}</p>
                        
                        ${tags ? `<div class="mb-3">
                            ${tags.split(',').map(tag => `<span class="tag">${tag.trim()}</span>`).join('')}
                        </div>` : ''}
                        
                        <div class="post-actions d-flex">
                            <div class="action-btn like-btn">
                                <i class="fas fa-heart me-1"></i> <span>0</span>
                            </div>
                            <div class="action-btn comment-btn">
                                <i class="fas fa-comment me-1"></i> <span>0</span>
                            </div>
                            <div class="action-btn save-btn ms-auto">
                                <i class="fas fa-bookmark me-1"></i> Salvar
                            </div>
                        </div>
                        
                        <div class="comments-section" style="display: none;">
                            <div class="mt-3">
                                <form class="comment-form">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Adicione um comentário...">
                                        <button class="btn btn-primary" type="submit">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                `;
                
                // Adiciona no início da lista
                $('#posts-container').prepend(newPost);
                
                // Limpa o formulário
                $('#post-form')[0].reset();
                $('#confirmPostModal').modal('hide');
                
                // Mostra notificação
                Toastify({
                    text: "Post publicado com sucesso!",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#28a745",
                }).showToast();
                
                // Inicializa animação wow.js para o novo post
                new WOW().init();
            });
            
            // Botão de posts salvos
            $('.saved-posts-btn').click(function() {
                $('#savedPostsModal').modal('show');
                renderSavedPosts();
            });
            
            // Função para renderizar posts salvos
            function renderSavedPosts() {
                const container = $('#savedPostsContainer');
                
                if(savedPosts.length === 0) {
                    container.html(`
                        <div class="text-center py-5">
                            <i class="fas fa-bookmark fa-3x text-muted mb-3"></i>
                            <p>Nenhum post salvo ainda</p>
                        </div>
                    `);
                    return;
                }
                
                container.html('<div class="list-group">');
                savedPosts.forEach(post => {
                    container.append(`
                        <div class="list-group-item list-group-item-action saved-post" data-id="${post.id}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">${post.title}</h6>
                                    <p class="mb-1 text-muted small">${post.content.substring(0, 100)}${post.content.length > 100 ? '...' : ''}</p>
                                </div>
                                <i class="fas fa-chevron-right text-muted"></i>
                            </div>
                        </div>
                    `);
                });
                container.append('</div>');
                
                // Adiciona evento de clique para os posts salvos
                $('.saved-post').click(function() {
                    const postId = $(this).data('id');
                    const post = savedPosts.find(p => p.id === postId);
                    
                    if(post) {
                        $('#savedPostsContainer').html(`
                            <button class="btn btn-outline-secondary mb-3" id="backToSavedList">
                                <i class="fas fa-arrow-left me-2"></i> Voltar
                            </button>
                            <div class="forum-post bg-white p-4">
                                ${post.html}
                            </div>
                        `);
                        
                        // Reativa os eventos para os elementos dentro do modal
                        $('#backToSavedList').click(function() {
                            renderSavedPosts();
                        });
                        
                        $('.comment-btn').click(function(e) {
                            e.preventDefault();
                            $(this).closest('.forum-post').find('.comments-section').slideToggle();
                        });
                        
                        $('.like-btn').click(function(e) {
                            e.preventDefault();
                            $(this).toggleClass('active');
                            let countElement = $(this).find('span');
                            let currentCount = parseInt(countElement.text());
                            if ($(this).hasClass('active')) {
                                countElement.text(currentCount + 1);
                            } else {
                                countElement.text(currentCount - 1);
                            }
                        });
                    }
                });
            }
        });
    </script>
</body>
</html>