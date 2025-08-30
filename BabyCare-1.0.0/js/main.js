(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);
    
    
    // Initiate the wowjs
    new WOW().init();
    
    
   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonial carousel

    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: true,
        dots: true,
        loop: true,
        margin: 50,
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:2
            },
            1200:{
                items:3
            }
        }
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });



})(jQuery);

//dignidade menstrual
  $(document).ready(function() {
            
            $('.like-btn').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                let countText = $(this).text();
                let count = parseInt(countText.match(/\((\d+)\)/)[1]);
                
                if ($(this).hasClass('active')) {
                    $(this).html('<i class="fas fa-heart me-1"></i> Curtir (' + (count + 1) + ')');
                } else {
                    $(this).html('<i class="fas fa-heart me-1"></i> Curtir (' + (count - 1) + ')');
                }
            });
            
            
            $('.reply-btn').click(function(e) {
                e.preventDefault();
                let commentBox = $(this).closest('.comment').find('.comment').first();
                
                if (commentBox.length === 0) {
                
                    $(this).closest('.comment-actions').after(`
                        <div class="comment mt-3 ms-4">
                            <form class="reply-form">
                                <div class="mb-3">
                                    <textarea class="form-control" rows="2" placeholder="Escreva sua resposta..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm cancel-reply">Cancelar</button>
                            </form>
                        </div>
                    `);
                }
            });
            
            // Cancelar comentário
            $(document).on('click', '.cancel-reply', function() {
                $(this).closest('.comment').remove();
            });
            
            // Novo comentário
            $('#add-comment').submit(function(e) {
                e.preventDefault();
                let commentText = $(this).find('textarea').val();
                
                if (commentText.trim() !== '') {
                    let newComment = `
                        <div class="comment">
                            <div class="d-flex">
                                <img src="https://randomuser.me/api/portraits/women/${Math.floor(Math.random() * 100)}.jpg" alt="User" class="user-avatar">
                                <div>
                                    <h5 class="mb-1">Você</h5>
                                    <p class="text-muted small mb-2">Agora</p>
                                    <p>${commentText}</p>
                                    
                                    <div class="comment-actions">
                                        <span class="action-btn like-btn"><i class="fas fa-heart me-1"></i> Curtir (0)</span>
                                        <span class="action-btn reply-btn"><i class="fas fa-reply me-1"></i> Responder</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    $('.comment-form').before(newComment);
                    $(this).find('textarea').val('');
                }
            });
            
            // Comentar
            $(document).on('submit', '.reply-form', function(e) {
                e.preventDefault();
                let replyText = $(this).find('textarea').val();
                
                if (replyText.trim() !== '') {
                    let newReply = `
                        <div class="d-flex">
                            <img src="https://randomuser.me/api/portraits/women/${Math.floor(Math.random() * 100)}.jpg" alt="User" class="user-avatar" style="width: 40px; height: 40px;">
                            <div>
                                <h5 class="mb-1">Você</h5>
                                <p class="text-muted small mb-2">Agora</p>
                                <p>${replyText}</p>
                                
                                <div class="comment-actions">
                                    <span class="action-btn like-btn"><i class="fas fa-heart me-1"></i> Curtir (0)</span>
                                    <span class="action-btn reply-btn"><i class="fas fa-reply me-1"></i> Responder</span>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    $(this).closest('.comment').html(newReply);
                }
            });
        });
 //calendário

         let selectedDate = null;
            let selectedBloodDrop = 0;
            let selectedEmoji = '';
            
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'pt-br',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    }
                   
                });

                
                calendar.render();
            });
            
            // Funções para os ícones interativos
            function toggleDropdown(id) {
                const dropdown = document.getElementById(id);
                if (dropdown.style.display === 'block') {
                    dropdown.style.display = 'none';
                } else {
                    // Fecha todos os dropdowns antes de abrir o selecionado
                    document.querySelectorAll('.dropdown-content').forEach(d => {
                        d.style.display = 'none';
                    });
                    dropdown.style.display = 'block';
                }
            }
            
           
            
            function selectEmoji(emoji) {
                // Remove a seleção anterior
                document.querySelectorAll('.emoji-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                
                // Adiciona a seleção atual
                event.target.classList.add('selected');
                selectedEmoji = emoji;
                
                // Mostra feedback visual
                alert('Humor registrado como ' + emoji + ' para o dia ' + (selectedDate || 'selecione uma data'));
            }
            
            // Fecha os dropdowns ao clicar fora
            window.onclick = function(event) {
                if (!event.target.matches('.icon-btn')) {
                    document.querySelectorAll('.dropdown-content').forEach(dropdown => {
                        dropdown.style.display = 'none';
                    });
                }
            }
            

            //fórum
             $(document).ready(function() {
            // Toggle comments section
            $('.comment-btn').click(function(e) {
                e.preventDefault();
                $(this).closest('.forum-post').find('.comments-section').slideToggle();
            });
            
            // botão de like
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
            
            // botão salvar
            $('.save-btn').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                if ($(this).hasClass('active')) {
                    $(this).html('<i class="fas fa-bookmark me-1"></i> Salvo');
                } else {
                    $(this).html('<i class="fas fa-bookmark me-1"></i> Salvar');
                }
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
        });



        
 $(document).ready(function() {
        // botão de like
        $('.like-btn').click(function(e) {
            e.preventDefault();
            $(this).toggleClass('active');
            let countText = $(this).text();
            let count = parseInt(countText.match(/\((\d+)\)/)[1]);
            
            if ($(this).hasClass('active')) {
                $(this).html('<i class="fas fa-heart me-1"></i> Curtir (' + (count + 1) + ')');
            } else {
                $(this).html('<i class="fas fa-heart me-1"></i> Curtir (' + (count - 1) + ')');
            }
        });
        
        // botão de responder
        $('.reply-btn').click(function(e) {
            e.preventDefault();
            let commentBox = $(this).closest('.comment').find('.comment').first();
            
            if (commentBox.length === 0) {
                $(this).closest('.comment-actions').after(`
                    <div class="comment mt-3 ms-4">
                        <form class="reply-form">
                            <div class="mb-3">
                                <textarea class="form-control" rows="2" placeholder="Escreva sua resposta..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm cancel-reply">Cancelar</button>
                        </form>
                    </div>
                `);
            }
        });
        
        // Cancelar resposta
        $(document).on('click', '.cancel-reply', function() {
            $(this).closest('.comment').remove();
        });
        
        // novo comentário
        $('#add-comment').submit(function(e) {
            e.preventDefault();
            let commentText = $(this).find('textarea').val();
            
            if (commentText.trim() !== '') {
              
                
                let imagePath = 'img/chuuu.jpg';
               
                let newComment = `
                    <div class="comment">
                        <div class="d-flex">
                            <img src="${imagePath}" alt="User" class="user-avatar" 
                                 style="width:40px;height:40px;border-radius:50%;object-fit:cover;display:block;">
                            <div>
                                <h5 class="mb-1">Você</h5>
                                <p class="text-muted small mb-2">Agora</p>
                                <p>${commentText}</p>
                                
                                <div class="comment-actions">
                                    <span class="action-btn like-btn"><i class="fas fa-heart me-1"></i> Curtir (0)</span>
                                    <span class="action-btn reply-btn"><i class="fas fa-reply me-1"></i> Responder</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                $('.comment-form').before(newComment);
                $(this).find('textarea').val('');
            }
        });
        
        // resposta
        $(document).on('submit', '.reply-form', function(e) {
            e.preventDefault();
            let replyText = $(this).find('textarea').val();
            
            if (replyText.trim() !== '') {
                let imagePath = window.location.origin + '/img/chuuu.jpg';
                
                let newReply = `
                    <div class="d-flex">
                        <img src="${imagePath}" alt="User" 
                             style="width:40px;height:40px;border-radius:50%;object-fit:cover;display:block;">
                        <div>
                            <h5 class="mb-1">Você</h5>
                            <p class="text-muted small mb-2">Agora</p>
                            <p>${replyText}</p>
                            
                            <div class="comment-actions">
                                <span class="action-btn like-btn"><i class="fas fa-heart me-1"></i> Curtir (0)</span>
                                <span class="action-btn reply-btn"><i class="fas fa-reply me-1"></i> Responder</span>
                            </div>
                        </div>
                    </div>
                `;
                
                $(this).closest('.comment').html(newReply);
            }
        });
    });
        

 //login
         $(document).ready(function() {
            // Form submission
            $('#loginForm').submit(function(e) {
                e.preventDefault();
                
                // Simulate login (in a real app, you would make an AJAX call to your backend)
                const email = $('#email').val();
                const password = $('#password').val();
                
                // Basic validation
                if(email && password) {
                    // Show loading spinner
                    $('#spinner').addClass('show');
                    
                    // Simulate API call delay
                    setTimeout(function() {
                        // Hide spinner
                        $('#spinner').removeClass('show');
                        
                        // Check if credentials are valid (demo purposes)
                        if(email === "usuario@exemplo.com" && password === "senha123") {
                            // Redirect to dashboard
                            window.location.href = 'index.html';
                        } else {
                            // Show error message
                            alert('Email ou senha incorretos. Tente novamente.');
                        }
                    }, 1500);
                } else {
                    alert('Por favor, preencha todos os campos.');
                }
            });
            
            // Forgot password link
            $('.forgot-password').click(function(e) {
                e.preventDefault();
                const email = prompt('Digite seu email para redefinir a senha:');
                if(email) {
                    alert('Um link para redefinir sua senha foi enviado para ' + email);
                }
            });
        });

        //cadastro
          $(document).ready(function() {
            // Verificação de força da senha
            $('#password').on('input', function() {
                const password = $(this).val();
                const strengthBar = $('#passwordStrengthBar');
                let strength = 0;
                
                if (password.length > 7) strength += 1;
                if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1;
                if (password.match(/([0-9])/)) strength += 1;
                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
                
                // Atualiza a barra de força
                switch(strength) {
                    case 0:
                        strengthBar.css('width', '0%').css('background', '#dc3545');
                        break;
                    case 1:
                        strengthBar.css('width', '25%').css('background', '#dc3545');
                        break;
                    case 2:
                        strengthBar.css('width', '50%').css('background', '#ffc107');
                        break;
                    case 3:
                        strengthBar.css('width', '75%').css('background', '#28a745');
                        break;
                    case 4:
                        strengthBar.css('width', '100%').css('background', '#28a745');
                        break;
                }
            });

            // Validação do formulário
            $('#registerForm').submit(function(e) {
                e.preventDefault();
                
                // Validações básicas
                const password = $('#password').val();
                const confirmPassword = $('#confirmPassword').val();
                
                if (password !== confirmPassword) {
                    alert('As senhas não coincidem!');
                    return;
                }
                
                if (password.length < 8) {
                    alert('A senha deve ter no mínimo 8 caracteres!');
                    return;
                }
                
                if (!$('#acceptTerms').is(':checked')) {
                    alert('Você deve aceitar os termos e condições!');
                    return;
                }
                
                
                $('#spinner').addClass('show');
                
                setTimeout(function() {
                    $('#spinner').removeClass('show');
                    alert('Cadastro realizado com sucesso! Redirecionando...');
                    window.location.href = 'index.html'; // Redireciona após cadastro
                }, 1500);
            });
        });


//calendário menstrual não logado 

function showLoginMessage() {
    document.getElementById('login-message').style.display = 'block';
}

function closeLoginMessage() {
    document.getElementById('login-message').style.display = 'none';
}

$(document).ready(function() {
    $('#calendar').fullCalendar({
        dayClick: function(date, jsEvent, view) {
            showLoginMessage();
        },
        eventClick: function(calEvent, jsEvent, view) {
            showLoginMessage();
        },
        events: [
            { title: 'Evento 1', start: '2025-07-10' },
            { title: 'Evento 2', start: '2025-07-15' }
        ]
    });
});

